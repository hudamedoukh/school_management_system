@extends('admin.admin_master')
@section('admin')

    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box bb-3 border-info">
                            <div class="box-header">
                                <h4 class="box-title"> <strong>  علامات الطلاب</strong></h4>
                            </div>

                            <div class="box-body">
                                <form action="" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-row">
                                            
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="Grade_id">المرحلة الدراسية : <span class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="Grade_id" id="Grade_id">
                                                        <option selected disabled>حدد المرحلة الدراسية...</option>
                                                        @foreach($grades as $grade)
                                                            <option  value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="Classroom_id">الصف الدراسي : <span class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="Classroom_id" id="Classroom_id">
        
                                                    </select>
                                                </div>
                                            </div>
        
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="section_id">الشعبة : </label>
                                                    <select class="custom-select mr-sm-2" name="section_id" id="section_id">
        
                                                    </select>
                                                </div>
                                            </div>
        
                                        </div>

                                        <div class="col-md-3" style="padding-top:25px;">
                                            <div class="form-group">
                                                <a id="search" class="btn btn-dark" name="search"> بحث</a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-none" id="marks-entry">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>اسم الطالب</th>
                                                        <th>الصف </th>
                                                        <th>الشعبة</th>
                                                        <th> العلامة </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="marks-entry-tr">
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <input type="submit" class="btn btn-info" value="حفظ">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>

   
@endsection
