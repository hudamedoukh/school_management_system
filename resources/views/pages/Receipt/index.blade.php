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
                                <h3 class="box-title"> سندات القبض</h3>
        

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

                                <table id="example1" class="table table-bordered table-striped text-center">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم الطالب</th>
                                            <th>المبلغ</th>
                                            <th>البيان</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($receipt_students as $receipt_student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $receipt_student->student->name }}</td>
                                                <td>{{ number_format($receipt_student->Debit, 2) }}</td>
                                                <td>{{ $receipt_student->description }}</td>
                                                <td>
                                                    <a href="{{ route('receipt_students.edit', $receipt_student->id) }}"
                                                        class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#Delete_receipt{{ $receipt_student->id }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @include('pages.Receipt.Delete')
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
