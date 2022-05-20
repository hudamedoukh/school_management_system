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
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                    تراجع الكل
                                </button>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th style="background-color: rgb(191, 233, 245)">اسم الطالب</th>
                                                <th style="background-color: rgb(244, 201, 201)">المرحلة السابقة</th>
                                                <th style="background-color: rgb(244, 201, 201)">السنة الدراسية</th>
                                                <th style="background-color: rgb(244, 201, 201)">الصف السابق</th>
                                                <th style="background-color: rgb(244, 201, 201)">الشعبة السابقة</th>
                                                <th style="background-color: rgb(194, 236, 209)">المرحلة الحالية</th>
                                                <th style="background-color: rgb(194, 236, 209)">السنة الحالية</th>
                                                <th style="background-color: rgb(194, 236, 209)">الصف الحالي</th>
                                                <th style="background-color: rgb(194, 236, 209)">الشعبة الحالية</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->f_grade->Name}}</td>
                                                <td>{{$promotion->academic_year}}</td>
                                                <td>{{$promotion->f_classroom->Name_Class}}</td>
                                                <td>{{$promotion->f_section->Name_Section}}</td>
                                                <td>{{$promotion->t_grade->Name}}</td>
                                                <td>{{$promotion->academic_year_new}}</td>
                                                <td>{{$promotion->t_classroom->Name_Class}}</td>
                                                <td>{{$promotion->t_section->Name_Section}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#Delete_one{{$promotion->id}}">ارجاع الطالب</button>
                                                    <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#">تخرج الطالب</button>
                                                </td>
                                            </tr>
                                            @include('pages.Students.promotion.Delete_all')
                                            @include('pages.Students.promotion.Delete_one')
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
