<?php


namespace App\Repository;


use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReceiptStudentsRepository implements ReceiptStudentsRepositoryInterface
{

    public function index()
    {
        $receipt_students = ReceiptStudent::all();
        return view('pages.Receipt.index', compact('receipt_students'));
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('pages.Receipt.add', compact('student'));
    }

    public function edit($id)
    {
        $receipt_student = ReceiptStudent::findorfail($id);
        return view('pages.Receipt.edit', compact('receipt_student'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {

            // حفظ البيانات في جدول سندات القبض
            $receipt_students = new ReceiptStudent();
            $receipt_students->date = date('Y-m-d');
            $receipt_students->student_id = $request->student_id;
            $receipt_students->Debit = $request->Debit;
            $receipt_students->description = $request->description;
            $receipt_students->save();

            // حفظ البيانات في جدول الصندوق
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // حفظ البيانات في جدول حساب الطالب
            $student_accounts = new StudentAccount();
            $student_accounts->date = date('Y-m-d');
            $student_accounts->type = 'receipt';
            $student_accounts->receipt_id = $receipt_students->id;
            $student_accounts->student_id = $request->student_id;
            $student_accounts->Debit = 0.00;
            $student_accounts->credit = $request->Debit;
            // $StudentAccount->fee_invoice_id = $Fees->id;

            $student_accounts->description = $request->description;
            $student_accounts->save();

            DB::commit();
            $notification = array(
                'message' => 'تم حفظ البيانات بنجاح',
                'alert-type' => 'success'
            );
            return redirect()->route('receipt_students.index')->with($notification);
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            // تعديل البيانات في جدول سندات القبض
            $receipt_students = ReceiptStudent::findorfail($request->id);
            $receipt_students->date = date('Y-m-d');
            $receipt_students->student_id = $request->student_id;
            $receipt_students->Debit = $request->Debit;
            $receipt_students->description = $request->description;
            $receipt_students->save();

            // تعديل البيانات في جدول الصندوق
            $fund_accounts = FundAccount::where('receipt_id', $request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            // تعديل البيانات في جدول الصندوق

            $student_accounts = StudentAccount::where('receipt_id', $request->id)->first();
            $student_accounts->date = date('Y-m-d');
            $student_accounts->type = 'receipt';
            $student_accounts->student_id = $request->student_id;
            $student_accounts->receipt_id = $receipt_students->id;
            $student_accounts->Debit = 0.00;
            $student_accounts->credit = $request->Debit;
            $student_accounts->description = $request->description;
            $student_accounts->save();


            DB::commit();
            $notification = array(
                'message' => 'تم تعديل البيانات بنجاح',
                'alert-type' => 'info'
            );
            return redirect()->route('receipt_students.index')->with($notification);
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    public function destroy($request)
    {

        ReceiptStudent::destroy($request->id);
        $notification = array(
            'message' => 'تم حذف البيانات بنجاح',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
