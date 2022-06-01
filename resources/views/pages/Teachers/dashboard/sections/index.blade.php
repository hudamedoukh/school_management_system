@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper" style="background-color: rgb(225, 255, 241)">
        <div class="container-full" >
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">الشعب الدراسية</h3>
                                
                            </div>
                            
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered">
                                        <thead class="table-success">
                                            <tr>
                                                <th>#</th>
                                                <th>اسم المرحلة</th>
                                                <th>اسم القسم</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sections as $section)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $section->Grades->Name }}</td>
                                                    <td>{{ $section->Name_Section }}</td>
                                                </tr>
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
