<div class="row">
    @forelse ($activities as $activity)
        <!--Project Page One Single Start-->
        <div class="col-xl-3 col-lg-3 col-md-4">
            <div class="product__all-single">
                <div class="product__all-img-box">
                    <div class="product__all-img">
                        <a class="lightbox" href="{{ asset('storage/' . $activity->path) }}" data-bs-toggle="tooltip" data-bs-placement="top" data-fslightbox="gallery" aria-label="View" data-bs-original-title="View">
                            <img src="{{ asset('storage/' . $activity->path) }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Project Page One Single Start-->
    @empty
        <div class="col-xl-12 col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="100ms">
            <div class="blog-one__single">
                <div class="blog-one__content">
                    <h3 class="blog-one__title">Tutorial Tidak Ditemukan</h3>
                </div>
            </div>
        </div>
    @endforelse
    <div class="col-md-12 data-pagination text-end">
        {{ $activities->links() }}
    </div>
</div>
