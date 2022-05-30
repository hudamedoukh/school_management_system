@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full" style="background-color: rgb(225, 255, 241)">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title mb-5"> قائمة الأسئلة </h3>
                                <br><br>
                                <div>
                                    <a href="{{route('questions.create')}}" class="btn btn-success btn-sm" role="button"
                                    aria-pressed="true">اضافة سؤال جديد</a><br><br>
                                </div>
                            </div>
                            
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">السؤال</th>
                                                <th scope="col">الاجابات</th>
                                                <th scope="col">الاجابة الصحيحة</th>
                                                <th scope="col">الدرجة</th>
                                                <th scope="col">اسم الاختبار</th>
                                                <th scope="col">العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($questions as $question)
                                                <tr>
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{$question->title}}</td>
                                                    <td>{{$question->answers}}</td>
                                                    <td>{{$question->right_answer}}</td>
                                                    <td>{{$question->score}}</td>
                                                    <td>{{$question->quizze->name}}</td>
                                                    <td>
                                                        <a href="{{route('questions.edit',$question->id)}}"
                                                            class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                                class="fa fa-edit"></i></a>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete_exam{{ $question->id }}" title="حذف"><i
                                                                class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>

                                                @include('pages.Questions.destroy')
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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

@endsection
