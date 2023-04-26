@extends('admin.layouts.app')

@php
    $main = 'product';
@endphp

@section('title', Str::headline($main)))

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('admin.home.index') }}">{{ Str::headline('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active"><a class="breadcrumb-link" href="{{ route('admin.' . $main . '.index') }}">{{ Str::headline($main) }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ Str::headline('tambah') }}</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">{{ Str::headline('tambah ' . $main) }}</h1>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <div class="row">
            <form class="form-data" action="{{ route('admin.' . $main . '.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">{{ Str::headline("tambah data $main baru") }}</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="product_category_id" class="form-label">{{ Str::headline('kategori') }}</label>
                                    <div class="tom-select-custom mb-1">
                                        <select class="form-select" id="product_category_id" name="product_category_id" required>
                                            <option value="">Pilih Kategori...</option>
                                        </select>
                                    </div>
                                    @error('product_category_id')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @else
                                        <span class="form-text">Cari atau tambakan kategori baru</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="name" class="form-label">{{ Str::headline('nama produk') }}</label>
                                    <input type="text" class="form-control text-capitalize" name="name" id="name" required value="{{ @old('name') }}">
                                    @error('name')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="short_desc" class="form-label">{{ Str::headline('deskripsi singkat') }}</label>
                                    <textarea class="form-control" name="short_desc" id="short_desc" required rows="5">{{ @old('short_desc') }}</textarea>
                                    @error('short_desc')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="price" class="form-label">{{ Str::headline('harga') }}</label>
                                    <input type="text" class="number-inputs form-control" name="price" id="price" required value="{{ @old('price') }}">
                                    @error('price')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="phone" class="form-label">{{ Str::headline('No. Whatsapp') }}</label>
                                    <input type="text" class="form-control" name="phone" id="phone" required value="{{ @old('phone') }}" placeholder="62xxxxxxxxx">
                                    @error('phone')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">{{ Str::headline('deskripsi') }}</label>
                                    <textarea name="description" id="description" style="display: none" cols="30" rows="10"></textarea>
                                    <div class="quill-custom">
                                        <div class="basic-editor" style="height: 15rem;">
                                            {{ @old('description') }}
                                        </div>
                                    </div>
                                    @error('description')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Body -->

                    <!-- Footer -->
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.' . $main . '.index') }}" class="btn btn-warning">Kembali</a>
                    </div>
                    <!-- Footer -->
                </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('admin-assets/js/product/create.js') }}"></script>
    <script>
        $('#product-menu-parent').addClass('active').removeClass('collapsed').attr('aria-expanded', true);
        $('#product-menu-childs').addClass('show');
        $('#{{ $main }}-menu').addClass('active');

        init_basic_editor();

        $('form').submit(function(e) {
            $('#description').text($('.basic-editor .ql-editor').html());
        });
    </script>
@endsection
