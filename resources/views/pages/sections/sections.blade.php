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
                                <h3 class="box-title"> الشعب الدراسية</h3>
                                <button type="button" data-toggle="modal" data-target="#exampleModal"
                                    class="btn btn-rounded btn-success mb-5" style="float: left">
                                    إضافة شعبة
                                </button>

                            </div>
                            @if ($errors->any())
                                <div class="row">
                                    <div class="col-10 mx-auto mt-3">
                                        <div class="text-danger alert alert-dismissible"
                                            style="padding-right: 55px;padding-top: 26px;background-color: #f5c6cb;">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">×</button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li> <span>{{ $error }}</span></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="accordion" id="accordionExample">
                                    @foreach ($Grades as $Grade)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne-{{ $Grade->id }}">
                                                <button class="accordion-button btn-dark" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse-{{ $Grade->id }}"
                                                    aria-expanded="true" aria-controls="collapse-{{ $Grade->id }}">
                                                    {{ $Grade->Name }}
                                                </button>
                                            </h2>
                                            <div id="collapse-{{ $Grade->id }}" class="accordion-collapse collapse show"
                                                aria-labelledby="headingOne-{{ $Grade->id }}"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0 text-center">
                                                            <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>الشعبة</th>
                                                                    <th>الصف الدراسي</th>
                                                                    <th>الحالة </th>
                                                                    <th>العمليات</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach ($Grade->Sections as $list_Sections)
                                                                    <tr>
                                                                        <?php $i++; ?>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $list_Sections->Name_Section }}</td>
                                                                        <td>{{ $list_Sections->My_classs->Name_Class }}
                                                                        </td>
                                                                        <td>
                                                                            @if ($list_Sections->Status === 1)
                                                                                <label
                                                                                    class="badge badge-success">نشط</label>
                                                                            @else
                                                                                <label class="badge badge-danger">غير
                                                                                    نشط</label>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <a href="#" class="btn btn-outline-info btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#edit{{ $list_Sections->id }}">تعديل</a>
                                                                            <a href="#"
                                                                                class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#delete{{ $list_Sections->id }}">حذف</a>
                                                                        </td>
                                                                    </tr>


                                                                    <!--تعديل قسم جديد -->
                                                                    <div class="modal fade"
                                                                        id="edit{{ $list_Sections->id }}" tabindex="-1"
                                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        تعديل الشعبة
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form
                                                                                        action="{{ route('Sections.update', 'test') }}"
                                                                                        method="POST">
                                                                                        {{ method_field('patch') }}
                                                                                        {{ csrf_field() }}
                                                                                        <div class="row">
                                                                                            <div class="col-6">
                                                                                                <label for="inputName"
                                                                                                    class="control-label">
                                                                                                    الشعبة الدراسية</label>
                                                                                                <input type="text"
                                                                                                    name="Name_Section"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_Sections->Name_Section }}">
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <label for="inputName"
                                                                                                    class="control-label">المرحلة
                                                                                                    الدراسية</label>
                                                                                                <select name="Grade_id"
                                                                                                    class="custom-select"
                                                                                                    onclick="console.log($(this).val())">
                                                                                                    <!--placeholder-->
                                                                                                    <option
                                                                                                        value="{{ $Grade->id }}">
                                                                                                        {{ $Grade->Name }}
                                                                                                    </option>
                                                                                                    @foreach ($list_Grades as $list_Grade)
                                                                                                        <option
                                                                                                            value="{{ $list_Grade->id }}">
                                                                                                            {{ $list_Grade->Name }}
                                                                                                        </option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                            <br>
                                                                                            <div class="col">
                                                                                                <input id="id" type="hidden"
                                                                                                    name="id"
                                                                                                    class="form-control"
                                                                                                    value="{{ $list_Sections->id }}">
                                                                                            </div>

                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="row">
                                                                                            <div class="col-6">
                                                                                                <label for="inputName"
                                                                                                    class="control-label">الصف
                                                                                                    الدراسي</label>
                                                                                                <select name="Class_id"
                                                                                                    class="custom-select">
                                                                                                    <option
                                                                                                        value="{{ $list_Sections->My_classs->id }}">
                                                                                                        {{ $list_Sections->My_classs->Name_Class }}
                                                                                                    </option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <label for="inputName"
                                                                                                class="control-label">حدد الحالة
                                                                                                </label>
                                                                                                <div class="form-check"
                                                                                                    style="margin-top: 0.5rem;
                                                                                                    ">
                                                                                                    @if ($list_Sections->Status === 1)
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            checked
                                                                                                            class="form-check-input"
                                                                                                            name="Status"
                                                                                                            id="exampleCheck1">
                                                                                                    @else
                                                                                                        <input
                                                                                                            type="checkbox"
                                                                                                            class="form-check-input"
                                                                                                            name="Status"
                                                                                                            id="exampleCheck1">
                                                                                                    @endif
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="exampleCheck1">تفعيل</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <br>
                                                                                        
                                                                                        <div class="col">
                                                                                            <label for="inputName" class="control-label">اسم المعلم</label>
                                                                                            <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                                                                @foreach($list_Sections->teachers as $teacher)
                                                                                                    <option selected value="{{$teacher['id']}}">{{$teacher['Name']}}</option>
                                                                                                @endforeach

                                                                                                @foreach($teachers as $teacher)
                                                                                                    <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        


                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="submit"
                                                                                    class="btn btn-success">حفظ
                                                                                    البيانات</button>
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">إغلاق</button>

                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- delete_modal_Grade -->
                                                                    <div class="modal fade"
                                                                        id="delete{{ $list_Sections->id }}" tabindex="-1"
                                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        حذف شعبة
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form
                                                                                    action="{{ route('Sections.destroy', 'test') }}"
                                                                                    method="post">
                                                                                    {{ method_field('Delete') }}
                                                                                    @csrf
                                                                                    <div class="modal-body">

                                                                                        هل أنت متأكد من عملية الحذف؟
                                                                                        <input id="id" type="hidden"
                                                                                            name="id" class="form-control"
                                                                                            value="{{ $list_Sections->id }}">


                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit"
                                                                                            class="btn btn-danger">حذف
                                                                                            البيانات</button>
                                                                                        <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">إغلاق</button>

                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <p><br><br><br><br><br><br><br><br><br><br><br></p>
                        </div>
                    </div>
                    <!--اضافة قسم جديد -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        إضافة شعبة</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="{{ route('Sections.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="col">
                                            <input type="text" name="Name_Section" class="form-control"
                                                placeholder="الشعبة">
                                        </div>

                                        <br>
                                        <div class="col">
                                            <label for="inputName" class="control-label">المرحلة الدراسية</label>
                                            <select name="Grade_id" class="custom-select"
                                                onchange="console.log($(this).val())">
                                                <!--placeholder-->
                                                <option value="" selected disabled>اختر المرحلة الدراسية
                                                </option>
                                                @foreach ($list_Grades as $list_Grade)
                                                    <option value="{{ $list_Grade->id }}"> {{ $list_Grade->Name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <div class="col">
                                            <label for="inputName" class="control-label">الصف الدراسي</label>
                                            <select name="Class_id" class="custom-select">

                                            </select>
                                        </div>
                                        <br>
                                        <div class="col">
                                            <label for="inputName"
                                                class="control-label">اسم
                                                المعلم</label>
                                            <select multiple
                                                name="teacher_id[]"
                                                class="form-control"
                                                id="exampleFormControlSelect2">
                                                @foreach ($list_Sections->teachers as $teacher)
                                                    <option selected
                                                        value="{{ $teacher['id'] }}">
                                                        {{ $teacher['Name'] }}
                                                    </option>
                                                @endforeach

                                                @foreach ($teachers as $teacher)
                                                    <option
                                                        value="{{ $teacher->id }}">
                                                        {{ $teacher->Name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">حفظ البيانات</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>

                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>

@endsection
