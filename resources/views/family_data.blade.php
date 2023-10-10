<div class="serv-wrap wide-sec">
    <div class="row mrg10">
        @foreach ($families as $family)
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="serv-box text-center pat-bg gray-layer opc8 position-relative back-blend-multiply gray-bg w-100" style="background-image: url(assets/images/pattern-bg.jpg);">
                    <h3 class="mb-0">{{ $family->name }}</h3>
                    <p class="mb-0">{{ Str::limit(strip_tags($family->profile), 50, '...') }}</p>
                    <a href="{{ route('family-detail', ['slug' => $family->slug]) }}" title="">Selengkapnya</a>
                </div>
            </div>
        @endforeach
    </div>
</div><!-- Services Wrap -->
<div class="pagination-wrap mt-70 container text-center w-100">
    {{ $families->links() }}
</div><!-- Pagination Wrap -->
