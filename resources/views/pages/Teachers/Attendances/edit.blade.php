@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">تعديل الحضور </h4>
                    </div>
                    @if ($errors->any())
                        <div class="row">
                            <div class="col-10 mx-auto mt-3">
                                <div class="text-danger alert alert-dismissible"
                                    style="padding-right: 55px;padding-top: 26px;background-color: #f5c6cb;">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li> <span>{{ $error }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{ route('TeacherAttendance.update',$teachers[0]['attendence_date']) }}">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <h5 class="text-primary"> تاريخ الحضور :{{ $teachers[0]['attendence_date'] }}</h5>
                                                        <div class="controls">

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped" style="width: 100%">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2" class="text-center"
                                                                    style="vertical-align: middle;">الرقم</th>
                                                                <th rowspan="2" class="text-center"
                                                                    style="vertical-align: middle;">قائمة المعلمين </th>
                                                                <th colspan="3" class="text-center"
                                                                    style="vertical-align: middle; width: 30%"> حالة الحضور
                                                                </th>
                                                            </tr>

                                                            <tr>
                                                                <th class="text-center bg-secondary btn present_all"
                                                                    style="display: table-cell;"> حاضر</th>
                                                                <th class="text-center bg-secondary btn vacation_all"
                                                                    style="display: table-cell;">اجازة</th>
                                                                <th class="text-center bg-secondary btn absent_all"
                                                                    style="display: table-cell;"> غائب</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($teachers as $key => $teacher)
                                                                <tr id="div{{ $teacher->id }}"
                                                                    class="text-center">
                                                                    <input type="hidden" name="teacher_id[]"
                                                                        value="{{ $teacher->teacher_id }}">
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $teacher['teachers']['Name'] }}</td>

                                                                    <td colspan="3">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <label
                                                                                    class="block text-gray-500 font-semibold sm:border-r sm:pr-4 ml-5">
                                                                                    <input
                                                                                        name="attendence_status[{{ $teacher->teacher_id }}]"
                                                                                        @if ($teacher->attendence_status == '1') checked @endif
                                                                                        class="leading-tight" type="radio"
                                                                                        value="1">
                                                                                    <span class="text-success">حاضر</span>
                                                                                </label>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <label
                                                                                class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                                                <input
                                                                                    name="attendence_status[{{ $teacher->teacher_id }}]"
                                                                                    @if ($teacher->attendence_status == '2') checked @endif
                                                                                    class="leading-tight" type="radio"
                                                                                    value="2">
                                                                                <span class="text-dark">اجازة</span>
                                                                            </label>
                                                                            </div>
                                                                            <div class="col-4">


                                                                            <label
                                                                                class="ml-4 block text-gray-500 font-semibold">
                                                                                <input
                                                                                    name="attendence_status[{{ $teacher->teacher_id }}]"
                                                                                    @if ($teacher->attendence_status == '3') checked @endif
                                                                                    class="leading-tight" type="radio"
                                                                                    value="3">
                                                                                <span class="text-danger">غائب</span>
                                                                            </label>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="تعديل">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
