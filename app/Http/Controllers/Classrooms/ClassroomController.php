<?php

namespace App\Http\Controllers\Classrooms;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroom;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $My_Classes = Classroom::all();
        $Grades = Grade::all();
        return view('pages.classrooms.classrooms', compact('My_Classes', 'Grades'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassroom $request)
    {
        $List_Classes = $request->List_Classes;
        $validated = $request->validated();


        foreach ($List_Classes as $List_Class) {
            $My_Classes = new Classroom();
            $My_Classes->Name_Class =  $List_Class['Name_Class'];
            $My_Classes->Grade_id = $List_Class['Grade_id'];
            $My_Classes->save();
        }

        $notification = array(
            'message' => 'تم إضافة البيانات بنجاح',
            'alert-type' => 'success'
        );
            return redirect()->route('classrooms.index')->with($notification);

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Classrooms = Classroom::findOrFail($request->id);

        $Classrooms->update([
            $Classrooms->Name_Class = $request->Name_Class,
            $Classrooms->Grade_id = $request->Grade_id,
        ]);

        $notification = array(
            'message' => 'تم تعديل البيانات بنجاح',
            'alert-type' => 'success'
        );
            return redirect()->route('classrooms.index')->with($notification);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $Classrooms = Classroom::findOrFail($request->id)->delete();
        $notification = array(
            'message' => 'تم حذف البيانات بنجاح',
            'alert-type' => 'success'
        );
            return redirect()->route('classrooms.index')->with($notification);
    }

    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        Classroom::whereIn('id', $delete_all_id)->Delete();
        $notification = array(
            'message' => 'تم حذف البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('classrooms.index')->with($notification);
    }


    public function Filter_Classes(Request $request)
    {
        $Grades = Grade::all();
        $Search = Classroom::select('*')->where('Grade_id','=',$request->Grade_id)->get();
        return view('pages.classrooms.classrooms',compact('Grades'))->with('details',$Search);

    }
}
