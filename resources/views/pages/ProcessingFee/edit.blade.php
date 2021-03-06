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
                                <h3 class="box-title"> تعديل معالجة رسوم </h3>
                                <a href="{{ url()->previous() }}" class="btn btn-rounded btn-info mb-5 mr-3"
                                    style="float: left" > عودة</a>
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
                                <div class="row">
                                    <div class="col-md-12 mb-30">
                                        <form action="{{ route('ProcessingFee.update', 'test') }}" method="post"
                                            autocomplete="off">
                                            @method('PUT')
                                            @csrf
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>المبلغ : <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="Debit"
                                                            value="{{ $ProcessingFee->amount }}" type="number">
                                                        <input type="hidden" name="student_id"
                                                            value="{{ $ProcessingFee->student->id }}"
                                                            class="form-control">
                                                        <input type="hidden" name="id" value="{{ $ProcessingFee->id }}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>البيان : <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                                            rows="3">{{ $ProcessingFee->description }}</textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <button class="btn btn-success"
                                                type="submit">حفظ </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
        </div>
    </div>
@endsection
