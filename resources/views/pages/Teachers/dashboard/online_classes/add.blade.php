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
                                <h3 class="box-title"> اضافة حصة جديدة

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

                                <form method="post" action="{{ route('online_zoom_classes.store') }}" autocomplete="off">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Grade_id">المرحلة الدراسية: <span
                                                        class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="Grade_id">
                                                    <option selected disabled>اختر المرحلة الدراسية...
                                                    </option>
                                                    @foreach ($Grades as $Grade)
                                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Classroom_id">الصف الدراسي : <span
                                                        class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="Classroom_id">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="section_id">الشعبة الدراسية : </label>
                                                <select class="custom-select mr-sm-2" name="section_id">

                                                </select>
                                            </div>
                                        </div>
                                    </div><br>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>عنوان الحصة : <span class="text-danger">*</span></label>
                                                <input class="form-control" name="topic" type="text">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>تاريخ ووقت الحصة : <span class="text-danger">*</span></label>
                                                <input class="form-control" type="datetime-local" name="start_time">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>مدة الحصة بالدقائق : <span class="text-danger">*</span></label>
                                                <input class="form-control" name="duration" type="text">
                                            </div>
                                        </div>

                                    </div>
                                    <button class="btn btn-success  pull-right"
                                        type="submit">حفظ</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
    </div>
