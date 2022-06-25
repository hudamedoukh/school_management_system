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
                                <h5>قائمة الحضور والغياب للطلاب</h5>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <h5 style="color: red"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
                                    @csrf
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>اسم الطالب</th>
                                                    <th>البريد الالكتروني</th>
                                                    <th>الجنس</th>
                                                    <th>المرحلة الدراسية</th>
                                                    <th>الصف الدراسي</th>
                                                    <th>الشعبة</th>
                                                    <th>حالة الحضور</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $student)
                                                    <tr>
                                                        <td>

                                                        </td>
                                                        <td>{{ $student->name }}</td>
                                                        <td>{{ $student->email }}</td>
                                                        <td>{{ $student->gender->Name }}</td>
                                                        <td>{{ $student->grade->Name }}</td>
                                                        <td>{{ $student->classroom->Name_Class }}</td>
                                                        <td>{{ $student->section->Name_Section }}</td>
                                                        <td>
                                                            @if (isset(
                                                                $student->attendance()->where('attendence_date', date('Y-m-d'))->first()->student_id,
                                                            ))
                                                                <h4> {{ $student->attendance()->first()->attendence_status == 1 ? 'حاضر' : 'غائب' }}
                                                                </h4>
                                                            @else
                                                                لم يتم تسجيل الحضور بعد
                                                            @endif

                                                        </td>
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
