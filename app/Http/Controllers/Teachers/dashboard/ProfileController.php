<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $information=Teacher::findOrFail(auth()->user()->id);
        return view('pages.Teachers.dashboard.profile',compact('information'));

    }
    public function update(Request $request,$id){
        $information = Teacher::findorFail($id);

        if (!empty($request->password)) {
            $information->Name =$request->Name;
            $information->password = Hash::make($request->password);
            $information->save();
        } else {
            $information->Name = $request->Name;

            $information->save();
        }
        $notification = array(
            'message' => 'تم تعديل البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
