<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('auth.selection');
    }
    public function dashboard()
    {
        return view('admin.index');
    }
}
