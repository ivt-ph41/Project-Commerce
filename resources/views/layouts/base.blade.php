<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    <!--Select Images-->
     <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    @livewireStyles
</head>
<body class="home-page home-01 ">

	<!-- mobile menu -->
    @include('partial.mobile_menu')

	<!--header-->
	@include('partial.header')

    {{$slot}}

    <!--footter-->
	@include('partial.footter')
    @livewireScripts
    <script>
        window.livewire.on('cart',()=>{
            toastr.success('The product has been added to cart');
        })
        window.livewire.on('mail',()=>{
            toastr.success('Your response has been saved');
        });
        window.livewire.on('status_order',()=>{
            toastr.warning('You cannot cancel an order while it is being shipped');
        });
        window.livewire.on('modal',()=>{
            $('#modelAddress').modal('hide');
        });
        window.livewire.on('thankyou',()=>{
            Swal.fire(
                'Thankyou!',
                'Please continue to buy!',
                'success',
            )
        });
        window.livewire.on('info',()=>{
            Swal.fire(
                'can not pay!',
                'Please set up your delivery information!',
                'error',
            )
        })
        window.livewire.on('info',()=>{
            Swal.fire(
                'can not pay!',
                'Please set up your delivery information!',
                'error',
            )
        });
        window.livewire.on('cart_empty',()=>{
            Swal.fire(
                'can not pay!',
                'You do not have products to pay!',
                'error',
            )
        });
    </script>
	<script src="{{asset('Commerce/assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('Commerce/assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('Commerce/assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('Commerce/assets/js/jquery.flexslider.js')}}"></script>
	<script src="{{asset('Commerce/assets/js/chosen.jquery.min.js')}}"></script>
	<script src="{{asset('Commerce/assets/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('Commerce/assets/js/jquery.countdown.min.js')}}"></script>
	<script src="{{asset('Commerce/assets/js/jquery.sticky.js')}}"></script>
	<script src="{{asset('Commerce/assets/js/functions.js')}}"></script>
    <script src="{{asset('Commerce/assets/js/shop.js')}}"></script>
    <script src="{{asset('Commerce/assets/js/admin.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>


    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Select images -->
    <script src="{{asset('Commerce/assets/js/sweetalert.js')}}"></script>
</body>
</html>
