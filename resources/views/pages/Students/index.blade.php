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
                                <h3 class="box-title"> الطلاب</h3>
                                <a href="{{ route('Students.create') }}" class="btn btn-rounded btn-success mb-5"
                                    style="float: left" aria-pressed="true"> إضافة طالب جديد

                                </a>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th>اسم الطالب</th>
                                                <th> البريد لالكتروني</th>
                                                <th> الجنس </th>
                                                <th>المرحلة الدراسية </th>
                                                <th>الصف الدراسي </th>
                                                <th>الشعبة الدراسية</th>
                                                <th width="25%">العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $student)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->email }}</td>
                                                    <td>{{ $student->gender->Name }}</td>
                                                    <td>{{ $student->grade->Name }}</td>
                                                    <td>{{ $student->classroom->Name_Class }}</td>
                                                    <td>{{ $student->section->Name_Section }}</td>
                                                    <td>
                                                        <a href="{{ route('Students.edit', $student->id) }}"
                                                            class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                                class="fa fa-edit"></i></a>

                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#Delete_Student{{ $student->id }}"
                                                            title="حذف الطالب"><i class="fa fa-trash"></i></button>

                                                        <a href="{{ route('Students.show', $student->id) }}"
                                                            class="btn btn-dark btn-sm" role="button"
                                                            aria-pressed="true"><i class="far fa-eye"></i></a>

                                                    </td>
                                                </tr>
                                                @include('pages.Students.Delete')
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
