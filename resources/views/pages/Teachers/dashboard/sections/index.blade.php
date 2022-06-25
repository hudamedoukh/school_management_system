@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full" >
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">الشعب الدراسية</h3>

                            </div>

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead >
                                            <tr>
                                                <th>#</th>
                                                <th>اسم المرحلة</th>
                                                <th> الصف الدراسي</th>
                                                <th>اسم الشعبة</th>
                                                <th> العمليات</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sections as $section)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $section->Grades->Name }}</td>
                                                    <td>{{ $section->My_classs->Name_Class }}</td>

                                                    <td>{{ $section->Name_Section }}</td>
                                                    <td><a class="text-success" href="{{ route('student.index', $section->id) }}"> قائمة الطلاب</a></td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <p><br><br><br><br><br><br><br><br><br><br><br></p>
                        </div>
                    </div>

                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>

@endsection
