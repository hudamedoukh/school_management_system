@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>مدرسة النخبة</b></h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
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

            <li class="treeview {{ $prefix == '/setups' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="credit-card"></i> <span>إدارة الإعدادات</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="ti-more"></i>المراحل الدراسية</a></li>
                    <li><a href=""><i class="ti-more"></i>السنوات الدراسية</a></li>
                    <li><a href=""><i class="ti-more"></i>أنواع الرسوم</a></li>
                    <li><a href=""><i class="ti-more"></i>مبلغ الرسوم</a></li>
                    <li><a href=""><i class="ti-more"></i>أنواع الاختبارات</a></li>
                    <li><a href=""><i class="ti-more"></i>المواد الدراسية</a></li>
                    <li><a href=""><i class="ti-more"></i> إدارة المواد الدراسية</a></li>
                    <li><a href=""><i class="ti-more"></i> إدارة المسمى الوظيفي</a></li>

                </ul>
            </li>

            <li class="treeview {{ $prefix == '/grade' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="credit-card"></i> <span>المراحل الدراسية</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('grades.index') }}"><i class="ti-more"></i>قائمة المراحل الدراسية</a>
                    </li>

                </ul>
            </li>

            <li class="treeview {{ $prefix == '/grade' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="credit-card"></i> <span>الصفوف الدراسية</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('classrooms.index') }}"><i class="ti-more"></i>قائمة الصفوف
                            الدراسية</a></li>

                </ul>
            </li>

            <li class="treeview {{ $prefix == '/grade' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="credit-card"></i> <span>الشعب الدراسية </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('Sections.index') }}"><i class="ti-more"></i>قائمة الشعب
                            الدراسية</a>
                    </li>

                </ul>
            </li>
            <li class="treeview {{ $prefix == '/grade' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="credit-card"></i> <span> أولياء الأمور </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('add_parent') }}"><i class="ti-more"></i> قائمة أولياء الأمور</a></li>

                </ul>
            </li>

            <li class="treeview {{ $prefix == '/employees' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="package"></i> <span>المعلمين</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('Teachers.index') }}"><i class="ti-more"></i>قائمة المعلمين</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="hard-drive"></i> <span>إدارة الطلاب</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="hard-drive"></i> <span>معلومات الطالب</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" style="display: block;">
                            <li><a href="{{ route('Students.create') }}"><i class="ti-more"></i>اضافة طالب</a>
                            </li>
                            <li><a href="{{ route('Students.index') }}"><i class="ti-more"></i>قائمة الطلاب
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
                        <ul class="treeview-menu" style="display: block;">
                            <li><a href="{{ route('Promotion.index') }}"><i class="ti-more"></i> ترقية الطلاب
                                </a></li>
                            <li><a href="{{ route('Promotion.create') }}"><i class="ti-more"></i> إدارة ترقية
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
                        <ul class="treeview-menu" style="display: block;">
                            <li><a href="{{ route('Graduated.create') }}"><i class="ti-more"></i>إضافة خريج
                                </a>
                            </li>
                            <li><a href="{{ route('Graduated.index') }}"><i class="ti-more"></i> قائمة
                                    الخريجين
                                </a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ $prefix == '/accounts' ? 'active' : '' }}">
                <a href="">
                    <i data-feather="inbox"></i> <span> الحسابات</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('Fees.index') }}"><i class="ti-more"></i> الرسوم الدراسية</a></li>
                    <li><a href="{{ route('Fees_Invoices.index') }}"><i class="ti-more"></i> الفواتير</a></li>
                    <li><a href="{{ route('ProcessingFee.index') }}"><i class="ti-more"></i> استبعاد رسوم</a>
                    </li>
                    <li> <a href="{{ route('Payment_students.index') }}"><i class="ti-more"></i>سندات
                            الصرف</a>
                    </li>

                </ul>
            </li>
            <li class="treeview {{ $prefix == '/accounts' ? 'active' : '' }}">
                <a href="">
                    <i data-feather="inbox"></i> <span>الحضور والغياب</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('Attendance.index') }}"><i class="ti-more"></i> قائمة الطلاب</a>
                    </li>

                </ul>
            </li>

            <li class="treeview {{ $prefix == '/accounts' ? 'active' : '' }}">
                <a href="">
                    <i data-feather="inbox"></i> <span>المواد الدراسية</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li><a href="{{ route('subjects.index') }}"><i class="ti-more"></i> قائمة المواد
                            الدراسية</a></li>

                </ul>

            </li>
            <li class="treeview {{ $prefix == '/accounts' ? 'active' : '' }}">
                <a href="">
                    <i data-feather="inbox"></i> <span>الاختبارات</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('Quizzes.index') }}"><i class="ti-more"></i> قائمة الاختبارات</a>
                    </li>
                    <li><a href="{{ route('questions.index') }}"><i class="ti-more"></i> قائمة الأسئلة</a>
                    </li>
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
                    <li> <a href="{{ route('online_classes.index') }}"><i class="ti-more"></i>حصص اونلاين مع
                            زوم</a> </li>


                </ul>
            </li>

            <li class="treeview">
                <a href="">
                    <i data-feather="inbox"></i> <span> المكتبة</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li> <a href="{{ route('library.index') }}"><i class="ti-more"></i>قائمة الكتب</a> </li>

                </ul>

            </li>


            <li>
                <a href="{{ route('settings.index') }}"><i data-feather="inbox"></i><span
                        class="right-nav-text">الاعدادات </span></a>


            </li>
        </ul>
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
