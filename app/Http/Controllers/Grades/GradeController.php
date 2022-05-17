<?php

namespace App\Http\Controllers\Grades;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGrades;
use App\Http\Controllers\Controller;


class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grades = Grade::all();
        return view('pages.grades.grades', compact('Grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGrades $request)
    {

        $validated = $request->validated();
        $Grade = new Grade();
        $Grade->Name = $request->Name;
        $Grade->Notes = $request->Notes;
        $Grade->save();

        $notification = array(
            'message' => 'تم إضافة المرحلة الدراسية بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('grades.index')->with($notification);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGrades $request)
    {
        try {

            $validated = $request->validated();
            $Grades = Grade::findOrFail($request->id);
            $Grades->update([
                $Grades->Name =  $request->Name,
                $Grades->Notes = $request->Notes,
            ]);
            $notification = array(
                'message' => 'تم تعديل المرحلة الدراسية بنجاح',
                'alert-type' => 'success'
            );
            return redirect()->route('grades.index')->with($notification);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $MyClass_id = Classroom::where('Grade_id', $request->id)->pluck('Grade_id');
        if ($MyClass_id->count() == 0) {
            $Grades = Grade::findOrFail($request->id);
            $Grades->delete();
            $notification = array(
                'message' => 'تم حذف المرحلة الدراسية بنجاح',
                'alert-type' => 'info'
            );
        } else {
            $notification = array(
                'message' => 'عذراً لايمكن حذف المرحلة الدراسية نظراً لوجود صفوف تابعة لها',
                'alert-type' => 'error'
            );
        }




        return redirect()->route('grades.index')->with($notification);
    }
}
