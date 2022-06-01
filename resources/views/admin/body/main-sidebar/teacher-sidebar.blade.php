<ul class="sidebar-menu" data-widget="tree">
    <li class="bg-info">
        <a href="{{ url('/teacher/dashboard') }}">
            <i data-feather="pie-chart"></i>
            <span class="text-white">لوحة التحكم</span>
        </a>
    </li>

    <li class="treeview {{ $prefix == '/grade' ? 'active' : '' }}">
        <a href="">
            <i data-feather="credit-card"></i> <span> الشعب الدراسية</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('sections')}}"><i class="ti-more"></i> قائمة الشعب</a></li>
        </ul>
        
    </li>

    <li class="treeview {{ $prefix == '/grade' ? 'active' : '' }}">
        <a href="#">
            <i data-feather="credit-card"></i> <span> الطلاب </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('student.index')}}"><i class="ti-more"></i> قائمة الطلاب</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="">
            <i data-feather="inbox"></i> <span>الاختبارات</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li> <a href="{{route('quizzes.index')}}"><i class="ti-more"></i> قائمة الاختبارات</a> </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="">
            <i data-feather="inbox"></i> <span> حصص اونلاين</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li> <a href="{{ route('online_zoom_classes.index') }}"><i class="ti-more"></i>حصص اونلاين مع
                    زوم</a> </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="">
            <i data-feather="inbox"></i> <span>التقارير</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li> <a href="{{route('attendance.report')}}"><i class="ti-more"></i>تقرير الحضور والغياب</a> </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="">
            <i data-feather="inbox"></i> <span> الملف الشخصي</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li> <a href="#"><i class="ti-more"></i>#</a> </li>
        </ul>
    </li>

</ul>