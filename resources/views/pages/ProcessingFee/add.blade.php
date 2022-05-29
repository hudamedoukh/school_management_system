@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full" style="background-color: rgb(225, 255, 241)">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title"> استبعاد رسوم
                                </h3>

                            </div>
                            <div style="padding-right: 55px;padding-top: 26px;">
                                @if ($errors->any())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li> <span class="text-danger">{{ $error }}</span></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                    <form method="post" action="{{ route('ProcessingFee.store') }}" autocomplete="off">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>المبلغ : <span class="text-danger">*</span></label>
                                                    <input class="form-control" name="Debit" type="number">
                                                    <input type="hidden" name="student_id" value="{{ $student->id }}"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>رصيد الطالب : </label>
                                                    <input class="form-control" name="final_balance"
                                                        value="{{ number_format($student->student_account->sum('Debit') - $student->student_account->sum('credit'), 2) }}"
                                                        type="text" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>البيان : <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-success  pull-right"
                                            type="submit">حفظ</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


            </section>
        </div>
    </div>
@endsection
