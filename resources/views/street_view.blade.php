@extends('layouts.app')

@section('title', Str::headline('360 street view'))

@section('content')

    <section class="about-three">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center">
                        <div class="section-title text-center">
                            <h2 class="section-title__title agrion-font">Coming Soon</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About Three End-->
@endsection

@section('js')
    <script>
        $('.menu-profile').addClass('current');
    </script>
@endsection
