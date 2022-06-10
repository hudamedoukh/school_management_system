<?php

namespace App\Http\Controllers\Students;

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
}
