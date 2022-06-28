@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box bb-3 border-info">
                            <div class="box-header">
                                <h4 class="box-title"> <strong> علامات الطلاب</strong></h4>
                            </div>

                            <div class="box-body">
                                <form action="{{ route('marks_entry.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-row">

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="Grade_id">المرحلة الدراسية : <span
                                                            class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="Grade_id" id="Grade_id">
                                                        <option selected disabled>حدد المرحلة الدراسية...</option>
                                                        @foreach ($grades as $grade)
                                                            <option value="{{ $grade->id }}">{{ $grade->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="Class">الصف الدراسي : <span
                                                            class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="Class" id="Class">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="section_id">الشعبة : <span
                                                            class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="section_id" id="section_id">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="subject_id">المادة الدراسية : <span
                                                            class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="subject_id" id="subject_id">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="quiz"> الاختبار : <span
                                                            class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="quiz" id="quiz">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3" style="padding-top:25px;">
                                            <div class="form-group">
                                                <a id="search" class="btn btn-dark" name="search"> بحث</a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-none" id="marks-entry">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped text-center"
                                                style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>اسم الطالب</th>
                                                        <th> المرحلة الدراسية</th>
                                                        <th>الصف </th>
                                                        <th>الشعبة</th>

                                                        <th> العلامة </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="marks-entry-tr">
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <input type="submit" class="btn btn-info" value="حفظ">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
        <script>
            $(document).ready(function() {
                $('select[name="Grade_id"]').on('change', function() {
                    var Grade_id = $(this).val();
                    if (Grade_id) {
                        $.ajax({
                            url: "{{ URL::to('/mark/classes') }}/" + Grade_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="Class"]').empty();
                                $('select[name="Class"]').append(
                                    '<option selected disabled>حدد الصف الدراسي...</option>');
                                $.each(data, function(key, value) {
                                    $('select[name="Class"]').append('<option value="' +
                                        key + '">' + value + '</option>');
                                });
                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#Class').on('change', function() {
                    var Classroom_id = $(this).val();
                    if (Classroom_id) {
                        $.ajax({
                            url: "{{ URL::to('/mark/sections') }}/" + Classroom_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="section_id"]').empty();
                                $('select[name="section_id"]').append(
                                    '<option selected disabled>حدد الشعبة الدراسية...</option>');
                                $.each(data, function(key, value) {
                                    $('select[name="section_id"]').append(
                                        '<option value = "' + key + '" > ' + value +
                                        '</option>');
                                });

                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('select[name="Class"]').on('change', function() {
                    var Classroom_id = $(this).val();
                    if (Classroom_id) {
                        $.ajax({
                            url: "{{ URL::to('Get_Subjects') }}/" + Classroom_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="subject_id"]').empty();
                                $('select[name="subject_id"]').append(
                                    '<option selected disabled>حدد المادة الدراسية...</option>');

                                $.each(data, function(key, value) {
                                    $('select[name="subject_id"]').append(
                                        '<option value="' +
                                        key + '">' + value + '</option>');
                                });
                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('select[name="subject_id"]').on('change', function() {
                    var subject_id = $(this).val();
                    var section_id = $('#section_id').val();
                    if (subject_id) {
                        $.ajax({
                            url: "{{ URL::to('Get_Quizes') }}/" + subject_id + "/" + section_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="quiz"]').empty();
                                $('select[name="quiz"]').append(
                                    '<option selected disabled>حدد الاختبار...</option>');

                                $.each(data, function(key, value) {
                                    $('select[name="quiz"]').append('<option value="' +
                                        key + '">' + value + '</option>');
                                });
                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });
        </script>
        <script>
            $(document).on('click', '#search', function() {
                var Grade_id = $('#Grade_id').val();
                var Classroom_id = $('#Class').val();
                var section_id = $('#section_id').val();
                var subject_id = $('#subject_id').val();
                var quiz_id = $('#quiz').val();

                $.ajax({
                    url: "{{ route('marks_entry.get_students') }}",
                    type: "GET",
                    data: {
                        'Classroom_id': Classroom_id,
                        'section_id': section_id,
                        'Grade_id': Grade_id,
                        'quiz_id': quiz_id,
                        'subject_id': subject_id,
                    },
                    success: function(data) {
                        $('#marks-entry').removeClass('d-none');
                        var html = '';
                        // var result="";
                        $.each(data, function(key, v) {
                            // console.log(data);
                            html +=
                                '<tr>' +
                                '<td>' + v.name +
                                '<input type="hidden" name="student_id[]" value="' + v.id +
                                '"> </td>' +
                                '<td>' + v.grade.Name + '</td>' +
                                '<td>' + v.classroom.Name_Class + '</td>' +
                                '<td>' + v.section.Name_Section + '</td>'
                                var mymark ='';
                                v.marks.find(i => {
                                    if (i.subject_id == subject_id && i.quiz_id == quiz_id) {
                                        mymark=i.mark;
                                    }

                                });
                            html +=
                                '<td><input type="text" class="form-control form-control-sm" value="' +
                                (mymark ? mymark : "") + '" name="marks[' + v.id + ']"' +
                                '></td>';
                            '</tr>';
                        });
                        html = $('#marks-entry-tr').html(html);
                    }
                });
            });
        </script>
    </div>
@endsection
