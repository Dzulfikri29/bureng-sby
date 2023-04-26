@extends('admin.layouts.app')

@php
    $main = 'activity';
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
        <form class="form-data" action="{{ route('admin.' . $main . '.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">{{ Str::headline("tambah data $main baru") }}</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="title" class="form-label">{{ Str::headline('judul') }}</label>
                                        <input type="text" class="form-control text-capitalize" name="title" id="title" required value="{{ @old('title') }}">
                                        @error('title')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="image" class="form-label">{{ Str::headline('gambar utama') }}</label>
                                        <input type="file" class="form-control text-capitalize" name="image" id="image" required onchange="image_preview(this, $('#file_preview'))">
                                        @error('image')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                        <br>
                                        <span class="avatar avatar-xxl avatar-4x3 mb-2">
                                            <img class="avatar-img" src="" id="file_preview">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Body -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">{{ Str::headline('SEO Setting') }}</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="title" class="form-label">{{ Str::headline('meta title') }}</label>
                                        <input type="text" class="form-control text-capitalize" name="meta_title" id="meta_title" required value="{{ @old('meta_title') }}">
                                        @error('meta_title')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="keywords" class="form-label">{{ Str::headline('meta keywords') }}</label>
                                        <textarea type="text" class="form-control text-lowercase" name="meta_keywords" id="meta_keywords" required rows="5">{{ @old('meta_keywords') }}</textarea>
                                        @error('meta_keywords')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="description" class="form-label">{{ Str::headline('meta description') }}</label>
                                        <textarea type="text" class="form-control text-capitalize" name="meta_description" id="meta_description" required rows="5">{{ @old('meta_description') }}</textarea>
                                        @error('meta_description')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Body -->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">{{ Str::headline("konten $main") }}</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">{{ Str::headline('deskripsi') }}</label>
                                        <textarea name="body" id="body" style="display: none" cols="30" rows="10"></textarea>
                                        <div class="quill-custom">
                                            <div class="advance-editor" style="height: 15rem;" data-url="{{ route('admin.activity.upload-image') }}" data-delete-url="{{ route('admin.activity.delete-image') }}">
                                                {!! @old('body') !!}
                                            </div>
                                        </div>
                                        @error('body')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Body -->
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
            </div>
        </form>
        <!-- End Card -->
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('admin-assets/js/activity/create.js') }}"></script>
    <script>
        $('#{{ $main }}-menu').addClass('active');

        $(document).ready(function() {
            init_advance_editor();
        });

        $('form').submit(function(e) {
            $('#body').text($('.advance-editor .ql-editor').html());
        });
    </script>
@endsection
