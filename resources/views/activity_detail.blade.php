@extends('layouts.app', ['custom_meta' => true])

@section('title', Str::headline($activity->title))

@section('custom_meta')
    <meta name="description" content="{{ $activity->meta_description }}">
    <meta name="keyword" content="{{ $activity->meta_keywords }}">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="{{ $activity->meta_title }}">
    <meta itemprop="description" content="{{ $activity->meta_description }}">
    <meta itemprop="image" content="{{ asset('storage/' . $activity->image) }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $activity->meta_title }}">
    <meta property="og:description" content="{{ $activity->meta_description }}">
    <meta property="og:image" content="{{ asset('storage/' . $activity->image) }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $activity->meta_title }}">
    <meta name="twitter:description" content="{{ $activity->meta_description }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $activity->image) }}">
@endsection

@section('content')
    <!--Project Details Start-->
    <section class="project-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-details__top">
                        <div class="project-details__img">
                            <img src="{{ asset('storage/' . $activity->image) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-details__content">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="project-details__content-left">
                            <h3 class="project-details__title-1">{{ $activity->title }}</h3>
                            {!! $activity->body !!}
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="project-details__content-right">
                            <div class="project-details__details-box">
                                <div class="project-details__bg-shape" style="background-image: url({{ asset('assets/images/shapes/project-details-shape-1.png') }});">
                                </div>
                                <ul class="list-unstyled project-details__details-list">
                                    <li>
                                        <p class="project-details__client">Dibuat Pada</p>
                                        <h4 class="project-details__name">{{ Carbon\Carbon::parse($activity->created_at)->translatedFormat('D, d F Y') }}</h4>
                                    </li>
                                    <li>
                                        <p class="project-details__client">Diperbarui Pada</p>
                                        <h4 class="project-details__name">{{ Carbon\Carbon::parse($activity->updated_at)->translatedFormat('D, d F Y') }}</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-details__pagination-box">
                        <ul class="project-details__pagination list-unstyled clearfix">
                            @if ($prev)
                                <li class="next">
                                    <div class="icon">
                                        <a href="{{ route('activity.show', ['slug' => $prev->slug]) }}" aria-label="Previous"><i class="icon-left-arrow"></i></a>
                                    </div>
                                    <div class="content">
                                        <p>Sebelumnya</p>
                                    </div>
                                </li>
                            @endif
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            @if ($next)
                                <li class="previous">
                                    <div class="content">
                                        <p>Selanjutnya</p>
                                    </div>
                                    <div class="icon">
                                        <a href="{{ route('activity.show', ['slug' => $next->slug]) }}" aria-label="Previous"><i class="icon-right-arrow"></i></a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Project Details End-->

    <!--Smilar Project Start-->
    <section class="Smilar-project">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">{{ $section_1->title }}</span>
                <h2 class="section-title__title agrion-font">{{ $section_1->subtitle }}</h2>
                <div class="section-title__icon">
                    <img src="{{ asset('assets/images/icon/section-title-icon-1.png') }}" alt="">
                </div>
            </div>
            <div class="row">
                @foreach ($others as $other)
                    <!--Project One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                        <div class="project-one__single">
                            <div class="project-one__inner">
                                <div class="project-one__img">
                                    <img src="{{ asset('storage/' . $other->image) }}" alt="">
                                </div>
                                <div class="project-one__arrow">
                                    <a href="{{ route('activity.show', ['slug' => $other->slug]) }}"><i class="icon-right-arrow"></i></a>
                                </div>
                                <div class="project-one__content">
                                    <h3 class="project-one__title agrion-font"><a href="{{ route('activity.show', ['slug' => $other->slug]) }}">{{ $other->title }}</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Project One Single Start-->
                @endforeach
            </div>
        </div>
    </section>
    <!--Smilar Project End-->
@endsection

@section('js')
    <script>
        $('.menu-activity').addClass('current');
    </script>
@endsection
