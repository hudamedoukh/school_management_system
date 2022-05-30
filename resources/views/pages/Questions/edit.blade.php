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
                            <h3 class="box-title"> تعديل إختبار</h3>
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
                                    <form action="{{ route('questions.update','test') }}" method="post" autocomplete="off">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-row">

                                            <div class="col">
                                                <label for="title">اسم السؤال</label>
                                                <input type="text" name="title" id="input-name"
                                                    class="form-control form-control-alternative" autofocus value="{{$question->title}}">
                                                <input type="hidden" name="id" value="{{$question->id}}">
                                            </div>
                                        </div>
                                        <br>
        
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">الاجابات</label>
                                                <textarea name="answers" class="form-control" id="exampleFormControlTextarea1"
                                                        rows="4">{{$question->answers}}</textarea>
                                            </div>
                                        </div>
                                        <br>
        
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="title">الاجابة الصحيحة</label>
                                                <input type="text" name="right_answer" id="input-name"
                                                    class="form-control form-control-alternative" autofocus value="{{$question->right_answer}}">
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
                                                            <option value="{{ $quizze->id }}" {{$quizze->id == $question->quizze_id ? 'selected':'' }} >{{ $quizze->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="Grade_id">الدرجة : <span class="text-danger">*</span></label>
                                                    <select class="custom-select mr-sm-2" name="score">
                                                        <option selected disabled> حدد الدرجة...</option>
                                                        <option value="1" {{$question->score == 1 ? 'selected':''}}>1</option>
                                                        <option value="5" {{$question->score == 5 ? 'selected':''}}>5</option>
                                                        <option value="10" {{$question->score == 10 ? 'selected':''}}>10</option>
                                                        <option value="15" {{$question->score == 15 ? 'selected':''}}>15</option>
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
