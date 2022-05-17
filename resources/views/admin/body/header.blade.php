<header class="main-header">
    <!-- Header Navbar -->
	<nav class="navbar navbar-static-top pl-30">
		<!-- Sidebar toggle button-->
		<div>
			<ul class="nav">
				<li class="btn-group nav-item">
					<a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
						<i class="nav-link-icon mdi mdi-menu"></i>
					</a>
				</li>
				<li class="btn-group nav-item">
					<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="شاشة كاملة">
						<i class="nav-link-icon mdi mdi-crop-free"></i>
					</a>
				</li>			
				<li class="btn-group nav-item d-none d-xl-inline-block">
					<a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="">
						<i class="ti-check-box"></i>
					</a>
				</li>
				<li class="btn-group nav-item d-none d-xl-inline-block">
					<a href="calendar.html" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="">
						<i class="ti-calendar"></i>
					</a>
				</li>
			</ul>
		</div>
		
		<div class="navbar-custom-menu r-side">
			<ul class="nav navbar-nav">
				<!-- full Screen -->
				<li class="search-bar">		  
					<div class="lookup lookup-circle lookup-right">
						<input type="text" name="search">
					</div>
				</li>			
				<!-- Notifications -->
				<li class="dropdown notifications-menu">
					<a href="#" class="waves-effect waves-light rounded dropdown-toggle" data-toggle="dropdown" title="Notifications">
						<i class="ti-bell"></i>
					</a>
				<ul class="dropdown-menu animated bounceIn">
					<li class="header">
						<div class="p-20">
							<div class="flexbox">
								<div>
									<h4 class="mb-0 mt-0">الإشعارات</h4>
								</div>
								<div>
									<a href="#" class="text-danger">حذف الكل</a>
								</div>
							</div>
						</div>
					</li>

					<li>
						<!-- inner menu: contains the actual data -->
						<ul class="menu sm-scrol">
							<li>
								<a href="#">
									<i class="fa fa-users text-info"></i> مجرد نص
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-user text-primary"></i> مجرد نص
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-user text-success"></i> مجرد نص
								</a>
							</li>
						</ul>
					</li>
					<li class="footer">
						<a href="#">عرض الكل</a>
					</li>
				</ul>
				
				@php
				$user = DB::table('users')->where('id',Auth::user()->id)->first();
				@endphp	
				<!-- User Account-->
				<li class="dropdown user user-menu">	
					<a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
						<img class="rounded-circle"
							src="{{ (!empty($user->image))?url('upload/user_images/'.$user->image):url('upload/user.jpg') }} " alt="User Avatar">
					</a>
					<ul class="dropdown-menu animated flipInX ">
						<li class="user-body">
							<a class="dropdown-item" href=""><i class="ti-user text-muted mr-2"></i> الملف الشخصي</a>
							<a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i> الاعدادات</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
								
								<i class="ti-lock text-muted mr-2"></i> 
								تسجيل الخروج
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</li>
					</ul>
				</li>			
			</ul>
		</div>
	</nav>
</header>