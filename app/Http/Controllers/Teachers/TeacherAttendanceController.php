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

        foreach ($request->attendence_status as $teacher_id => $attendence) {

            TeacherAttendance::updateorCreate(['teacher_id'=> $teacher_id],[
                'attendence_date' => date('Y-m-d'),
                'teacher_id' => $teacher_id,
                'attendence_status' => $attendence,
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
        $teacherAttendances= TeacherAttendance::with('teachers')->where('attendence_date', $attendence_date)->get();
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
        $teachers = TeacherAttendance::with('teachers')->where('attendence_date',$attendence_date)->orderBy('id', 'DESC')->get();
        // return $attendences;
        return view('pages.Teachers.Attendances.edit',compact('teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$attendence_date)
    {
        // return $request;
        foreach ($request->attendence_status as $teacher_id => $attendence) {
            $attend=TeacherAttendance::where('attendence_date',$attendence_date);
            $attend->updateorCreate(['teacher_id'=> $teacher_id],[
                'attendence_date' => date('Y-m-d'),
                'teacher_id' => $teacher_id,
                'attendence_status' => $attendence,
            ]);
        }

        $notification = array(
            'message' => 'تم تعديل البيانات بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('TeacherAttendance.index')->with($notification);
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
