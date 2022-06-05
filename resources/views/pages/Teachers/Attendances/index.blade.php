@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title"> حضور المعلمين</h3>
                                <a style="float: left"
                                    href="{{ route('TeacherAttendance.create') }}"
                                    class="btn btn-rounded btn-success mb-5">اضافة الحضور</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th width="5%">الرقم</th>
                                                <th> التاريخ</th>

                                                <th width="25%"> العمليات</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($attendences as $key => $attendance)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $attendance->attendence_date }}</td>
                                                    <td>

                                                        <a href="{{ route('TeacherAttendance.edit', $attendance->attendence_date) }}"
                                                            class="btn btn-info btn-md"><i class="fa fa-edit"></i></a>
                                                        <a href="{{ route('TeacherAttendance.show', $attendance->attendence_date) }}"
                                                            class="btn btn-light btn-md"><i class="fa fa-eye"></i></a>
                                        


                                                    </td>
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
