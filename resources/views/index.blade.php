@php
    $general = App\Models\General::first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - {{ $general->website_name }}</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/' . $general->browser_logo) }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/' . $general->browser_logo) }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/' . $general->browser_logo) }}" />
    <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest') }}" />
    <meta name="description" content="Agrion HTML 5 Template " />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/agrion-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/reey-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/vegas/vegas.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/timepicker/timePicker.css') }}" />

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/agrion.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/agrion-responsive.css') }}" />

    <style>
        .preloader__image {
            background-image: url({{ asset('storage/' . $general->logo_short) }});
        }
    </style>
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->

    <div class="page-wrapper">
        <div class="main-menu-wrapper container d-flex  flex-column  vh-100 justify-content-between pt-5">
            <div class="row justify-content-center align-content-center  align-items-center">
                <div class="col-md-12 text-center mb-5">
                    <img src="{{ asset('storage/' . $general->logo_short) }}" alt="" srcset="" width="150" class="mb-2">
                    <h2 class="agrion-font text-uppercase">{{ $general->website_name }}</h2>
                    <div class="main-menu-tagline m-auto">
                        <p class="text-center ">{{ $general->tagline }}</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <a href="{{ route('profile') }}" class="card-main-menu card my-1" target="_blank">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2><i class="text-success fa fa-info-circle"></i></h2>
                                <p class="section-title__tagline">Profil</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <a href="{{ route('structure') }}" class="card-main-menu card my-1" target="_blank">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2><i class="text-success fa fa-sitemap"></i></h2>
                                <p class="section-title__tagline">Struktur</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <a href="{{ route('product') }}" class="card-main-menu card my-1" target="_blank">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2><i class="text-success fa fa-shopping-basket"></i></h2>
                                <p class="section-title__tagline">Produk</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <a href="{{ route('activity') }}" class="card-main-menu card my-1" target="_blank">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2><i class="text-success fa fa-chalkboard-teacher"></i></h2>
                                <p class="section-title__tagline">Kegiatan</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <a href="{{ route('blog') }}" class="card-main-menu card my-1" target="_blank">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2><i class="text-success fa fa-rss"></i></h2>
                                <p class="section-title__tagline">Blog</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="text-center py-3">
                <p>© Copyright {{ date('Y') }} <a href="#">{{ $general->website_name }}</a></p>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('assets/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('assets/vendors/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/vegas/vegas.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/vendors/timepicker/timePicker.js') }}"></script>
    <script src="{{ asset('assets/vendors/circleType/jquery.circleType.js') }}"></script>
    <script src="{{ asset('assets/vendors/circleType/jquery.lettering.min.js') }}"></script>
    <!-- template js -->
    <script src="{{ asset('assets/js/agrion.js') }}"></script>
    @yield('js')
</body>

</html>
