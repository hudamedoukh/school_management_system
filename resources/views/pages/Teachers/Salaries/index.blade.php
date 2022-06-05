@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title"> رواتب المعلمين</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th width="5%">الرقم</th>
                                                <th>اسم المعلم</th>
                                                <th>الجنس</th>
                                                <th>تاريخ التوظيف</th>
                                                <th>الراتب</th>
                                                <th width="20%"> العمليات</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($teachers as $key => $teacher)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>{{ $teacher->Name }}</td>
                                                    <td>
                                                   {{ $teacher->Gender_id}}

                                                    </td>
                                                    <td>{{ $teacher->Joining_Date }}</td>
                                                    <td> {{ $teacher->salary }} شيكل</td>
                                                    <td>
                                                        <a  title="إضافة علاوة للموظف"href="{{ route('Salaries.edit', $teacher->id) }}"
                                                            class="btn btn-info"><i class="fa fa-plus-circle"></i></a>
                                                            <a  title="عرض التفاصيل"href="{{ route('Salaries.show',$teacher->id) }}"
                                                                class="btn btn-light"><i class="fa fa-eye"></i></a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
@endsection
