@extends('layouts.app')

@section('title', Str::headline('tutorial'))

@section('content')
    <!--Blog Page Start-->
    <section class="blog-page">
        <div class="container">
            <div class="row justify-content-start">
                <div class="col-md-6">
                    <div class="sidebar__single sidebar__search mb-5">
                        <form action="" class="sidebar__search-form">
                            <input type="search" placeholder="Cari Tutorial" id="search" value="{{ app('request')->input('search') }}">
                            <button type="submit" disabled><i class="icon-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row" id="tutorial-container">

            </div>
        </div>
    </section>
    <!--Blog Page End-->
@endsection

@section('js')
    <script src="{{ asset('assets/js/tutorial.js') }}"></script>
    <script>
        $('.menu-tutorial').addClass('current');

        $(document).ready(function() {
            get_tutorials()

            $('.sidebar__search-form').submit(function(e) {
                e.preventDefault()
            });
        });
    </script>
@endsection
