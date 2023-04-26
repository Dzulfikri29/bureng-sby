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
                <div class="col-md-12 mt-5">
                    <div class="section-title text-center mb-3">
                        <span class="section-title__tagline">{{ $jadwal_pelatihan->title }}</span>
                        <h2 class="section-title__title agrion-font">{{ $jadwal_pelatihan->subtitle }}</h2>
                        <div class="section-title__icon">
                            <img src="assets/images/icon/section-title-icon-1.png" alt="">
                        </div>
                    </div>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </section>
    <!--Project Page One End-->

@endsection

@section('js')
    <script src="{{ asset('assets/vendors/fullcalendar/dist/index.global.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        $('.menu-activity').addClass('current');

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                eventDidMount: function(info) {
                    $(info.el).popover({
                        title: '',
                        placement: 'top',
                        trigger: 'hover',
                        content: info.event.title,
                        container: 'body'
                    });
                },
                events: `${base_url}/event`,
                contentHeight: "auto",
                handleWindowResize: true,
            });
            calendar.render();
        });
    </script>
@endsection
