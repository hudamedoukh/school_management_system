@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title"> <strong> أبنائي</strong></h4>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">

                                    <table id="example1" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> اسم الطالب</th>
                                            <th>المرحلة الدراسية </th>
                                            <th>الصف الدراسي </th>
                                            <th> الشعبة الدراسية </th>
                                            <th> العمليات </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->grade->Name }}</td>

                                                <td>{{ $student->classroom->Name_Class }}</td>
                                                <td>{{ $student->section->Name_Section }}</td>
                                                <td>
                                                    <a href="{{ route('marks', [$student->id, $student->Classroom_id, $student->Grade_id]) }}"
                                                        title="عرض علاماته" class="btn btn-dark btn-sm">العلامات</a>
                                                    <a href="{{ route('student_account', $student->id) }}"
                                                        title="عرض ملف المالي" class="btn btn-dark btn-sm">الملف المالي</a>
                                                    <a href="{{ route('student_books', $student->id) }}" title="عرض  كتبه"
                                                        class="btn btn-dark btn-sm"> الكتب</a>
                                                    <a href="{{ route('student_teachers', $student->id) }}"
                                                        title="عرض  معلميه" class="btn btn-dark btn-sm"> المعلمون</a>
                                                    <a href="{{ route('onlineclasses', $student->id) }}"
                                                        title="عرض  حصصه" class="btn btn-dark btn-sm"> حصص الاونلاين</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </section>
            <!-- /.content -->

        </div>
    </div>
@endsection
