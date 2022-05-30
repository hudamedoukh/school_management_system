<?php

namespace App\Repository;

use App\Models\Exam;
use App\Models\Grade;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Subject;
use App\Models\Teacher;

class QuestionRepository implements QuestionRepositoryInterface
{

    public function index()
    {
        $questions = Question::get();
        return view('pages.Questions.index', compact('questions'));
    }

    public function create()
    {
        $quizzes = Quiz::get();
        return view('pages.Questions.create',compact('quizzes'));
    }


    public function store($request)
    {
        
        $question = new Question();
        $question->title = $request->title;
        $question->answers = $request->answers;
        $question->right_answer = $request->right_answer;
        $question->score = $request->score;
        $question->quizze_id = $request->quizze_id;
        $question->save();
        $notification = array(
            'message' => 'تم بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('questions.index')->with($notification);
        
    }


    public function edit($id)
    {
        $question = Question::findorfail($id);
        $quizzes = Quiz::get();
        return view('pages.Questions.edit',compact('question','quizzes'));
    }

    public function update($request)
    {
        
        $question = Question::findorfail($request->id);
        $question->title = $request->title;
        $question->answers = $request->answers;
        $question->right_answer = $request->right_answer;
        $question->score = $request->score;
        $question->quizze_id = $request->quizze_id;
        $question->save();
        $notification = array(
            'message' => 'تم بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('questions.index')->with($notification);
        
    }

    public function destroy($request)
    {
        
        Question::destroy($request->id);       
        $notification = array(
            'message' => 'تم بنجاح',
            'alert-type' => 'danger'
        );
        return redirect()->back()->with($notification);
        
    }
}
