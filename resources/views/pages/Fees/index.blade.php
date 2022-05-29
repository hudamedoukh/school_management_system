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
                                <h3 class="box-title"> الرسوم الدراسية</h3>
                                <a href="{{ route('Fees.create') }}" class="btn btn-rounded btn-success mb-5"
                                    style="float: left">اضافة رسوم جديدة</a><br><br>

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
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>
                                            <tr class="alert-success">
                                                <th>#</th>
                                                <th>الاسم</th>
                                                <th>المبلغ</th>
                                                <th>المرحلة الدراسية</th>
                                                <th>الصف الدراسي</th>
                                                <th>السنة الدراسية</th>
                                                <th>ملاحظات</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fees as $fee)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $fee->title }}</td>
                                                    <td>{{ number_format($fee->amount, 2) }}</td>
                                                    <td>{{ $fee->grade->Name }}</td>
                                                    <td>{{ $fee->classroom->Name_Class }}</td>
                                                    <td>{{ $fee->year }}</td>
                                                    <td>{{ $fee->description }}</td>
                                                    <td>
                                                        <a href="{{ route('Fees.edit', $fee->id) }}"
                                                            class="btn btn-info btn-sm"  title="تعديل" role="button" aria-pressed="true"><i
                                                                class="fa fa-edit" ></i></a>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#Delete_Fee{{ $fee->id }}"
                                                            title="حذف"><i
                                                                class="fa fa-trash"></i></button>
                                                        <a href="#"  title="عرض" class="btn btn-warning btn-sm" role="button"
                                                            aria-pressed="true"><i class="fa fa-eye" ></i></a>

                                                    </td>
                                                </tr>
                                                @include('pages.Fees.Delete')
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
