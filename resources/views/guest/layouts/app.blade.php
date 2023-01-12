<!DOCTYPE html>
<html lang="eng">
    <head>
        <title>Karimun</title>
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-W8R82G7DJW"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-W8R82G7DJW');
        </script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale-1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

        {{-- guest CSS --}}
        <link href="{{ asset('guest') }}/css/open-iconic-bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('guest') }}/css/animate.css" rel="stylesheet">
        <link href="{{ asset('guest') }}/css/owl.carousel.min.css" rel="stylesheet">
        <link href="{{ asset('guest') }}/css/owl.theme.default.min.css" rel="stylesheet">
        <link href="{{ asset('guest') }}/css/magnific.popup.css" rel="stylesheet">
        <link href="{{ asset('guest') }}/css/aos.css" rel="stylesheet">
        <link href="{{ asset('guest') }}/css/ionicons.min.css" rel="stylesheet">
        <link href="{{ asset('guest') }}/css/bootstrap-datepicker.css" rel="stylesheet">
        <link href="{{ asset('guest') }}/css/jquery.timepicker.min.css" rel="stylesheet">
        <link href="{{ asset('guest') }}/css/flaticon.css" rel="stylesheet">
        <link href="{{ asset('guest') }}/css/icomoon.css" rel="stylesheet">
        <link href="{{ asset('guest') }}/css/wonderful-indonesia.css" rel="stylesheet">
        <link href="{{ asset('guest') }}/css/wonderful-indonesia-revamp.css" rel="stylesheet">
        <link href="{{ asset('guest') }}/css/style.css" rel="stylesheet">
        <link href="{{ asset('guest') }}/css/custom-style.css" rel="stylesheet">
    </head>

    <body>
        <div class="main-content">
            @include('guest.layouts.navs')
            @yield('content')
            @include('guest.layouts.footer')
        </div>

        {{-- guest JS --}}
        <script src="{{ asset('guest') }}/js/jquery.min.js"></script>
        <script src="{{ asset('guest') }}/js/jquery-migrate-3.0.1.min.js"></script>
        <script src="{{ asset('guest') }}/js/popper.min.js"></script>
        <script src="{{ asset('guest') }}/js/bootstrap.min.js"></script>
        <script src="{{ asset('guest') }}/js/jquery.easing.1.3.js"></script>
        <script src="{{ asset('guest') }}/js/jquery.waypoints.min.js"></script>
        <script src="{{ asset('guest') }}/js/jquery.stellar.min.js"></script>
        <script src="{{ asset('guest') }}/js/owl.carousel.min.js"></script>
        <script src="{{ asset('guest') }}/js/jquery.magnific-popup.min.js"></script>
        <script src="{{ asset('guest') }}/js/aos.js"></script>
        <script src="{{ asset('guest') }}/js/jquery.animateNumber.min.js"></script>
        <script src="{{ asset('guest') }}/js/bootstrap-datepicker.js"></script>
        <script src="{{ asset('guest') }}/js/jquery.timepicker.min.js"></script>
        <script src="{{ asset('guest') }}/js/scrollax.min.js"></script>
        <script src="{{ asset('guest') }}/js/google-map.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="{{ asset('guest') }}/js/main.js"></script>
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-xxxxxxxx-x']);
            _gaq.push(['_setDomainName', 'none']);
            _gaq.push(['_setAllowLinker', 'true']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </body>
</html>
