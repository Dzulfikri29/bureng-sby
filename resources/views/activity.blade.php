@extends('layouts.app')

@section('title', Str::headline('kegiatan'))

@section('content')
    <!--Project Page One Start-->
    <section class="project-page-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="product__sidebar">
                        <div class="shop-category product__sidebar-single">
                            <h3 class="product__sidebar-title">Kategori</h3>
                            <input type="hidden" id="product_category_id">
                            <ul class="list-unstyled">
                                <li class="category-list active" id="activity_"><a href="javascript:;set_activity('')">Semua</a></li>
                                @foreach ($activities as $activity)
                                    <li class="category-list" id="activity_{{ $activity->id }}"><a href="javascript:;set_activity({{ $activity->id }})">{{ $activity->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9">
                    <div class="product__items">
                        <div class="product__all" id="activity-container">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
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
    <input type="hidden" name="activity_id" id="activity_id">
    <!--Project Page One End-->

@endsection

@section('js')
    <script src="{{ asset('assets/js/activity.js') }}"></script>
    <script src="{{ asset('assets/vendors/fullcalendar/dist/index.global.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="{{ asset('admin-assets/vendor/fslightbox/index.js') }}"></script>
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

        $(document).ready(function() {
            get_activities()
        });
    </script>
@endsection
