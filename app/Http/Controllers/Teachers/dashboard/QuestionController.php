<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    
    public function index()
    {


    }

    
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $question = new Question();
        $question->title = $request->title;
        $question->answers = $request->answers;
        $question->right_answer = $request->right_answer;
        $question->score = $request->score;
        $question->quizze_id = $request->quizz_id;
        $question->save();
        $notification = array(
            'message' => 'تم إضافة البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification );
    }


    public function show($id)
    {
        $quizz_id = $id;
        return view('pages.Teachers.dashboard.Questions.create', compact('quizz_id'));
    }

    
    public function edit($id)
    {
        $question = Question::findorFail($id);
        return view('pages.Teachers.dashboard.Questions.edit', compact('question'));
    }

    
    public function update(Request $request, $id)
    {
        $question = Question::findorfail($id);
        $question->title = $request->title;
        $question->answers = $request->answers;
        $question->right_answer = $request->right_answer;
        $question->score = $request->score;
        $question->save();
        $notification = array(
            'message' => 'تم إضافة البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification );
    }

    
    public function destroy($id)
    {
        Question::destroy($id);
        $notification = array(
            'message' => 'تم إضافة البيانات بنجاح',
            'alert-type' => 'danger'
        );
        return redirect()->back()->with($notification );
    }
}
