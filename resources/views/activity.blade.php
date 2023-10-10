@extends('layouts.app')

@section('title', 'Kegiatan')

@section('content')
    <section>
        <div class="w-100 pt-80 black-layer pb-70 opc65 position-relative">
            <div class="fixed-bg" style="background-image: url({{ asset('assets/images/pattern-bg.jpg') }});"></div>
            <div class="container">
                <div class="page-title-wrap text-center w-100">
                    <div class="page-title-inner d-inline-block">
                        @php
                            $section = $sections->where('name', 'header')->first();
                        @endphp
                        <h1 class="mb-0">{{ $section->title }}</h1>
                    </div>
                </div><!-- Page Title Wrap -->
            </div>
        </div>
    </section>
    <section>
        <div class="w-100 pt-120 pb-280 position-relative">
            <img class="sec-botm-rgt-mckp img-fluid position-absolute" src="assets/images/sec-botm-mckp.png" alt="Sec Bottom Mockup">
            <div class="container" id="activity-content">
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('.activity-menu').addClass('active');
        $(document).ready(function() {
            function get_data($page) {
                $.ajax({
                    url: "{{ route('activity') }}?page=" + $page,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#activity-content').html(data);
                        $('.page-link').on('click', function(e) {
                            e.preventDefault();
                            var page = $(this).attr('href').split('page=')[1];
                            get_data(page);
                        })
                    }
                });
            }

            get_data();

        });
    </script>
@endsection
