<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProfileController extends Controller
{
    public function index(){
        $information=User::findOrFail(auth()->user()->id);
        // return  $information;
        return view('pages.Admins.profile',compact('information'));

    }
    public function update(Request $request,$id){
        $information = User::findorFail($id);

        if (!empty($request->password)) {
            $information->name =$request->name;
            $information->password = User::make($request->password);
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
