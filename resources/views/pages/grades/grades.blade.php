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
                            <h3 class="box-title"> المراحل الدراسية</h3>
                            <button type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-rounded btn-success mb-5" style="float: left">
                                إضافة مرحلة دراسية
                            </button>

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
                                        <th width="5%">#</th>
                                        <th>اسم المرحلة الدراسية</th>
                                        <th>ملاحظات</th>
                                        <th width="25%">العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($Grades as $Grade)
                                        <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{ $Grade->Name }}</td>
                                            <td>{{ $Grade->Notes }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#edit{{ $Grade->id }}"
                                                        title="تعديل المرحلة"><i
                                                        class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#delete{{ $Grade->id }}"
                                                        title="حذف المرحلة"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                                        <!-- edit_modal_Grade -->
                                        <div class="modal fade" id="edit{{ $Grade->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5  class="modal-title"
                                                            id="exampleModalLabel">
                                                            تعديل المرحلة
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- add_form -->
                                                        <form action="{{route('grades.update','test')}}" method="post">
                                                            {{method_field('patch')}}
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="Name"
                                                                            class="mr-sm-2">اسم المرحلة
                                                                        :</label>
                                                                    <input id="Name" type="text" name="Name"
                                                                            class="form-control"
                                                                            value="{{$Grade->Name}}"
                                                                            required>
                                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                                            value="{{ $Grade->id }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleFormControlTextarea1">ملاحظات
                                                                    :</label>
                                                                <textarea class="form-control" name="Notes"
                                                                            id="exampleFormControlTextarea1"
                                                                            rows="3">{{ $Grade->Notes }}</textarea>
                                                            </div>
                                                            <br><br>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">إغلاق</button>
                                                                <button type="submit"
                                                                        class="btn btn-success">حفظ البيانات</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- delete_modal_Grade -->
                                        <div class="modal fade" id="delete{{ $Grade->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModalLabel">
                                                            حذف مرحلة
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('grades.destroy','test')}}" method="post">
                                                            {{method_field('Delete')}}
                                                            @csrf
                                                            هل أنت متأكد من عملية الحذف؟
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                    value="{{ $Grade->id }}">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">إغلاق</button>
                                                                <button type="submit"
                                                                        class="btn btn-danger" >حذف البيانات</button>
                                                            </div>
                                                        </form>
                                                    </div>
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
                <!-- add_modal_Grade -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    إضافة مرحلة
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- add_form -->
                                <form action="{{ route('grades.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <label for="Name"
                                                    class="mr-sm-2">اسم المرحلة
                                                :</label>
                                            <input id="Name" type="text" name="Name" class="form-control">
                                            @error('Name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="exampleFormControlTextarea1">ملاحظات
                                            :</label>
                                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                                    rows="3"></textarea>
                                    </div>
                                    <br><br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">إغلاق</button>
                                <button type="submit"
                                        class="btn btn-success">حفظ البيانات</button>
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
