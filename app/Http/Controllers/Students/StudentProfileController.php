<?php

namespace App\Http\Controllers\Students;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StudentProfileController extends Controller
{
    public function index(){
        $information=Student::findOrFail(auth()->user()->id);
        // return  $information;
        return view('pages.Students.dashboard.profile',compact('information'));

    }
    public function update(Request $request,$id){
        $information = Student::findorFail($id);

        if (!empty($request->password)) {
            $information->name =$request->name;
            $information->password = Hash::make($request->password);
            $information->save();
        } else {
            $information->name = $request->name;
            $information->save();
        }
        $notification = array(
            'message' => 'تم تعديل البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
