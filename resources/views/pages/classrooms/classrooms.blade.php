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
                                <h3 class="box-title"> الصفوف الدراسية</h3>
                                <div class="row" style="margin-top: 2rem;">
                                    <div class="col-6">
                                        <form action="{{ route('Filter_Classes') }}" method="POST">
                                            {{ csrf_field() }}
                                            <select class="form-control" id="select" name="Grade_id" required
                                                onchange="this.form.submit()">
                                                <option value="" selected disabled> بحث باسم المرحلة
                                                </option>
                                                @foreach ($Grades as $Grade)
                                                    <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                    <div class="col-4" style="margin-right: auto;">
                                        <button type="button" data-toggle="modal" data-target="#exampleModal"
                                            class="btn btn-rounded btn-success mb-5">
                                            إضافة صف دراسي
                                        </button>
                                        <button type="button" class="btn btn-danger btn-rounded mr-2" id="btn_delete_all">
                                            حذف الصفوف المختارة
                                        </button>
                                    </div>
                                </div>
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
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    <div class="checkbox">

                                                        <input name="select_all" id="example-select-all" type="checkbox"
                                                            onclick="CheckAll('box1', this)" />
                                                        <label style="margin-left: 13.5px;"
                                                            for="example-select-all"></label>
                                                    </div>
                                                </th>
                                                <th class="text-center" width="5%">#</th>
                                                <th class="text-center">الصف الدراسي</th>
                                                <th class="text-center">المرحلةالدراسية</th>
                                                <th class="text-center" width="25%">العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($details))
                                                <?php $List_Classes = $details; ?>
                                            @else
                                                <?php $List_Classes = $My_Classes; ?>
                                            @endif
                                            <?php $i = 0; ?>
                                            @foreach ($List_Classes as $My_Class)
                                                <tr>
                                                    <?php $i++; ?>
                                                    <td class="text-center">
                                                        <div class="checkbox">
                                                            <input class="box1" type="checkbox"
                                                                id="Checkbox_{{ $My_Class->id }}"
                                                                value="{{ $My_Class->id }}">
                                                            <label for="Checkbox_{{ $My_Class->id }}"></label>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">{{ $i }}</td>
                                                    <td class="text-center">{{ $My_Class->Name_Class }}</td>
                                                    <td class="text-center">{{ $My_Class->grades->Name }}</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-info btn-sm"
                                                            data-toggle="modal" data-target="#edit{{ $My_Class->id }}"
                                                            title="تعديل"><i class="fa fa-edit"></i></button>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal" data-target="#delete{{ $My_Class->id }}"
                                                            title="حذف"><i class="fa fa-trash"></i></button>
                                                    </td class="text-center">
                                                </tr>

                                                <!-- edit_modal_Grade -->
                                                <div class="modal fade" id="edit{{ $My_Class->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    تعديل صف
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <!-- edit_form -->
                                                            <form action="{{ route('classrooms.update', 'test') }}"
                                                                method="post">
                                                                {{ method_field('patch') }}
                                                                @csrf
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <label for="Name" class="mr-sm-2">الصف
                                                                                الدراسي
                                                                                :</label>
                                                                            <input id="Name" type="text" name="Name_Class"
                                                                                class="form-control"
                                                                                value="{{ $My_Class->Name_Class }}"
                                                                                required>
                                                                            <input id="id" type="hidden" name="id"
                                                                                class="form-control"
                                                                                value="{{ $My_Class->id }}">
                                                                        </div>
                                                                    </div><br>
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlTextarea1">المرحلة
                                                                            الدراسية
                                                                            :</label>
                                                                        <select class="form-control form-control-lg"
                                                                            id="exampleFormControlSelect1" name="Grade_id">
                                                                            <option value="{{ $My_Class->Grades->id }}">
                                                                                {{ $My_Class->Grades->Name }}
                                                                            </option>
                                                                            @foreach ($Grades as $Grade)
                                                                                <option value="{{ $Grade->id }}">
                                                                                    {{ $Grade->Name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">إغلاق</button>
                                                                    <button type="submit" class="btn btn-success">حفظ
                                                                        البيانات</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- delete_modal_Grade -->
                                                <div class="modal fade" id="delete{{ $My_Class->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    حذف الصف
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('classrooms.destroy', 'test') }}"
                                                                method="post">
                                                                {{ method_field('Delete') }}
                                                                @csrf
                                                                <div class="modal-body">

                                                                    هل أنت متأكد من عملية الحذف؟
                                                                    <input id="id" type="hidden" name="id"
                                                                        class="form-control"
                                                                        value="{{ $My_Class->id }}">

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-danger">حذف</button>
                                                                    <button type="button" class="btn btn-secondary"
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
                            <!-- /.box-body -->
                            <p><br><br><br><br><br><br><br><br><br><br><br></p>
                        </div>
                    </div>
                    <!-- حذف مجموعة صفوف -->
                    <div class="modal fade" id="delete_all" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        حذف الصفوف المختارة
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="{{ route('delete_all') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        هل أنت متأكد من عملية الحذف؟
                                        <input class="text" type="hidden" id="delete_all_id" name="delete_all_id"
                                            value=''>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">حذف</button>

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- add_modal_class -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        إضافة صف دراسي
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class=" row mb-30" action="{{ route('classrooms.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <div class="repeater">
                                                <div data-repeater-list="List_Classes">
                                                    <div data-repeater-item>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="Name" class="mr-sm-2">الصف
                                                                    الدراسي:</label>
                                                                <input class="form-control" type="text"
                                                                    name="Name_Class" />
                                                            </div>
                                                            <div class="col">
                                                                <label for="Name_en" class="mr-sm-2"> المرحلة
                                                                    الدراسية
                                                                    :</label>

                                                                <div class="box">
                                                                    <select class="fancyselect" name="Grade_id">
                                                                        @foreach ($Grades as $Grade)
                                                                            <option value="{{ $Grade->id }}">
                                                                                {{ $Grade->Name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                            </div>

                                                            <div class="col">
                                                                <label for="Name_en" class="mr-sm-2">العمليات
                                                                    :</label>
                                                                <input class="btn btn-danger btn-block" data-repeater-delete
                                                                    type="button" value="حذف" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row mt-20">
                                                    <div class="col-12">
                                                        <input class="btn btn-info" data-repeater-create type="button"
                                                            value="سجل جديد" />
                                                    </div>
                                                </div>
                                            </div>
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
