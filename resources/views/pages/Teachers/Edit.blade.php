@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full" style="background-color: rgb(225, 255, 241)">
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">تعديل المادة الدراسية</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('Teachers.update','test')}}" method="post">
                                {{method_field('patch')}}
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">البريد الالكتروني</label>
                                                    <input type="hidden" value="{{$Teachers->id}}" name="id">
                                                    <input type="email" name="Email" value="{{$Teachers->Email}}" class="form-control">
                                                    @error('Email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">كلمة المرور</label>
                                                    <input type="password" name="Password" value="{{$Teachers->Password}}"  class="form-control">
                                                    @error('Password')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> {{-- first row  --}}

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="title">اسم المعلم</label>
                                                    <input type="text" name="Name" value="{{$Teachers->Name}}" class="form-control">
                                                    @error('Name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputCity">التخصص</label>
                                                    <select class="custom-select " name="Specialization_id">
                                                        <option value="{{$Teachers->Specialization_id}}">{{$Teachers->specializations->Name}}</option>
                                                        @foreach($specializations as $specialization)
                                                            <option value="{{$specialization->id}}">{{$specialization->Name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('Specialization_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> {{-- second row  --}}

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="inputState">الجنس</label>
                                                    <select class="custom-select" name="Gender_id">
                                                        <option value="{{$Teachers->Gender_id}}">{{$Teachers->genders->Name}}</option>
                                                        @foreach($genders as $gender)
                                                            <option value="{{$gender->id}}">{{$gender->Name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('Gender_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="title">تاريخ التوظيف</label>
                                                    <div class='input-group date'>
                                                        <input class="form-control" type="date" value="{{$Teachers->Joining_Date}}"  name="Joining_Date"  required>
                                                    </div>
                                                    @error('Joining_Date')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5> الراتب<span class="text-danger"> *</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="salary" id="salary"
                                                            class="form-control" value="{{ $Teachers->salary }}">
                                                        @error('salary')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div> {{-- third row  --}}

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">العنوان</label>
                                                    <textarea class="form-control" name="Address"
                                                            id="exampleFormControlTextarea1" rows="4"> {{$Teachers->Address}}
                                                    </textarea>
                                                    @error('Address')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> {{-- Fourth row  --}}
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="موافق">
                                    </div>
                                </div>
                            </form>
                        </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
    </div>
</div>
@endsection
