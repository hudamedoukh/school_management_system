<?php


namespace App\Repository;


use App\Models\Fee;
use App\Models\Fee_invoice;
use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class FeeInvoicesRepository implements FeeInvoicesRepositoryInterface
{

    public function index()
    {
        $Fee_invoices = Fee_invoice::all();
        $Grades = Grade::all();
        return view('pages.Fees_Invoices.index', compact('Fee_invoices', 'Grades'));
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        $fees = Fee::where('Classroom_id', $student->Classroom_id)->get();
        return view('pages.Fees_Invoices.add', compact('student', 'fees'));
    }
    public function edit($id)
    {
        $fee_invoices = Fee_invoice::findorfail($id);
        $fees = Fee::where('Classroom_id',$fee_invoices->Classroom_id)->get();
        return view('pages.Fees_Invoices.edit',compact('fee_invoices','fees'));
    }
    public function store($request)
    {
        $List_Fees = $request->List_Fees;

        DB::beginTransaction();

        try {

        foreach ($List_Fees as $List_Fee) {
            // حفظ البيانات في جدول فواتير الرسوم الدراسية
            $Fees = new Fee_invoice();
            $Fees->invoice_date = date('Y-m-d');
            $Fees->student_id = $List_Fee['student_id'];
            $Fees->Grade_id = $request->Grade_id;
            $Fees->Classroom_id = $request->Classroom_id;;
            $Fees->fee_id = $List_Fee['fee_id'];
            $Fees->amount = $List_Fee['amount'];
            $Fees->description = $List_Fee['description'];
            $Fees->save();

            // حفظ البيانات في جدول حسابات الطلاب
            $StudentAccount = new StudentAccount();
            $StudentAccount->date = date('Y-m-d');
            $StudentAccount->type = 'invoice';
            $StudentAccount->fee_invoice_id = $Fees->id;
            $StudentAccount->student_id = $List_Fee['student_id'];
            $StudentAccount->Debit = $List_Fee['amount'];
            $StudentAccount->credit = 0.00;
            $StudentAccount->description = $List_Fee['description'];
            $StudentAccount->save();
        }


        DB::commit();

        $notification = array(
            'message' => 'تم حفظ البيانات بنجاح',
            'alert-type' => 'success'
        );
        return redirect()->route('Fees_Invoices.index')->with($notification);
    }catch (\Exception $e){
         DB::rollback();

    }

    }
    public function update($request)
    {
        DB::beginTransaction();
        try {
            // تعديل البيانات في جدول فواتير الرسوم الدراسية
            $Fees = Fee_invoice::findorfail($request->id);
            $Fees->fee_id = $request->fee_id;
            $Fees->amount = $request->amount;
            $Fees->description = $request->description;
            $Fees->save();

            // تعديل البيانات في جدول حسابات الطلاب
            $StudentAccount = StudentAccount::where('fee_invoice_id',$request->id)->first();
            $StudentAccount->Debit = $request->amount;
            $StudentAccount->description = $request->description;
            $StudentAccount->save();
            DB::commit();
            $notification = array(
                'message' => 'تم تعديل البيانات بنجاح',
                'alert-type' => 'info'
            );
            return redirect()->route('Fees_Invoices.index')->with($notification);
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    public function destroy($request)
    {
            Fee_invoice::destroy($request->id);
            DB::commit();
            $notification = array(
                'message' => 'تم حذف البيانات بنجاح',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);


    }
}