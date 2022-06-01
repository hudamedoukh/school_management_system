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
                                <h5>قائمة الحضور والغياب للطلاب</h5>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <h5 style="color: red"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
                                <form method="post" action="{{ route('Attendance.store') }}">
                                    @csrf
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr style="background-color: rgb(194, 236, 209)">
                                                    <th>#</th>
                                                    <th>اسم الطالب</th>
                                                    <th>البريد الالكتروني</th>
                                                    <th>الجنس</th>
                                                    <th>المرحلة الدراسية</th>
                                                    <th>الصف الدراسي</th>
                                                    <th>الشعبة</th>
                                                    <th>العمليات</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($students as $student)
                                                    <tr>
                                                        <td>
                                                            
                                                        </td>
                                                        <td>{{$student->name}}</td>
                                                        <td>{{$student->email}}</td>
                                                        <td>{{$student->gender->Name}}</td>
                                                        <td>{{$student->grade->Name}}</td>
                                                        <td>{{$student->classroom->Name_Class}}</td>
                                                        <td>{{$student->section->Name_Section}}</td>
                                                        <td>
                                                            @if(isset($student->attendance()->where('attendence_date',date('Y-m-d'))->first()->student_id))

                                                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                                    <input name="attendences[{{ $student->id }}]" disabled
                                                                            {{ $student->attendance()->first()->attendence_status == 1 ? 'checked' : '' }}
                                                                            class="leading-tight" type="radio" value="presence">
                                                                    <span class="text-success">حضور</span>
                                                                </label>
                                
                                                                <label class="ml-4 block text-gray-500 font-semibold">
                                                                    <input name="attendences[{{ $student->id }}]" disabled
                                                                            {{ $student->attendance()->first()->attendence_status == 0 ? 'checked' : '' }}
                                                                            class="leading-tight" type="radio" value="absent">
                                                                    <span class="text-danger">غياب</span>
                                                                </label>
                                
                                                            @else
                                
                                                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                                    <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                                                            value="presence">
                                                                    <span class="text-success">حضور</span>
                                                                </label>
                                    
                                                                <label class="ml-4 block text-gray-500 font-semibold">
                                                                    <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                                                            value="absent">
                                                                    <span class="text-danger">غياب</span>
                                                                </label>
                                
                                                            @endif
                                
                                                            <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                                            <input type="hidden" name="grade_id" value="{{ $student->Grade_id }}">
                                                            <input type="hidden" name="classroom_id" value="{{ $student->Classroom_id }}">
                                                            <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                                
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <p class="mt-10">
                                        <button class="btn btn-success " style="float: right" type="submit">تأكيد</button>
                                    </p>
                                </form>
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
