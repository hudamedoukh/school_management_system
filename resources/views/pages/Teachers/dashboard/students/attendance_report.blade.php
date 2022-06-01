@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper" style="background-color: rgb(225, 255, 241)">
    <div class="container-full">
        <h4 class="text-info" style="margin-right: 20px">تقارير الحضور والغياب</h4>
        <!-- Main content -->
        <section class="content">
            
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h5 style="color: blue">معلومات البحث</h5><br>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="post"  action="{{ route('attendance.search') }}" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="row">
                                                <label  class="col" for="student"> الطلاب:</label>
                                                <div class="col-11">
                                                    <select class="custom-select " name="student_id">
                                                        <option value="0">الكل</option>
                                                        @foreach($students as $student)
                                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="card-body ">
                                        <div class="input-group">
                                            <span class="input-group-addon">  من تاريخ</span>
                                            <input type="date"  class="form-control range-from "  required name="from">
                                            <span class="input-group-addon">الي تاريخ</span>
                                            <input class="form-control range-to " type="date" required name="to">
                                        </div>
                                    </div>

                                </div>
                                <button class="btn btn-success  nextBtn  pull-right" type="submit"> تأكيد</button>
                            </form>
                            @isset($Students)
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="table-success">
                                    <tr>
                                        <th>#</th>
                                        <th>اسم الطالب</th>
                                        <th>المرحلة الدراسية</th>
                                        <th>الشعبة الدراسية</th>
                                        <th>التاريخ</th>
                                        <th>الحالة</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Students as $student)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$student->students->name}}</td>
                                            <td>{{$student->grade->Name}}</td>
                                            <td>{{$student->section->Name_Section}}</td>
                                            <td>{{$student->attendence_date}}</td>
                                            <td>
            
                                                @if($student->attendence_status == 0)
                                                    <span class="btn-danger">غياب</span>
                                                @else
                                                    <span class="btn-success">حضور</span>
                                                @endif
                                            </td>
                                        </tr>
                                    {{-- @include('pages.Students.Delete') --}}
                                    @endforeach
                                </table>
                            </div>
                            @endisset
            
                        </div>
                        <!-- /.box-body -->
                        <p><br><br><br><br><br><br></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>
@endsection