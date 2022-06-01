<?php
namespace App\Repository;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function getAllTeachers()
    {
        return Teacher::all();
    }

    public function Getspecialization()
    {
        return Specialization::all();
    }

    public function GetGender()
    {
        return Gender::all();
    }

    public function StoreTeachers($request)
    {
        
        $Teachers = new Teacher();
        $Teachers->email = $request->Email;
        $Teachers->password =  Hash::make($request->Password);
        $Teachers->Name = $request->Name;
        $Teachers->Specialization_id = $request->Specialization_id;
        $Teachers->Gender_id = $request->Gender_id;
        $Teachers->Joining_Date = $request->Joining_Date;
        $Teachers->Address = $request->Address;
        $Teachers->save();
        $notification = array(
            'message' => 'تم إضافة البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('Teachers.index')->with($notification);  
        
    }

    public function editTeachers($id)
    {
        return Teacher::findOrFail($id);
    }


    public function UpdateTeachers($request)
    {
        
        $Teachers = Teacher::findOrFail($request->id);
        $Teachers->email = $request->Email;
        $Teachers->password =  Hash::make($request->Password);
        $Teachers->Name = $request->Name;
        $Teachers->Specialization_id = $request->Specialization_id;
        $Teachers->Gender_id = $request->Gender_id;
        $Teachers->Joining_Date = $request->Joining_Date;
        $Teachers->Address = $request->Address;
        $Teachers->save();
        $notification = array(
            'message' => 'تم إضافة البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('Teachers.index')->with($notification);
        
        
    }


    public function DeleteTeachers($request)
    {
        Teacher::findOrFail($request->id)->delete();
        $notification = array(
            'message' => 'تم حذف البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('Teachers.index')->with($notification);
    }
}
