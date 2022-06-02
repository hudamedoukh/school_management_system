<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;

class SubjectRepository implements SubjectRepositoryInterface
{

    public function index()
    {
        $subjects = Subject::get();
        return view('pages.Subjects.index',compact('subjects'));
    }

    public function create()
    {
        $grades = Grade::get();
        $teachers = Teacher::get();
        return view('pages.Subjects.create',compact('grades','teachers'));
    }


    public function store($request)
    {

        $subjects = new Subject();
        $subjects->name = $request->Name;
        $subjects->grade_id = $request->Grade_id;
        $subjects->classroom_id = $request->Class_id;
        $subjects->teacher_id = $request->teacher_id;
        $subjects->save();
        $notification = array(
            'message' => 'تم بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('subjects.index')->with($notification);

    }


    public function edit($id){

        $subject =Subject::findorfail($id);
        $grades = Grade::get();
        $teachers = Teacher::get();
        return view('pages.Subjects.edit',compact('subject','grades','teachers'));

    }

    public function update($request)
    {

        $subjects =  Subject::findorfail($request->id);
        $subjects->name = $request->Name;
        $subjects->grade_id = $request->Grade_id;
        $subjects->classroom_id = $request->Class_id;
        $subjects->teacher_id = $request->teacher_id;
        $subjects->save();
        $notification = array(
            'message' => 'تم بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('subjects.index')->with($notification);

    }

    public function destroy($request)
    {

            Subject::destroy($request->id);
            $notification = array(
                'message' => 'تم بنجاح',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);


    }
}
