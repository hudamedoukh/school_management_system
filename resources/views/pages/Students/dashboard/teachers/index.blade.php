@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header  with-border">
                                <h4 class="box-title"> <strong> معلميني  </strong></h4>
                            </div>

                            <div class="box-body">
                                <div class="table-responsive">

                                    <table id="example1" class="table table-bordered table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>المبحث</th>
                                                <th>المعلم</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($subjects as $subject)

                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $subject->name }}</td>
                                                    <td>{{ $subject->teacher->Name }}</td>

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
