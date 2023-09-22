@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section>
        <div class="w-100 position-relative">
            <div class="feat-wrap v1 text-center position-relative w-100">
                <div class="feat-caro">
                    <div class="feat-item">
                        <div class="feat-img position-absolute" style="background-image: url(assets/images/resources/slide2.jpg);"></div>
                        <div class="feat-cap-wrap position-absolute d-inline-block">
                            <div class="feat-cap d-inline-block">
                                <i class="d-inline-block flaticon-rub-el-hizb thm-clr"></i>
                                <h2 class="mb-0">Memperingati Hari Isra' Mi'raj Nabi Muhammad SAW</h2>
                                <p class="mb-0">Consectetur adipiscing elit duis volutpat ligula nulla dapibus.</p>
                                <a class="thm-btn thm-bg" href="#" title="">Selengkapnya<span></span><span></span><span></span><span></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="feat-item">
                        <div class="feat-img position-absolute" style="background-image: url(assets/images/resources/slide1.jpg);"></div>
                        <div class="feat-cap-wrap position-absolute d-inline-block">
                            <div class="feat-cap d-inline-block">
                                <i class="d-inline-block flaticon-rub-el-hizb thm-clr"></i>
                                <h2 class="mb-0">Hari Raya Idul Adha</h2>
                                <p class="mb-0">Consectetur adipiscing elit duis volutpat ligula nulla dapibus.</p>
                                <a class="thm-btn thm-bg" href="#" title="">Selengkapnya<span></span><span></span><span></span><span></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="feat-item">
                        <div class="feat-img position-absolute" style="background-image: url(assets/images/resources/slide3.jpg);"></div>
                        <div class="feat-cap-wrap position-absolute d-inline-block">
                            <div class="feat-cap d-inline-block">
                                <i class="d-inline-block flaticon-rub-el-hizb thm-clr"></i>
                                <h2 class="mb-0">Bersiap Menyambut Datangnya Bulan Suci Ramadhan</h2>
                                <p class="mb-0">Consectetur adipiscing elit duis volutpat ligula nulla dapibus.</p>
                                <a class="thm-btn thm-bg" href="#" title="">Selengkapnya<span></span><span></span><span></span><span></span></a>
                            </div>
                        </div>
                    </div>
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
                                    <li><span class="thm-bg"><i class="fas fa-phone-alt"></i></span>+96 125 554 24 5
                                    </li>
                                    <li><span class="thm-bg"><i class="far fa-envelope"></i></span><a href="javascript:void(0);" title="">info@youremailid.com</a></li>
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
                        <p class="mb-0">The is not just a mosque for prayers rather it is a community center for
                            all. The Center is committed to preserving an Islamic identity, building and supporting
                            a viable Muslim community, promoting a comprehensive Islamic way of life based on the
                            Holy Quran and the Sunnah of Prophet Muhammad.</p>
                        <a class="thm-btn thm-bg" href="#" title="">Selengkapnya<span></span><span></span><span></span><span></span></a>
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
                        <div class="col-md-4 col-sm-6 col-lg-3">
                            <div class="serv-box text-center pat-bg gray-layer opc85 position-relative back-blend-multiply gray-bg w-100" style="background-image: url(assets/images/pattern-bg.jpg);">
                                <h3 class="mb-0">Silsilah Keluarga A</h3>
                                <p class="mb-0">Lorem ipsum dolor sit amet, coteudtu adipisicing elit, sed do
                                    eiusmod tem por incididunt ut labore et.</p>
                                <a href="{{ route('tree') }}" title="">Selengkapnya</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-lg-3">
                            <div class="serv-box text-center pat-bg gray-layer opc85 position-relative back-blend-multiply gray-bg w-100" style="background-image: url(assets/images/pattern-bg.jpg);">
                                <h3 class="mb-0">Silsilah Keluarga B</h3>
                                <p class="mb-0">Lorem ipsum dolor sit amet, coteudtu adipisicing elit, sed do
                                    eiusmod tem por incididunt ut labore et.</p>
                                <a href="{{ route('tree') }}" title="">Selengkapnya</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-lg-3">
                            <div class="serv-box text-center pat-bg gray-layer opc85 position-relative back-blend-multiply gray-bg w-100" style="background-image: url(assets/images/pattern-bg.jpg);">
                                <h3 class="mb-0">Silsilah Keluarga C</h3>
                                <p class="mb-0">Lorem ipsum dolor sit amet, coteudtu adipisicing elit, sed do
                                    eiusmod tem por incididunt ut labore et.</p>
                                <a href="{{ route('tree') }}" title="">Selengkapnya</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-lg-3">
                            <div class="serv-box text-center pat-bg gray-layer opc85 position-relative back-blend-multiply gray-bg w-100" style="background-image: url(assets/images/pattern-bg.jpg);">
                                <h3 class="mb-0">Silsilah Keluarga D</h3>
                                <p class="mb-0">Lorem ipsum dolor sit amet, coteudtu adipisicing elit, sed do
                                    eiusmod tem por incididunt ut labore et.</p>
                                <a href="{{ route('tree') }}" title="">Selengkapnya</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-lg-3">
                            <div class="serv-box text-center pat-bg gray-layer opc85 position-relative back-blend-multiply gray-bg w-100" style="background-image: url(assets/images/pattern-bg.jpg);">
                                <h3 class="mb-0">Silsilah Keluarga E</h3>
                                <p class="mb-0">Lorem ipsum dolor sit amet, coteudtu adipisicing elit, sed do
                                    eiusmod tem por incididunt ut labore et.</p>
                                <a href="{{ route('tree') }}" title="">Selengkapnya</a>
                            </div>
                        </div>
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
                        <h2 class="mb-0">Kegiatan Akan Datang</h2>
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
                                    <span class="event-loc d-block thm-clr"><i class="fas fa-map-marker-alt"></i>Surabaya, Jawa Timur</span>
                                    <h3 class="mb-0"><a href="event-detail.html" title="">Kajian Bulanan Masjid Sabilillah</a></h3>
                                    <span class="event-time d-block thm-clr">Senin, 29 September 8:47 - 11:00</span>
                                    <span class="event-price d-block"><i>Jl. R.A Kartini No. 209 Surabaya</i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="event-box w-100">
                                <div class="event-img overflow-hidden position-relative w-100">
                                    <a href="event-detail.html" title=""><img class="img-fluid w-100" src="assets/images/resources/event-img1-1.jpg" alt="Event Image 1"></a>
                                </div>
                                <div class="event-info pat-bg gray-layer opc85 position-relative back-blend-multiply gray-bg w-100" style="background-image: url(assets/images/pattern-bg.jpg);">
                                    <span class="event-loc d-block thm-clr"><i class="fas fa-map-marker-alt"></i>Surabaya, Jawa Timur</span>
                                    <h3 class="mb-0"><a href="event-detail.html" title="">Tabligh Akbar Hari Santri Nasional</a></h3>
                                    <span class="event-time d-block thm-clr">Senin, 29 September 8:47 - 11:00</span>
                                    <span class="event-price d-block"><i>Jl. R.A Kartini No. 209 Surabaya</i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="event-box w-100">
                                <div class="event-img overflow-hidden position-relative w-100">
                                    <a href="event-detail.html" title=""><img class="img-fluid w-100" src="assets/images/resources/event-img1-1.jpg" alt="Event Image 1"></a>
                                </div>
                                <div class="event-info pat-bg gray-layer opc85 position-relative back-blend-multiply gray-bg w-100" style="background-image: url(assets/images/pattern-bg.jpg);">
                                    <span class="event-loc d-block thm-clr"><i class="fas fa-map-marker-alt"></i>Surabaya, Jawa Timur</span>
                                    <h3 class="mb-0"><a href="event-detail.html" title="">Manasik Haji 2024 - Surabaya</a></h3>
                                    <span class="event-time d-block thm-clr">Senin, 29 September 8:47 - 11:00</span>
                                    <span class="event-price d-block"><i>Jl. R.A Kartini No. 209 Surabaya</i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Events Wrap -->
            </div>
        </div>
    </section>
    {{-- <section>
        <div class="w-100 position-relative">
            <div class="time-course-wrap w-100">
                <div class="row mrg">
                    <div class="col-md-12 col-sm-12 col-lg-6">
                        <div class="time-wrap d-flex flex-wrap align-items-center justify-content-end thm-layer opc95 position-relative w-100">
                            <div class="fixed-bg" style="background-image: url(assets/images/time-bg.jpg);"></div>
                            <div class="time-inner w-100">
                                <div class="sec-title w-100">
                                    <div class="sec-title-inner d-inline-block">
                                        <h2 class="mb-0">Go to Allah Before its to Late</h2>
                                        <p class="mb-0">Islamic:, 9 Shawwal 1441 AH - Monday, June 1, 2020</p>
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
                    <div class="col-md-12 col-sm-12 col-lg-6">
                        <div class="course-wrap d-flex flex-wrap align-items-center black-layer opc7 position-relative w-100">
                            <div class="fixed-bg" style="background-image: url(assets/images/course-bg.jpg);"></div>
                            <div class="course-inner w-100">
                                <div class="sec-title w-100">
                                    <div class="sec-title-inner d-inline-block">
                                        <h2 class="mb-0">Islamic School Courses</h2>
                                        <p class="mb-0">Adipiscing elit duis volutpat ligula nulla dapibus.</p>
                                    </div>
                                </div><!-- Sec Title -->
                                <div class="course-list-wrap w-100">
                                    <h3 class="mb-0 thm-clr">Weekly Programs</h3>
                                    <ul class="course-list mb-0 list-unstyled w-100">
                                        <li>
                                            <div class="course-box d-flex flex-wrap w-100">
                                                <i class="flaticon-rub-el-hizb thm-clr"></i>
                                                <div class="course-inner">
                                                    <h4 class="mb-0"><a href="online-courses-detail.html" title="">Tafseel ul Quran</a></h4>
                                                    <p class="mb-0">Every Tuesday & Wednesday 8:00 am to 12:00 pm
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="course-box d-flex flex-wrap w-100">
                                                <i class="flaticon-rub-el-hizb thm-clr"></i>
                                                <div class="course-inner">
                                                    <h4 class="mb-0"><a href="online-courses-detail.html" title="">Children's Islamic Classes</a></h4>
                                                    <p class="mb-0">Daily from 8:00 am to 1:00 pm</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="course-box d-flex flex-wrap w-100">
                                                <i class="flaticon-rub-el-hizb thm-clr"></i>
                                                <div class="course-inner">
                                                    <h4 class="mb-0"><a href="online-courses-detail.html" title="">Quran Recitation Class</a></h4>
                                                    <p class="mb-0">Every Monday & Thursday 9:00 am to 11:30 pm</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- Courses Wrap -->
                    </div>
                </div>
            </div><!-- Time & Course Wrap -->
        </div>
    </section>
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
        <div class="w-100 pb-50 position-relative">
            <div class="sec-title text-center w-100">
                <div class="sec-title-inner d-inline-block">
                    <i class="flaticon-rub-el-hizb thm-clr"></i>
                    <h2 class="mb-0">Galeri Kegiatan</h2>
                    <p class="mb-0">Adipiscing elit duis volutpat ligula nulla dapibus.</p>
                </div>
            </div><!-- Sec Title -->
            <div class="gallery-wrap w-100">
                <div class="row mrg">
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="gallery-box text-center overflow-hidden position-relative w-100">
                            <img class="img-fluid w-100" src="assets/images/resources/gallery-img1-1.jpg" alt="Gallery Image 1">
                            <div class="gallery-info position-absolute">
                                <h3 class="mb-0">Al Mustafa – The Chosen One (Seerah of the Prophet ﷺ)</h3>
                                <span class="d-block thm-clr">E-Book - Al Mustafa</span>
                                <a class="d-inline-block thm-clr" href="assets/images/resources/gallery-img1-1.jpg" data-fancybox="gallery" title=""><i class="flaticon-view"></i></a>
                            </div>
                        </div>
                        <div class="gallery-box text-center overflow-hidden position-relative w-100">
                            <img class="img-fluid w-100" src="assets/images/resources/gallery-img1-2.jpg" alt="Gallery Image 2">
                            <div class="gallery-info position-absolute">
                                <h3 class="mb-0">Al Mustafa – The Chosen One (Seerah of the Prophet ﷺ)</h3>
                                <span class="d-block thm-clr">E-Book - Al Mustafa</span>
                                <a class="d-inline-block thm-clr" href="assets/images/resources/gallery-img1-2.jpg" data-fancybox="gallery" title=""><i class="flaticon-view"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="gallery-box text-center overflow-hidden position-relative w-100">
                            <img class="img-fluid w-100" src="assets/images/resources/gallery-img1-3.jpg" alt="Gallery Image 3">
                            <div class="gallery-info position-absolute">
                                <h3 class="mb-0">Al Mustafa – The Chosen One (Seerah of the Prophet ﷺ)</h3>
                                <span class="d-block thm-clr">E-Book - Al Mustafa</span>
                                <a class="d-inline-block thm-clr" href="assets/images/resources/gallery-img1-3.jpg" data-fancybox="gallery" title=""><i class="flaticon-view"></i></a>
                            </div>
                        </div>
                        <div class="gallery-box text-center overflow-hidden position-relative w-100">
                            <img class="img-fluid w-100" src="assets/images/resources/gallery-img1-4.jpg" alt="Gallery Image 4">
                            <div class="gallery-info position-absolute">
                                <h3 class="mb-0">Al Mustafa – The Chosen One (Seerah of the Prophet ﷺ)</h3>
                                <span class="d-block thm-clr">E-Book - Al Mustafa</span>
                                <a class="d-inline-block thm-clr" href="assets/images/resources/gallery-img1-4.jpg" data-fancybox="gallery" title=""><i class="flaticon-view"></i></a>
                            </div>
                        </div>
                        <div class="gallery-box text-center overflow-hidden position-relative w-100">
                            <img class="img-fluid w-100" src="assets/images/resources/gallery-img1-5.jpg" alt="Gallery Image 5">
                            <div class="gallery-info position-absolute">
                                <h3 class="mb-0">Al Mustafa – The Chosen One (Seerah of the Prophet ﷺ)</h3>
                                <span class="d-block thm-clr">E-Book - Al Mustafa</span>
                                <a class="d-inline-block thm-clr" href="assets/images/resources/gallery-img1-5.jpg" data-fancybox="gallery" title=""><i class="flaticon-view"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="gallery-box text-center overflow-hidden position-relative w-100">
                            <img class="img-fluid w-100" src="assets/images/resources/gallery-img1-6.jpg" alt="Gallery Image 6">
                            <div class="gallery-info position-absolute">
                                <h3 class="mb-0">Al Mustafa – The Chosen One (Seerah of the Prophet ﷺ)</h3>
                                <span class="d-block thm-clr">E-Book - Al Mustafa</span>
                                <a class="d-inline-block thm-clr" href="assets/images/resources/gallery-img1-6.jpg" data-fancybox="gallery" title=""><i class="flaticon-view"></i></a>
                            </div>
                        </div>
                        <div class="gallery-box text-center overflow-hidden position-relative w-100">
                            <img class="img-fluid w-100" src="assets/images/resources/gallery-img1-7.jpg" alt="Gallery Image 7">
                            <div class="gallery-info position-absolute">
                                <h3 class="mb-0">Al Mustafa – The Chosen One (Seerah of the Prophet ﷺ)</h3>
                                <span class="d-block thm-clr">E-Book - Al Mustafa</span>
                                <a class="d-inline-block thm-clr" href="assets/images/resources/gallery-img1-7.jpg" data-fancybox="gallery" title=""><i class="flaticon-view"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="gallery-box text-center overflow-hidden position-relative w-100">
                            <img class="img-fluid w-100" src="assets/images/resources/gallery-img1-8.jpg" alt="Gallery Image 8">
                            <div class="gallery-info position-absolute">
                                <h3 class="mb-0">Al Mustafa – The Chosen One (Seerah of the Prophet ﷺ)</h3>
                                <span class="d-block thm-clr">E-Book - Al Mustafa</span>
                                <a class="d-inline-block thm-clr" href="assets/images/resources/gallery-img1-8.jpg" data-fancybox="gallery" title=""><i class="flaticon-view"></i></a>
                            </div>
                        </div>
                        <div class="gallery-box text-center overflow-hidden position-relative w-100">
                            <img class="img-fluid w-100" src="assets/images/resources/gallery-img1-9.jpg" alt="Gallery Image 9">
                            <div class="gallery-info position-absolute">
                                <h3 class="mb-0">Al Mustafa – The Chosen One (Seerah of the Prophet ﷺ)</h3>
                                <span class="d-block thm-clr">E-Book - Al Mustafa</span>
                                <a class="d-inline-block thm-clr" href="assets/images/resources/gallery-img1-9.jpg" data-fancybox="gallery" title=""><i class="flaticon-view"></i></a>
                            </div>
                        </div>
                    </div>
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
                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="post-box w-100">
                                <div class="post-img overflow-hidden position-relative w-100">
                                    <a href="#" title=""><img class="img-fluid w-100" src="assets/images/resources/blog-img1-1.jpg" alt="Blog Image 1"></a>
                                </div>
                                <div class="post-info position-relative w-100">
                                    <a class="thm-bg" href="#" title=""><i class="fas fa-link"></i></a>
                                    <span class="post-date thm-clr">July 30, 2020</span>
                                    <h3 class="mb-0"><a href="#" title="">Memperingati maulid Nabi Muhammad SAW</a></h3>
                                    <ul class="post-meta d-flex flex-wrap mb-0 list-unstyled">
                                        <li><i class="fas fa-user-alt"></i>By: <a href="javascript:void(0);" title="">James Smith</a></li>
                                        <li><i class="fas fa-comment-alt"></i>1 Comments</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="post-box w-100">
                                <div class="post-img overflow-hidden position-relative w-100">
                                    <a href="#" title=""><img class="img-fluid w-100" src="assets/images/resources/blog-img1-2.jpg" alt="Blog Image 2"></a>
                                </div>
                                <div class="post-info position-relative w-100">
                                    <a class="thm-bg" href="#" title=""><i class="fas fa-link"></i></a>
                                    <span class="post-date thm-clr">June 28, 2020</span>
                                    <h3 class="mb-0"><a href="#" title="">Keutamaan Besar Bulan Ramadhan</a></h3>
                                    <ul class="post-meta d-flex flex-wrap mb-0 list-unstyled">
                                        <li><i class="fas fa-user-alt"></i>By: <a href="javascript:void(0);" title="">James Smith</a></li>
                                        <li><i class="fas fa-comment-alt"></i>5 Comments</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-4">
                            <div class="post-box w-100">
                                <div class="post-img overflow-hidden position-relative w-100">
                                    <a href="#" title=""><img class="img-fluid w-100" src="assets/images/resources/blog-img1-3.jpg" alt="Blog Image 3"></a>
                                </div>
                                <div class="post-info position-relative w-100">
                                    <a class="thm-bg" href="#" title=""><i class="fas fa-link"></i></a>
                                    <span class="post-date thm-clr">April 25, 2020</span>
                                    <h3 class="mb-0"><a href="#" title="">Meningkatkan Rasa Syukur Kepada Allah SWT</a></h3>
                                    <ul class="post-meta d-flex flex-wrap mb-0 list-unstyled">
                                        <li><i class="fas fa-user-alt"></i>By: <a href="javascript:void(0);" title="">James Smith</a></li>
                                        <li><i class="fas fa-comment-alt"></i>15 Comments</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Blog Wrap -->
                <div class="view-more d-inline-block text-center w-100">
                    <a class="thm-btn mini-btn thm-bg" href="{{ route('news') }}" title="">Lihat Lebih Banyak<span></span><span></span><span></span><span></span></a>
                </div><!-- View More -->
            </div>
        </div>
    </section>
@endsection
