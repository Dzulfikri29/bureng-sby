@extends('layouts.app', ['custom_meta' => true])

@section('title', Str::headline('produk'))

@section('custom_meta')
    <meta name="description" content="{{ $product->short_desc }}">
    <meta name="keyword" content="{{ $product->short_desc }}">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="{{ $product->name }}">
    <meta itemprop="description" content="{{ $product->short_desc }}">
    <meta itemprop="image" content="{{ asset('storage/' . $product->images[0]->image) }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $product->name }}">
    <meta property="og:description" content="{{ $product->short_desc }}">
    <meta property="og:image" content="{{ asset('storage/' . $product->images[0]->image) }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $product->name }}">
    <meta name="twitter:description" content="{{ $product->short_desc }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $product->images[0]->image) }}">
@endsection

@section('content')
    <!--Product Details Start-->
    <section class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <div class="product-details__img">
                        <img src="{{ asset('storage/' . $product->images[0]->image) }}" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="product-details__top">
                        <h3 class="product-details__title">{{ $product->name }}<span>{{ number_format($product->price) }}</span> </h3>
                    </div>
                    <div class="product-details__reveiw">

                    </div>
                    <div class="product-details__content">
                        {!! $product->short_desc !!}
                    </div>

                    <div class="product-details__buttons">
                        <div class="product-details__buttons-1">
                            <a href="https://{{ $product->whatsapp_link }}" target="_blank" class="thm-btn">Whatsapp <i class="icon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Product Details End-->

    <!--Product Description Start-->
    <section class="product-description">
        <div class="container">
            <h3 class="product-description__title">Deskripsi</h3>
            {!! $product->description !!}
        </div>
    </section>
    <!--Product Description End-->

@endsection

@section('js')
    <script>
        $('.menu-product').addClass('current');
    </script>
@endsection
