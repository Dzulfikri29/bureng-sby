@extends('layouts.app')

@section('title', Str::headline('blog'))

@section('content')
    <!--Blog Page Start-->
    <section class="blog-page">
        <div class="container">
            <div class="row" id="blog-container">

            </div>
        </div>
    </section>
    <input type="hidden" id="blog_category_id" value="{{ app('request')->input('blog_category_id') }}">
    <input type="hidden" id="search" value="{{ app('request')->input('search') }}">
    <!--Blog Page End-->
@endsection

@section('js')
    <script src="{{ asset('assets/js/blog.js') }}"></script>
    <script>
        $('.menu-blog').addClass('current');

        $(document).ready(function() {
            get_blogs()
        });
    </script>
@endsection
