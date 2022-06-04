@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">تفاصيل حضور المعلمين </h3>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th width="5%">رقم</th>
                                                <th>الاسم</th>

                                                <th>التاريخ </th>
                                                <th> حالة الحضور</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($teacherAttendances as $key => $teacherAttendance)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td> {{ $teacherAttendance->teachers->Name }}</td>

                                                    <td> {{ date('d-m-Y', strtotime($teacherAttendance->attendence_date)) }}</td>
                                                    <td>
                                                        @if ($teacherAttendance->attendence_status == '1')
                                                            حاضر
                                                        @elseif($teacherAttendance->attendence_status == '2')
                                                            اجازة
                                                        @elseif($teacherAttendance->attendence_status == '3')
                                                            غائب
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
