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
                                <h4 class="box-title mb-5">  قائمة الحضور والغياب للطلاب</h4>
                                <h5 style="color: red"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
                                <a href="{{ url()->previous() }}" class="btn btn-rounded btn-info mb-5 mr-3"
                                    style="float: left" > عودة</a>
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
                                <form method="post" action="{{ route('attendance') }}" autocomplete="off">
                                    @csrf
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th>اسم الطالب</th>
                                                    <th> البريد لالكتروني</th>
                                                    <th> الجنس </th>
                                                    <th>المرحلة الدراسية </th>
                                                    <th>الصف الدراسي </th>
                                                    <th>الشعبة الدراسية</th>
                                                    <th> الحضور والغياب</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $student)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $student->name }}</td>
                                                        <td>{{ $student->email }}</td>
                                                        <td>{{ $student->gender->Name }}</td>
                                                        <td>{{ $student->grade->Name }}</td>
                                                        <td>{{ $student->classroom->Name_Class }}</td>
                                                        <td>{{ $student->section->Name_Section }}</td>
                                                        <td>
                                                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                                <input name="attendences[{{ $student->id }}]"
                                                                    @foreach($student->attendance()->where('attendence_date',date('Y-m-d'))->get() as $attendance)
                                                                        {{ $attendance->attendence_status == 1 ? 'checked' : '' }}
                                                                    @endforeach
                                                                    class="leading-tight" type="radio"
                                                                    value="presence" required>
                                                                <span class="text-success">حضور</span>
                                                            </label>


                                                            <label class="ml-4 block text-gray-500 font-semibold">
                                                                <input name="attendences[{{ $student->id }}]"
                                                                    @foreach($student->attendance()->where('attendence_date',date('Y-m-d'))->get() as $attendance)
                                                                        {{ $attendance->attendence_status == 0 ? 'checked' : '' }}
                                                                    @endforeach
                                                                    class="leading-tight" type="radio" required
                                                                    value="absent">
                                                                <span class="text-danger">غياب</span>
                                                            </label>

                                                            <input type="hidden" name="grade_id" value="{{ $student->Grade_id }}">
                                                            <input type="hidden" name="classroom_id" value="{{ $student->Classroom_id }}">
                                                            <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <P style="margin-right: 0.7rem;">
                                        <button class="btn btn-success float-end mt-5 mr-5" type="submit">تأكيد</button>
                                    </P>
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
