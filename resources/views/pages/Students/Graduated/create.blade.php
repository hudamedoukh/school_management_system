@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title"> إضافة تخرج جديد</h3>
                            </div>
                            @if ($errors->any())
                            <div class="row">
                                <div class="col-10 mx-auto mt-3">
                                    <div class="text-danger alert alert-dismissible"
                                        style="padding-right: 55px;padding-top: 26px;background-color: #f5c6cb;">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li> <span>{{ $error }}</span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                            @if (Session::has('error_Graduated'))
                            <div class="row">
                                <div class="col-10 mx-auto mt-3">
                                    <div class="text-danger alert alert-dismissible"
                                        style="padding-right: 55px;background-color: #f5c6cb;">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                            <strong>{{Session::get('error_Graduated')}}</strong>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- /.box-header -->
                            <div class="box-body">

                                <form method="post" action="{{ route('Graduated.store') }}" autocomplete="off" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>المرحلة الدراسية: <span
                                                        class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="Grade_id" required>
                                                    <option selected disabled>اختر...</option>
                                                    @foreach($Grades as $Grade)
                                                        <option value="{{$Grade->id}}">{{$Grade->Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Classroom_id">الصف الدراسي : <span
                                                    class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="Classroom_id" required>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="section_id">الشعبة  :<span
                                                    class="text-danger">*</span> </label>
                                                <select class="custom-select mr-sm-2" name="section_id" required>

                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <button type="submit"
                                    class="btn btn-info">تأكيد</button>
                                </form>
                                <!-- row closed -->
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
