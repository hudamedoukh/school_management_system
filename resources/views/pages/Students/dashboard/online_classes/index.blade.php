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
                                <h3 class="box-title"> حصصي الاونلاين </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">

                                    <table id="example1" class="table table-bordered text-center table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>عنوان الحصة</th>
                                                <th>المعلم</th>
                                                <th>تاريخ البداية</th>
                                                <th>وقت الحصة</th>
                                                <th>رابط الحصة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($online_classes as $online_classe)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $online_classe->topic }}</td>
                                                    <td>{{ $online_classe->created_by }}</td>
                                                    <td>{{ $online_classe->start_at }}</td>
                                                    <td>{{ $online_classe->duration }} دقيقة</td>
                                                    <td class="text-danger"><a href="{{ $online_classe->join_url }}"
                                                            target="_blank">انضم الان</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
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
