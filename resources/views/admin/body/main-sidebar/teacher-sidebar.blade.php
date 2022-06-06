<ul class="sidebar-menu" data-widget="tree">
    <li  class="@if ($currentURL == 'teacher/dashboard') active @endif">
        <a href="{{ url('/teacher/dashboard') }}">
            <i data-feather="pie-chart"></i>
            <span>لوحة التحكم</span>
        </a>
    </li>
    <li class="treeview">
        <a href="">
            <i data-feather="grid"></i> <span> الشعب الدراسية</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'sections') active @endif"><a href="{{route('sections')}}"><i class="ti-more"></i> قائمة الشعب</a></li>
        </ul>

    </li>

    <li class="treeview">
        <a href="#">
            <i data-feather="users"></i> <span> الطلاب </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'student.index') active @endif"><a href="{{route('student.index')}}"><i class="ti-more"></i> قائمة الطلاب</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="">
            <i data-feather="file-text"></i> <span>الاختبارات</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'quizzes.index') active @endif"> <a href="{{route('quizzes.index')}}"><i class="ti-more"></i> قائمة الاختبارات</a> </li>
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
            <li class="@if ($route == 'online_zoom_classes.index') active @endif"> <a href="{{ route('online_zoom_classes.index') }}"><i class="ti-more"></i>حصص اونلاين مع
                    زوم</a> </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="">
            <i data-feather="file-minus"></i> <span>التقارير</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'attendance.report') active @endif"> <a href="{{route('attendance.report')}}"><i class="ti-more"></i>تقرير الحضور والغياب</a> </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="">
            <i data-feather="file-minus"></i> <span>إدارة درجات الطلاب</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'marks.entry.add') active @endif"> <a href="{{route('marks.entry.add')}}"><i class="ti-more"></i>إدخال الدرجات</a> </li>
            {{-- <li class="@if ($route == 'marks_entry.edit') active @endif"> <a href="{{route('marks_entry.edit')}}"><i class="ti-more"></i>تعديل الدرجات</a> </li> --}}

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
