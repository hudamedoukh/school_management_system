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
                                <h3 class="box-title">إضافة معلم</h3>
                                <br>
                            </div>
                            @if (session()->has('error'))
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
                                        <form action="{{ route('Teachers.store') }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title">البريد الالكتروني</label>
                                                                <input type="email" name="Email" class="form-control">
                                                                @error('Email')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title">كلمة المرور</label>
                                                                <input type="password" name="Password"
                                                                    class="form-control">
                                                                @error('Password')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div> {{-- first row --}}

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="title">اسم المعلم</label>
                                                                <input type="text" name="Name" class="form-control">
                                                                @error('Name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputCity">التخصص</label>
                                                                <select class="custom-select " name="Specialization_id">
                                                                    <option selected disabled>اختر التخصص...</option>
                                                                    @foreach ($specializations as $specialization)
                                                                        <option value="{{ $specialization->id }}">
                                                                            {{ $specialization->Name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('Specialization_id')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div> {{-- second row --}}

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="inputState">الجنس</label>
                                                                <select class="custom-select" name="Gender_id">
                                                                    <option selected disabled>اختر...</option>
                                                                    @foreach ($genders as $gender)
                                                                        <option value="{{ $gender->id }}">
                                                                            {{ $gender->Name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('Gender_id')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="title">تاريخ التوظيف</label>
                                                                <div class='input-group date'>
                                                                    <input class="form-control" type="date"
                                                                        name="Joining_Date">
                                                                </div>
                                                                @error('Joining_Date')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5> الراتب<span class="text-danger"> *</span></h5>
                                                                <div class="controls">
                                                                    <input type="text" name="salary" id="salary"
                                                                        class="form-control">
                                                                    @error('salary')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> {{-- third row --}}

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">العنوان</label>
                                                                <textarea class="form-control" name="Address" id="exampleFormControlTextarea1" rows="4"></textarea>
                                                                @error('Address')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div> {{-- Fourth row --}}
                                                </div>
                                                <div class="text-xs-right">
                                                    <input type="submit" class="btn btn-rounded btn-success mb-5"
                                                        value="حفظ البيانات">
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
                    </div>
                </div>
            </section>
            <!-- /.content -->

        </div>
    </div>
@endsection
