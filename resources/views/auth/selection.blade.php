<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>إدارة مدرسة النخبة - لوحة التحكم </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->

    <link href="{{ URL::asset('assets/selection/css/rtl.css') }}" rel="stylesheet">



</head>

<body>

    <div class="wrapper">

        <section class="height-100vh d-flex align-items-center page-section-ptb login"
            style=" background-color: rgb(213 207 223);">
            <div class="container">
                <div class="row justify-content-center mb-30 no-gutters vertical-align">
                    <h1 class="text-primary" style="font-family: 'Cairo', sans-serif">مدرسة النخبة</h1>
                </div>
                
                <div class="row justify-content-center no-gutters vertical-align">

                    <div style="border-radius: 15px;" class="col-lg-8 col-md-8 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">حدد طريقة الدخول</h3>
                            <div class="form-inline">
                                <a class="btn btn-default col-lg-3" title="طالب"
                                    href="{{ route('login.show', 'student') }}">
                                    <img alt="user-img" width="130px;"
                                        src="{{ URL::asset('assets/selection/images/student.svg') }}">
                                </a>
                                <a class="btn btn-default col-lg-3" title="ولي امر"
                                    href="{{ route('login.show', 'parent') }}">
                                    <img alt="user-img" width="130px;"
                                        src="{{ URL::asset('assets/selection/images/parent.svg') }}">
                                </a>
                                <a class="btn btn-default col-lg-3" title="معلم"
                                    href="{{ route('login.show', 'teacher') }}">
                                    <img alt="user-img" width="130px;"
                                        src="{{ URL::asset('assets/selection/images/teacher.svg') }}">
                                </a>
                                <a class="btn btn-default col-lg-3" title="ادمن"
                                    href="{{ route('login.show', 'admin') }}">
                                    <img alt="user-img" width="130px;"
                                        src="{{ URL::asset('assets/selection/images/admin.svg') }}">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=================================
 login-->

    </div>
    <!-- jquery -->
    <script src="{{ URL::asset('assets/selection/js/jquery-3.3.1.min.js') }}"></script>
    <!-- plugins-jquery -->
    <script src="{{ URL::asset('assets/selection/js/plugins-jquery.js') }}"></script>

    <script>
        var plugin_path = 'js/';

    </script>

    <script src="{{ URL::asset('assets/selection/js/custom.js') }}"></script>

</body>

</html>
