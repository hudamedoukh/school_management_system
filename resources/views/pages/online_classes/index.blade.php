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
                                <h3 class="box-title"> حصص اونلاين

                                </h3>

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
                                            
                                                </tr>
                                                @include('pages.online_classes.delete')
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
