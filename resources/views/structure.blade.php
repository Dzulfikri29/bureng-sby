@extends('layouts.app')

@section('title', Str::headline('struktur'))

@section('content')
    <!--Team Page Start-->
    <section class="team-page">
        <div class="section-title text-center">
            <span class="section-title__tagline">{{ $section_1->title }}</span>
            <h2 class="section-title__title agrion-font">{{ $section_1->subtitle }}</h2>
            <div class="section-title__icon">
                <img src="assets/images/icon/section-title-icon-1.png" alt="">
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($structures as $structure)
                    <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="team-one__single">
                            <div class="team-one__shape-1">
                                <img src="assets/images/shapes/team-one-shape-1.png" alt="">
                            </div>
                            <div class="team-one__img-box">
                                <div class="team-one__img">
                                    <img src="{{ asset('storage/' . $structure->photo) }}" alt="">
                                </div>
                            </div>
                            <div class="team-one__content">
                                <h3 class="team-one__title"><a href="#">{{ $structure->name }}</a></h3>
                                <p class="team-one__subtitle">{{ $structure->position }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Team Page End-->
@endsection

@section('js')
    <script>
        $('.menu-structure').addClass('current');
    </script>
@endsection
