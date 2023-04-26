@extends('layouts.app')

@section('title', Str::headline('kegiatan'))

@section('content')
    <!--Project Page One Start-->
    <section class="project-page-one">
        <div class="container">
            <div class="row">
                @foreach ($activities as $activity)
                    <!--Project Page One Single Start-->
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                        <div class="project-one__single">
                            <div class="project-one__inner">
                                <div class="project-one__img">
                                    <img src="{{ asset('storage/' . $activity->image) }}" alt="">
                                </div>
                                <div class="project-one__arrow">
                                    <a href="{{ route('activity.show', ['slug' => $activity->slug]) }}"><i class="icon-right-arrow"></i></a>
                                </div>
                                <div class="project-one__content">
                                    <h3 class="project-one__title agrion-font"><a href="{{ route('activity.show', ['slug' => $activity->slug]) }}">{{ $activity->title }}</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Project Page One Single Start-->
                @endforeach
            </div>
        </div>
    </section>
    <!--Project Page One End-->

@endsection

@section('js')
    <script>
        $('.menu-activity').addClass('current');
    </script>
@endsection
