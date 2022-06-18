@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full" >
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title mb-5"> قائمة الاختبارات</h3>
                                    <a href="{{route('quizzes.create')}}" class="btn btn-rounded btn-success mb-5 float-start"  role="button"
                                    aria-pressed="true">اضافة اختبار جديد</a><br><br>
                            </div>

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>اسم الاختبار</th>
                                                    <th>اسم المعلم</th>
                                                    <th>المرحلة الدراسية</th>
                                                    <th>الصف الدراسي</th>
                                                    <th>الشعبة</th>
                                                    <th>العمليات</th>
                                                </tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($quizzes as $quizze)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$quizze->name}}</td>
                                                <td>{{$quizze->teacher->Name}}</td>
                                                <td>{{$quizze->grade->Name}}</td>
                                                <td>{{$quizze->classroom->Name_Class}}</td>
                                                <td>{{$quizze->section->Name_Section}}</td>
                                                <td>
                                                    <a href="{{route('quizzes.edit',$quizze->id)}}"
                                                        class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_exam{{ $quizze->id }}" title="حذف"><i
                                                            class="fa fa-trash"></i></button>

                                                </td>
                                            </tr>

                                            <div class="modal fade" id="delete_exam{{$quizze->id}}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('quizzes.destroy',$quizze->id)}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5
                                                                    class="modal-title" id="exampleModalLabel">حذف اختبار</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>حذف  اختبار {{$quizze->name}}</p>
                                                                <input type="hidden" name="id" value="{{$quizze->id}}">
                                                            </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                    class="btn btn-danger">حذف</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">اغلاق</button>

                                                                </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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
