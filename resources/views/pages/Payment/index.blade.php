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
                                <h3 class="box-title"> سندات الصرف
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
                                <div class="table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="alert-success">
                                                <th>#</th>
                                                <th>الاسم</th>
                                                <th>المبلغ</th>
                                                <th>البيان</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payment_students as $payment_student)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $payment_student->student->name }}</td>
                                                    <td>{{ number_format($payment_student->amount, 2) }}</td>
                                                    <td>{{ $payment_student->description }}</td>
                                                    <td>
                                                        <a href="{{ route('Payment_students.edit', $payment_student->id) }}"
                                                            class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                                class="fa fa-edit"></i></a>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#Delete_receipt{{ $payment_student->id }}"><i
                                                                class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                @include('pages.Payment.Delete')
                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    </div>
@endsection
