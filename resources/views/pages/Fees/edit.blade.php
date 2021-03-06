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
                                <h3 class="box-title">  تعديل الرسوم الدراسية </h3>
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
                                <form action="{{ route('Fees.update', 'test') }}" method="post" autocomplete="off">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-row">

                                        <div class="form-group col">
                                            <label for="inputEmail4">الاسم</label>
                                            <input type="text" value="{{ $fee->title }}" name="title"
                                                class="form-control">
                                                <input type="hidden" value="{{$fee->id}}" name="id" class="form-control">

                                        </div>
                                        {{-- <div class="form-group col">
                                            <label for="inputZip">نوع الرسوم</label>
                                            <select class="custom-select" name="Fee_type">
                                                <option value="1" >رسوم دراسية</option>
                                                <option value="2">رسوم باص</option>
                                            </select>
                                        </div> --}}
                                        <div class="form-group col">
                                            <label for="inputEmail4">المبلغ</label>
                                            <input type="number" value="{{ $fee->amount }}" name="amount"
                                                class="form-control">
                                        </div>

                                    </div>


                                    <div class="form-row">

                                        <div class="form-group col">
                                            <label for="inputState">المرحلة الدراسية</label>
                                            <select class="custom-select mr-sm-2" name="Grade_id">
                                                @foreach ($Grades as $Grade)
                                                    <option value="{{ $Grade->id }}"
                                                        {{ $Grade->id == $fee->Grade_id ? 'selected' : '' }}>
                                                        {{ $Grade->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col">
                                            <label for="inputZip">الصف الدراسي</label>
                                            <select class="custom-select mr-sm-2" name="Classroom_id">
                                                <option value="{{ $fee->Classroom_id }}">
                                                    {{ $fee->classroom->Name_Class }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputZip">السنة الدراسية</label>
                                            <select class="custom-select mr-sm-2" name="year">
                                                @php
                                                    $current_year = date('Y');
                                                @endphp
                                                @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                                    <option value="{{ $year }}"
                                                        {{ $year == $fee->year ? 'selected' : ' ' }}>{{ $year }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputAddress">ملاحظات</label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                            rows="4">{{ $fee->description }}</textarea>
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
