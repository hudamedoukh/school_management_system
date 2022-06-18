<?php

namespace App\Repository;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\Quiz;
use App\Models\Subject;
use App\Models\Teacher;

class QuizRepository implements QuizRepositoryInterface
{

    public function index()
    {
        $quizzes = Quiz::get();
        return view('pages.Quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('pages.Quizzes.create', $data);
    }


    public function store($request)
    {

        $quizzes = new Quiz();
        $quizzes->name =  $request->Name;
        $quizzes->subject_id = $request->subject_id;
        $quizzes->grade_id = $request->Grade_id;
        $quizzes->classroom_id = $request->Classroom_id;
        $quizzes->section_id = $request->section_id;
        $quizzes->teacher_id = $request->teacher_id;
        $quizzes->save();
        $notification = array(
            'message' => 'تم حفظ البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('Quizzes.index')->with($notification);

    }


    public function edit($id)
    {
        $quizz = Quiz::findorFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('pages.Quizzes.edit', $data, compact('quizz'));
    }

    public function update($request)
    {

        $quizz = Quiz::findorFail($request->id);
        $quizz->name = $request->Name;
        $quizz->subject_id = $request->subject_id;
        $quizz->grade_id = $request->Grade_id;
        $quizz->classroom_id = $request->Classroom_id;
        $quizz->section_id = $request->section_id;
        $quizz->teacher_id = $request->teacher_id;
        $quizz->save();
        $notification = array(
            'message' => 'تم تعديل البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('Quizzes.index')->with($notification);

    }

    public function destroy($request)
    {

        Quiz::destroy($request->id);
        $notification = array(
            'message' => 'تم حذف البيانات بنجاح',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }
}
