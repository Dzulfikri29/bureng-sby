<div class="gallery-wrap w-100">
    <div class="row mrg">
        @foreach ($galleries as $gallery)
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="gallery-box text-center overflow-hidden position-relative w-100">
                    <img class="img-fluid w-100 gallery-size" src="{{ asset('storage/' . $gallery->path) }}" alt="{{ $gallery->name }}">
                    <div class="gallery-info position-absolute">
                        <span class="d-block thm-clr">{{ $gallery->name }}</span>
                        <a class="d-inline-block thm-clr" href="{{ asset('storage/' . $gallery->path) }}" data-fancybox="gallery" title=""><i class="flaticon-view"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div><!-- Gallery Wrap -->
<div class="pagination-wrap mt-70 container text-center w-100">
    {{ $galleries->links() }}
</div><!-- Pagination Wrap -->
