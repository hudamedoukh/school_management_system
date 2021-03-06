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
                                <h3 class="box-title mb-5"> قائمة الامتحانات</h3>
                                <br><br>
                                <div>
                                    <a href="{{route('Exams.create')}}" class="btn btn-success btn-sm" role="button"
                                    aria-pressed="true">اضافة امتحان جديد</a><br><br>
                                </div>
                            </div>
                            
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>اسم الامتحان</th>
                                                    <th>الفصل الدراسي</th>
                                                    <th>العمليات</th>
                                                </tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($exams as $exam)
                                                <tr>
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{$exam->name}}</td>
                                                    <td>{{$exam->term}}</td>
                                                    <td>
                                                        <a href="{{route('Exams.edit',$exam->id)}}"
                                                            class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                                class="fa fa-edit"></i></a>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete_exam{{ $exam->id }}" title="حذف"><i
                                                                class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="delete_exam{{$exam->id}}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <form action="{{route('Exams.destroy','test')}}" method="post">
                                                            {{method_field('delete')}}
                                                            {{csrf_field()}}
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5
                                                                        class="modal-title" id="exampleModalLabel">حذف امتحان</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p> هل أنت متأكد من عملية حذف؟ {{$exam->name}}</p>
                                                                    <input type="hidden" name="id" value="{{$exam->id}}">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">إغلاق</button>
                                                                        <button type="submit"
                                                                                class="btn btn-danger">حفظ البيانات</button>
                                                                    </div>
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
