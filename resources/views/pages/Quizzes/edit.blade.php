@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">تعديل اختبار</h3>
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
                                    <form action="{{route('Quizzes.update', 'test')}}" method="post" autocomplete="off">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">اسم الاختبار</label>
                                                <input type="text" name="Name" class="form-control"value="{{$quizz->name}}">
                                                <input type="hidden" name="id" value="{{$quizz->id}}">
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="Grade_id">المادة الدراسية : <span class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="subject_id">
                                                        <option selected disabled>حدد المادة الدراسية...</option>
                                                        @foreach($subjects as $subject)
                                                            <option value="{{ $subject->id }}" {{$subject->id == $quizz->subject_id ? "selected":""}}>{{ $subject->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="Grade_id">اسم المعلم : <span class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="teacher_id">
                                                        <option selected disabled>حدد اسم المعلم...</option>
                                                        @foreach($teachers as $teacher)
                                                            <option  value="{{ $teacher->id }}" {{$teacher->id == $quizz->teacher_id ? "selected":""}}>{{ $teacher->Name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="Grade_id">المرحلة الدراسية : <span class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="Grade_id">
                                                        <option selected disabled>حدد المرحلة الدراسية...</option>
                                                        @foreach($grades as $grade)
                                                        <option  value="{{ $grade->id }}" {{$grade->id == $quizz->grade_id ? "selected":""}}>{{ $grade->Name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="Classroom_id">الصف الدراسي : <span class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="Classroom_id">
                                                        <option value="{{$quizz->classroom_id}}">{{$quizz->classroom->Name_Class}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="section_id">الشعبة : </label>
                                                    <select class="custom-select mr-sm-2" name="section_id">
                                                        <option value="{{$quizz->section_id}}">{{$quizz->section->Name_Section}}</option>
                                                    </select>
                                                </div>
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




@endsection
