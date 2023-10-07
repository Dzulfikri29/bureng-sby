<div class="blog-wrap w-100">
    <div class="row">
        @foreach ($news as $news_data)
            <div class="col-md-6 col-sm-6 col-lg-4">
                <div class="post-box w-100">
                    <div class="post-img overflow-hidden position-relative w-100">
                        <a href="{{ route('activity-detail', ['slug' => $news_data->slug]) }}" title=""><img class="img-fluid w-100 gallery-size" src="{{ asset('storage/' . $news_data->gallery->path) }}" alt="{{ $news_data->gallery->name }}"></a>
                    </div>
                    <div class="post-info position-relative w-100">
                        <a class="thm-bg" href="{{ route('activity-detail', ['slug' => $news_data->slug]) }}" title=""><i class="fas fa-link"></i></a>
                        <span class="post-date thm-clr">{{ Carbon\Carbon::parse($news_data->date)->format('d F Y') }}</span>
                        <h3 class="mb-0"><a href="{{ route('activity-detail', ['slug' => $news_data->slug]) }}" title="">{{ $news_data->name }}</a></h3>
                        <span class="event-loc d-block thm-clr mt-3"><i class="fas fa-map-marker-alt"></i>{{ $news_data->location }}</span>

                        <ul class="post-meta d-flex flex-wrap mb-0 list-unstyled">
                            {{-- <li><i class="fas fa-user-alt"></i>By: <a href="javascript:void(0);" title="">James Smith</a></li>
                            <li><i class="fas fa-comment-alt"></i>1 Comments</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div><!-- Blog Wrap -->
<div class="pagination-wrap mt-70 container text-center w-100">
    {{ $news->links() }}
</div><!-- Pagination Wrap -->
