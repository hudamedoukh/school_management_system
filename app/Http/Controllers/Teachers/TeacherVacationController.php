<?php

namespace App\Http\Controllers\Teachers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\TeacherVacation;
use App\Models\VacationPurpose;
use App\Http\Controllers\Controller;

class TeacherVacationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacations = TeacherVacation::orderBy('id', 'desc')->get();

        return view('pages.Teachers.Vacations.index', compact('vacations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        $purposes = VacationPurpose::all();
    	return view('pages.Teachers.Vacations.create',compact('teachers','purposes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    	if ($request->vacation_purpose_id == "0") {
    		$vacationPurpose =VacationPurpose::create([
                'name'=>$request->name
        ]);

    		$vacation_purpose_id = $vacationPurpose->id;
    	}else{
    		$vacation_purpose_id = $request->vacation_purpose_id;
    	}

    	$vacation =TeacherVacation::create([
            'teacher_id'=>$request->teacher_id,
            'vacation_purpose_id'=>$vacation_purpose_id,
            'start_date'=>date('Y-m-d',strtotime($request->start_date)),
            'end_date'=>date('Y-m-d',strtotime($request->end_date))
        ]);

    	$notification = array(
    		'message' => 'تم اضافة البيانات بنجاح',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('Vacations.index')->with($notification);
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
        $vacation = TeacherVacation::find($id);
        $teachers = Teacher::all();
        $purposes = VacationPurpose::all();
    	return view('pages.Teachers.Vacations.edit',compact('teachers','purposes','vacation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    	if ($request->vacation_purpose_id == "0") {
    		$vacationPurpose =VacationPurpose::create([
                'name'=>$request->name
            ]);
    		$vacation_purpose_id = $vacationPurpose->id;
    	}else{
    		$vacation_purpose_id = $request->vacation_purpose_id;
    	}

    	$vacation = TeacherVacation::findOrFail($id);
        $vacation->update([
            'teacher_id'=>$request->teacher_id,
            'vacation_purpose_id'=>$vacation_purpose_id,
            'start_date'=>date('Y-m-d',strtotime($request->start_date)),
            'end_date'=>date('Y-m-d',strtotime($request->end_date))
        ]);
    	$notification = array(
    		'message' => 'تم تحديث البيانات بنجاح',
    		'alert-type' => 'success'
    	);
    	return redirect()->route('Vacations.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacation = TeacherVacation::findOrFail($id);
    	$vacation->delete();

    	$notification = array(
    		'message' => 'تم حذف البيانات بنجاح',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('Vacations.index')->with($notification);
    }
}
