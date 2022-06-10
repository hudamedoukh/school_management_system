<ul class="sidebar-menu" data-widget="tree">
    <li  class="@if ($currentURL == 'student/dashboard') active @endif">
        <a href="{{ url('student/dashboard') }}">
            <i data-feather="pie-chart"></i>
            <span>لوحة التحكم</span>
        </a>
    </li>
    <li class="treeview">
        <a href="">
            <i data-feather="grid"></i> <span> العلامات</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'marks.index') active @endif"  ><a href="{{route('marks.index')}}"><i class="ti-more"></i> علاماتي</a></li>
        </ul>
    </li>
        <li class="treeview">
        <a href="">
            <i data-feather="book"></i> <span> المكتبة</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'books.show') active @endif" ><a href="{{ route('books.show') }}"><i class="ti-more"></i> كتبي</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="">
            <i data-feather="video"></i> <span> حصص اونلاين</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'onlineClasses.show') active @endif" ><a href="{{ route('onlineClasses.show') }}"><i class="ti-more"></i> حصص اونلاين مع الزوم</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="">
            <i data-feather="dollar-sign"></i> <span> الملف المالي</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'accounts.show') active @endif"><a href="{{ route('accounts.show') }}"><i class="ti-more"></i> ملفي المالي</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="">
            <i data-feather="grid"></i> <span> الحضور</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li ><a href=""><i class="ti-more"></i> حضوري</a></li>
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
            <li> <a href="#"><i class="ti-more"></i>#</a> </li>
        </ul>
    </li>

</ul>
