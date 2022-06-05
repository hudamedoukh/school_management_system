<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalary;
use App\Models\Salary;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers= Teacher::all();

        return view('pages.Teachers.Salaries.index',compact("teachers"));
    }

    public function show($id)
    {
        $teacher= Teacher::findOrFail($id);
    	$salaryLogs = Salary::where('teacher_id',$id)->get();
    	return view('pages.Teachers.Salaries.show',compact('teacher','salaryLogs'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher= Teacher::findOrFail($id);
        return view('pages.Teachers.Salaries.edit',compact('teacher'));   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSalary $request, $id)
    {
        $validated = $request->validated();

        $teacher= teacher::findOrFail($id);
        $previous_salary=$teacher->salary;
        $present_salary = (float) $previous_salary + (float) $request->increment;
        $teacher->update(['salary'=>$present_salary]);
         $salaryData =Salary::create([
             'teacher_id'=>$id,
            'previous_salary'=> $previous_salary,
            'present_salary'=> $present_salary,
            'increment'=>$request->increment,
            'increment_date'=>$request->increment_date,
            ]);
        $notification = array(
        'message' => 'تم تحديث البيانات بنجاح',
        'alert-type' => 'success'
        );
       return redirect()->route('Salaries.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
