<!DOCTYPE html>
<html lang="eng">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale-1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

        {{-- guest CSS --}}
        <link href="{{ asset('resources') }}/css/animate.css" rel="stylesheet">
        <link href="{{ asset('resources') }}/css/aos.css" rel="stylesheet">
        <link href="{{ asset('resources') }}/css/flaticon.css" rel="stylesheet">
        <link href="{{ asset('resources') }}/css/icomoon.css" rel="stylesheet">
        <link href="{{ asset('resources') }}/css/ionicons.min.css" rel="stylesheet">
        <link href="{{ asset('resources') }}/css/magnific.popup.css" rel="stylesheet">
        <link href="{{ asset('resources') }}/css/open-iconic-bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('resources') }}/css/owl.carousel.min.css" rel="stylesheet">
        <link href="{{ asset('resources') }}/css/owl.theme.default.min.css" rel="stylesheet">
        <link href="{{ asset('resources') }}/css/style.css" rel="stylesheet">
    </head>

    <body>
        @guest()
            @include('guest.layouts.navs')
            @yield('content')
            @include('guest.layouts.footer')
        @endguest

        {{-- guest JS --}}
        <script src="{{ asset('resources') }}/guest/js/aos.js"></script>
        <script src="{{ asset('resources') }}/guest/js/bootstrap-datepicker.js"></script>
        <script src="{{ asset('resources') }}/guest/js/bootstrap.min.js"></script>
        <script src="{{ asset('resources') }}/guest/js/google-map.js"></script>
        <script src="{{ asset('resources') }}/guest/js/jquery-migrate-3.0.1.min.js"></script>
        <script src="{{ asset('resources') }}/guest/js/jquery-animateNumber.js"></script>
        <script src="{{ asset('resources') }}/guest/js/jquery.easing.1.3.js"></script>
        <script src="{{ asset('resources') }}/guest/js/jquery.magnific-popup.min.js"></script>
        <script src="{{ asset('resources') }}/guest/js/jquery.min.js"></script>
        <script src="{{ asset('resources') }}/guest/js/jquery.stellar.min.js"></script>
        <script src="{{ asset('resources') }}/guest/js/jquery.waypoint.min.js"></script>
        <script src="{{ asset('resources') }}/guest/js/main.js"></script>
        <script src="{{ asset('resources') }}/guest/js/owl.carousel.min.js"></script>
        <script src="{{ asset('resources') }}/guest/js/popper.min.js"></script>
        <script src="{{ asset('resources') }}/guest/js/scrollax.min.js"></script>
    </body>
</html>