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

            </ul>
        </div>

        <div class="navbar-custom-menu r-side">
            <ul class="nav navbar-nav">
                <!-- full Screen -
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
                            @if (auth('teacher')->check())
                            <a class="dropdown-item" href="{{  route('profile.show') }}"><i class="ti-user text-muted mr-2"></i> الملف الشخصي</a>
                            @elseif(auth('parent')->check())
                            <a class="dropdown-item" href="{{  route('parent_profile.show') }}"><i class="ti-user text-muted mr-2"></i> الملف الشخصي</a>

                            @elseif(auth('student')->check())
                            <a class="dropdown-item" href="{{  route('student_profile.show') }}"><i class="ti-user text-muted mr-2"></i> الملف الشخصي</a>

                            @else
                            <a class="dropdown-item" href="{{  route('admin_profile.show') }}"><i class="ti-user text-muted mr-2"></i> الملف الشخصي</a>

                            @endif

                            @if (auth('web')->check())

                            <a class="dropdown-item" href="{{ route('settings.index') }}"><i class="ti-settings text-muted mr-2"></i> الاعدادات</a>
                            @endif

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
