<ul class="sidebar-menu" data-widget="tree">
    <li  class="@if ($currentURL == 'parent/dashboard') active @endif">
        <a href="{{ url('parent/dashboard') }}">
            <i data-feather="pie-chart"></i>
            <span>لوحة التحكم</span>
        </a>
    </li>
    <li class="treeview">
        <a href="">
            <i data-feather="grid"></i> <span> ابنائي</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'parent.students') active @endif"><a href="{{ route('parent.students') }}"><i class="ti-more"></i> ابنائي</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="">
            <i data-feather="user"></i> <span> الملف الشخصي</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'parent_profile.show') active @endif"> <a href="{{ route('parent_profile.show') }}"><i class="ti-more"></i>ملفي الشخصي</a> </li>
        </ul>
    </li>
    <li>
        <a href="{{ route('logout', 'parent') }}">

                <i data-feather="lock"></i>
                <span> تسجيل الخروج </span>

        </a>

    </li>

</ul>
