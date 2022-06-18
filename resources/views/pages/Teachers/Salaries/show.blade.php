@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">  تفاصيل الراتب</h3>
                                <h5>  اسم الموظف :{{$teacher->Name }}</h5>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table  class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th width="5%">الرقم</th>
                                                <th> الراتب الأصلي</th>
                                                <th> العلاوة</th>
                                                <th>الراتب الحالي</th>
                                                <th>تاريخ اضافة العلاوة </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($salaryLogs as $key => $salary)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $salary->previous_salary }}</td>
                                                    <td>{{ $salary->increment }}</td>
                                                    <td>{{ $salary->present_salary }}</td>
                                                    <td>{{ $salary->increment_date }}</td>

                                                </tr>
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
