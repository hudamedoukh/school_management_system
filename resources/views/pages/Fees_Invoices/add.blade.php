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
                                <h3 class="box-title"> الفواتير الدراسية</h3>
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

                                <form class=" row mb-30" action="{{ route('Fees_Invoices.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="repeater">
                                            <div data-repeater-list="List_Fees">
                                                <div data-repeater-item>
                                                    <div class="row">

                                                        <div class="col">
                                                            <label for="Name" class="mr-sm-2">اسم الطالب</label>
                                                            <select class="form-control"  id="select" name="student_id" required>
                                                                <option value="{{ $student->id }}">{{ $student->name }}
                                                                </option>
                                                            </select>
                                                        </div>

                                                        <div class="col">
                                                            <label for="Name_en" class="mr-sm-2">نوع الرسوم</label>
                                                            <div class="box">
                                                                <select class="form-control" id="select"  name="fee_id" required>
                                                                    <option value="">-- اختار من القائمة --</option>
                                                                    @foreach ($fees as $fee)
                                                                        <option value="{{ $fee->id }}">
                                                                            {{ $fee->title }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>

                                                        <div class="col">
                                                            <label for="Name_en" class="mr-sm-2">المبلغ</label>
                                                            <div class="box">
                                                                <select class="form-control" id="select" name="amount" required>
                                                                    <option value="">-- اختار من القائمة --</option>
                                                                    @foreach ($fees as $fee)
                                                                        <option value="{{ $fee->amount }}">
                                                                            {{ $fee->amount }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <label for="description" class="mr-sm-2">البيان</label>
                                                            <div class="box">
                                                                <input type="text" class="form-control" name="description"
                                                                    required>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <label for="Name_en"
                                                                class="mr-sm-2">العمليات:</label>
                                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                                type="button"
                                                                value="حذف" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-20">
                                                <div class="col-12">
                                                    <input  class="btn btn-info" data-repeater-create type="button"
                                                        value="ادراج سجل" />
                                                </div>
                                            </div><br>
                                            <input type="hidden" name="Grade_id" value="{{ $student->Grade_id }}">
                                            <input type="hidden" name="Classroom_id"
                                                value="{{ $student->Classroom_id }}">

                                            <button type="submit" class="btn btn-success">تاكيد البيانات</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

