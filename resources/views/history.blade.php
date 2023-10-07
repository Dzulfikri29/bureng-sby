@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section>
        <div class="w-100 pt-80 black-layer pb-70 opc65 position-relative">
            <div class="fixed-bg" style="background-image: url({{ asset('assets/images/pattern-bg.jpg') }});"></div>
            <div class="container">
                <div class="page-title-wrap text-center w-100">
                    <div class="page-title-inner d-inline-block">
                        <h1 class="mb-0">Sejarah</h1>
                    </div>
                </div><!-- Page Title Wrap -->
            </div>
        </div>
    </section>
    <section>
        <div class="w-100 pt-120 pb-90 position-relative">
            <div class="container">
                <div class="about-wrap4 w-100">
                    <div class="row ">
                        <div class="col-md-12 col-sm-12 col-lg-7 order-lg-1">
                            <div class="about-video position-relative w-100">
                                <img class="img-fluid w-100" src="{{ asset('storage/' . $history->first_gallery->path) }}" alt="{{ $history->first_gallery->name }}">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-5">
                            <div class="about-inner4 w-100">
                                <span class="d-block thm-clr">Tentang Kami</span>
                                <h2 class="mb-0">Sejarang Bureng Surabaya</h2>
                                <p class="mb-0">{{ $history->header }}</p>
                            </div>
                        </div>
                    </div>
                </div><!-- About Wrap 4 -->
            </div>
        </div>
    </section>
    <section>
        <div class="w-100 pt-10 pb-260 position-relative">
            <img class="sec-botm-rgt-mckp img-fluid position-absolute" src="assets/images/sec-botm-mckp.png" alt="Sec Bottom Mockup">
            <div class="container">
                <div class="post-detail-wrap w-100">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="post-detail-inner w-100">
                                <div class="post-detail-desc position-relative w-100">
                                    {!! $history->body !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Post Detail Wrap -->
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        $('.history-menu').addClass('active');
    </script>
@endsection
