<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<title>تسجيل حساب جديد</title>
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
				<form method="POST" action="{{ route('register') }}" class="login100-form validate-form" >
					@csrf
					<span class="login100-form-title p-b-43">
                        تسجيل حساب جديد
					</span>
					
                    <div class="wrap-input100 validate-input" data-validate = "Valid name is required">
						<input class="input100" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
						<span class="focus-input100"></span>
						<span class="label-input100">اسم المستخدم</span>
						@error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
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

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
						<span class="focus-input100"></span>
						<span class="label-input100"> تأكيد كلمة المرور</span>						
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							تسجيل 
						</button>
					</div>					
					
				</form>

				<div class="login100-more" style="background-image: url('theme/images/bg-01.jpg');">
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