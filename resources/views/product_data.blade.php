<div class="row">
    <!--Product All Single Start-->
    @forelse ($products as $product)
        <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="product__all-single">
                <div class="product__all-img-box">
                    <div class="product__all-img">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="">
                        <div class="product__all-img-icon">
                        </div>
                    </div>
                </div>
                <div class="product__all-content">
                    <h4 class="product__all-title"><a href="{{ route('product.show', ['slug' => $product->slug]) }}">{{ $product->name }}</a></h4>
                    <p class="product__all-price">{{ number_format($product->price) }}</p>
                </div>
            </div>
        </div>
    @empty
        <div class="col-xl-12 col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="100ms">
            <div class="blog-one__single">
                <div class="blog-one__content">
                    <h3 class="blog-one__title">Produk Tidak Ditemukan</h3>
                </div>
            </div>
        </div>
    @endforelse
    <!--Product All Single End-->

    <div class="col-md-12 data-pagination text-end">
        {{ $products->links() }}
    </div>
</div>
