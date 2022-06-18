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
                                <h3 class="box-title"> معالجات الرسوم الدراسية</h3>

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
                                            @foreach ($ProcessingFees as $ProcessingFee)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $ProcessingFee->student->name }}</td>
                                                    <td>{{ number_format($ProcessingFee->amount, 2) }}</td>
                                                    <td>{{ $ProcessingFee->description }}</td>
                                                    <td>
                                                        <a href="{{ route('ProcessingFee.edit', $ProcessingFee->id) }}"
                                                            class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                                class="fa fa-edit"></i></a>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#Delete_receipt{{ $ProcessingFee->id }}"><i
                                                                class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                @include('pages.ProcessingFee.Delete')
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
