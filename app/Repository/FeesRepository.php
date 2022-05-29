<?php


namespace App\Repository;

use App\Models\Fee;
use App\Models\Grade;

class FeesRepository implements FeesRepositoryInterface
{

    public function index()
    {

        $fees = Fee::all();
        $Grades = Grade::all();
        return view('pages.Fees.index', compact('fees', 'Grades'));
    }

    public function create()
    {

        $Grades = Grade::all();
        return view('pages.Fees.add', compact('Grades'));
    }

    public function edit($id)
    {

        $fee = Fee::findorfail($id);
        $Grades = Grade::all();
        return view('pages.Fees.edit', compact('fee', 'Grades'));
    }


    public function store($request)
    {
        $fees = new Fee();
        $fees->title =  $request->title;
        $fees->amount  = $request->amount;
        $fees->Grade_id  = $request->Grade_id;
        $fees->Classroom_id  = $request->Classroom_id;
        $fees->description  = $request->description;
        $fees->year  = $request->year;
        $fees->Fee_type  =$request->Fee_type;

        $fees->save();
        $notification = array(
            'message' => 'تم حفظ البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('Fees.index')->with($notification);
    }

    public function update($request)
    {
        $fees = Fee::findorfail($request->id);
        $fees->title = $request->title;
        $fees->amount  = $request->amount;
        $fees->Grade_id  = $request->Grade_id;
        $fees->Classroom_id  = $request->Classroom_id;
        $fees->description  = $request->description;
        $fees->year  = $request->year;
        $fees->Fee_type  =$request->Fee_type;

        $fees->save();
        $notification = array(
            'message' => 'تم تعديل البيانات بنجاح',
            'alert-type' => 'info'
        );
        return redirect()->route('Fees.index')->with($notification);
    }

    public function destroy($request)
    {
        Fee::destroy($request->id);
        $notification = array(
            'message' => 'تم حذف البيانات بنجاح',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);;
    }
}
