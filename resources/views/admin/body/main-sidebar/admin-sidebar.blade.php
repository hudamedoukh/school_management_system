<ul class="sidebar-menu" data-widget="tree">
    <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
            <span>لوحة التحكم</span>
        </a>
    </li>

    {{-- <li class="treeview {{ $prefix == '/users' ? 'active' : '' }}">
        <a href="#">
            <i data-feather="message-circle"></i>
            <span>إدارة المستخدمين</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href=""><i class="ti-more"></i>عرض المستخدمين</a></li>
            <li><a href=""><i class="ti-more"></i>إضافة مستخدم</a></li>
        </ul>
    </li>

    <li class="treeview {{ $prefix == '/profile' ? 'active' : '' }}">
        <a href="#">
            <i data-feather="grid"></i> <span>إدارة الملف الشخصي</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href=""><i class="ti-more"></i>ملفك الشخصي</a></li>
            <li><a href=""><i class="ti-more"></i>تغيير كلمة المرور</a></li>
        </ul>
    </li> --}}


    <li class="treeview">
        <a href="#">
            <i data-feather="trello"></i> <span>المراحل الدراسية</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'grades.index') active @endif"><a href="{{ route('grades.index') }}"><i
                        class="ti-more"></i>قائمة المراحل الدراسية</a>
            </li>

        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i data-feather="home"></i> <span>الصفوف الدراسية</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class=" @if ($route == 'classrooms.index') active @endif"><a href="{{ route('classrooms.index') }}"><i
                        class="ti-more"></i>قائمة الصفوف
                    الدراسية</a></li>

        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i data-feather="grid"></i> <span>الشعب الدراسية </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'Sections.index') active @endif"><a href="{{ route('Sections.index') }}"><i
                        class="ti-more"></i>قائمة الشعب
                    الدراسية</a>
            </li>

        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i data-feather="users"></i> <span> أولياء الأمور </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($currentURL == 'add_parent') active @endif"><a href="{{ url('add_parent') }}"><i
                        class="ti-more"></i> قائمة أولياء الأمور</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i data-feather="users"></i> <span>المعلمين</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'Teachers.index') active @endif"><a href="{{ route('Teachers.index') }}"><i
                        class="ti-more"></i>قائمة المعلمين</a></li>

        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i data-feather="users"></i> <span>إدارة الطلاب</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="treeview">
                <a href="#">
                    <i data-feather="hard-drive"></i> <span>معلومات الطالب</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if ($route == 'Students.create') active @endif"><a
                            href="{{ route('Students.create') }}"><i class="ti-more"></i>اضافة طالب</a>
                    </li>
                    <li class="@if ($route == 'Students.index') active @endif"><a
                            href="{{ route('Students.index') }}"><i class="ti-more"></i>قائمة الطلاب
                        </a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="hard-drive"></i> <span>ترقية الطلاب</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if ($route == 'Promotion.index') active @endif"><a
                            href="{{ route('Promotion.index') }}"><i class="ti-more"></i> ترقية الطلاب
                        </a></li>
                    <li class="@if ($route == 'Promotion.create') active @endif"><a
                            href="{{ route('Promotion.create') }}"><i class="ti-more"></i> إدارة ترقية
                            الطلاب </a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="hard-drive"></i> <span>تخريج الطلاب</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if ($route == 'Graduated.create') active @endif"><a
                            href="{{ route('Graduated.create') }}"><i class="ti-more"></i>إضافة خريج
                        </a>
                    </li>
                    <li class="@if ($route == 'Graduated.index') active @endif"><a
                            href="{{ route('Graduated.index') }}"><i class="ti-more"></i> قائمة
                            الخريجين
                        </a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="">
            <i data-feather="edit-2"></i> <span> الحسابات</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'Fees.index') active @endif"><a href="{{ route('Fees.index') }}"><i
                        class="ti-more"></i> الرسوم الدراسية</a></li>
            <li class="@if ($route == 'Fees_Invoices.index') active @endif"><a
                    href="{{ route('Fees_Invoices.index') }}"><i class="ti-more"></i> الفواتير</a></li>
            <li class="@if ($route == 'ProcessingFee.index') active @endif"><a
                    href="{{ route('ProcessingFee.index') }}"><i class="ti-more"></i> استبعاد رسوم</a>
            </li>
            <li class="@if ($route == 'Payment_students.index') active @endif"> <a
                    href="{{ route('Payment_students.index') }}"><i class="ti-more"></i>سندات
                    الصرف</a>
            </li>

        </ul>
    </li>
    <li class="treeview">
        <a href="">
            <i data-feather="calendar"></i> <span>الحضور والغياب</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'Attendance.index') active @endif"><a
                    href="{{ route('Attendance.index') }}"><i class="ti-more"></i> قائمة الطلاب</a>
            </li>

        </ul>
    </li>

    <li class="treeview">
        <a href="">
            <i data-feather="clipboard"></i> <span>المواد الدراسية</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">
            <li class="@if ($route == 'subjects.index') active @endif"><a href="{{ route('subjects.index') }}"><i
                        class="ti-more"></i> قائمة المواد
                    الدراسية</a></li>

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
            <li class="@if ($route == 'Quizzes.index') active @endif"><a href="{{ route('Quizzes.index') }}"><i
                        class="ti-more"></i> قائمة الاختبارات</a>
            </li>
            <li class="@if ($route == 'questions.index') active @endif"><a href="{{ route('questions.index') }}"><i
                        class="ti-more"></i> قائمة الأسئلة</a>
            </li>
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
            <li class="@if ($route == 'online_classes.index') active @endif"> <a
                    href="{{ route('online_classes.index') }}"><i class="ti-more"></i>حصص اونلاين مع
                    زوم</a> </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="">
            <i data-feather="book-open"></i> <span> المكتبة</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="@if ($route == 'library.index') active @endif"> <a href="{{ route('library.index') }}"><i
                        class="ti-more"></i>قائمة الكتب</a> </li>

        </ul>

    </li>


    <li class="@if ($route == 'settings.index') active @endif">
        <a href="{{ route('settings.index') }}">
            <i data-feather="settings"></i>
            <span class="right-nav-text">الاعدادات </span></a>

    </li>
</ul>
