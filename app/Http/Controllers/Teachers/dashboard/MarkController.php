<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Models\Mark;
use App\Models\Quiz;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMarkRequest;

class MarkController extends Controller
{

    public function AddMark()
    {
        $data['grades'] = Grade::all();
        $data['classrooms'] = Classroom::all();
        $data['sections'] = Section::all();
        $data['quizes'] = Quiz::all();
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

    public function Get_Subjects($Classroom_id)
    {
        $list_subjects = Subject::where("classroom_id", $Classroom_id)->where('teacher_id', Auth::guard('teacher')->user()->id)->pluck("name", "id");
        return $list_subjects;
    }

    
    public function Get_Quizes($id)
    {
        $list_quizes = Quiz::where("classroom_id", $id)->where('teacher_id', Auth::guard('teacher')->user()->id)->pluck("name", "id");

        return $list_quizes;
    }
    public function getSudents(Request $request)
    {
        // dd($request);
        $Classroom_id = $request->Classroom_id;
        $section_id = $request->section_id;
        $Grade_id = $request->Grade_id;
        $mark = Student::with('classroom', 'section', 'grade','marks')->where('Classroom_id', $Classroom_id)
            ->where('section_id', $section_id)->where('Grade_id', $Grade_id)->get();
        return response()->json($mark);
    }
    public function store(StoreMarkRequest $request)
    {
        // return $request;
        foreach($request->marks as $student_id =>$mark){
            Mark::updateorCreate(['student_id'=>$student_id],[
                'section_id' => $request->section_id,
                'classroom_id' => $request->Classroom_id,
                'grade_id' => $request->Grade_id,
                'teacher_id' => Auth::guard('teacher')->user()->id,
                'subject_id' => $request->subject_id,
                'quiz_id' => $request->quiz,
                'mark' => $mark,
                'student_id' => $student_id
            ]);
        }

        $notification = array(
            'message' => 'تم ادخال العلامات بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function edit()
    {
        $data['grades'] = Grade::all();


        return view('pages.Teachers.dashboard.marks_entry.edit', $data);
    }

    public function getSudentsMarks(Request $request)
    {
        $Classroom_id = $request->Classroom_id;
        $section_id = $request->section_id;
        $Grade_id = $request->Grade_id;
        $subject_id = $request->subject_id;
        $quiz_id = $request->quiz_id;
        $studentsMarks = Mark::with('student','classroom', 'section', 'grade','subject','quiz')
        ->where('classroom_id', $Classroom_id)
        ->where('section_id', $section_id)
        ->where('grade_id', $Grade_id)
        ->where('subject_id', $subject_id)
        ->where('quiz_id', $quiz_id)->get()
        ->where('teacher_id', Auth::guard('teacher')->user()->id);
        return response()->json($studentsMarks);
    }
    public function update(Request $request)
    {
        // $studentCount = $request->student_id;
        // if ($studentCount) {
        //     for ($i = 0; $i < count($request->student_id); $i++) {
        //         $marks=Mark::where('classroom_id',$request->Classroom_id)
        //         ->where('section_id', $request->section_id)
        //         ->where('grade_id', $request->Grade_id)
        //         ->where('subject_id', $request->subject_id)
        //         ->where('quiz_id', $request->quiz)
        //         ->where('teacher_id', Auth::guard('teacher')->user()->id)
        //          ->where('student_id',$request->student_id[$i]);

        //         $marks->update([
        //             'section_id' => $request->section_id,
        //             'classroom_id' => $request->Classroom_id,
        //             'grade_id' => $request->Grade_id,
        //             'teacher_id' => Auth::guard('teacher')->user()->id,
        //             'subject_id' => $request->subject_id,
        //             'quiz_id' => $request->quiz,
        //             'mark' => $request->marks[$i],
        //             'student_id' => $request->student_id[$i]
        //         ]);
        //     }
        // }
        // $notification = array(
        //     'message' => 'تم تعديل العلامات بنجاح',
        //     'alert-type' => 'success'
        // );
        // return redirect()->back()->with($notification);
    }

    //Get subjects for marks view in student dashboard
    public function ViewMark()
    {
        $data['subjects'] = Subject::all();
        $data['quizes'] = Quiz::all();
        return view('pages.Students.dashboard.marks_view.index', $data);
    }

    public function getMarks(Request $request)
    {
        $subject_id = $request->subject_id;
        $studentsMarks = Mark::with('student','subject','quiz')
        ->where('subject_id', $subject_id)
        ->where('student_id', Auth::guard('student')->user()->id);
        return response()->json($studentsMarks);

    }

}
