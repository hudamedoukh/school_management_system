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
                                <h3 class="box-title">  تعديل الرسوم الدراسية </h3>
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
                                <form action="{{ route('Fees.update', 'test') }}" method="post" autocomplete="off">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-row">

                                        <div class="form-group col">
                                            <label for="inputEmail4">الاسم</label>
                                            <input type="text" value="{{ $fee->title }}" name="title"
                                                class="form-control">
                                                <input type="hidden" value="{{$fee->id}}" name="id" class="form-control">

                                        </div>
                                        <div class="form-group col">
                                            <label for="inputZip">نوع الرسوم</label>
                                            <select class="custom-select" name="Fee_type">
                                                <option value="1" >رسوم دراسية</option>
                                                <option value="2">رسوم باص</option>
                                            </select>
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputEmail4">المبلغ</label>
                                            <input type="number" value="{{ $fee->amount }}" name="amount"
                                                class="form-control">
                                        </div>

                                    </div>


                                    <div class="form-row">

                                        <div class="form-group col">
                                            <label for="inputState">المرحلة الدراسية</label>
                                            <select class="custom-select mr-sm-2" name="Grade_id">
                                                @foreach ($Grades as $Grade)
                                                    <option value="{{ $Grade->id }}"
                                                        {{ $Grade->id == $fee->Grade_id ? 'selected' : '' }}>
                                                        {{ $Grade->Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col">
                                            <label for="inputZip">الصف الدراسي</label>
                                            <select class="custom-select mr-sm-2" name="Classroom_id">
                                                <option value="{{ $fee->Classroom_id }}">
                                                    {{ $fee->classroom->Name_Class }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col">
                                            <label for="inputZip">السنة الدراسية</label>
                                            <select class="custom-select mr-sm-2" name="year">
                                                @php
                                                    $current_year = date('Y');
                                                @endphp
                                                @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                                    <option value="{{ $year }}"
                                                        {{ $year == $fee->year ? 'selected' : ' ' }}>{{ $year }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputAddress">ملاحظات</label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                            rows="4">{{ $fee->description }}</textarea>
                                    </div>
                                    <br>

                                    <button type="submit" class="btn btn-primary">تاكيد</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
