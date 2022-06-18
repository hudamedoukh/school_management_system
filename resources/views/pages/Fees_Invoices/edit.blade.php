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
                                <h3 class="box-title"> تعديل الفاتورة الدراسية</h3>
                                <a href="{{ url()->previous() }}" class="btn btn-rounded btn-info mb-5 mr-3"
                                    style="float: left" > عودة</a>

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

                                <form action="{{ route('Fees_Invoices.update', 'test') }}" method="post"
                                    autocomplete="off">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="inputEmail4">اسم الطالب</label>
                                            <input type="text" value="{{ $fee_invoices->student->name }}" readonly
                                                name="title_ar" class="form-control">
                                            <input type="hidden" value="{{ $fee_invoices->id }}" name="id"
                                                class="form-control">
                                        </div>


                                        <div class="form-group col">
                                            <label for="inputEmail4">المبلغ</label>
                                            <input type="number" value="{{ $fee_invoices->amount }}" name="amount"
                                                class="form-control">
                                        </div>

                                    </div>


                                    <div class="form-row">

                                        <div class="form-group col">
                                            <label for="inputZip">نوع الرسوم</label>
                                            <select class="custom-select mr-sm-2" name="fee_id">
                                                @foreach ($fees as $fee)
                                                    <option value="{{ $fee->id }}"
                                                        {{ $fee->id == $fee_invoices->fee_id ? 'selected' : '' }}>
                                                        {{ $fee->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="inputAddress">ملاحظات</label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                            rows="4">{{ $fee_invoices->description }}</textarea>
                                    </div>
                                    <br>

                                    <button type="submit" class="btn btn-success">تاكيد</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
