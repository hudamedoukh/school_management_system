<?php

namespace App\Http\Controllers\Sections;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSection;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();

        $list_Grades = Grade::all();
        $teachers = Teacher::all();

        return view('pages.sections.sections',compact('Grades','list_Grades','teachers'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSection $request)
    {
        //
        $validated = $request->validated();
        $Sections = new Section();
        $Sections->Name_Section =$request->Name_Section;
        $Sections->Grade_id =$request->Grade_id;
        $Sections->Class_id =$request->Class_id;
        $Sections->Status =1;
        $Sections->save();

        $Sections->teachers()->attach($request->teacher_id);
        $notification = array(
            'message' => 'تم إضافة البيانات بنجاح',
            'alert-type' => 'success'
        );


        return redirect()->route('Sections.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSection $request)
    {
        // return  $request;
        $validated = $request->validated();
        $Sections = Section::findOrFail($request->id);

        $Sections->Name_Section =$request->Name_Section;
        $Sections->Grade_id = $request->Grade_id;
        $Sections->Class_id = $request->Class_id;

        if(isset($request->Status)) {
            $Sections->Status = 1;
        } else {
            $Sections->Status = 2;
        }


        // update pivot tABLE
        if (isset($request->teacher_id)) {
            $Sections->teachers()->sync($request->teacher_id);
        } else {
            $Sections->teachers()->sync(array());
        }


        $Sections->save();
        $notification = array(
            'message' => 'تم تعديل البيانات بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('Sections.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Section::findOrFail($request->id)->delete();
        $notification = array(
            'message' => 'تم حذف البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('Sections.index')->with($notification);
    }

    public function getclasses($id)
    {
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $list_classes;
    }
}
