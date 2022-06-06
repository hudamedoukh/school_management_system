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
                                <h4 class="box-title"> <strong> تعديل علامات الطلاب </strong></h4>
                            </div>

                            <div class="box-body">
                                <form action="{{ route('marks_entry.update') }}" method="post">
                                    @csrf
                                    {{-- @if (@$class_id == $class->id) selected @endif --}}
                                    <div class="row">
                                        <div class="form-row">

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="Grade_id">المرحلة الدراسية : <span class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="Grade_id" id="Grade_id">
                                                        <option selected disabled>حدد المرحلة الدراسية...</option>
                                                        @foreach($grades as $grade)
                                                            <option  value="{{ $grade->id }}" @if(@$Grade_id==$grade->id )selected @endif>{{ $grade->Name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="Classroom_id">الصف الدراسي : <span class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="Classroom_id" id="Classroom_id">

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="section_id">الشعبة : </label>
                                                    <select class="custom-select mr-sm-2" name="section_id" id="section_id">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="subject_id">المادة الدراسية : </label>
                                                    <select class="custom-select mr-sm-2" name="subject_id" id="subject_id">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="quiz"> الاختبار  : </label>
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
                                            <table class="table table-bordered table-striped text-center" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>اسم الطالب</th>

                                                        <th> المرحلة الدراسية</th>
                                                        <th>الصف </th>
                                                        <th>الشعبة</th>
                                                        <th>المادة</th>
                                                        <th>الاختبار</th>

                                                        <th> العلامة </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="marks-entry-tr">
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <input type="submit" class="btn btn-rounded btn-info" value="حفظ">
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
    </div>

    <script type="text/javascript">
        $(document).on('click', '#search', function() {
            var Grade_id = $('#Grade_id').val();
            var Classroom_id = $('#Classroom_id').val();
            var section_id = $('#section_id').val();
            var subject_id = $('#subject_id').val();
            var quiz_id = $('#quiz').val();

            $.ajax({
                url: "{{ route('marks_entry.get_students_marks') }}",
                type: "GET",
                data: {
                    'Grade_id': Grade_id,
                    'Classroom_id': Classroom_id,
                    'section_id': section_id,
                    'subject_id':subject_id,
                    'quiz_id':quiz_id
                },
                success: function(data) {
                    $('#marks-entry').removeClass('d-none');
                    var html = '';
                    $.each(data, function(key, v) {
                        console.log(data);
                        html +=
                            '<tr>' +
                            '<td>'+v.student.name+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
                            '<td>' + v.grade.Name + '</td>' +
                            '<td>' + v.classroom.Name_Class + '</td>' +
                            '<td>' + v.section.Name_Section + '</td>' +
                            '<td>' + v.subject.name + '</td>' +
                            '<td>' + v.quiz.name + '</td>' +
                            '<td><input type="text" class="form-control form-control-sm" name="marks[]" value="'+v.mark+'"></td>' +
                            '</tr>';
                    });
                    html = $('#marks-entry-tr').html(html);
                }
            });
        });
    </script>
@endsection
