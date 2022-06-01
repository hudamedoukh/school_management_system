<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{
    
    public function index()
    {
        $quizzes = Quiz::where('teacher_id',auth()->user()->id)->get();
        return view('pages.Teachers.dashboard.Quizzes.index', compact('quizzes'));
    }

    
    public function create()
    {
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
        return view('pages.Teachers.dashboard.Quizzes.create', $data);
    }

    
    public function store(Request $request)
    {
        $quizzes = new Quiz();
        $quizzes->name = $request->Name;
        $quizzes->subject_id = $request->subject_id;
        $quizzes->grade_id = $request->Grade_id;
        $quizzes->classroom_id = $request->Classroom_id;
        $quizzes->section_id = $request->section_id;
        $quizzes->teacher_id = auth()->user()->id;
        $quizzes->save();
        $notification = array(
            'message' => 'تم إضافة البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('quizzes.index')->with($notification );
    }

    
    
    public function edit($id)
    {
        $quizz = Quiz::findorFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
        return view('pages.Teachers.dashboard.Quizzes.edit', $data, compact('quizz'));
    }

    public function show($id)
    {
        $questions = Question::where('quizze_id',$id)->get();
        $quizz = Quiz::findorFail($id);
        return view('pages.Teachers.dashboard.Questions.index',compact('questions','quizz'));
    }
    
    public function update(Request $request, $id)
    {
        $quizz = Quiz::findorFail($request->id);
        $quizz->name = $request->Name;
        $quizz->subject_id = $request->subject_id;
        $quizz->grade_id = $request->Grade_id;
        $quizz->classroom_id = $request->Classroom_id;
        $quizz->section_id = $request->section_id;
        $quizz->teacher_id = auth()->user()->id;
        $quizz->save();
        $notification = array(
            'message' => 'تم إضافة البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('quizzes.index')->with($notification );
    }

    
    public function destroy($id)
    {
        Quiz::destroy($id);
        $notification = array(
            'message' => 'تم إضافة البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification );
    }

    
}
