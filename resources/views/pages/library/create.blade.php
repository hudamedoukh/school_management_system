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
                                <h3 class="box-title"> اضافة كتاب جديد
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
                                <div class="row">
                                    <div class="col-md-12 mb-30">
                                        <form action="{{ route('library.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">

                                                <div class="col">
                                                    <label for="title">اسم الكتاب</label>
                                                    <input type="text" name="title" class="form-control">
                                                </div>

                                            </div>
                                            <br>

                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="Grade_id">المرحلة الدراسية: <span
                                                                class="text-danger">*</span></label>
                                                        <select class="custom-select mr-sm-2" name="Grade_id">
                                                            <option selected disabled>اختر المرحلة الدراسية...
                                                            </option>
                                                            @foreach ($grades as $grade)
                                                                <option value="{{ $grade->id }}">{{ $grade->Name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="Classroom_id">الصف الدراسي:
                                                            <span class="text-danger">*</span></label>
                                                        <select class="custom-select mr-sm-2" name="Classroom_id">

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="section_id">الشعبة الدراسية:
                                                        </label>
                                                        <select class="custom-select mr-sm-2" name="section_id">

                                                        </select>
                                                    </div>
                                                </div>

                                            </div><br>

                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="academic_year">المرفقات : <span
                                                                class="text-danger">*</span></label>
                                                        <input type="file" accept="application/pdf" name="file_name"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-success"
                                                type="submit">حفظ </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @endsection
