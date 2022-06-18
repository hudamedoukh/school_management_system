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
                                <h3 class="box-title"> حصص اونلاين

                                </h3>
                                <a href="{{ route('online_zoom_classes.create') }}" class="btn btn-success btn-rounded float-start mr-3" role="button"
                                    aria-pressed="true">اضافة حصة اونلاين جديدة</a>
                                    <a class="btn btn-success btn-rounded float-start" href="{{route('indirect.teacher.create')}}">اضافة حصة اوفلاين جديدة</a>

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
                                <div class="table-responsive">

                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead >
                                            <tr>
                                                <th>#</th>
                                                <th>المرحلة</th>
                                                <th>الصف</th>
                                                <th>القسم</th>
                                                <th>المعلم</th>
                                                <th>عنوان الحصة</th>
                                                <th>تاريخ البداية</th>
                                                <th>وقت الحصة</th>
                                                <th>رابط الحصة</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($online_classes as $online_classe)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $online_classe->grade->Name }}</td>
                                                    <td>{{ $online_classe->classroom->Name_Class }}</td>
                                                    <td>{{ $online_classe->section->Name_Section }}</td>
                                                    <td>{{ $online_classe->created_by }}</td>
                                                    <td>{{ $online_classe->topic }}</td>
                                                    <td>{{ $online_classe->start_at }}</td>
                                                    <td>{{ $online_classe->duration }}</td>
                                                    <td class="text-danger"><a href="{{ $online_classe->join_url }}"
                                                            target="_blank">انضم الان</a></td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#Delete_receipt{{ $online_classe->meeting_id }}"><i
                                                                class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                @include('pages.Teachers.dashboard.online_classes.delete')
                                            @endforeach
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <!-- /.content -->
    </div>
    </div>

@endsection
