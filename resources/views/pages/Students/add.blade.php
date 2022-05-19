@extends('admin.admin_master')
@section('admin')

    <div class="content-wrapper">
        <div class="container-full" style="background-color: rgb(225, 255, 241)">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title"> الطلاب</h3>

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
                                <form method="post" action="{{ route('Students.store') }}" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    <h6 >
                                       المعلومات الشخصية</h6><br>
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>الاسم : <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="name" type="text">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="gender">الجنس : <span
                                                        class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="gender_id">
                                                    <option selected disabled>اختر الجنس...
                                                    </option>
                                                    @foreach ($Genders as $Gender)
                                                        <option value="{{ $Gender->id }}">{{ $Gender->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group date">
                                                <label>تاريخ الميلاد:</label>
                                                <input class="form-control" type="date"  id="datepicker-action"
                                                    name="Date_Birth" data-date-format="yyyy-mm-dd">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>البريد الالكتروني : </label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>كلمة المرور:</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>


                                    </div>

                                    <h6 class="pt-3">
                                       معلومات الطالب</h6><br>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="Grade_id">المرحلة الدراسية : <span
                                                        class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="Grade_id">
                                                    <option selected disabled>اختر المرحلة الدراسية...
                                                    </option>
                                                    @foreach ($my_classes as $c)
                                                        <option value="{{ $c->id }}">{{ $c->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="Classroom_id">الصف الدراسي :
                                                    <span class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="Classroom_id">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="section_id">الشعبة الدراسية : </label>
                                                <select class="custom-select mr-sm-2" name="section_id">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="parent_id">ولي الامر : <span
                                                        class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="parent_id">
                                                    <option selected disabled>اختر ولي الامر...
                                                    </option>
                                                    @foreach ($parents as $parent)
                                                        <option value="{{ $parent->id }}">{{ $parent->Name_Father }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="academic_year">السنة الدراسية:
                                                    <span class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="academic_year">
                                                    <option selected disabled>اختر السنة الدراسية...
                                                    </option>
                                                    @php
                                                        $current_year = date('Y');
                                                    @endphp
                                                    @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="academic_year">المرفقات : <span class="text-danger">*</span></label>
                                            <input type="file" accept="image/*" name="photos[]" multiple>
                                        </div>
                                    </div>
                                    <button type="submit"
                                    class="btn btn-success">حفظ البيانات</button>
                                </form>
                                <!-- row closed -->
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
