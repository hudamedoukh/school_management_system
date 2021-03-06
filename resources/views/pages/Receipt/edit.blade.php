 @extends('admin.admin_master')
 @section('admin')
     <div class="content-wrapper">
         <div class="container-full">
             <!-- Main content -->
             <section class="content">
                 <div class="row">
                     <div class="col-12">
                         <div class="box">
                             <div class="box-header with-border">
                                 <h3 class="box-title"> تعديل سند قبض</h3>
                                 <a href="{{ url()->previous() }}" class="btn btn-rounded btn-info mb-5 mr-3"
                                    style="float: left" > عودة</a>
                                 <br>
                             </div>
                             @if (session()->has('error'))
                                 <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                     <strong>{{ session()->get('error') }}</strong>
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                             @endif
                             <!-- /.box-header -->
                             <div class="box-body">
                                 <div class="row">
                                     <div class="col">

                                         <form action="{{ route('receipt_students.update', 'test') }}" method="post"
                                             autocomplete="off">
                                             @method('PUT')
                                             @csrf
                                             @csrf
                                             <div class="row">
                                                 <div class="col-md-12">
                                                     <div class="form-group">
                                                         <label>المبلغ : <span class="text-danger">*</span></label>
                                                         <input class="form-control" name="Debit"
                                                             value="{{ $receipt_student->Debit }}" type="number">
                                                         <input type="hidden" name="student_id"
                                                             value="{{ $receipt_student->student->id }}"
                                                             class="form-control">
                                                         <input type="hidden" name="id" value="{{ $receipt_student->id }}"
                                                             class="form-control">
                                                     </div>
                                                 </div>
                                             </div>

                                             <div class="row">
                                                 <div class="col-md-12">
                                                     <div class="form-group">
                                                         <label>البيان : <span class="text-danger">*</span></label>
                                                         <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                                             rows="3">{{ $receipt_student->description }}</textarea>
                                                     </div>
                                                 </div>

                                             </div>

                                             <button class="btn btn-success"
                                                 type="submit">حفظ</button>
                                         </form>
                                     </div>
                                     <!-- /.col -->
                                 </div>
                                 <!-- /.row -->
                             </div>
                             <!-- /.box-body -->
                         </div>
                     </div>
                 </div>
             </section>
             <!-- /.content -->

         </div>
     </div>
 @endsection
