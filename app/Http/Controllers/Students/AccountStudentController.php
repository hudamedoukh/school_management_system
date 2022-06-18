<?php

namespace App\Http\Controllers\Students;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\StudentAccount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountStudentController extends Controller
{
    public function index(){
            $accounts=StudentAccount::where('student_id',Auth::guard('student')->user()->id)->get();
            $totalCredit = $accounts->sum('credit');
            $totalDebit= $accounts->sum('Debit');
            $StudentAccount=$totalDebit-$totalCredit;
            return view('pages.Students.dashboard.accounts.index',compact('accounts','StudentAccount'));
    }

    public function getTeachers(){
        $class=Student::where('id',Auth::guard('student')->user()->id)->pluck('Classroom_id');
        $grade=Student::where('id',Auth::guard('student')->user()->id)->pluck('Grade_id');
        $subjects=Subject::where('Classroom_id',$class)->where('Grade_id',$grade)->get();

        return view('pages.Students.dashboard.teachers.index',compact('subjects'));
    }
}
