<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
    <style>
        input[type='radio']{
            display:none;
        }
        body {
  font-family: sans-serif;
  background-color: #eeeeee;
}

.file-upload {
  background-color: #ffffff;
  width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 20%;
  margin: 0;
  color: #fff;
  background: #1FB264;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 10px;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #1FB264;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #15824B;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 100px;
  margin: auto;
  padding: 20px;
}

    </style>
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
    {{-- zoom imge --}}
    <link rel="stylesheet" type="text/css" href="{{asset('Commerce/assets/css/zoom_image.css')}}">
    <!-- Chat_Room -->
    <link rel="stylesheet" type="text/css" href="{{asset('Commerce/assets/css/chat_room.css')}}">
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
        window.livewire.on('wishlist_success',()=>{
            toastr.success('added products to your favorites list');
        });
        window.livewire.on('check_quantity',()=>{
            toastr.warning('The current product is in insufficient quantity');
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
        window.livewire.on('voucher',()=>{
            Swal.fire(
                'Received the code successfully!',
                'Please go to the voucher page for details!',
                'success',
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

    <script src="{{asset('Commerce/assets/js/multizoom.js')}}"></script>
</body>
</html>
