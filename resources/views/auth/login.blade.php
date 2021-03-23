<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('Commerce/assets/images/favicon.ico')}}">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('Commerce/assets/css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Commerce/assets/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Commerce/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Commerce/assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Commerce/assets/css/chosen.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Commerce/assets/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Commerce/assets/css/color-01.css')}}">
</head>
<body class="home-page home-01 ">

	<!-- mobile menu -->
    @include('partial.mobile_menu')

	<!--header-->
	@include('partial.header')

	<!--main area-->
	<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>login</span></li>
				</ul>
			</div>
            <div>
                @if (Session::has('check_login'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>{{Session::get('check_login')}}</strong>
                    </div>

                    <script>
                      $(".alert").alert();
                    </script>
                @endif
            </div>
            <h4 class="pb-4 text-muted text-center">Welcome to the newshop !</h4>
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif
					<div class=" main-content-area">
						<div class="wrap-login-item ">
							<div class="login-form form-item form-stl">
								<form name="frm-login" method="POST" action="{{ route('login') }}">
									@csrf
									<fieldset class="wrap-title">
										<h3 class="form-title">Log in to your account</h3>
									</fieldset>
									<fieldset class="wrap-input">
										<label for="email" value="{{ __('Email') }}" >Email Address:</label>
										<input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="Type your email address">
									</fieldset>
									<fieldset class="wrap-input">
										<label for="password" value="{{ __('Password') }}">Password:</label>
										<input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Enter Your Password">
									</fieldset>

									<fieldset class="wrap-input">
										<label class="remember-field" for="remember_me">
											<input class="frm-input "id="remember_me" name="remember" value="forever" type="checkbox">
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
										</label>
                                         @if (Route::has('password.request'))
                                            <a class="link-function left-position" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
									</fieldset>
                                    <button type="submit" class="btn btn-submit">{{ __('Login') }}</button>
								</form>
							</div>
						</div>

					</div><!--end main products area-->
				</div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 col-md-offset-3">
                    <p class="text-muted">Or you can login with</p>
					<div class="card card-lg bg-facebook text-white">
                        <a href="" class="text-light" ><div class="card-body"><span><img width="50" height="50" src="{{asset('Commerce/assets/images/icon/logo_facebook.png')}}" alt="" > Facebook</span></div></a>
                    </div>
                    <br>
                    <div class="card bg-google text-white">
                        <a href="" class="text-light" ><div class="card-body"><span><img width="50" height="50" src="{{asset('Commerce/assets/images/icon/logo_google.png')}}" alt="" > Google+</span></div></a>
                    </div>
				</div>
			</div><!--end row-->

		</div><!--end container-->

	</main>
	<!--main area-->

	<!--footer area-->
	@include('partial.footter')

	<script src="{{asset('Commerce/assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('Commerce/assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('Commerce/assets/js/chosen.jquery.min.js')}}"></script>
	<script src="{{asset('Commerce/assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('Commerce/assets/js/jquery.sticky.js')}}"></script>
	<script src="{{asset('Commerce/assets/js/functions.js')}}"></script>
	<!--footer area-->
</body>
</html>
