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
                                <h3 class="box-title">قائمة الكتب
                                </h3>
                                <a href="{{ route('library.create') }}" class="btn btn-success btn-rounded float-start" role="button"
                                    aria-pressed="true">اضافة كتاب جديد</a>

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

                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>اسم الكتب</th>
                                                <th>اسم المعلم</th>
                                                <th>المرحلة الدراسية</th>
                                                <th>الصف الدراسي</th>
                                                <th>القسم</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($books as $book)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $book->title }}</td>
                                                    <td>{{ $book->teacher->Name }}</td>
                                                    <td>{{ $book->grade->Name }}</td>
                                                    <td>{{ $book->classroom->Name_Class }}</td>
                                                    <td>{{ $book->section->Name_Section }}</td>
                                                    <td>
                                                        <a href="{{ route('downloadAttachment', $book->file_name) }}"
                                                            title="تحميل الكتاب" class="btn btn-warning btn-sm"
                                                            role="button" aria-pressed="true"><i
                                                                class="fas fa-download"></i></a>

                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_book{{ $book->id }}" title="حذف"><i
                                                                class="fa fa-trash"></i></button>
                                                        <a href="{{ route('library.edit', $book->id) }}"
                                                            class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                                class="fa fa-edit"></i></a>
                                                    </td>
                                                </tr>

                                                @include('pages.library.destroy')
                                            @endforeach
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <!-- /.content -->
    </div>
    </div>

@endsection
