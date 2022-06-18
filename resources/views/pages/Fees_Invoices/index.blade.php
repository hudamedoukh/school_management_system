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
                                            <tr>
                                                <th>#</th>
                                                <th>الاسم</th>
                                                <th>نوع الرسوم</th>
                                                <th>المبلغ</th>
                                                <th>المرحلة الدراسية</th>
                                                <th>الصف الدراسي</th>
                                                <th>البيان</th>
                                                <th>العمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($Fee_invoices as $Fee_invoice)
                                                <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$Fee_invoice->student->name}}</td>
                                                <td>{{$Fee_invoice->fees->title}}</td>
                                                <td>{{ number_format($Fee_invoice->amount, 2) }}</td>
                                                <td>{{$Fee_invoice->grade->Name}}</td>
                                                <td>{{$Fee_invoice->classroom->Name_Class}}</td>
                                                <td>{{$Fee_invoice->description}}</td>
                                                    <td>
                                                        <a href="{{route('Fees_Invoices.edit',$Fee_invoice->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee_invoice{{$Fee_invoice->id}}" ><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @include('pages.Fees_Invoices.Delete')
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
