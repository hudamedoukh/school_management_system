<?php

namespace App\Http\Controllers\Teachers;

use App\Models\Salary;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\TeacherAttendance;
use App\Http\Controllers\Controller;

class MonthlySalalryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.Teachers.Monthly_Salary.index');
    }

    public function getTeachers(Request $request){

        $date = date('Y-m',strtotime($request->attendence_date));
        if ($date !='') {
            $where[] = ['attendence_date','like',$date.'%'];
        }

        $teachers = TeacherAttendance::select('teacher_id')->groupBy('teacher_id')->with(['teachers'])->where($where)->get();
        $html['thsource']  = '<th>رقم</th>';
        $html['thsource'] .= '<th>اسم الموظف </th>';
        $html['thsource'] .= '<th>الراتب الاصلي </th>';
        $html['thsource'] .= '<th>  عدد أيام الغياب  </th>';
        $html['thsource'] .= '<th>   الشهر  </th>';
        $html['thsource'] .= '<th>الراتب لهذا الشهر  </th>';
        $html['thsource'] .= '<th>العمليات</th>';


        foreach ($teachers as $key => $teacher) {
            $totalAttend = TeacherAttendance::with(['teachers'])->where($where)->where('teacher_id',$teacher->teacher_id)->get();
            $countAbsent = count($totalAttend->where('attendence_status','3'));
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$teacher['teachers']['Name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$teacher['teachers']['salary'].'شيكل'.'</td>';

            $salary = (float)$teacher['teachers']['salary'];
            $salarPerDay = (float)$salary/30;
            $totalSalaryMinus = (float)$countAbsent*(float)$salarPerDay;
            $totalsalary = (float)$salary-(float)$totalSalaryMinus;

            $html[$key]['tdsource'] .='<td>'.$countAbsent.'</td>';
            $html[$key]['tdsource'] .='<td>'. date('M Y', strtotime($date)).'</td>';

            $html[$key]['tdsource'] .='<td>'.$totalsalary.'شيكل'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-md btn-'.$color.'" title="قسمية الراتب الشهري"> قسمية الراتب الشهري</a>';
            $html[$key]['tdsource'] .= '</td>';

        }
       return response()->json(@$html);


 }
 public function showPdf(Request $request,$teacher_id){
    $teacher = TeacherAttendance::where('teacher_id',$teacher_id)->first();
      		$date = date('Y-m',strtotime($teacher->attendence_date));
        	 if ($date !='') {
        	 	$where[] = ['attendence_date','like',$date.'%'];
        	 }

        $attendances = TeacherAttendance::with(['teachers'])->where($where)->where('teacher_id',$teacher->teacher_id)->get();

        // $pdf = Pdf::loadView('dashboard.employees.monthly_salary.show_pdf', $data);
    	// $pdf->SetProtection(['copy', 'print'], '', 'pass');
    	// return $pdf->stream('document.pdf');
  }
}
