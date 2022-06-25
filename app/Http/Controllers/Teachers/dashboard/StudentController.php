<?php
namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index($id)
    {
    //  $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
    //      $grades = Section::wherein('id', $ids)->pluck('Grade_id');
        $students = Student::where('section_id', $id)->get();
        // return $students;
        return view('pages.Teachers.dashboard.students.index', compact('students'));
    }

    public function sections()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $sections = Section::whereIn('id', $ids)->get();
        return view('pages.Teachers.dashboard.sections.index', compact('sections'));
    }

    public function attendance(Request $request)
    {

        $attenddate = date('Y-m-d');
        foreach ($request->attendences as $studentid => $attendence) {

            if ($attendence == 'presence') {
                $attendence_status = true;
            } else if ($attendence == 'absent') {
                $attendence_status = false;
            }

            Attendance::updateorCreate([
                'student_id'=> $studentid,
                'attendence_date' => $attenddate
            ],
            [
                'student_id' => $studentid,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'teacher_id' => 1,
                'attendence_date' => $attenddate,
                'attendence_status' => $attendence_status
            ]);
        }
        $notification = array(
            'message' => 'تم إضافة البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification );

    }


    public function editAttendance(Request $request)
    {

        $date = date('Y-m-d');
        $student_id = Attendance::where('attendence_date',$date)->where('student_id',$request->id)->first();
        if( $request->attendences == 'presence' ) {
            $attendence_status = true;
        } else if( $request->attendences == 'absent' ){
            $attendence_status = false;
        }
        $student_id->update([
            'attendence_status'=> $attendence_status
        ]);
        $notification = array(
            'message' => 'تم إضافة البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification );

    }

    public function attendanceReport()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();
        return view('pages.Teachers.dashboard.students.attendance_report', compact('students'));
    }

    public function attendanceSearch(Request $request)
    {

        $request->validate([
            'from'  =>'required|date|date_format:Y-m-d',
            'to'=> 'required|date|date_format:Y-m-d|after_or_equal:from'
        ],[
            'to.after_or_equal' => 'تاريخ النهاية لابد أن يكون أكبر من تاريخ البداية أو يساويه',
            'from.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
            'to.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
        ]);


        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students = Student::whereIn('section_id', $ids)->get();

        if($request->student_id == 0){

            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])->get();
            return view('pages.Teachers.dashboard.students.attendance_report',compact('Students','students'));
        }

        else{

            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])
            ->where('student_id',$request->student_id)->get();
            return view('pages.Teachers.dashboard.students.attendance_report',compact('Students','students'));

        }

    }
}
