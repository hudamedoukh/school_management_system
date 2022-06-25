<?php

namespace App\Http\Controllers\Parents;

use App\Models\Mark;
use App\Models\Quiz;
use App\Models\Library;
use App\Models\Student;
use App\Models\Subject;
use App\Models\OnlineClass;
use Illuminate\Http\Request;
use App\Models\StudentAccount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    public function index()
    {
        $students = Student::where('parent_id', auth()->user()->id)->get();
        return view('pages.parents.dashboard.students.index', compact('students'));
    }

    public function ViewMark($id)
    {
        $class = student::where('id',$id)->pluck('Classroom_id');

        $data['subjects'] = Subject::with('Quizes')->where('classroom_id',$class)->get();

        $data['student_name']=Student::where('id',$id)->pluck('name');
        $data['student_id']=$id;
        return view('pages.parents.dashboard.marks_view.index', $data);
    }

    public function getMarks(Request $request)
    {
        $subject_id = $request->subject_id;
        $studentsMarks = Mark::with('student', 'subject', 'quiz')
            ->where('subject_id', $subject_id)
            ->where('student_id', $request->student_id)->get();
        return response()->json($studentsMarks);
    }

    public function studentAccounts($id){
        $accounts=StudentAccount::where('student_id',$id)->get();
        $totalCredit = $accounts->sum('credit');
        $totalDebit= $accounts->sum('Debit');
        $StudentAccount=$totalDebit-$totalCredit;
        return view('pages.parents.dashboard.accounts.index',compact('accounts','StudentAccount'));
    }
    public function getBooks($id){
        $student_name=Student::where('id',$id)->pluck('name');
        $class=Student::where('id',$id)->pluck('Classroom_id');
        $grade=Student::where('id',$id)->pluck('Grade_id');
        $section=Student::where('id',$id)->pluck('section_id');
        $books=Library::where('Classroom_id',$class)->where('Grade_id',$grade)->where('section_id',$section)->get();
        return view('pages.parents.dashboard.library.index',compact('books','student_name'));
    }

    public function getTeachers($id){
        $student_name=Student::where('id',$id)->pluck('name');
        $class=Student::where('id',$id)->pluck('Classroom_id');
        $grade=Student::where('id',$id)->pluck('Grade_id');
        $subjects=Subject::where('Classroom_id',$class)->where('Grade_id',$grade)->get();
        return view('pages.parents.dashboard.teachers.index',compact('subjects','student_name'));

    }
    public function getOnlineClasses($id){
        $student_name=Student::where('id',$id)->pluck('name');

        $class=Student::where('id',$id)->pluck('Classroom_id');
        $grade=Student::where('id',$id)->pluck('Grade_id');
        $section=Student::where('id',$id)->pluck('section_id');
        $online_classes = OnlineClass::where('Classroom_id',$class)->where('Grade_id',$grade)->where('section_id',$section)->get();
        return view('pages.parents.dashboard.online_classes.index', compact('online_classes','student_name'));
    }
}

