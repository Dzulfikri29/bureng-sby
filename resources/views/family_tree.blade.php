@extends('layouts.app')

@section('title', 'Pohon Keluarga')

@section('css')
    <style>
        svg.myTemplate .node>rect {
            fill: #0A993C;
        }

        .bft-light {
            background-color: #e8e8e8 !important;
            border-radius: 10px !important;
        }
    </style>
@endsection

@section('content')
    <section>
        <div class="w-100 pt-120 pb-260 position-relative">
            <img class="sec-botm-rgt-mckp img-fluid position-absolute" src="{{ asset('assets/images/sec-botm-mckp.png') }}" alt="Sec Bottom Mockup">
            <div class="container">
                <div class="post-detail-wrap w-100">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="post-detail-inner w-100">
                                <div class="post-detail-desc w-100">
                                    <h2>Pohon Keluarga {{ $family->name }}</h2>
                                </div>
                                <div class="post-detail-img w-100">
                                    @if ($family->gallery)
                                        <img class="img-fluid w-100" src="{{ asset('storage/' . $family->gallery->path) }}" alt="{{ $family->gallery->name }}">
                                    @endif
                                </div>
                                <div class="post-detail-desc w-100">
                                    {!! $family->profile !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="">Pohon Keluarga</h2>
                                    </div>
                                </div>
                                <svg class="tommy" style="position: fixed; top: -10000px; left: -10000px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:block;">
                                    <clipPath id="ulaImg">
                                        <rect height="50" width="50" x="7" y="7" stroke-width="1" fill="#FF46A3" stroke="#aeaeae" rx="5" ry="5"></rect>
                                    </clipPath>
                                    <image id="imageSvg" x="7" y="7" preserveAspectRatio="xMidYMid slice" clip-path="url(#ulaImg)" xlink:href="{val}" width="50" height="50"></image>
                                    <text id="field_0" style="font-size: 10px;text-align:left;font-weight:bold" fill="#ffffff" x="65" y="20" text-anchor="start"></text>
                                    <text id="field_1" style="font-size: 8px;text-align:left" fill="#ffffff" x="65" y="35" text-anchor="start"></text>
                                    <text id="field_2" style="font-size: 8px;text-align:left" fill="#ffffff" x="65" y="45" text-anchor="start"></text>
                                    <text id="field_3" style="font-size: 8px;text-align:left" fill="#ffffff" x="65" y="55" text-anchor="start"></text>
                                </svg>
                                <div id="tree"></div>
                            </div>
                        </div>
                        @if (count($news) > 0)
                            <div class="col-md-12 mt-5">
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
                        @endif
                        @if (count($galleries) > 0)
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
                        @endif
                    </div>
                </div><!-- Post Detail Wrap -->
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('assets/js/familytree.js') }}"></script>
    <script>
        $('.family-tree-menu').addClass('active');

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
            const imgTemplate =
                '<clipPath id="ulaImg">' +
                '<rect  height="50" width="50" x="7" y="7" stroke-width="1" fill="#FF46A3" stroke="#aeaeae" rx="5" ry="5"></rect>' +
                '</clipPath>' +
                '<image id="imageSvg" x="7" y="7" preserveAspectRatio="xMidYMid slice" clip-path="url(#ulaImg)" xlink:href="{val}" width="50" height="50">' +
                '</image>';

            FamilyTree.SEARCH_PLACEHOLDER = "Cari Nama";
            FamilyTree.templates.myTemplate = Object.assign({}, FamilyTree.templates.tommy);
            FamilyTree.templates.myTemplate.field_0 = '<text class="content-text" style="font-size: 10px;text-align:left;font-weight:bold" fill="#ffffff" x="65" y="20" text-anchor="left">{val}</text>';
            FamilyTree.templates.myTemplate.field_1 = '<text class="content-text" style="font-size: 8px;text-align:left" fill="#ffffff" x="65" y="35" text-anchor="left">{val}</text>';
            FamilyTree.templates.myTemplate.field_2 = '<text class="content-text" style="font-size: 8px;text-align:left" fill="#ffffff" x="65" y="45" text-anchor="left">{val}</text>';
            FamilyTree.templates.myTemplate.field_3 = '<text class="content-text" style="font-size: 8px;text-align:left" fill="#ffffff" x="65" y="55" text-anchor="left">{val}</text>';
            FamilyTree.templates.myTemplate.img_0 = imgTemplate;

            let family = new FamilyTree(document.getElementById("tree"), {
                scaleInitial: FamilyTree.match.boundary,
                nodeBinding: {
                    field_0: "name",
                    field_1: "birth_date",
                    field_2: "death_date",
                    field_3: "place_of_death",
                    img_0: "img"
                },
                nodeMouseClick: FamilyTree.action.none,
                template: 'myTemplate',
                mouseScrool: FamilyTree.action.zoom,
                nodes: data,
                zoom: {
                    speed: 120,
                    smooth: 10
                }
            });


            family.on('node-initialized', function(sender, args) {
                var data = family._get(args.node.id);

                console.log(args);

                if (data.name) {
                    document.getElementById('field_0').innerHTML = data.name;
                    document.getElementById('field_1').innerHTML = data.birth_date;
                    document.getElementById('field_2').innerHTML = data.death_date;
                    document.getElementById('field_3').innerHTML = data.place_of_death;
                    document.getElementById('imageSvg').setAttribute('xlink:href', data.img);

                    var rect = document.getElementById('field_0').getBoundingClientRect();
                    var rect_1 = document.getElementById('field_1').getBoundingClientRect();
                    var rect_2 = document.getElementById('field_2').getBoundingClientRect();
                    var rect_3 = document.getElementById('field_3').getBoundingClientRect();
                    var rect_4 = document.getElementById('imageSvg').getBoundingClientRect();

                    var max_width = Math.max(rect.width, rect_1.width, rect_2.width, rect_3.width);
                    args.node.w = rect_4.width + max_width + 20;

                    var content_height = rect.height + rect_1.height + rect_2.height + rect_3.height;
                    var final_height = Math.max(content_height, rect_4.height);
                    args.node.h = final_height + 20;
                }
            });
        }
    </script>
@endsection
