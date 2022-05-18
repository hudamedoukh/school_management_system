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
                            <h3 class="box-title"> اضافة ولي امر </h3>

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
                            @livewire('add-parent')
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
