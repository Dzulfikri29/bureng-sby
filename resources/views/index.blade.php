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
    <link rel="stylesheet" href="{{ asset('assets/css/agrion.css') }}?v=1" />
    <link rel="stylesheet" href="{{ asset('assets/css/agrion-responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/slick/slick-theme.css') }}">

    <style>
        .preloader__image {
            background-image: url({{ asset('storage/' . $general->logo_short) }});
        }
    </style>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-216187213-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-216187213-1');
    </script>

    <script>
        const base_url = '{{ url('') }}';
        const token = '{{ csrf_token() }}';
    </script>
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->

    <div class="page-wrapper px-3" style="background-size: cover !important;background: linear-gradient(to right, #1a5305b5, #1a5305b5),url({{ asset('storage/' . ($background_utama->images[0]->path ?? '')) }})">
        <div class="main-menu-wrapper container-fluid d-flex vh-100  flex-column justify-content-between pt-5">
            <div class="row justify-content-center align-content-center align-items-center">
                <div class="col-md-6 dekstop-view">
                    <div class="px-3 container">
                        <div class="sidebar__single sidebar__search mb-3">
                            <form action="{{ route('blog') }}" class="sidebar__search-form">
                                <input type="search" class="bg-white" placeholder="Cari Berita" id="search" name="search">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </form>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span>
                                <h4 class="agrion-font text-white">Berita Terbaru</h4>
                                <small class="text-white">Menampilkan {{ count($blogs) }} berita terbaru</small>
                            </span>
                            <small><a href="{{ route('blog') }}" class="text-warning">Tampilkan Semua</a></small>
                        </div>
                        <div class="blog-carousel">
                            @foreach ($blogs as $blog)
                                <div>
                                    <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}">
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="" class="w-100 rounded">
                                        <h5 class="text-white text-center agrion-font mt-2">{{ $blog->title }}</h5>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-4">
                                <div class="card mb-2">
                                    <div class="card-body py-2 text-end">
                                        <span>Total Pengunjung</span>
                                        <h4 class="agrion-font total-users"></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-2">
                                    <div class="card-body py-2 text-end">
                                        <span>Rata Rata Durasi</span>
                                        <h4 class="agrion-font total-durations"></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-2">
                                    <div class="card-body py-2 text-end">
                                        <span>Tampilan halaman</span>
                                        <h4 class="agrion-font total-pageviews"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 dekstop-view"></div>
                <div class="col-md-5">
                    <div class="col-md-12 text-center mb-2">
                        <img src="{{ asset('storage/' . $general->logo_short) }}" alt="" srcset="" width="100" class="mb-2">
                        <h2 class="agrion-font text-uppercase text-white">{{ $general->website_name }}</h2>
                        <h4 class="agrion-font text-capitalize text-white">Lingkungan Peternakan Sapi Terintegrasi</h4>
                        <div class="main-menu-tagline mt-2 mx-auto">
                            <p class="text-center text-white">{{ $general->tagline }}</p>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="row justify-content-center align-content-center">
                            <div class="col-md-4 col-sm-6 col-xs-6 mb-3">
                                <a href="{{ route('registration.index') }}" class="card-main-menu h-100 card my-1" target="_blank" style="background: linear-gradient(to top,#fcc850, #fcc850), url({{ asset('storage/' . ($background_menu->images[0]->path ?? '')) }})">
                                    <div class="card-body py-3 px-3">
                                        <div class="d-flex justify-content-between align-items-end h-100 pt-2">
                                            <p class="mt-2 section-title__tagline text-start">Edufarm <br> Literasi</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6 mb-3">
                                <a href="{{ route('profile') }}" class="card-main-menu h-100 card my-1" target="_blank" style="background: linear-gradient(to top,#fcc850, #fcc850), url({{ asset('storage/' . ($background_menu->images[1]->path ?? '')) }})">
                                    <div class="card-body py-3 px-3">
                                        <div class="d-flex justify-content-between align-items-end h-100 pt-2">
                                            <p class="mt-2 section-title__tagline">Profil Literasi</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6 mb-3">
                                <a href="{{ route('product') }}" class="card-main-menu h-100 card my-1" target="_blank" style="background: linear-gradient(to top,#fcc850, #fcc850), url({{ asset('storage/' . ($background_menu->images[2]->path ?? '')) }})">
                                    <div class="card-body py-3 px-3">
                                        <div class="d-flex justify-content-between align-items-end h-100 pt-2">
                                            <p class="mt-2 section-title__tagline">Produk Literasi</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-12"></div>
                            <div class="col-md-4 col-sm-6 col-xs-6 mb-3">
                                <a href="{{ route('activity') }}" class="card-main-menu h-100 card my-1" target="_blank" style="background: linear-gradient(to top,#fcc850, #fcc850), url({{ asset('storage/' . ($background_menu->images[3]->path ?? '')) }})">
                                    <div class="card-body py-3 px-3">
                                        <div class="d-flex justify-content-between align-items-end h-100 pt-2">
                                            <p class="mt-2 section-title__tagline text-start">Dokumentasi <br> Kegiatan</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6 mb-3">
                                <a href="javascript:;" class="card-main-menu h-100 card my-1" style="background: linear-gradient(to top,#fcc850, #fcc850), url({{ asset('storage/' . ($background_menu->images[4]->path ?? '')) }})">
                                    <div class="card-body py-3 px-3">
                                        <div class="d-flex justify-content-between align-items-end h-100 pt-2">
                                            <p class="mt-2 section-title__tagline">360 Tour</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="col-md-4 col-sm-6 col-xs-6 mb-3">
                                <a href="{{ route('tutorial') }}" class="card-main-menu h-100 card my-1" target="_blank" style="background: linear-gradient(to top,#fcc850, #fcc850), url({{ asset('storage/' . ($background_menu->images[5]->path ?? '')) }})">
                                    <div class="card-body py-3 px-3">
                                        <div class="d-flex justify-content-between align-items-end h-100 pt-2">
                                            <p class="mt-2 section-title__tagline">E-Learning</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 mobile-view"></div>
                <div class="col-md-6 mobile-view">
                    <div class="px-3 container">
                        <div class="sidebar__single sidebar__search mt-5 mb-3">
                            <form action="{{ route('blog') }}" class="sidebar__search-form">
                                <input type="search" class="bg-white" placeholder="Cari Berita" id="search" name="search">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </form>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span>
                                <h4 class="agrion-font text-white">Berita Terbaru</h4>
                                <small class="text-white">Menampilkan {{ count($blogs) }} berita terbaru</small>
                            </span>
                            <small><a href="{{ route('blog') }}" class="text-warning">Tampilkan Semua</a></small>
                        </div>
                        <div class="blog-carousel">
                            @foreach ($blogs as $blog)
                                <div>
                                    <a href="{{ route('blog.show', ['slug' => $blog->slug]) }}">
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="" class="w-100 rounded">
                                        <h5 class="text-white text-center agrion-font mt-2">{{ $blog->title }}</h5>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-4">
                                <div class="card mb-2">
                                    <div class="card-body py-2 text-end">
                                        <span>Total Pengunjung</span>
                                        <h4 class="agrion-font total-users"></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-2">
                                    <div class="card-body py-2 text-end">
                                        <span>Rata Rata Durasi</span>
                                        <h4 class="agrion-font total-durations"></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-2">
                                    <div class="card-body py-2 text-end">
                                        <span>Tampilan halaman</span>
                                        <h4 class="agrion-font total-pageviews"></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center text-white py-3">
                <p>© Copyright {{ date('Y') }} <a href="#" class="text-white">{{ $general->website_name }}</a></p>
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
    <script src="{{ asset('assets/vendors/slick/slick.js') }}"></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>
    @yield('js')

    <script>
        $(document).ready(function() {
            $('.blog-carousel').slick({
                dots: true,
                infinite: true,
                speed: 300,
                autoplay: true,
                slidesToShow: 1,
                adaptiveHeight: true
            });

            get_analytics();
        })
    </script>
</body>

</html>
