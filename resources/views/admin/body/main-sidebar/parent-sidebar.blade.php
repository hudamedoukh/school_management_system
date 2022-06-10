<ul class="sidebar-menu" data-widget="tree">
    <li  class="@if ($currentURL == 'parent/dashboard') active @endif">
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
            <li ><a href=""><i class="ti-more"></i> علاماتي</a></li>
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
