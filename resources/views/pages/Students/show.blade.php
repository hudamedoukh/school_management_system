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
                                <h3 class="box-title"> الطلاب</h3>
                                <a href="{{ url()->previous() }}" class="btn btn-rounded btn-info mb-5 mr-3"
                                    style="float: left" > عودة</a>
                                <a href="{{ route('Students.create') }}" class="btn btn-rounded btn-success mb-5"
                                    style="float: left" aria-pressed="true"> اضافة طالب

                                </a>


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
                                    <div class="tab nav-border">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active show" id="home-02-tab" data-toggle="tab"
                                                    href="#home-02" role="tab" aria-controls="home-02"
                                                    aria-selected="true">معلومات الطالب</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-02-tab" data-toggle="tab"
                                                    href="#profile-02" role="tab" aria-controls="profile-02"
                                                    aria-selected="false">  مرفقات الطالب </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                                aria-labelledby="home-02-tab">
                                                <table class="table table-striped table-hover" style="text-align:center">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">اسم الطالب</th>
                                                            <td>{{ $Student->name }}</td>
                                                            <th scope="row">البريدالالكتروني</th>
                                                            <td>{{ $Student->email }}</td>
                                                            <th scope="row">الجنس</th>
                                                            <td>{{ $Student->gender->Name }}</td>

                                                        </tr>

                                                        <tr>
                                                            <th scope="row">المرحلة الدراسية</th>
                                                            <td>{{ $Student->grade->Name }}</td>
                                                            <th scope="row">الصف الدراسي</th>
                                                            <td>{{ $Student->classroom->Name_Class }}</td>
                                                            <th scope="row">الشعبة الدراسية</th>
                                                            <td>{{ $Student->section->Name_Section }}</td>

                                                        </tr>

                                                        <tr>
                                                            <th scope="row">تاريخ الميلاد</th>
                                                            <td>{{ $Student->Date_Birth }}</td>
                                                            <th scope="row">اسم ولي الامر</th>
                                                            <td>{{ $Student->myparent->Name_Father }}</td>
                                                            <th scope="row">السنة الدراسية</th>
                                                            <td>{{ $Student->academic_year }}</td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                                aria-labelledby="profile-02-tab">
                                                <div class="card card-statistics">
                                                    <div class="card-body">
                                                        <form method="post" action="{{ route('Upload_attachment') }}"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="academic_year">رفع مرفقات
                                                                        :</label>
                                                                    <input type="file" accept="image/*" name="photos[]"
                                                                        multiple required>
                                                                    <input type="hidden" name="student_name"
                                                                        value="{{ $Student->name }}">
                                                                    <input type="hidden" name="student_id"
                                                                        value="{{ $Student->id }}">
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <button type="submit" class="btn btn-success">
                                                            تأكيد
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <br>
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                        style="text-align:center">
                                                        <thead>
                                                            <tr class="table-secondary">
                                                                <th scope="col">#</th>
                                                                <th scope="col">اسم الملف</th>
                                                                <th scope="col">تاريخ الاضافة
                                                                </th>
                                                                <th scope="col">العمليات
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($Student->images as $attachment)
                                                                <tr style='text-align:center;vertical-align:middle'>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $attachment->filename }}</td>
                                                                    <td>{{ $attachment->created_at->diffForHumans() }}</td>
                                                                    <td colspan="2">
                                                                        <a class="btn btn-info btn-sm"
                                                                            href="{{ url('Download_attachment') }}/{{ $attachment->imageable->name }}/{{ $attachment->filename }}"
                                                                            role="button">
                                                                         تحميل </a>

                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm"
                                                                            data-toggle="modal"
                                                                            data-target="#Delete_img{{ $attachment->id }}"
                                                                            title=" حذف المرفق">
                                                                            حذف
                                                                        </button>

                                                                    </td>
                                                                </tr>
                                                                @include('pages.Students.Delete_img')
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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
