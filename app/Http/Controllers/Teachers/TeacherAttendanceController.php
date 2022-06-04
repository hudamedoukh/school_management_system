<?php

namespace App\Http\Controllers\Teachers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\TeacherAttendance;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherAttendence;

class TeacherAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendences = TeacherAttendance::select('attendence_date')->groupBy('attendence_date')->orderBy('id', 'DESC')->get();

        return view('pages.Teachers.Attendances.index',compact('attendences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $teachers= Teacher::all();
        return view('pages.Teachers.Attendances.create', compact('teachers'));
       }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validated();

        TeacherAttendance::where('attendence_date', date('Y-m-d', strtotime($request->attendence_date)))->delete();
        $counteachers = count($request->teacher_id);

        for ($i = 0; $i < $counteachers; $i++) {
            $attendence_status = 'attendence_status' . $i;
             TeacherAttendance::create([
                'attendence_date' => date('Y-m-d', strtotime($request->attendence_date)),
                'teacher_id' => $request->teacher_id[$i],
                'attendence_status' => $request->$attendence_status,
            ]);
        }
        $notification = array(
            'message' => 'تم اضافة البيانات بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('TeacherAttendance.index')->with($notification);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($attendence_date)
    {
        $teacherAttendances = TeacherAttendance::with('teachers')->where('attendence_date', $attendence_date)->get();
        //  return $teacherAttendances ;
        return view('pages.Teachers.Attendances.show',compact('teacherAttendances'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($attendence_date)
    {
        $attendences = TeacherAttendance::with('teachers')->where('attendence_date',$attendence_date)->orderBy('id', 'DESC')->get();
        // return $attendences;
        return view('pages.Teachers.Attendances.edit',compact('attendences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($attendence_date)
    {
        //
    }
}
