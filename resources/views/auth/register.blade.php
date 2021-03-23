<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
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
					<li class="item-link"><span>Register</span></li>
				</ul>
			</div>
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
					<div class=" main-content-area">
						<div class="wrap-login-item ">
							<div class="register-form form-item ">
								<form class="form-stl" method="POST" action="{{ route('register') }}" >
                                    @csrf
									<fieldset class="wrap-title">
										<h3 class="form-title">Create an account</h3>
										<h4 class="form-subtitle">Personal infomation</h4>
									</fieldset>
									<fieldset class="wrap-input">
										<label for="name" value="{{ __('Name') }}">Name*</label>
										<input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Last name*">
									</fieldset>
									<fieldset class="wrap-input">
										<label for="email" value="{{ __('Email') }}">Email Address*</label>
										<input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="Email address">
									</fieldset>
									<fieldset class="wrap-functions ">
										<label class="remember-field">
											<input name="newletter" id="new-letter" value="forever" type="checkbox"><span>Sign Up for Newsletter</span>
										</label>
									</fieldset>
									<fieldset class="wrap-title">
										<h3 class="form-title">Login Information</h3>
									</fieldset>
									<fieldset class="wrap-input item-width-in-half left-item ">
										<label for="password" value="{{ __('Password') }}">Password *</label>
										<input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Password">
									</fieldset>
									<fieldset class="wrap-input item-width-in-half ">
										<label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm Password *</label>
										<input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
									</fieldset>
                                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                        <div class="mt-4">
                                            <x-jet-label for="terms">
                                                <div class="flex items-center">
                                                    <x-jet-checkbox name="terms" id="terms"/>

                                                    <div class="ml-2">
                                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                        ]) !!}
                                                    </div>
                                                </div>
                                            </x-jet-label>
                                        </div>
                                        @endif
                                        <button  type="submit" class="btn btn-sign">{{ __('Register') }}</button>
								</form>
							</div>
						</div>
					</div><!--end main products area-->
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
