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
                            <h3 class="box-title">تعديل مادة دراسية</h3>
                            <br>
                        </div>
                        @if(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{route('subjects.update','test')}}" method="post" autocomplete="off">
                                        {{ method_field('patch') }}
                                        @csrf
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">اسم المادة</label>
                                                <input type="text" name="Name" class="form-control" value="{{ $subject->name}}" >
                                                <input type="hidden" name="id" value="{{$subject->id}}">
                                            </div>

                                        </div>
                                        <br>

                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="inputState">المرحلة الدراسية</label>
                                                <select class="custom-select" name="Grade_id">
                                                    <option selected disabled>اختر من القائمة...</option>
                                                    @foreach($grades as $grade)
                                                    <option
                                                    value="{{$grade->id}}" {{$grade->id == $subject->grade_id ?'selected':''}}>{{$grade->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col">
                                                <label for="inputState">الصف الدراسي</label>
                                                <select name="Class_id" class="custom-select" value="{{ $subject->classroom->id }}">{{ $subject->classroom->Name_Class }}>
                                                    <option
                                                        value="{{ $subject->classroom->id }}">{{ $subject->classroom->Name_Class }}
                                                    </option>
                                                </select>
                                            </div>


                                            <div class="form-group col">
                                                <label for="inputState">اسم المعلم</label>
                                                <select class="custom-select" name="teacher_id">
                                                    <option selected disabled>اختر من القائمة...</option>
                                                    @foreach($teachers as $teacher)
                                                    <option
                                                        value="{{$teacher->id}}" {{$teacher->id == $subject->teacher_id ?'selected':''}}>{{$teacher->Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <button class="btn btn-success nextBtn" type="submit">حفظ </button>
                                    </form>
                                </div>
                            <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
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
                    url: "{{ URL::to('classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        $('select[name="Class_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


@endsection
