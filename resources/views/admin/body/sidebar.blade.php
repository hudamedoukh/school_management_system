@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp


<aside class="main-sidebar" >
  <!-- sidebar-->
  <section class="sidebar">			
    <div class="user-profile">
      <div class="ulogo">
        <a href="index.html">
          <!-- logo for regular state and mobile devices -->
          <div class="d-flex align-items-center justify-content-center">					 	
            <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
            <h3><b>مدرسة  النخبة</b></h3>
          </div>
        </a>
      </div>
    </div>
    
    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">		  
      <li class="{{ ($route == 'dashboard')?'active':'' }}">
        <a href="">
          <i data-feather="pie-chart"></i>
          <span>لوحة التحكم</span>
        </a>
      </li>  
      
      <li class="treeview {{ ($prefix == '/users')?'active':'' }}" >
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
      
      <li class="treeview {{ ($prefix == '/profile')?'active':'' }}">
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
      </li>

      <li class="treeview {{ ($prefix == '/setups')?'active':'' }}">
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
      
      <li class="treeview {{ ($prefix == '/grade')?'active':'' }}">
        <a href="#">
          <i data-feather="credit-card"></i> <span>المراحل الدراسية</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('grades.index')}}"><i class="ti-more"></i>قائمة المراحل الدراسية</a></li>
          
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/grade')?'active':'' }}">
        <a href="#">
          <i data-feather="credit-card"></i> <span>الصفوف الدراسية</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('classrooms.index')}}"><i class="ti-more"></i>قائمة الصفوف الدراسية</a></li>
          
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/grade')?'active':'' }}">
        <a href="#">
          <i data-feather="credit-card"></i> <span>الشعب الدراسية </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('Sections.index')}}"><i class="ti-more"></i>قائمة الشعب الدراسية</a></li>
          
        </ul>
      </li>

      <li class="treeview {{ ($prefix == '/students')?'active':'' }}">
        <a href="#">
          <i data-feather="hard-drive"></i> <span>إدارة الطلاب</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=""><i class="ti-more"></i>تسجيل الطلاب</a></li>
          <li><a href=""><i class="ti-more"></i>رسوم التسجيل </a></li>
          <li><a href=""><i class="ti-more"></i>الرسوم الشهرية </a></li>
          <li><a href=""><i class="ti-more"></i>رسوم الاختبارات </a></li>
        </ul>
      </li>
      <li class="treeview {{ ($prefix == '/employees')?'active':'' }}">
        <a href="#">
          <i data-feather="package"></i> <span>إدارة الموظفين</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=""><i class="ti-more"></i>تسجيل الموظفين</a></li>
          
        </ul>
      </li>
      <li class="treeview {{ ($prefix == '/marks')?'active':'' }}">
        <a href="#">
          <i data-feather="edit-2"></i> <span>إدارة العلامات</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=""><i class="ti-more"></i>تسجيل الطلاب</a></li>
          
        </ul>
      </li>
      <li class="treeview {{ ($prefix == '/accounts')?'active':'' }}">
        <a href="#">
          <i data-feather="inbox"></i> <span>الإدارة المالية</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=""><i class="ti-more"></i>تسجيل الطلاب</a></li>
          
        </ul>
      </li>

      <li class="header nav-small-cap">إدارة التقارير</li>	
      <li class="treeview {{ ($prefix == '/reports')?'active':'' }}">
        <a href="#">
          <i data-feather="server"></i></i> <span> التقارير</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          
        </ul>
      </li>
    </ul>
  </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
</aside>
