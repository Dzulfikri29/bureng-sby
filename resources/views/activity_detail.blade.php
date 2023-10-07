@extends('layouts.app')

@section('title', 'Kegiatan')

@section('content')
    <section>
        <div class="w-100 pt-80 black-layer pb-70 opc65 position-relative">
            <div class="fixed-bg" style="background-image: url({{ asset('assets/images/pattern-bg.jpg') }});"></div>
            <div class="container">
                <div class="page-title-wrap text-center w-100">
                    <div class="page-title-inner d-inline-block">
                        <h1 class="mb-0">Kegiatan</h1>
                    </div>
                </div><!-- Page Title Wrap -->
            </div>
        </div>
    </section>
    <section>
        <div class="w-100 pt-120 pb-260 position-relative">
            <div class="container">
                <div class="post-detail-wrap w-100">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-9">
                            <div class="post-detail-inner w-100">
                                <div class="post-detail-img w-100">
                                    <img class="img-fluid w-100" src="{{ asset('storage/' . $news->gallery->path) }}" alt="{{ $news->gallery->name }}">
                                </div>
                                <div class="post-detail-info position-relative w-100">
                                    <div class="post-info2-inner text-center">
                                        <div class="post-date2">
                                            <span class="d-block">{{ Carbon\Carbon::parse($news->created_at)->format('d') }}</span>
                                            <i class="d-block thm-bg">{{ Carbon\Carbon::parse($news->created_at)->format('M Y') }}</i>
                                        </div>
                                    </div>
                                    <h2 class="mb-0">{{ $news->name }}</h2>
                                    {!! $news->body !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <aside class="sidebar w-100">
                                <div class="widget2 w-100">
                                    <h3 class="widget-title2">KEGIATAN LAIN</h3>
                                    <div class="mini-posts-wrap w-100">
                                        @foreach ($other_news as $other_news_data)
                                            <div class="mini-post-box d-flex flex-wrap w-100">
                                                <a href="{{ route('activity-detail', ['slug' => $other_news_data->slug]) }}" title=""><img class="img-fluid w-100 blog-thumb" src="{{ asset('storage/' . $other_news_data->gallery->path) }}" alt="{{ $other_news_data->gallery->name }}"></a>
                                                <div class="mini-post-info">
                                                    <span class="d-block thm-clr">{{ Carbon\Carbon::parse($news->created_at)->format('d M Y') }}</span>
                                                    <h4 class="mb-0"><a href="{{ route('activity-detail', ['slug' => $other_news_data->slug]) }}" title="">{{ $other_news_data->name }}</a></h4>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </aside><!-- Sidebar -->
                        </div>
                    </div>
                </div><!-- Post Detail Wrap -->
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('.activity-menu').addClass('active');
    </script>
@endsection
