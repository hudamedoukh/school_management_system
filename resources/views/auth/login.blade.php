<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<title>تسجيل الدخول</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('theme/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('theme/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('theme/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('theme/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('theme/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('theme/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('theme/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('theme/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('theme/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('theme/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('theme/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="POST" action="{{ route('login') }}" class="login100-form validate-form" >
					@csrf
					@if($type == 'student')
						<h3 class="mb-30 text-info text-center">تسجيل دخول طالب</h3>
					@elseif($type == 'parent')
						<h3 class="mb-30 text-info text-center">تسجيل دخول ولي أمر</h3>
					@elseif($type == 'teacher')
						<h3 class="mb-30 text-info text-center">تسجيل دخول معلم</h3>
					@else
						<h3 class="mb-30 text-info text-center">تسجيل دخول آدمن</h3>
					@endif
<h1>@if(Session::has('error')){{ Session::get ('error') }} @endif</h1>

					<div class="wrap-input100 validate-input mt-5" data-validate = "Valid email is required: ex@abc.xyz">
						<input type="hidden" value="{{$type}}" name="type">
						<input class="input100" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						<span class="focus-input100"></span>
						<span class="label-input100">البريد الالكتروني</span>
						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
                        @enderror
					</div>


					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
						<span class="focus-input100"></span>
						<span class="label-input100">كلمة المرور</span>
						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
							<label class="label-checkbox100" for="remember">
								تذكرني
							</label>

						</div>

						<div>
							{{-- <a href="#" class="txt1">
								Forgot Password?
							</a> --}}
							@if (Route::has('password.request'))
								<a class="btn btn-link" href="{{ route('password.request') }}">
									هل نسيت كلمة المرور؟
								</a>
                            @endif
						</div>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							تسجيل الدخول
						</button>
					</div>

					<div class="text-center p-t-46 p-b-20">

						@if (Route::has('register'))
						<span class="txt2">
							<a class="nav-link" href="{{ route('register') }}">أو تسجيل حساب جديد </a>
						</span>

                        @endif
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('{{ asset('theme/images/bg-01.jpg')}}');">
				</div>
			</div>
		</div>
	</div>





<!--===============================================================================================-->
	<script src="{{asset('theme/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('theme/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('theme/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('theme/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('theme/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('theme/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('theme/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('theme/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('theme/js/main.js')}}"></script>

</body>
</html>
