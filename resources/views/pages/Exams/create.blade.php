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
                            <h3 class="box-title">إضافة امتحان جديد</h3>
                            <br>
                        </div>
                        @if(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{route('Exams.store')}}" method="post" autocomplete="off">
                                        @csrf
        
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">اسم الامتحان</label>
                                                <input type="text" name="Name" class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="title">الفصل الدراسي</label>
                                                <input type="number" name="term" class="form-control">
                                            </div>
                                        </div>
                                        
        
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="academic_year">السنة الدراسية: <span class="text-danger">*</span></label>
                                                <select class="custom-select mr-sm-2" name="academic_year">
                                                    <option selected disabled>اختر من القائمة...</option>
                                                    @php
                                                        $current_year = date("Y");
                                                    @endphp
                                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                                        <option value="{{ $year}}">{{ $year }}</option>
                                                    @endfor
                                                </select>
                                            </div>
        
                                        </div>
                                        <button class="btn btn-success nextBtn  pull-right" type="submit">حفظ البيانات</button>
                                    </form>
                                </div>
                            <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>    
                </div>            
            </div>            
        </section>
        <!-- /.content -->
        
    </div>
</div>




@endsection
