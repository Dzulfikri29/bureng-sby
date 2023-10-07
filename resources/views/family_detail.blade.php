@extends('layouts.app')

@section('title', 'Silsilah Keluarga')

@section('css')
    <style>
        svg.tommy .node>rect {
            fill: #0A993C;
        }
    </style>
@endsection

@section('content')
    <section>
        <div class="w-100 pt-120 pb-260 position-relative">
            <img class="sec-botm-rgt-mckp img-fluid position-absolute" src="assets/images/sec-botm-mckp.png" alt="Sec Bottom Mockup">
            <div class="container">
                <div class="post-detail-wrap w-100">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-9">
                            <div class="post-detail-inner w-100">
                                <div class="post-detail-desc w-100">
                                    <h2>Silsilah {{ $family->name }}</h2>
                                </div>
                                <div class="post-detail-desc w-100">
                                    {!! $family->profile !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-3">
                            <aside class="sidebar w-100">
                                <div class="widget2 w-100">
                                    <h3 class="widget-title2">SILSILAH LAIN</h3>
                                    <div class="mini-posts-wrap w-100">
                                        @foreach ($other_families as $other_family)
                                            <div class="mini-post-box d-flex flex-wrap w-100">
                                                <div class="mini-post-info">
                                                    <span class="d-block thm-clr">{{ Carbon\Carbon::parse($other_family->created_at)->format('d F Y') }}</span>
                                                    <h4 class="mb-0"><a href="{{ route('family-detail', ['id' => $other_family->id]) }}" title="">{{ $other_family->name }}</a></h4>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </aside><!-- Sidebar -->
                        </div>
                        <div class="col-md-12 mt-5">
                            <div>
                                <h2 class="">Pohon Keluarga</h2>
                                <div id="tree"></div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="blog-wrap w-100">
                                <h2 class="">Berita</h2>
                                <div class="row">
                                    @foreach ($news as $data_news)
                                        <div class="col-md-6 col-sm-6 col-lg-4">
                                            <div class="post-box w-100">
                                                <div class="post-img overflow-hidden position-relative w-100">
                                                    <a href="{{ route('news-detail', ['slug' => $data_news->slug]) }}" title=""><img class="img-fluid w-100 gallery-size" src="{{ asset('storage/' . $data_news->gallery->path) }}" alt="{{ $data_news->gallery->name }}"></a>
                                                </div>
                                                <div class="post-info position-relative w-100">
                                                    <a class="thm-bg" href="{{ route('news-detail', ['slug' => $data_news->slug]) }}" title=""><i class="fas fa-link"></i></a>
                                                    <span class="post-date thm-clr">{{ Carbon\Carbon::parse($data_news->created_at)->format('d M Y') }}</span>
                                                    <h3 class="mb-0"><a href="{{ route('news-detail', ['slug' => $data_news->slug]) }}" title="">{{ $data_news->name }}</a></h3>
                                                    <ul class="post-meta d-flex flex-wrap mb-0 list-unstyled">
                                                        {{-- <li><i class="fas fa-user-alt"></i>By: <a href="javascript:void(0);" title="">James Smith</a></li> --}}
                                                        {{-- <li><i class="fas fa-comment-alt"></i>1 Comments</li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div><!-- Blog Wrap -->
                        </div>
                        <div class="col-md-12">
                            <div class="gallery-wrap w-100">
                                <h2 class="">Galeri</h2>
                                <div class="row">
                                    @foreach ($galleries as $gallery)
                                        <div class="col-md-6 col-sm-6 col-lg-3">
                                            <div class="gallery-box text-center overflow-hidden position-relative w-100">
                                                <img class="img-fluid w-100 gallery-size" src="{{ asset('storage/' . $gallery->path) }}" alt="{{ $gallery->name }}">
                                                <div class="gallery-info position-absolute">
                                                    <h3 class="mb-0">{{ $gallery->name }}</h3>
                                                    <a class="d-inline-block thm-clr" href="{{ asset('storage/' . $gallery->path) }}" data-fancybox="gallery" title=""><i class="flaticon-view"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Post Detail Wrap -->
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('assets/js/familytree.js') }}"></script>
    <script>
        $('.family-menu').addClass('active');

        get_family_tree();

        function get_family_tree() {
            $.ajax({
                url: "{{ route('family-tree-data', ['id' => $family->id]) }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    init_tree(data);
                }
            });
        }

        function init_tree(data) {

            FamilyTree.SEARCH_PLACEHOLDER = "Cari Nama";
            let family = new FamilyTree(document.getElementById("tree"), {
                nodeBinding: {
                    field_0: "name"
                },
                nodeMouseClick: FamilyTree.action.none,
                template: 'tommy',
                mouseScrool: FamilyTree.action.none,
                nodes: data,
            });
        }
    </script>
@endsection
