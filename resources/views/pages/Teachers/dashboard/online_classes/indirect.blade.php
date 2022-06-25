@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full" >
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title"> اضافة حصة اوفلاين جديدة
                                </h3>
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
                                <form method="post" action="{{ route('indirect.teacher.store') }}" autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Grade_id">المرحلة الدراسية: <span
                                                        class="text-danger">*</span></label>
                                                <select class="custom-select " name="Grade_id" required>
                                                    <option selected disabled>اختر من القائمة...
                                                    </option>
                                                    @foreach ($Grades as $Grade)
                                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Classroom_id">الصف الدراسي : <span
                                                        class="text-danger">*</span></label>
                                                <select class="custom-select " name="Classroom_id" required>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="section_id">الشعبة الدراسية: </label>
                                                <select class="custom-select" name="section_id" required>

                                                </select>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>رقم الاجتماع : <span class="text-danger">*</span></label>
                                                <input class="form-control" name="meeting_id" type="number" required>
                                            </div>
                                        </div>


                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>عنوان الحصة : <span class="text-danger">*</span></label>
                                                <input class="form-control" name="topic" type="text" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>تاريخ ووقت الحصة : <span class="text-danger">*</span></label>
                                                <input class="form-control" type="datetime-local" name="start_time" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>مدة الحصة بالدقائق : <span class="text-danger">*</span></label>
                                                <input class="form-control" name="duration" type="number" required>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>كلمة المرور الاجتماع : <span class="text-danger">*</span></label>
                                                <input class="form-control" name="password" type="text" required>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>لينك البدء : <span class="text-danger">*</span></label>
                                                <input class="form-control" name="start_url" type="text" required>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>لينك الدخول للطلاب : <span class="text-danger">*</span></label>
                                                <input class="form-control" name="join_url" type="text" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-success nextBtn  pull-right"
                                        type="submit">تأكيد الحفظ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Classroom_id"]').empty();
                            $('select[name="Classroom_id"]').append('<option selected disabled >اختر من القائمة...</option>');
                            $.each(data, function (key, value) {
                                $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $('select[name="Classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });

                        },
                    });
                }

                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
    @endsection
