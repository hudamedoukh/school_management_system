@extends('admin.admin_master')
@section('admin')
@livewireStyles

    <div class="content-wrapper">
        <div class="container-full">
            <h4 class="text-info" style="margin-right: 20px">مرحبا بك : {{ auth()->user()->name }}</h4>
            <!-- Main content -->
            <section class="content">
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="box overflow-hidden pull-up">
                                <div class="box-body">
                                    <div style="float:right">
                                        <i class="fa-solid fa-user-graduate"
                                            style='font-size:48px;color:rgb(30, 0, 255)'></i>
                                    </div>
                                    <div style="float:left">
                                        <p class="text-mute font-size-16">عدد الطلاب</p>
                                        <h3 class="text-dark text-center mb-0 font-weight-500">
                                            {{ App\Models\Student::count() }}</h3>
                                    </div>

                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top" style="
                                padding: 1rem;">
                                    <i class="fas fa-binoculars mr-1"  aria-hidden="true"></i><a href="{{ route('Students.index') }}"
                                        target="_blank" style="
                                        margin-right: 1rem;"><span class="text-danger">عرض البيانات</span></a>
                                </p>
                            </div>
                        </div>

                        <div class="col-xl-3 ">
                            <div class="box overflow-hidden pull-up">
                                <div class="box-body">
                                    <div style="float:right">
                                        <i class='fas fa-chalkboard' style='font-size:48px;color:red'></i>
                                    </div>
                                    <div style="float:left">
                                        <p class="text-mute font-size-16">عدد الشعب</p>
                                        <h3 class="text-dark text-center mb-0 font-weight-500">
                                            {{ App\Models\Section::count() }} </h3>
                                    </div>

                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top" style="
                                padding: 1rem;">
                                    <i class="fas fa-binoculars mr-1"  aria-hidden="true"></i><a href="{{ route('Sections.index') }}"
                                        target="_blank" style="
                                        margin-right: 1rem;"><span class="text-danger">عرض البيانات</span></a>
                                </p>
                            </div>
                        </div>

                        <div class="col-xl-3 ">
                            <div class="box overflow-hidden pull-up">
                                <div class="box-body">
                                    <div style="float:right">
                                        <i class='fas fa-user-tie' style='font-size:48px;color:rgb(66, 46, 60)'></i>
                                    </div>
                                    <div style="float:left">
                                        <p class="text-mute font-size-16">عدد أولياء الأمور</p>
                                        <h3 class="text-dark text-center mb-0 font-weight-500">
                                            {{ App\Models\My_Parent::count() }} </h3>
                                    </div>

                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top" style="
                                padding: 1rem;">
                                    <i class="fas fa-binoculars mr-1"  aria-hidden="true"></i><a style="
                                    margin-right: 1rem;" href="{{ route('add_parent') }}"
                                        target="_blank"><span class="text-danger">عرض البيانات</span></a>
                                </p>
                            </div>
                        </div>

                        <div class="col-xl-3">
                            <div class="box overflow-hidden pull-up">
                                <div class="box-body">
                                    <div style="float:right">
                                        <i class='fas fa-chalkboard-teacher'
                                            style='font-size:48px;color:rgb(81, 177, 7)'></i>
                                    </div>
                                    <div style="float:left">
                                        <p class="text-mute font-size-16">عدد المعلمين</p>
                                        <h3 class="text-dark text-center mb-0 font-weight-500">
                                            {{ App\Models\Teacher::count() }} </h3>
                                    </div>

                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top" style="
                                padding: 1rem;">
                                    <i class="fas fa-binoculars mr-1 ml-5" aria-hidden="true"></i><a
                                        href="{{ route('Teachers.index') }}" target="_blank"><span class="text-danger"
                                            style="
                                        margin-right: 1rem;">عرض البيانات</span></a>
                                </p>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h4 class="box-title mb-5 text-success"> آخر العمليات على النظام</h4>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="tab nav-border" style="position: relative;">
                                        <div class="d-block d-md-flex justify-content-between">
                                            <div class="d-block w-100">
                                            </div>
                                            <div class="d-block d-md-flex nav-tabs-custom">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                                    <li class="nav-item">
                                                        <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                                            href="#students" role="tab" aria-controls="students"
                                                            aria-selected="true"> الطلاب</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" id="teachers-tab" data-toggle="tab"
                                                            href="#teachers" role="tab" aria-controls="teachers"
                                                            aria-selected="false">المعلمين
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" id="parents-tab" data-toggle="tab"
                                                            href="#parents" role="tab" aria-controls="parents"
                                                            aria-selected="false">اولياء الامور
                                                        </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" id="fee_invoices-tab" data-toggle="tab"
                                                            href="#fee_invoices" role="tab" aria-controls="fee_invoices"
                                                            aria-selected="false">الفواتير
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-content" id="myTabContent">
                                            {{-- students Table --}}
                                            <div class="tab-pane fade active show" id="students" role="tabpanel"
                                                aria-labelledby="students-tab">
                                                <div class="table-responsive mt-15">
                                                    <table style="text-align: center"
                                                        class="table center-aligned-table table-hover mb-0">
                                                        <thead>
                                                            <tr class="table-info">
                                                                <th>#</th>
                                                                <th>اسم الطالب</th>
                                                                <th>البريد الالكتروني</th>
                                                                <th>النوع</th>
                                                                <th>المرحلة الدراسية</th>
                                                                <th>الصف الدراسي</th>
                                                                <th>القسم</th>
                                                                <th>تاريخ الاضافة</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $student->name }}</td>
                                                                    <td>{{ $student->email }}</td>
                                                                    <td>{{ $student->gender->Name }}</td>
                                                                    <td>{{ $student->grade->Name }}</td>
                                                                    <td>{{ $student->classroom->Name_Class }}</td>
                                                                    <td>{{ $student->section->Name_Section }}</td>
                                                                    <td class="text-success">{{ $student->created_at }}
                                                                    </td>
                                                                @empty
                                                                    <td class="alert-danger" colspan="8">لاتوجد بيانات
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            {{-- teachers Table --}}
                                            <div class="tab-pane fade" id="teachers" role="tabpanel"
                                                aria-labelledby="teachers-tab">
                                                <div class="table-responsive mt-15">
                                                    <table style="text-align: center"
                                                        class="table center-aligned-table table-hover mb-0">
                                                        <thead>
                                                            <tr class="table-info">
                                                                <th>#</th>
                                                                <th>اسم المعلم</th>
                                                                <th>النوع</th>
                                                                <th>تاريخ التعين</th>
                                                                <th>التخصص</th>
                                                                <th>تاريخ الاضافة</th>
                                                            </tr>
                                                        </thead>

                                                        @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $teacher->Name }}</td>
                                                                    <td>{{ $teacher->genders->Name }}</td>
                                                                    <td>{{ $teacher->Joining_Date }}</td>
                                                                    <td>{{ $teacher->specializations->Name }}</td>
                                                                    <td class="text-success">{{ $teacher->created_at }}
                                                                    </td>
                                                                @empty
                                                                    <td class="alert-danger" colspan="8">لاتوجد بيانات
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        @endforelse
                                                    </table>
                                                </div>
                                            </div>

                                            {{-- parents Table --}}
                                            <div class="tab-pane fade" id="parents" role="tabpanel"
                                                aria-labelledby="parents-tab">
                                                <div class="table-responsive mt-15">
                                                    <table style="text-align: center"
                                                        class="table center-aligned-table table-hover mb-0">
                                                        <thead>
                                                            <tr class="table-info">
                                                                <th>#</th>
                                                                <th>اسم ولي الامر</th>
                                                                <th>البريد الالكتروني</th>
                                                                <th>رقم الهوية</th>
                                                                <th>رقم الهاتف</th>
                                                                <th>تاريخ الاضافة</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse(\App\Models\My_Parent::latest()->take(5)->get() as $parent)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $parent->Name_Father }}</td>
                                                                    <td>{{ $parent->email }}</td>
                                                                    <td>{{ $parent->National_ID_Father }}</td>
                                                                    <td>{{ $parent->Phone_Father }}</td>
                                                                    <td class="text-success">{{ $parent->created_at }}
                                                                    </td>
                                                                @empty
                                                                    <td class="alert-danger" colspan="8">لاتوجد بيانات
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            {{-- sections Table --}}
                                            <div class="tab-pane fade" id="fee_invoices" role="tabpanel"
                                                aria-labelledby="fee_invoices-tab">
                                                <div class="table-responsive mt-15">
                                                    <table style="text-align: center"
                                                        class="table center-aligned-table table-hover mb-0">
                                                        <thead>
                                                            <tr class="table-info">
                                                                <th>#</th>
                                                                <th>تاريخ الفاتورة</th>
                                                                <th>اسم الطالب</th>
                                                                <th>المرحلة الدراسية</th>
                                                                <th>الصف الدراسي</th>
                                                                <th>القسم</th>
                                                                <th>نوع الرسوم</th>
                                                                <th>المبلغ</th>
                                                                <th>تاريخ الاضافة</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse(\App\Models\Fee_invoice::latest()->take(10)->get() as $section)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $section->invoice_date }}</td>
                                                                    <td>{{ $section->My_classs->Name_Class }}</td>
                                                                    <td class="text-success">{{ $section->created_at }}
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td class="alert-danger" colspan="9">لاتوجد بيانات
                                                                    </td>
                                                                </tr>
                                                            @endforelse
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
                </div>
                <livewire:calendar />
                @livewireScripts
    @stack('scripts')
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
