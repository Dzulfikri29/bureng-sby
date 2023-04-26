@extends('layouts.app')

@section('title', Str::headline('produk'))

@section('content')
    <!--Product Start-->
    <section class="product">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="product__sidebar">
                        <div class="shop-search product__sidebar-single">
                            <form action="#">
                                <input type="text" placeholder="Search" id="search">
                            </form>
                        </div>
                        <div class="shop-category product__sidebar-single">
                            <h3 class="product__sidebar-title">Kategori</h3>
                            <input type="hidden" id="product_category_id">
                            <ul class="list-unstyled">
                                <li class="category-list active" id="category_"><a href="javascript:;set_category('')">Semua</a></li>
                                @foreach ($categories as $category)
                                    <li class="category-list" id="category_{{ $category->id }}"><a href="javascript:;set_category({{ $category->id }})">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9">
                    <div class="product__items">
                        <div class="product__all">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Product End-->
@endsection

@section('js')
    <script src="{{ asset('assets/js/product.js') }}"></script>
    <script>
        $('.menu-product').addClass('current');

        $(document).ready(function() {
            get_products()
        });
    </script>
@endsection
