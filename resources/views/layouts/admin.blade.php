<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard V.1 | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('Admintle/img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('Admintle/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('Admintle/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('Admintle/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('Admintle/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('Admintle/css/owl.transitions.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('Admintle/css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('Admintle/css/normalize.css')}}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('Admintle/css/meanmenu.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('Admintle/css/main.css')}}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('Admintle/css/educate-custon-icon.css')}}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('Admintle/css/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('Admintle/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('Admintle/css/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admintle/css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('Admintle/css/calendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('Admintle/css/calendar/fullcalendar.print.min.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('Admintle/style.css')}}">
    <!-- dropzone CSS
		============================================ -->
        <link rel="stylesheet" href="{{asset('Admintle/css/dropzone/dropzone.css')}}">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('Admintle/css/form/all-type-forms.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('Admintle/css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    {{-- <script src="{{asset('Admintle/vendor/modernizr-2.8.3.min.js')}}"></script> --}}
    <link rel="stylesheet" href="{{asset('Admintle/css/modals.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('Admintle/css/bootstrap/bootstrap4.css')}}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
      <!-- buttons CSS
		============================================ -->
    <link rel="stylesheet" href="css/buttons.css">
    <!-- Chat_Room -->
    <link rel="stylesheet" type="text/css" href="{{asset('Commerce/assets/css/chat_room.css')}}">
    <!-- Zôm-image -->
    <link rel="stylesheet" type="text/css" href="{{asset('Admintle/css/zoom_img.css')}}">
    <script  src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    @livewireStyles
</head>

</head>
<body>
    @include('partial.admins.sidebar');
    <div class="all-content-wrapper">
        @include('partial.admins.header')
        {{$main}}
    </div>
    @livewireScripts
    <script>
        window.livewire.on('disable',()=>{
            toastr.success('Disable!');
        });
        window.livewire.on('enable',()=>{
            toastr.success('Enable!');
        });
        window.livewire.on('Edit_success',()=>{
            toastr.success('Edit Successfully!');
        });
        window.livewire.on('Add_success',()=>{
            toastr.success('Create Successfully!');
        });
    </script>
    <!-- jquery
		============================================ -->
        <script src="{{asset('Admintle/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <!-- bootstrap JS
            ============================================ -->
        <script src="{{asset('Admintle/js/bootstrap.min.js')}}"></script>
        <!-- wow JS
            ============================================ -->
        <script src="{{asset('Admintle/js/wow.min.js')}}"></script>
        <!-- price-slider JS
            ============================================ -->
        <script src="{{asset('Admintle/js/jquery-price-slider.js')}}"></script>
        <!-- meanmenu JS
            ============================================ -->
        <script src="{{asset('Admintle/js/jquery.meanmenu.js')}}"></script>
        <!-- owl.carousel JS
            ============================================ -->
        <script src="{{asset('Admintle/js/owl.carousel.min.js')}}"></script>
        <!-- sticky JS
            ============================================ -->
        <script src="{{asset('Admintle/js/jquery.sticky.js')}}"></script>
        <!-- scrollUp JS
            ============================================ -->
        <script src="{{asset('Admintle/js/jquery.scrollUp.min.js')}}"></script>
        <!-- counterup JS
            ============================================ -->
        <script src="{{asset('Admintle/js/counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('Admintle/js/counterup/waypoints.min.js')}}"></script>
        <script src="{{asset('Admintle/js/counterup/counterup-active.js')}}"></script>
        <!-- mCustomScrollbar JS
            ============================================ -->
        <script src="{{asset('Admintle/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script src="{{asset('Admintle/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
        <!-- metisMenu JS
            ============================================ -->
        <script src="{{asset('Admintle/js/metisMenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('Admintle/js/metisMenu/metisMenu-active.js')}}"></script>
        <!-- morrisjs JS
            ============================================ -->
        <script src="{{asset('Admintle/js/morrisjs/raphael-min.js')}}"></script>
        <script src="{{asset('Admintle/js/morrisjs/morris.js')}}"></script>
        <script src="{{asset('Admintle/js/morrisjs/morris-active.js')}}"></script>
        <!-- morrisjs JS
            ============================================ -->
        <script src="{{asset('Admintle/js/sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('Admintle/js/sparkline/sparkline-active.js')}}"></script>
        <!-- calendar JS
            ============================================ -->
        <script src="{{asset('Admintle/js/calendar/moment.min.js')}}"></script>
        <script src="{{asset('Admintle/js/calendar/fullcalendar.min.js')}}"></script>
        <script src="{{asset('Admintle/js/calendar/fullcalendar-active.js')}}"></script>
        <!-- plugins JS
            ============================================ -->
        <script src="{{asset('Admintle/js/plugins.js')}}"></script>
        <!-- tab JS
		============================================ -->
        <script src="{{asset('Admintle/js/tab.js')}}"></script>
        <!-- main JS
            ============================================ -->
        <script src="{{asset('Admintle/js/main.js')}}"></script>
        <!-- tawk chat JS
            ============================================ -->
        <script src="{{asset('Admintle/js/tawk-chat.js')}}"></script>

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
</body>
</html>
