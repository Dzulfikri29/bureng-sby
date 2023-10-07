@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section>
        <div class="w-100 position-relative">
            <div class="feat-wrap v1 text-center position-relative w-100">
                <div class="feat-caro">
                    @foreach ($banner_news as $news_data)
                        <div class="feat-item">
                            <div class="feat-img position-absolute" style="background-image: url({{ asset('storage/' . $news_data->gallery->path) }});"></div>
                            <div class="feat-cap-wrap position-absolute d-inline-block">
                                <div class="feat-cap d-inline-block">
                                    <i class="d-inline-block flaticon-rub-el-hizb thm-clr"></i>
                                    <h2 class="mb-0">{{ $news_data->name }}</h2>
                                    <p class="mb-0">{{ Str::limit(strip_tags($news_data->body), 100, '...') }}</p>
                                    @if ($news_data->type == 'news')
                                        <a class="thm-btn thm-bg" href="{{ route('news-detail', ['slug' => $news_data->slug]) }}" title="">Selengkapnya<span></span><span></span><span></span><span></span></a>
                                    @else
                                        <a class="thm-btn thm-bg" href="{{ route('activity-detail', ['slug' => $news_data->slug]) }}" title="">Selengkapnya<span></span><span></span><span></span><span></span></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div><!-- Featured Area Wrap -->
        </div>
    </section>
    <section>
        <div class="w-100 thm-layer opc7 position-relative">
            <div class="fixed-bg patern-bg back-blend-multiply thm-bg" style="background-image: url(assets/images/pattern-bg.jpg);"></div>
            <div class="container">
                <div class="plyr-cont-wrap w-100">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-sm-6 col-lg-8">
                            <div class="cont-info w-100">
                                <ul class="cont-info-list d-flex flex-wrap mb-0 list-unstyled w-100">
                                    <li><span class="thm-bg"><i class="fas fa-phone-alt"></i></span><a href="tel:{{ $general->phone }}">{{ $general->phone }}</a></li>
                                    </li>
                                    <li><span class="thm-bg"><i class="far fa-envelope"></i></span><a href="mailto:{{ $general->email }}" title="">{{ $general->email }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- Player & Contact Wrap -->
            </div>
        </div>
    </section>
    <section>
        <div class="w-100 pt-90 pb-80 position-relative">
            <img class="img-fluid sec-top-mckp position-absolute" src="assets/images/sec-top-mckp.png" alt="Sec Top Mockup">
            <div class="container">
                <div class="about-wrap text-center position-relative w-100">
                    <div class="about-inner d-inline-block">
                        <img class="img-fluid" src="assets/images/bism-img1.png" alt="Bismillah Image">
                        <h2 class="mb-0">Selamat Datang</h2>
                        <p class="mb-0">{{ $history->header }}</p>
                        <a class="thm-btn thm-bg" href="{{ route('history') }}" title="">Selengkapnya<span></span><span></span><span></span><span></span></a>
                    </div>
                </div><!-- About Wrap -->
            </div>
        </div>
    </section>
    <section>
        <div class="w-100 pb-50 position-relative">
            <div class="container">
                <div class="sec-title text-center w-100">
                    <div class="sec-title-inner d-inline-block">
                        <i class="thm-clr flaticon-rub-el-hizb"></i>
                        <h2 class="mb-0">Pohon Keluarga</h2>
                        <p class="mb-0">Adipiscing elit duis volutpat ligula nulla dapibus.</p>
                    </div>
                </div><!-- Sec Title -->
                <div class="serv-wrap wide-sec">
                    <div class="row mrg10 serv-caro">
                        @foreach ($families as $family)
                            <div class="col-md-4 col-sm-6 col-lg-3">
                                <div class="serv-box text-center pat-bg gray-layer opc85 position-relative back-blend-multiply gray-bg w-100" style="background-image: url(assets/images/pattern-bg.jpg);">
                                    <h3 class="mb-0">{{ $family->name }}</h3>
                                    <p class="mb-0">{{ Str::limit(strip_tags($family->profile), 50, '...') }}</p>
                                    <a href="{{ route('family-detail', ['id' => $family->id]) }}" title="">Selengkapnya</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!-- Services Wrap -->
            </div>
        </div>
    </section>
    <section>
        <div class="w-100 pt-90 pb-80 position-relative">
            <img class="img-fluid sec-top-mckp position-absolute" src="assets/images/sec-top-mckp2.png" alt="Sec Top Mockup 2">
            <div class="container">
                <div class="sec-title text-center w-100">
                    <div class="sec-title-inner d-inline-block">
                        <i class="thm-clr flaticon-rub-el-hizb"></i>
                        <h2 class="mb-0">Kegiatan</h2>
                        <p class="mb-0">Adipiscing elit duis volutpat ligula nulla dapibus.</p>
                    </div>
                </div><!-- Sec Title -->
                <div class="event-wrap res-row w-100">
                    <div class="row">
                        @foreach ($activites as $activity)
                            <div class="col-md-6 col-sm-6 col-lg-4">
                                <div class="event-box w-100">
                                    <div class="event-img overflow-hidden position-relative w-100">
                                        <a href="{{ route('activity-detail', ['slug' => $activity->slug]) }}" title=""><img class="img-fluid w-100 gallery-size" src="{{ asset('storage/' . $activity->gallery->path) }}" alt="Event Image 1"></a>
                                    </div>
                                    <div class="event-info pat-bg gray-layer opc85 position-relative back-blend-multiply gray-bg w-100" style="background-image: url(assets/images/pattern-bg.jpg);">
                                        <span class="event-loc d-block thm-clr"><i class="fas fa-map-marker-alt"></i>{{ $activity->location }}</span>
                                        <h3 class="mb-0"><a href="{{ route('activity-detail', ['slug' => $activity->slug]) }}" title="">{{ $activity->name }}</a></h3>
                                        <span class="event-time d-block thm-clr">{{ Carbon\Carbon::parse($activity->date)->translatedFormat('l, d F Y') }}</span>
                                        {{-- <span class="event-price d-block"><i>Jl. R.A Kartini No. 209 Surabaya</i></span> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!-- Events Wrap -->
            </div>
        </div>
    </section>
    <section>
        <div class="w-100 position-relative">
            <div class="time-course-wrap w-100">
                <div class="row mrg">
                    <div class="col-md-12 col-sm-12 col-lg-6">
                        <div class="course-wrap d-flex flex-wrap align-items-center black-layer opc7 position-relative w-100">
                            <div class="fixed-bg" style="background-image: url({{ asset('storage/' . $random_gallery->path) }});"></div>
                        </div><!-- Courses Wrap -->
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-6">
                        <div class="time-wrap d-flex flex-wrap align-items-center justify-content-end thm-layer opc95 position-relative w-100">
                            <div class="time-inner w-100">
                                <div class="sec-title w-100">
                                    <div class="sec-title-inner d-inline-block">
                                        <h2 class="mb-0">Waktu Sholat Hari Ini</h2>
                                        <p class="mb-0">9 Shawwal 1441 H - {{ Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                                    </div>
                                </div><!-- Sec Title -->
                                <div class="time-list-wrap d-flex flex-wrap w-100">
                                    <ul class="time-list mb-0 list-unstyled">
                                        <li>
                                            <div class="time-box d-flex flex-wrap align-items-center justify-content-between">
                                                <span><i class="flaticon-rub-el-hizb"></i>Fajar</span>
                                                <span>04:06 am</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time-box d-flex flex-wrap align-items-center justify-content-between">
                                                <span><i class="flaticon-rub-el-hizb"></i>Sunrise</span>
                                                <span>05:30 am</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time-box d-flex flex-wrap align-items-center justify-content-between">
                                                <span><i class="flaticon-rub-el-hizb"></i>Dhuhr</span>
                                                <span>12:23 pm</span>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="time-list mb-0 list-unstyled">
                                        <li>
                                            <div class="time-box d-flex flex-wrap align-items-center justify-content-between">
                                                <span><i class="flaticon-rub-el-hizb"></i>Asr</span>
                                                <span>03:43 pm</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time-box d-flex flex-wrap align-items-center justify-content-between">
                                                <span><i class="flaticon-rub-el-hizb"></i>Maghrib</span>
                                                <span>07:10 pm</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="time-box d-flex flex-wrap align-items-center justify-content-between">
                                                <span><i class="flaticon-rub-el-hizb"></i>Isha'a</span>
                                                <span>08:35 pm</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- Time Wrap -->
                    </div>

                </div>
            </div><!-- Time & Course Wrap -->
        </div>
    </section>
    {{--
    <section>
        <div class="w-100 pt-90 gray-layer pb-110 opc85 position-relative">
            <div class="fixed-bg patern-bg back-blend-multiply gray-bg" style="background-image: url(assets/images/pattern-bg.jpg);"></div>
            <div class="container">
                <div class="sec-title text-center w-100">
                    <div class="sec-title-inner d-inline-block">
                        <i class="thm-clr flaticon-rub-el-hizb"></i>
                        <h2 class="mb-0">Islamic Scholars</h2>
                        <p class="mb-0">Adipiscing elit duis volutpat ligula nulla dapibus.</p>
                    </div>
                </div><!-- Sec Title -->
                <div class="team-wrap res-row wide-sec2">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-lg-3">
                            <div class="team-box text-center w-100">
                                <div class="team-img overflow-hidden position-relative w-100">
                                    <img class="img-fluid w-100" src="assets/images/resources/team-img1-1.jpg" alt="Team Image 1">
                                    <div class="social-links2 text-center d-inline-flex position-absolute">
                                        <a class="facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a class="twitter" href="https://twitter.com/" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a class="youtube" href="https://www.youtube.com/" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                                <div class="team-info">
                                    <h3 class="mb-0"><a href="scholar-detail.html" title="">M. Ishaq</a></h3>
                                    <span class="d-block thm-clr">Scholar</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-lg-3">
                            <div class="team-box text-center w-100">
                                <div class="team-img overflow-hidden position-relative w-100">
                                    <img class="img-fluid w-100" src="assets/images/resources/team-img1-2.jpg" alt="Team Image 2">
                                    <div class="social-links2 text-center d-inline-flex position-absolute">
                                        <a class="facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a class="twitter" href="https://twitter.com/" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a class="youtube" href="https://www.youtube.com/" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                                <div class="team-info">
                                    <h3 class="mb-0"><a href="scholar-detail.html" title="">Dorri-Najafabadi</a>
                                    </h3>
                                    <span class="d-block thm-clr">Scholar</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-lg-3">
                            <div class="team-box text-center w-100">
                                <div class="team-img overflow-hidden position-relative w-100">
                                    <img class="img-fluid w-100" src="assets/images/resources/team-img1-3.jpg" alt="Team Image 3">
                                    <div class="social-links2 text-center d-inline-flex position-absolute">
                                        <a class="facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a class="twitter" href="https://twitter.com/" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a class="youtube" href="https://www.youtube.com/" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                                <div class="team-info">
                                    <h3 class="mb-0"><a href="scholar-detail.html" title="">M. Ebrahim</a></h3>
                                    <span class="d-block thm-clr">Mufti</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-lg-3">
                            <div class="team-box text-center w-100">
                                <div class="team-img overflow-hidden position-relative w-100">
                                    <img class="img-fluid w-100" src="assets/images/resources/team-img1-4.jpg" alt="Team Image 4">
                                    <div class="social-links2 text-center d-inline-flex position-absolute">
                                        <a class="facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a class="twitter" href="https://twitter.com/" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a class="youtube" href="https://www.youtube.com/" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                                <div class="team-info">
                                    <h3 class="mb-0"><a href="scholar-detail.html" title="">Reza Hosseini</a></h3>
                                    <span class="d-block thm-clr">Scholar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Team Wrap -->
                <div class="view-more mt-05 d-inline-block text-center w-100">
                    <a class="thm-btn thm-bg" href="scholar-style1.html" title="">More
                        Scholars<span></span><span></span><span></span><span></span></a>
                </div><!-- View More -->
            </div>
        </div>
    </section>
    <section>
        <div class="w-100 pt-90 pb-80 position-relative">
            <img class="img-fluid sec-top-mckp position-absolute" src="assets/images/sec-top-mckp2.png" alt="Sec Top Mockup 2">
            <div class="container">
                <div class="sec-title text-center w-100">
                    <div class="sec-title-inner d-inline-block">
                        <i class="thm-clr flaticon-rub-el-hizb"></i>
                        <h2 class="mb-0">Up-Coming Events</h2>
                        <p class="mb-0">Adipiscing elit duis volutpat ligula nulla dapibus.</p>
                    </div>
                </div><!-- Sec Title -->
                <div class="event-wrap res-row w-100">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="event-box w-100">
                                <div class="event-img overflow-hidden position-relative w-100">
                                    <a href="event-detail.html" title=""><img class="img-fluid w-100" src="assets/images/resources/event-img1-1.jpg" alt="Event Image 1"></a>
                                </div>
                                <div class="event-info pat-bg gray-layer opc85 position-relative back-blend-multiply gray-bg w-100" style="background-image: url(assets/images/pattern-bg.jpg);">
                                    <span class="event-loc d-block thm-clr"><i class="fas fa-map-marker-alt"></i>Times Square, New York</span>
                                    <h3 class="mb-0"><a href="event-detail.html" title="">Ramadan, A Month Of
                                            Blessing</a></h3>
                                    <span class="event-time d-block thm-clr">8:47am - 10:00am</span>
                                    <span class="event-price d-block"><sup>$</sup>15.00<i>Booking Price</i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="event-box w-100">
                                <div class="event-img overflow-hidden position-relative w-100">
                                    <a href="event-detail.html" title=""><img class="img-fluid w-100" src="assets/images/resources/event-img1-2.jpg" alt="Event Image 2"></a>
                                </div>
                                <div class="event-info pat-bg gray-layer opc85 position-relative back-blend-multiply gray-bg w-100" style="background-image: url(assets/images/pattern-bg.jpg);">
                                    <span class="event-loc d-block thm-clr"><i class="fas fa-map-marker-alt"></i>OECD Centre, Paris</span>
                                    <h3 class="mb-0"><a href="event-detail.html" title="">Children Islamic Teaching
                                            Event Study</a></h3>
                                    <span class="event-time d-block thm-clr">8:47am - 10:00am</span>
                                    <span class="event-price d-block"><sup>$</sup>21.00<i>Booking Price</i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="event-box w-100">
                                <div class="event-img overflow-hidden position-relative w-100">
                                    <a href="event-detail.html" title=""><img class="img-fluid w-100" src="assets/images/resources/event-img1-3.jpg" alt="Event Image 3"></a>
                                </div>
                                <div class="event-info pat-bg gray-layer opc85 position-relative back-blend-multiply gray-bg w-100" style="background-image: url(assets/images/pattern-bg.jpg);">
                                    <span class="event-loc d-block thm-clr"><i class="fas fa-map-marker-alt"></i>Tokyo Big Sight, Japan</span>
                                    <h3 class="mb-0"><a href="event-detail.html" title="">Eid-ul-Adha, Feast o
                                            Scrifice</a></h3>
                                    <span class="event-time d-block thm-clr">8:47am - 10:00am</span>
                                    <span class="event-price d-block"><sup>$</sup>19.00<i>Booking Price</i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Events Wrap -->
            </div>
        </div>
    </section>
    <section>
        <div class="w-100 pt-110 black-layer pb-70 opc7 position-relative">
            <div class="fixed-bg" style="background-image: url(assets/images/parallax-bg1.jpg);"></div>
            <div class="container">
                <div class="sec-title v2 text-center w-100">
                    <div class="sec-title-inner d-inline-block">
                        <i class="flaticon-rub-el-hizb thm-clr"></i>
                        <h1 class="mb-0">The Pillars of Islam</h1>
                        <p class="mb-0">Duis aute irure dolor in reprehenit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur.</p>
                    </div>
                </div><!-- Sec Title -->
                <div class="pillars-wrap w-100">
                    <ul class="pillars-list text-center d-flex flex-wrap justify-content-center align-items-center mb-0 list-unstyled">
                        <li>
                            <div class="pillar-box position-relative w-100">
                                <span class="d-inline-block thm-clr position-relative"><span class="pat-bg gray-layer opc85 position-absolute back-blend-multiply gray-bg" style="background-image: url(assets/images/pattern-bg.jpg);"></span><i class="flaticon-quran-1"></i></span>
                                <h3 class="mb-0">Shahadah</h3>
                                <i class="d-block thm-clr">Faith</i>
                            </div>
                        </li>
                        <li>
                            <div class="pillar-box position-relative w-100">
                                <span class="d-inline-block thm-clr position-relative"><span class="pat-bg gray-layer opc85 position-absolute back-blend-multiply gray-bg" style="background-image: url(assets/images/pattern-bg.jpg);"></span><i class="flaticon-mosque-1"></i></span>
                                <h3 class="mb-0">Salah</h3>
                                <i class="d-block thm-clr">Prayer</i>
                            </div>
                        </li>
                        <li>
                            <div class="pillar-box position-relative w-100">
                                <span class="d-inline-block thm-clr position-relative"><span class="pat-bg gray-layer opc85 position-absolute back-blend-multiply gray-bg" style="background-image: url(assets/images/pattern-bg.jpg);"></span><i class="flaticon-star"></i></span>
                                <h3 class="mb-0">Sawm</h3>
                                <i class="d-block thm-clr">Fasting</i>
                            </div>
                        </li>
                        <li>
                            <div class="pillar-box position-relative w-100">
                                <span class="d-inline-block thm-clr position-relative"><span class="pat-bg gray-layer opc85 position-absolute back-blend-multiply gray-bg" style="background-image: url(assets/images/pattern-bg.jpg);"></span><i class="flaticon-gift-box"></i></span>
                                <h3 class="mb-0">Zakat</h3>
                                <i class="d-block thm-clr">Almsgiving</i>
                            </div>
                        </li>
                        <li>
                            <div class="pillar-box position-relative w-100">
                                <span class="d-inline-block thm-clr position-relative"><span class="pat-bg gray-layer opc85 position-absolute back-blend-multiply gray-bg" style="background-image: url(assets/images/pattern-bg.jpg);"></span><i class="flaticon-kaaba"></i></span>
                                <h3 class="mb-0">Hajj</h3>
                                <i class="d-block thm-clr">Pilgrimage</i>
                            </div>
                        </li>
                    </ul>
                </div><!-- Pillars Wrap -->
            </div>
        </div>
    </section>
    <section>
        <div class="w-100 pt-90 gray-layer pb-90 opc85 position-relative">
            <div class="fixed-bg patern-bg back-blend-multiply gray-bg" style="background-image: url(assets/images/pattern-bg.jpg);"></div>
            <div class="container">
                <div class="sec-title text-center w-100">
                    <div class="sec-title-inner d-inline-block">
                        <i class="flaticon-rub-el-hizb thm-clr"></i>
                        <h2 class="mb-0">Charity Campaigns</h2>
                        <p class="mb-0">Adipiscing elit duis volutpat ligula nulla dapibus.</p>
                    </div>
                </div><!-- Sec Title -->
                <div class="camp-wrap w-100">
                    <div class="camp-box w-100">
                        <div class="row mrg align-items-center">
                            <div class="col-md-12 col-sm-12 col-lg-7 order-lg-1">
                                <div class="camp-img position-relative w-100">
                                    <img class="img-fluid w-100" src="assets/images/resources/camp-img1-1.jpg" alt="Campaign Image 1">
                                    <a class="thm-bg spinner position-absolute" href="https://www.youtube.com/embed/WxuHBTES2-s" data-fancybox title=""><i class="flaticon-play"></i></a>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-5">
                                <div class="camp-info pat-bg thm-layer opc8 position-relative back-blend-multiply thm-bg" style="background-image: url(assets/images/pattern-bg.jpg);">
                                    <h3 class="mb-0">Children to Shape Their Poor Own Future</h3>
                                    <span class="proj-loc d-block">Project In: <i>Nigeria</i></span>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, coteudtu adipi sicing elit, sed do
                                        eiusmod tempor incididu dntut labore et.</p>
                                    <div class="goal">
                                        <span class="price d-block">$42,610</span>
                                        <i class="d-block">Donation Needed</i>
                                    </div>
                                    <a class="thm-btn bg-black" href="donation-detail.html" title="">Make
                                        Donation<span></span><span></span><span></span><span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Campaign Wrap -->
            </div>
        </div>
    </section> --}}
    <section>
        <div class="w-100 pb-50 pt-90 position-relative">
            <div class="sec-title text-center w-100">
                <div class="sec-title-inner d-inline-block">
                    <i class="flaticon-rub-el-hizb thm-clr"></i>
                    <h2 class="mb-0">Galeri Kegiatan</h2>
                    <p class="mb-0">Adipiscing elit duis volutpat ligula nulla dapibus.</p>
                </div>
            </div><!-- Sec Title -->
            <div class="gallery-wrap w-100">
                <div class="row mrg">
                    @foreach ($galleries as $gallery)
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="gallery-box text-center overflow-hidden position-relative w-100">
                                <img class="img-fluid w-100 gallery-size" src="{{ asset('storage/' . $gallery->path) }}" alt="{{ $gallery->name }}">
                                <div class="gallery-info position-absolute">
                                    <h3 class="mb-0">{{ $gallery->name }}</h3>
                                    <a class="d-inline-block thm-clr" href="{{ asset('storage/' . $gallery->path) }}" data-fancybox="gallery" title=""><i class="flaticon-view"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div><!-- Gallery Wrap -->
        </div>
    </section>
    <section>
        <div class="w-100 pt-90 pb-235 position-relative">
            <img class="sec-botm-rgt-mckp img-fluid position-absolute" src="assets/images/sec-botm-mckp.png" alt="Sec Bottom Mockup">
            <div class="container">
                <div class="sec-title text-center w-100">
                    <div class="sec-title-inner d-inline-block">
                        <i class="flaticon-rub-el-hizb thm-clr"></i>
                        <h2 class="mb-0">Update & Berita Terbaru</h2>
                        <p class="mb-0">Adipiscing elit duis volutpat ligula nulla dapibus.</p>
                    </div>
                </div><!-- Sec Title -->
                <div class="blog-wrap res-row w-100">
                    <div class="row">
                        @foreach ($news as $data_news)
                            <div class="col-md-6 col-sm-6 col-lg-4">
                                <div class="post-box w-100">
                                    <div class="post-img overflow-hidden position-relative w-100">
                                        <a href="{{ route('news-detail', ['slug' => $data_news->slug]) }}" title=""><img class="img-fluid w-100 gallery-size" src="{{ asset('storage/' . $data_news->gallery->path) }}" alt="{{ $data_news->gallery->name }}"></a>
                                    </div>
                                    <div class="post-info position-relative w-100">
                                        <a class="thm-bg" href="{{ route('news-detail', ['slug' => $data_news->slug]) }}" title=""><i class="fas fa-link"></i></a>
                                        <span class="post-date thm-clr">{{ Carbon\Carbon::parse($data_news->created_at)->format('d M Y') }}</span>
                                        <h3 class="mb-0"><a href="{{ route('news-detail', ['slug' => $data_news->slug]) }}" title="">{{ $data_news->name }}</a></h3>
                                        <ul class="post-meta d-flex flex-wrap mb-0 list-unstyled">
                                            {{-- <li><i class="fas fa-user-alt"></i>By: <a href="javascript:void(0);" title="">James Smith</a></li> --}}
                                            {{-- <li><i class="fas fa-comment-alt"></i>1 Comments</li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!-- Blog Wrap -->
                <div class="view-more d-inline-block text-center w-100">
                    <a class="thm-btn mini-btn thm-bg" href="{{ route('news') }}" title="">Lihat Lebih Banyak<span></span><span></span><span></span><span></span></a>
                </div><!-- View More -->
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('.index-menu').addClass('active');
    </script>
@endsection
