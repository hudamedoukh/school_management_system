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
                                <h3>قائمة الخريجين</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="background-color: rgb(194, 236, 209)">
                                                <th>#</th>
                                                <th>الاسم</th>
                                                <th>البريد الالكتروني</th>
                                                <th>الجنس</th>
                                                <th>المرحلة الدراسية</th>
                                                <th>الصف الدراسي</th>
                                                <th>الشعبة</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($students as $student)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{$student->name}}</td>
                                                    <td>{{$student->email}}</td>
                                                    <td>{{$student->gender->Name}}</td>
                                                    <td>{{$student->grade->Name}}</td>
                                                    <td>{{$student->classroom->Name_Class}}</td>
                                                    <td>{{$student->section->Name_Section}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Return_Student{{ $student->id }}" title="إرجاع الطالب">ارجاع الطالب</button>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Student{{ $student->id }}" title="حذف الطالب">حذف الطالب</button>

                                                    </td>
                                                </tr>
                                                @include('pages.Students.Graduated.return')
                                                @include('pages.Students.Graduated.Delete')
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
