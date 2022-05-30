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
                            <h3 class="box-title">إضافة اختبار جديد</h3>
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
                                    <form action="{{route('questions.store')}}" method="post" autocomplete="off">
                                        @csrf
                                        <div class="form-row">

                                            <div class="col">
                                                <label for="title">اسم السؤال</label>
                                                <input type="text" name="title" id="input-name"
                                                    class="form-control form-control-alternative" autofocus>
                                            </div>
                                        </div>
                                        <br>
        
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">الاجابات</label>
                                                <textarea name="answers" class="form-control" id="exampleFormControlTextarea1"
                                                        rows="4"></textarea>
                                            </div>
                                        </div>
                                        <br>
        
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">الاجابة الصحيحة</label>
                                                <input type="text" name="right_answer" id="input-name"
                                                    class="form-control form-control-alternative" autofocus>
                                            </div>
                                        </div>
                                        <br>
        
                                        <div class="form-row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="Grade_id">اسم الاختبار : <span
                                                            class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="quizze_id">
                                                        <option selected disabled>حدد اسم الاختبار...</option>
                                                        @foreach($quizzes as $quizze)
                                                            <option value="{{ $quizze->id }}">{{ $quizze->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="Grade_id">الدرجة : <span class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="score">
                                                        <option selected disabled> حدد الدرجة...</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="5">5</option>
                                                        <option value="10">10</option>
                                                        <option value="15">15</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
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
