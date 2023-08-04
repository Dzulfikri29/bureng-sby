@php
    $general = App\Models\General::first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HW2GCQHLHL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-HW2GCQHLHL');
    </script>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') - {{ $general->website_name }}</title>
    @if (!($custom_meta ?? false))
        <meta name="description" content="{{ $general->meta_description }}">
        <meta name="keyword" content="{{ $general->meta_keywords }}">

        <!-- Google / Search Engine Tags -->
        <meta itemprop="name" content="{{ $general->website_name }}">
        <meta itemprop="description" content="{{ $general->meta_description }}">
        <meta itemprop="image" content="{{ asset('storage/' . $general->meta_image) }}">

        <!-- Facebook Meta Tags -->
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $general->website_name }}">
        <meta property="og:description" content="{{ $general->meta_description }}">
        <meta property="og:image" content="{{ asset('storage/' . $general->meta_image) }}">

        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $general->website_name }}">
        <meta name="twitter:description" content="{{ $general->meta_description }}">
        <meta name="twitter:image" content="{{ asset('storage/' . $general->meta_image) }}">
    @endif

    @yield('custom_meta')

    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/' . $general->browser_logo) }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/' . $general->browser_logo) }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/' . $general->browser_logo) }}" />
    <link rel="manifest" href="{{ asset('assets/images/favicons/site.webmanifest') }}" />

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
    <link rel="stylesheet" href="{{ asset('assets/css/agrion.css') }}?v=4" />
    <link rel="stylesheet" href="{{ asset('assets/css/agrion-responsive.css') }}?v=3" />

    @yield('css')
    <style>
        .preloader__image {
            background-image: url({{ asset('storage/' . $general->logo_short) }});
        }
    </style>

    <script>
        const base_url = '{{ url('') }}';
        const token = '{{ csrf_token() }}';
    </script>
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->

    <div class="page-wrapper">
        @include('layouts.header')

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        @yield('content')

        @if ($registration ?? true)
            <!--Cta One Start-->
            <section class="cta-one">
                <div class="cta-one__bg" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="cta-one__inner">
                                <div class="cta-one__left w-75">
                                    <div class="cta-one__icon">
                                        <span class="fa fa-book-reader"></span>
                                    </div>
                                    <h3 class="cta-one__title agrion-font w-75">{{ $general->training_registration }}
                                    </h3>
                                </div>
                                <div class="cta-one__right">
                                    <a href="{{ route('registration.index') }}" class="thm-btn cta-one__btn">Daftar <i class="icon-right-arrow"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Cta One End-->
        @endif

        <!--Site Footer Start-->
        @include('layouts.footer')
        <!--Site Footer End-->

    </div><!-- /.page-wrapper -->

    @include('layouts.mobile_nav')
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="{{ route('blog') }}">
                <label for="search" class="sr-only">Cari Disini</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Masukkan Kata Kunci" name="search" />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

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
