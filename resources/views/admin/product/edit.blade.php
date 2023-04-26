@extends('admin.layouts.app')

@php
    $main = 'product';
@endphp

@section('title', Str::headline($main)))

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('admin.home.index') }}">{{ Str::headline('dashboard') }}</a>
                            </li>
                            <li class="breadcrumb-item active"><a class="breadcrumb-link" href="{{ route('admin.' . $main . '.index') }}">{{ Str::headline($main) }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ Str::headline('edit') }}</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">{{ Str::headline('edit ' . $main) }}</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <form class="form-data" action="{{ route('admin.' . $main . '.update', [$main => $model->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card mb-3 mb-lg-5">
                    <div class="card-header">
                        <h4 class="card-header-title">{{ Str::headline("edit data $main") }}</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="product_category_id" class="form-label">{{ Str::headline('kategori') }}</label>
                                    <div class="tom-select-custom mb-1">
                                        <select class="form-select" id="product_category_id" name="product_category_id" required>
                                            <option value="{{ $model->product_category_id }}">{{ $model->product_category->name }}</option>
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
                                    <input type="text" class="form-control text-capitalize" name="name" id="name" required value="{{ $model->name }}">
                                    @error('name')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="short_desc" class="form-label">{{ Str::headline('deskripsi singkat') }}</label>
                                    <textarea class="form-control" name="short_desc" id="short_desc" required rows="5">{{ $model->short_desc }}</textarea>
                                    @error('short_desc')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="price" class="form-label">{{ Str::headline('harga') }}</label>
                                    <input type="text" class="number-inputs form-control" name="price" id="price" required value="{{ $model->price }}">
                                    @error('price')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="phone" class="form-label">{{ Str::headline('No. Whatsapp') }}</label>
                                    <input type="text" class="form-control" name="phone" id="phone" required value="{{ $model->phone }}" placeholder="62xxxxxxxxx">
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
                                            {!! $model->description !!}
                                        </div>
                                    </div>
                                    @error('description')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3" style="max-width: 40rem;">
                    <div class="card card-sm mx-2">
                        <div class="card-body">
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('admin.' . $main . '.index') }}" class="btn btn-warning">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card mb-3 mb-lg-5">
                <div class="card-header card-header-content-between">
                    <h4 class="card-header-title">{{ Str::headline('gambar ' . $main) }}</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <form action="{{ route('admin.product-image.store') }}" id="product-image-upload" class="dropzone dz-dropzone dz-dropzone-card" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" id="product_id" value="{{ $model->id }}">
                                <div class="dz-message">
                                    <img class="avatar avatar-xl avatar-4x3 mb-3" src="{{ asset('admin-assets/svg/illustrations/oc-browse.svg') }}" alt="Image Description" data-hs-theme-appearance="default">
                                    <img class="avatar avatar-xl avatar-4x3 mb-3" src="{{ asset('admin-assets/svg/illustrations-light/oc-browse.svg') }}" alt="Image Description" data-hs-theme-appearance="dark">

                                    <h5>Drag and drop your file here</h5>

                                    <p class="mb-2">or</p>

                                    <span class="btn btn-white btn-sm">Browse files</span>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div id="fancyboxGallery" class="js-fancybox row justify-content-sm-center gx-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('admin-assets/js/product/create.js') }}"></script>
    <script>
        $('#product-menu-parent').addClass('active').removeClass('collapsed').attr('aria-expanded', true);
        $('#product-menu-childs').addClass('show');
        $('#{{ $main }}-menu').addClass('active');

        init_basic_editor();

        get_product_images();

        $('form').submit(function(e) {
            $('#description').text($('.basic-editor .ql-editor').html());
        });
    </script>
@endsection
