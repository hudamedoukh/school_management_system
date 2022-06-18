@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title mb-5"> ملفي الشخصي</h4>

                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="box box-inverse bg-img" data-overlay="2">

                                            <div class="box-body text-center  pb-50">
                                                <a href="#">
                                                    <img class="avatar avatar-xxl avatar-bordered"
                                                        src="{{ URL::asset('backend/images/noimage.jpg') }}"
                                                        alt="">
                                                </a>
                                                <h4 class="mt-2 mb-0">{{ $information->name }}</h4>
                                                <span>{{ $information->email }}</span>
                                                <h6 class="widget-user-desc">طالب</h6>

                                            </div>

                                            <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                                                <li>
                                                    <span class="opacity-60">المرحلة الدراسية</span><br>
                                                    <span >{{ $information->grade->Name }}</span>
                                                </li>
                                                <li>
                                                    <span class="opacity-60">الصف</span><br>
                                                    <span >{{ $information->classroom->Name_Class}}</span>
                                                </li>
                                                <li>
                                                    <span class="opacity-60">الشعبة الدراسية</span><br>
                                                    <span >{{ $information->section->Name_Section}}</span>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="col-lg-7">
                                        <div class="card mb-4">
                                            <div style="margin-top:25px;margin-right:20px;">
                                                <h4 class="box-titlem"><strong>تعديل البيانات</strong>     </h4>

                                            </div>

                                                <hr>

                                            <div class="card-body">
                                                <form action="{{ route('student_profile.update', $information->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <p class="mb-0">اسم المستخدم  </p>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <p class="text-muted mb-0">
                                                                <input type="text" name="name"
                                                                    value="{{ $information->name }}" class="form-control">
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <p class="mb-0">كلمة المرور</p>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <p class="text-muted mb-0">
                                                                <input type="password" id="password" class="form-control"
                                                                    name="password">
                                                            </p><br><br>
                                                            <input type="checkbox" class="form-check-input"
                                                                onclick="myFunction()" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">اظهار كلمة
                                                                المرور</label>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <button type="submit" class="btn btn-success">تعديل البيانات</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- row closed -->

    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
