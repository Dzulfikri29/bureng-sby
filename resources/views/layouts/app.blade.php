@php
    $general = App\Models\General::first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
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

    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.bootstrap-touchspin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/color.css') }}">

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

<body>
    <main>
        <div id="preloader">
            <div class="preloader-inner">
                <i class="preloader-icon thm-clr flaticon-kaaba"></i>
            </div>
        </div><!-- Page Loader -->
        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')
    </main><!-- Main Wrapper -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/musicplayer-min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-scripts.js') }}"></script>
    <script>
        get_pray_time();

        function get_pray_time() {
            $.ajax({
                url: "https://api.myquran.com/v1/sholat/jadwal/1638/{{ date('Y/m/d') }}",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#imsak').html(data.data.jadwal.imsak + " WIB")
                    $('#subuh').html(data.data.jadwal.subuh + " WIB")
                    $('#terbit').html(data.data.jadwal.terbit + " WIB")
                    $('#terbit-header').html(data.data.jadwal.terbit + " WIB")
                    $('#dhuha').html(data.data.jadwal.dhuha + " WIB")
                    $('#dzuhur').html(data.data.jadwal.dzuhur + " WIB")
                    $('#ashar').html(data.data.jadwal.ashar + " WIB")
                    $('#maghrib').html(data.data.jadwal.maghrib + " WIB")
                    $('#maghrib-header').html(data.data.jadwal.maghrib + " WIB")
                    $('#isya').html(data.data.jadwal.isya + " WIB")
                }
            });
        }
    </script>
    @yield('js')
</body>

</html>
