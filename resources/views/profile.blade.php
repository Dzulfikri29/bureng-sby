@extends('layouts.app')

@section('title', Str::headline('profile'))

@section('content')
    <section class="about-three">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="about-three__left">
                        <div class="row">
                            @php
                                $img = $section_1->images;
                                $img_length = count($img);
                                $separate_img_length = ceil($img_length / 2);
                            @endphp
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                @for ($i = 0; $i < $separate_img_length; $i++)
                                    <div class="about-three__left-single">
                                        <div class="about-three__left-img">
                                            <img src="{{ asset('storage/' . ($img[$i]->path ?? '')) }}" alt="">
                                        </div>
                                    </div>
                                @endfor
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                @for ($i = $separate_img_length; $i < $img_length; $i++)
                                    <div class="about-three__left-single">
                                        <div class="about-three__left-img">
                                            <img src="{{ asset('storage/' . ($img[$i]->path ?? '')) }}" alt="">
                                        </div>
                                    </div>
                                @endfor
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-three__right">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">{{ $section_1->title }}</span>
                            <h2 class="section-title__title agrion-font">{{ $section_1->subtitle }}</h2>
                            <div class="section-title__icon">
                                <img src="assets/images/icon/section-title-icon-1.png" alt="">
                            </div>
                        </div>
                        <p class="about-three__text-1">{!! $section_1->body !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Three End-->

    <!--Provide One Start-->
    <section class="Provide-One">
        <div class="Provide-One__wrap">
            <div class="Provide-One__left">
                <div class="Provide-One__bg" style="background-image: url({{ asset('storage/' . ($section_2->images[0]->path ?? '')) }});"></div>
                <div class="provide-one__sopport">
                    <div class="provide-one__support-icon">
                        <span class="icon-harvester"></span>
                    </div>
                </div>
            </div>
            <div class="Provide-One__right">
                <div class="provide-one__bg-shape float-bob-x">
                    <img src="assets/images/backgrounds/provide-one-shape-1.png" alt="">
                </div>
                <div class="Provide-One__content">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">{{ $section_2->title }}</span>
                        <h2 class="section-title__title agrion-font">{{ $section_2->subtitle }}</h2>
                        <div class="section-title__icon">
                            <img src="assets/images/icon/section-title-icon-1.png" alt="">
                        </div>
                    </div>
                    <p class="Provide-One__text">{!! $section_2->body !!}</p>
                    <div class="Provide-One__progress-wrap">
                        <div class="Provide-One__progress">
                        </div>
                        <div class="Provide-One__progress">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Provide One End-->
@endsection

@section('js')
    <script>
        $('.menu-profile').addClass('current');
    </script>
@endsection
