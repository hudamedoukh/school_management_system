@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
$currentURL = Request::path();
$logo=\App\Models\Setting::where('key', 'logo')->pluck('value')->first();
$school_name=\App\Models\Setting::where('key', 'school_name')->pluck('value')->first();

@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <div class="user-profile">
            <div class="ulogo">
                <a href="">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ URL::asset('attachments/logo/' . $logo) }}" alt="">
                        <h3><b> {{ $school_name }}</b></h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        @if (auth('web')->check())
            @include('admin.body.main-sidebar.admin-sidebar')
        @endif

        @if (auth('student')->check())
            @include('admin.body.main-sidebar.student-sidebar')
        @endif

        @if (auth('teacher')->check())
            @include('admin.body.main-sidebar.teacher-sidebar')
        @endif

        @if (auth('parent')->check())
            @include('admin.body.main-sidebar.parent-sidebar')
        @endif
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
