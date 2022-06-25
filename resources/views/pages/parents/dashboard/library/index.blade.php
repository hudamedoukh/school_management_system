@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header  with-border">
                                <h4 class="box-title"> <strong>  كتب الطالب {{ $student_name[0] }}</strong></h4>
                                <a href="{{ url()->previous() }}" class="btn btn-rounded btn-info mb-5 mr-3"
                                    style="float: left"> عودة</a>
                            </div>

                            <div class="box-body">
                                <div class="table-responsive">

                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> الكتاب</th>
                                                <th> المعلم</th>
                                                <th> الكتاب</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($books as $book)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $book->title }}</td>
                                                    <td>{{ $book->teacher->Name }}</td>
                                                    <td> <embed
                                                            src="{{ URL::asset('attachments/library/' . $book->file_name) }}"
                                                            type="application/pdf" height="242px" width="200px"><br><br></td>
                                                    <td>
                                                        <a href="{{ route('downloadAttachment', $book->file_name) }}"
                                                            title="تحميل الكتاب" class="btn btn-warning btn-sm"
                                                            role="button" aria-pressed="true"><i
                                                                class="fas fa-download"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
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
