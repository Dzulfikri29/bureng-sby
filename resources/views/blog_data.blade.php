@forelse ($blogs as $blog)
    <!--Blog One Single Start-->
    <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
        <div class="blog-one__single">
            <div class="blog-one__img">
                <img src="{{ asset('storage/' . $blog->image) }}" alt="">
                <div class="blog-one__date">
                    <span>{{ Carbon\Carbon::parse($blog->created_at)->format('d') }}</span>
                    <p>{{ Carbon\Carbon::parse($blog->created_at)->translatedFormat('F') }}</p>
                </div>
            </div>
            <div class="blog-one__content">
                <ul class="blog-one__meta list-unstyled">
                    <li>
                        <a href="#"><i class="fas fa-user-circle"></i> {{ $blog->user_name }}</a>
                    </li>
                </ul>
                <h3 class="blog-one__title"><a href="{{ route('blog.show', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a></h3>
            </div>
        </div>
    </div>
    <!--Blog One Single End-->
@empty
    <div class="col-xl-12 col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="100ms">
        <div class="blog-one__single">
            <div class="blog-one__content">
                <h3 class="blog-one__title">Blog Tidak Ditemukan</h3>
            </div>
        </div>
    </div>
@endforelse
<div class="col-md-12 data-pagination text-end">
    {{ $blogs->links() }}
</div>
