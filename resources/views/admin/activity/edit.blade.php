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
                            <li class="breadcrumb-item active" aria-current="page">{{ Str::headline('edit') }}</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">{{ Str::headline('edit ' . $main) }}</h1>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <form class="form-data" action="{{ route('admin.' . $main . '.update', [$main => $model->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">{{ Str::headline("edit data $main") }}</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="title" class="form-label">{{ Str::headline('judul') }}</label>
                                        <input type="text" class="form-control text-capitalize" name="title" id="title" required value="{{ $model->title }}">
                                        @error('title')
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
        <div class="card mb-3 mb-lg-5">
            <div class="card-header card-header-content-between">
                <h4 class="card-header-title">{{ Str::headline('gambar ' . $main) }}</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <form action="{{ route('admin.activity-image.store') }}" id="activity-image-upload" class="dropzone dz-dropzone dz-dropzone-card" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="activity_id" id="activity_id" value="{{ $model->id }}">
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
        <!-- End Card -->
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('admin-assets/js/activity/create.js') }}"></script>
    <script>
        $('#{{ $main }}-menu').addClass('active');
        $(document).ready(function() {
            get_activity_images();
        });
    </script>
@endsection
