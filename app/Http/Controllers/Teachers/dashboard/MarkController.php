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
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMarkRequest;

class MarkController extends Controller
{

    public function AddMark()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $grades_id = Section::wherein('id', $ids)->groupBy('Grade_id')->pluck('Grade_id');

        // $class_ids = Section::wherein('id', $ids)->groupBy('Class_id')->pluck('Class_id');
        // $list_classes = Classroom::wherein('id', $class_ids)->pluck("Name_Class", "id");
        // return $list_classes;


        $data['grades'] = Grade::wherein('id', $grades_id)->get();
        $data['classrooms'] = Classroom::all();
        $data['sections'] = Section::all();
        $data['quizes'] = Quiz::all();
        return view('pages.Teachers.dashboard.marks_entry.index', $data);
    }

    public function Get_classrooms($id)
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $class_ids = Section::wherein('id', $ids)->groupBy('Class_id')->pluck('Class_id');
        $list_classes = Classroom::wherein('id', $class_ids)->where("Grade_id",$id)->pluck("Name_Class", "id");
        return $list_classes;
    }

    //Get Sections
    public function Get_Sections($id)
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');

        $list_sections = Section::where("Class_id", $id)->wherein('id', $ids)->pluck("Name_Section", "id");
        // dd($list_sections);
        return $list_sections;
    }

    public function Get_Subjects($Classroom_id)
    {

        $list_subjects = Subject::where("classroom_id", $Classroom_id)->where('teacher_id', Auth::guard('teacher')->user()->id)->pluck("name", "id");
        return $list_subjects;
    }


    public function Get_Quizes($subject_id,$section_id)
    {

        $list_quizes = Quiz::where("subject_id", $subject_id)->where('section_id',$section_id)->where('teacher_id', Auth::guard('teacher')->user()->id)->pluck("name", "id");

        return $list_quizes;
    }
    public function getSudents(Request $request)
    {
        // dd($request);
        $Classroom_id = $request->Classroom_id;
        $section_id = $request->section_id;
        $Grade_id = $request->Grade_id;
        $mark = Student::with('classroom', 'section', 'grade', 'marks')->where('Classroom_id', $Classroom_id)
            ->where('section_id', $section_id)->where('Grade_id', $Grade_id)->get();
        return response()->json($mark);
    }
    public function store(StoreMarkRequest $request)
    {
        //  return $request;
        foreach ($request->marks as $student_id => $mark) {
            Mark::updateorCreate(['student_id' => $student_id,'quiz_id' => $request->quiz], [
                'section_id' => $request->section_id,
                'classroom_id' => $request->Class,
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
        $studentsMarks = Mark::with('student', 'classroom', 'section', 'grade', 'subject', 'quiz')
            ->where('classroom_id', $Classroom_id)
            ->where('section_id', $section_id)
            ->where('grade_id', $Grade_id)
            ->where('subject_id', $subject_id)
            ->where('quiz_id', $quiz_id)
            ->where('teacher_id', Auth::guard('teacher')->user()->id)->get();
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
        $class = student::where('id',Auth::guard('student')->user()->id)->pluck('Classroom_id');

        $data['subjects'] = Subject::with('Quizes')->where('classroom_id',$class)->get();

        $data['student_name']=Student::where('id',Auth::guard('student')->user()->id)->pluck('name');
        $data['student_id']=Auth::guard('student')->user()->id;

        return view('pages.Students.dashboard.marks_view.index',  $data);
    }

    // public function getMarks()
    // {
    //      $class = student::where('id',Auth::guard('student')->user()->id)->pluck('Classroom_id');
    //      $section = student::where('id',Auth::guard('student')->user()->id)->pluck('Section_id');

    //     $subjects = Subject::where('classroom_id',$class)->get();
    //     $quizes=Quiz::where('section_id',$section)->groupBy('subject_id')->get();
    //     $studentsMarks = Mark::with('student', 'subject', 'quiz')
    //         ->where('student_id', Auth::guard('student')->user()->id)->get();
    //         return  $quizes;
    //         return view('pages.Students.dashboard.marks_view.index', compact('studentsMarks','subjects','quizes'));

    //     return response()->json($studentsMarks);
    // }
}
