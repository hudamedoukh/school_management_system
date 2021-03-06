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
                                <h3 class="box-title">  اضافة رسوم دراسية جديدة </h3>
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
                                <form method="post" action="{{ route('Fees.store') }}" autocomplete="off">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="inputEmail4">الاسم</label>
                                            <input type="text" value="{{ old('title') }}" name="title"
                                                class="form-control">
                                        </div>
                                        {{-- <div class="form-group col">
                                            <label for="inputZip">نوع الرسوم</label>
                                            <select class="form-control" name="Fee_type">
                                                <option value="1">رسوم دراسية</option>
                                                <option value="2">رسوم باص</option>
                                            </select>
                                        </div> --}}
                                        <div class="form-group col">
                                            <label for="inputEmail4">المبلغ</label>
                                            <input type="number" value="{{ old('amount') }}" name="amount"
                                                class="form-control">
                                        </div>

                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col">
                                            <label for="inputState">المرحلة الدراسية</label>
                                            <select class="form-control" name="Grade_id">
                                                <option selected disabled>اختر من القائمة...</option>
                                                @foreach ($Grades as $Grade)
                                                    <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col">
                                            <label for="inputZip">الصف الدراسي</label>
                                            <select class="form-control" name="Classroom_id">

                                            </select>
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputZip">السنة الدراسية</label>
                                            <select class="form-control" name="year">
                                                <option selected disabled>اختر من القائمة...</option>
                                                @php
                                                    $current_year = date('Y');
                                                @endphp
                                                @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputAddress">ملاحظات</label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
                                    </div>
                                    <br>

                                    <button type="submit" class="btn btn-success">تاكيد</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
