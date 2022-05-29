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
                                <h3 class="box-title"> ترقية الطلاب</h3>
                            </div>
                            @if (Session::has('error_promotions'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('error_promotions') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <!-- /.box-header -->
                            <div class="box-body">
                                <h6 class="text-info">المرحلة الدراسية القديمة</h6><br>

                                <form method="post" action="{{ route('Promotion.store') }}" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>المرحلة الدراسية: <span class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="Grade_id" required>
                                                    <option selected disabled>اختر...</option>
                                                    @foreach ($Grades as $Grade)
                                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="Classroom_id">الصف الدراسي : <span
                                                        class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="Classroom_id" required>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="section_id">الشعبة :<span class="text-danger">*</span>
                                                </label>
                                                <select class="custom-select mr-sm-2" name="section_id" required>

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
                                    </div>



                                    <br>
                                    <h6 class="text-info">المرحلة الدراسية الجديدة</h6><br>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="inputState">المرحلة الدراسية: </label>
                                                <select class="custom-select mr-sm-2" name="Grade_id_new">
                                                    <option selected disabled>اختر...</option>
                                                    @foreach ($Grades as $Grade)
                                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="Classroom_id">الصف الدراسي: <span
                                                        class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="Classroom_id_new">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="section_id">الشعبة: <span class="text-danger">*</span>
                                                </label>
                                                <select class="custom-select mr-sm-2" name="section_id_new">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="academic_year">السنة الدراسية:
                                                    <span class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="academic_year_new">
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


                                    </div>


                                    <button type="submit" class="btn btn-info">تأكيد</button>
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
