<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
        <!-- Sidebar toggle button-->
        <div>
            <ul class="nav">
                <li class="btn-group nav-item">
                    <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu"
                        role="button">
                        <i class="nav-link-icon mdi mdi-menu"></i>
                    </a>
                </li>
                <li class="btn-group nav-item">
                    <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon"
                        title="شاشة كاملة">
                        <i class="nav-link-icon mdi mdi-crop-free"></i>
                    </a>
                </li>
                <li class="btn-group nav-item d-none d-xl-inline-block">
                    <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="">
                        <i class="ti-check-box"></i>
                    </a>
                </li>
                <li class="btn-group nav-item d-none d-xl-inline-block">
                    <a href="calendar.html" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="">
                        <i class="ti-calendar"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="navbar-custom-menu r-side">
            <ul class="nav navbar-nav">
                <!-- full Screen -->
                <li class="search-bar">
                    <div class="lookup lookup-circle lookup-right">
                        <input type="text" name="search">
                    </div>
                </li>
                <!-- Notifications -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="waves-effect waves-light rounded dropdown-toggle" data-toggle="dropdown"
                        title="Notifications">
                        <i class="ti-bell"></i>
                    </a>

                </li>
                    @php
                        $user = DB::table('users')
                            ->where('id', Auth::user()->id)
                            ->first();
                    @endphp
                    <!-- User Account-->
                <li class="dropdown user user-menu">
                    <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown"
                        title="User">
                        <img class="rounded-circle"
                            src="{{ !empty($user->image) ? url('upload/user_images/' . $user->image) : url('upload/user.jpg') }} "
                            alt="User Avatar">
                    </a>
                    <ul class="dropdown-menu animated flipInX">
                        <li class="user-body">
                            <a class="dropdown-item" href=""><i class="ti-user text-muted mr-2"></i> الملف الشخصي</a>
                            <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i> الاعدادات</a>
                            <div class="dropdown-divider"></div>
                            @if (auth('student')->check())
                                <form method="GET" action="{{ route('logout', 'student') }}">
                                @elseif(auth('teacher')->check())
                                    <form method="GET" action="{{ route('logout', 'teacher') }}">
                                    @elseif(auth('parent')->check())
                                        <form method="GET" action="{{ route('logout', 'parent') }}">
                                        @else
                                            <form method="GET" action="{{ route('logout', 'web') }}">
                            @endif
                            @csrf
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault();this.closest('form').submit();"> <i
                                    class="ti-lock text-muted mr-2"></i>
                                تسجيل الخروج</a>

                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
