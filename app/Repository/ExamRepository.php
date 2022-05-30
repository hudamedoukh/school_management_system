<?php

namespace App\Repository;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;

class ExamRepository implements ExamRepositoryInterface
{

    public function index()
    {
        $exams = Exam::get();
        return view('pages.Exams.index', compact('exams'));
    }

    public function create()
    {
        return view('pages.Exams.create');
    }


    public function store($request)
    {
        
        $exams = new Exam();
        $exams->name = $request->Name;
        $exams->term = $request->term;
        $exams->academic_year = $request->academic_year;
        $exams->save();
        $notification = array(
            'message' => 'تم بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('Exams.index')->with($notification);
        
    }


    public function edit($id)
    {
        $exam = Exam::findorFail($id);
        return view('pages.Exams.edit', compact('exam'));
    }

    public function update($request)
    {
        
        $exam = Exam::findorFail($request->id);
        $exam->name = $request->Name;
        $exam->term = $request->term;
        $exam->academic_year = $request->academic_year;
        $exam->save();
        $notification = array(
            'message' => 'تم بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('Exams.index')->with($notification);
        
    }

    public function destroy($request)
    {
        
        Exam::destroy($request->id);        
        $notification = array(
            'message' => 'تم بنجاح',
            'alert-type' => 'danger'
        );
        return redirect()->back()->with($notification);
        
    }
}
