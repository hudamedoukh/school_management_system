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
                                <h4 class="box-title"> <strong> علامات الطالب</strong></h4>
                            </div>

                            <div class="box-body">
                                <form action="" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-row">

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="subject_id">المادة الدراسية : <span
                                                            class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="subject_id" id="subject_id">
                                                        <option selected disabled>حدد المادة الدراسية...</option>
                                                        @foreach ($subjects as $subject)
                                                            <option value="{{ $subject->id }}">{{ $subject->name }}
                                                            </option>
                                                        @endforeach
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
                                    <div class="row d-none" id="marks-view">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped text-center"
                                                style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>اسم الطالب</th>
                                                        <th> المادة الدراسية</th>
                                                        <th>الاختبار </th>
                                                        <th> العلامة </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="marks-view-tr">
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
            $(document).on('click', '#search', function() {
                var subject_id = $('#subject_id').val();

                $.ajax({
                    url: "{{ route('marks.view') }}",
                    type: "GET",
                    data: {

                        'subject_id': subject_id,
                    },
                    success: function(data) {
                        $('#marks-view').removeClass('d-none');
                        var html = '';
                        // var result="";
                        $.each(data, function(key, v) {
                            // console.log(data);
                            html +=
                                '<tr>' +
                                '<td>' + v.student.name +
                                '<input type="hidden" name="student_id[]" value="' + v.id +
                                '"> </td>' +
                                '<td>' + v.subject.name + '</td>' +
                                '<td>' + v.quiz.name + '</td>' +
                                '<td>' + v.mark+ '</td>'+
                                '</tr>';
                        });
                        html = $('#marks-view-tr').html(html);
                    }
                });
            });
        </script>
    </div>
@endsection
