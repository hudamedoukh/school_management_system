<?php

namespace App\Http\Controllers\Parents;

use App\Models\My_Parent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ParentProfileController extends Controller
{
    public function index(){
        $information=My_Parent::findOrFail(auth()->user()->id);
        // return  $information;
        return view('pages.parents.dashboard.profile',compact('information'));

    }
    public function update(Request $request,$id){
        $information = My_Parent::findorFail($id);

        if (!empty($request->password)) {
            $information->Name_Father =$request->Name_Father;
            $information->password = Hash::make($request->password);
            $information->save();
        } else {
            $information->Name_Father = $request->Name_Father;
            $information->save();
        }
        $notification = array(
            'message' => 'تم تعديل البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
