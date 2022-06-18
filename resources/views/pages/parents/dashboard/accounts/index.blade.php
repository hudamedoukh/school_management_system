@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header  with-border">
                                <h4 class="box-title"> <strong>  ملفي المالي</strong></h4>
                            </div>

                            <div class="box-body">
                                <div class="table-responsive">

                                    <table class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>البيان</th>
                                                <th>التاريخ</th>
                                                <th>مدين</th>
                                                <th> دائن</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($accounts as $account)

                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $account->description }}</td>
                                                    <td>{{ $account->date }}</td>
                                                    <td>{{ $account->Debit }}</td>
                                                    <td>{{ $account->credit }}</td>
                                                </tr>

                                            @endforeach
                                            <tr>
                                                <th colspan="2">رصيد الطالب</th>
                                                <th colspan="3">{{  $StudentAccount}} شيكل</th>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
@endsection
