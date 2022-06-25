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
                                <h3 class="box-title"> الطلاب</h3>
                                <a href="{{ url()->previous() }}" class="btn btn-rounded btn-info mb-5 mr-3"
                                    style="float: left" > عودة</a>
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
                                <form action="{{ route('Students.update', 'test') }}" method="post" autocomplete="off">
                                    @method('PUT')
                                    @csrf
                                     <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>اسم الطالب : <span class="text-danger">*</span></label>
                                                <input value="{{$Students->name}}" type="text" name="name"   class="form-control" required>
                                                <input type="hidden" name="id" value="{{$Students->id}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="gender">الجنس: <span class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="gender_id" required>
                                                    <option selected disabled>اختر الجنس...</option>
                                                    @foreach($Genders as $Gender)
                                                        <option value="{{$Gender->id}}" {{$Gender->id == $Students->gender_id ? 'selected' : ""}} >{{ $Gender->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group date">
                                                <label>تاريخ الميلاد :<span class="text-danger">*</span></label>
                                                <input class="form-control" type="date" required value="{{$Students->Date_Birth}}"  name="Date_Birth" data-date-format="yyyy-mm-dd">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>البريد الالكتروني: <span class="text-danger">*</span></label>
                                                <input type="email"  required value="{{ $Students->email }}" name="email" class="form-control" >
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>كلمة المرور :<span class="text-danger">*</span></label>
                                                <input value="{{ $Students->password }}" required type="password" name="password" class="form-control" >
                                            </div>
                                        </div>

                                    </div>

                                <h6 style="color: blue"></h6><br>
                                <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="Grade_id"> المرحلة الدراسية:<span class="text-danger">*</span> <span class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="Grade_id" required>
                                                    <option selected disabled>اختر المرحلة الدراسية..</option>
                                                    @foreach($Grades as $Grade)
                                                        <option value="{{ $Grade->id }}" {{$Grade->id == $Students->Grade_id ? 'selected' : ""}}>{{ $Grade->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="Classroom_id">الصف الدراسي:<span class="text-danger">*</span> <span class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="Classroom_id" required>
                                                    <option value="{{$Students->Classroom_id}}">{{$Students->classroom->Name_Class}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="section_id">الشعبة الدراسية :<span class="text-danger">*</span> </label>
                                                <select class="custom-select mr-sm-2" name="section_id" required>
                                                    <option value="{{$Students->section_id}}"> {{$Students->section->Name_Section}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="parent_id">ولي الامر : <span class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="parent_id" required>
                                                    <option selected disabled> اختر ولي الامر...</option>
                                                   @foreach($parents as $parent)
                                                        <option value="{{ $parent->id }}" {{ $parent->id == $Students->parent_id ? 'selected' : ""}}>{{ $parent->Name_Father }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="academic_year"> : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="academic_year" required>
                                                <option selected disabled>اختر السنة الدراسية...</option>
                                                @php
                                                    $current_year = date("Y");
                                                @endphp
                                                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                                    <option value="{{ $year}}" {{$year == $Students->academic_year ? 'selected' : ' '}}>{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    </div><br>
                                <button class="btn btn-success nextBt" type="submit">حفظ التعديلات</button>
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

