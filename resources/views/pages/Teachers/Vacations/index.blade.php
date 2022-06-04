@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title"> اجازات  المعلمين</h3>
                                <a style="float: left" href="{{ route('Vacations.create') }}"
                                class="btn btn-rounded btn-success mb-5"> اضافة اجازة </a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th width="5%">الرقم</th>
                                                <th>اسم الموظف</th>
                                                <th>  سبب الإجازة </th>
                                                <th>  تاريخ بدء الاجازة </th>
                                                <th>  تاريخ انتهاء الإجازة</th>
                                                <th width="25%"> العمليات</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($vacations as $key => $vacation)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $vacation['teachers']['Name'] }}</td>

                                                    <td>{{ $vacation['purposes']['name'] }}</td>
                                                    <td>{{ $vacation->start_date}}</td>
                                                    <td>{{ $vacation->end_date}}</td>


                                                    <td>

                                                        <a href="{{ route('Vacations.edit', $vacation->id) }}"
                                                            class="btn btn-info btn-md"><i class="fa fa-edit"></i></a>

                                                            <button type="button" class="btn btn-danger btn-md" data-toggle="modal"
                                                            data-target="#Delete_vacation{{ $vacation->id }}"><i
                                                                class="fa fa-trash"></i></button>

                                                    </td>
                                                </tr>
                                                @include('pages.Teachers.Vacations.Delete')

                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
@endsection
