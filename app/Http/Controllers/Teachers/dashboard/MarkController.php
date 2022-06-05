<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Mark;
use App\Models\Quiz;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class MarkController extends Controller
{

    public function AddMark()
    {
        $data['grades'] = Grade::all();
        $data['classrooms'] = Classroom::all();
        $data['sections'] = Section::all();
        $data['quiz_name'] = Quiz::all();
        return view('pages.Teachers.dashboard.marks_entry.index', $data);

    }

    public function Get_classrooms($id)
    {

        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $list_classes;
    }

    //Get Sections
    public function Get_Sections($id)
    {

        $list_sections = Section::where("Class_id", $id)->pluck("Name_Section", "id");
        return $list_sections;
    }

    public function getSudents(Request $request)
    {
        // dd($request);
        $Classroom_id = $request->Classroom_id;
        $section_id = $request->section_id;

        $mark = Student::where('Classroom_id', $Classroom_id)
            ->where('section_id', $section_id)->get();
        return response()->json($mark);


    }
}
