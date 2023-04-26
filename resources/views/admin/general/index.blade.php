@extends('admin.layouts.app')

@php
    $main = 'general';
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
                            <li class="breadcrumb-item active" aria-current="page">{{ Str::headline('overview') }}</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">{{ Str::headline('overview ' . $main) }}</h1>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <form class="form-data" action="{{ route('admin.' . $main . '.update', $model) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-7">
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">{{ Str::headline('informasi general') }}</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="website_name" class="form-label">{{ Str::headline('nama website') }}</label>
                                        <input type="text" class="form-control" name="website_name" id="website_name" required value="{{ $model->website_name }}">
                                        @error('website_name')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="tagline" class="form-label">{{ Str::headline('tagline') }}</label>
                                        <input type="text" class="form-control" name="tagline" id="tagline" required value="{{ $model->tagline }}">
                                        @error('tagline')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="phone" class="form-label">{{ Str::headline('telepon') }}</label>
                                        <input type="number" class="form-control" name="phone" id="phone" required value="{{ $model->phone }}" placeholder="62xxxxxxxxx">
                                        @error('phone')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="email" class="form-label">{{ Str::headline('email') }}</label>
                                        <input type="email" class="form-control" name="email" id="email" required value="{{ $model->email }}">
                                        @error('email')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="address" class="form-label">{{ Str::headline('alamat') }}</label>
                                        <textarea class="form-control" name="address" id="address" required rows="5">{{ $model->address }}</textarea>
                                        @error('address')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="training_registration" class="form-label">{{ Str::headline('pendaftaran pelatihan') }}</label>
                                        <textarea class="form-control" name="training_registration" id="training_registration" required rows="5">{{ $model->training_registration }}</textarea>
                                        @error('training_registration')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <h4 class="mb-4">Pengaturan SEO</h4>
                                </div>
                                <div class="col-md-12">
                                    <div id="fancyboxGallery" class="js-fancybox row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label for="meta_image" class="form-label">{{ Str::headline('meta image') }}</label>

                                                <!-- Card -->
                                                <div class="card card-sm">
                                                    <img class="card-img-top" id="meta_image_preview" src="{{ asset('storage/' . $model->meta_image) }}">
                                                    <div class="card-body">
                                                        <div class="row col-divider text-center">
                                                            <div class="col">
                                                                <a class="text-body" href="{{ asset('storage/' . $model->meta_image) }}" data-bs-toggle="tooltip" data-bs-placement="top" data-fslightbox="gallery" aria-label="View" data-bs-original-title="View">
                                                                    <i class="bi-eye"></i>
                                                                </a>
                                                            </div>
                                                            <!-- End Col -->
                                                        </div>
                                                        <!-- End Row -->
                                                    </div>
                                                    <!-- End Col -->
                                                </div>
                                                <br>
                                                <input type="file" class="form-control" name="meta_image" id="meta_image" value="{{ $model->meta_image }}" onchange="image_preview(this, $('#meta_image_preview'))">
                                                @error('meta_image')
                                                    <span class="form-text text-danger">{{ $message }}</span>
                                                @enderror
                                                <!-- End Card -->
                                            </div>
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="meta_description" class="form-label">{{ Str::headline('meta description') }}</label>
                                        <textarea class="form-control" name="meta_description" id="meta_description" required rows="5">{{ $model->meta_description }}</textarea>
                                        @error('meta_description')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="meta_keywords" class="form-label">{{ Str::headline('meta keywords') }}</label>
                                        <textarea class="form-control" name="meta_keywords" id="meta_keywords" required rows="5">{{ $model->meta_keywords }}</textarea>
                                        @error('meta_keywords')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Body -->
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">{{ Str::headline('Logo Website') }}</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <div id="fancyboxGallery" class="js-fancybox row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="logo" class="form-label">{{ Str::headline('logo horizontal') }}</label>
                                        <div class="card">
                                            <img class="card-img-top" id="logo_preview" src="{{ asset('storage/' . $model->logo) }}">
                                            <div class="card-body">
                                                <div class="row col-divider text-center">
                                                    <div class="col">
                                                        <a class="text-body" href="{{ asset('storage/' . $model->logo) }}" data-bs-toggle="tooltip" data-bs-placement="top" data-fslightbox="gallery" aria-label="View" data-bs-original-title="View">
                                                            <i class="bi-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <input type="file" class="form-control" name="logo" id="logo" value="{{ $model->logo }}" onchange="image_preview(this, $('#logo_preview'))">
                                        @error('logo')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="logo_white" class="form-label">{{ Str::headline('logo horizontal white') }}</label>
                                        <div class="card">
                                            <img class="card-img-top" id="logo_white_preview" src="{{ asset('storage/' . $model->logo_white) }}">
                                            <div class="card-body">
                                                <div class="row col-divider text-center">
                                                    <div class="col">
                                                        <a class="text-body" href="{{ asset('storage/' . $model->logo_white) }}" data-bs-toggle="tooltip" data-bs-placement="top" data-fslightbox="gallery" aria-label="View" data-bs-original-title="View">
                                                            <i class="bi-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <input type="file" class="form-control" name="logo_white" id="logo_white" value="{{ $model->logo_white }}" onchange="image_preview(this, $('#logo_white_preview'))">
                                        @error('logo_white')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="logo_short" class="form-label">{{ Str::headline('logo icon') }}</label>
                                        <div class="card">
                                            <img class="card-img-top" id="logo_short_preview" src="{{ asset('storage/' . $model->logo_short) }}">
                                            <div class="card-body">
                                                <div class="row col-divider text-center">
                                                    <div class="col">
                                                        <a class="text-body" href="{{ asset('storage/' . $model->logo_short) }}" data-bs-toggle="tooltip" data-bs-placement="top" data-fslightbox="gallery" aria-label="View" data-bs-original-title="View">
                                                            <i class="bi-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <input type="file" class="form-control" name="logo_short" id="logo_short" value="{{ $model->logo_short }}" onchange="image_preview(this, $('#logo_short_preview'))">
                                        @error('logo_short')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="logo_short_white" class="form-label">{{ Str::headline('logo icon white') }}</label>
                                        <div class="card">
                                            <img class="card-img-top" id="logo_short_white_preview" src="{{ asset('storage/' . $model->logo_short_white) }}">
                                            <div class="card-body">
                                                <div class="row col-divider text-center">
                                                    <div class="col">
                                                        <a class="text-body" href="{{ asset('storage/' . $model->logo_short_white) }}" data-bs-toggle="tooltip" data-bs-placement="top" data-fslightbox="gallery" aria-label="View" data-bs-original-title="View">
                                                            <i class="bi-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <input type="file" class="form-control" name="logo_short_white" id="logo_short_white" value="{{ $model->logo_short_white }}" onchange="image_preview(this, $('#logo_short_white_preview'))">
                                        @error('logo_short_white')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="browser_logo" class="form-label">{{ Str::headline('logo browser') }}</label>
                                        <div class="card">
                                            <img class="card-img-top" id="browser_logo_preview" src="{{ asset('storage/' . $model->browser_logo) }}">
                                            <div class="card-body">
                                                <div class="row col-divider text-center">
                                                    <div class="col">
                                                        <a class="text-body" href="{{ asset('storage/' . $model->browser_logo) }}" data-bs-toggle="tooltip" data-bs-placement="top" data-fslightbox="gallery" aria-label="View" data-bs-original-title="View">
                                                            <i class="bi-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <input type="file" class="form-control" name="browser_logo" id="browser_logo" value="{{ $model->browser_logo }}" onchange="image_preview(this, $('#browser_logo_preview'))">
                                        @error('browser_logo')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mb-3 mb-lg-5">
                        <!-- Header -->
                        <div class="card-header">
                            <h4 class="card-header-title">{{ Str::headline('social media') }}</h4>
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <div id="social-media-form">
                                @foreach ($social_media as $key => $media)
                                    <div class="row align-items-end mb-4" id="social_media_row_{{ $key }}">
                                        <div class="col-md-3">
                                            <label for="name" class="form-label">{{ Str::headline('social media') }}</label>
                                            <input type="text" class="form-control" name="name[]" id="name_{{ $key }}" value="{{ $media->name }}" required>
                                            <input type="hidden" name="social_media_id[]" value="{{ $media->id }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="user_name" class="form-label">{{ Str::headline('username') }}</label>
                                            <input type="text" class="form-control" name="user_name[]" id="user_name_{{ $key }}" value="{{ $media->user_name }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="link" class="form-label">{{ Str::headline('link') }}</label>
                                            <input type="text" class="form-control" name="link[]" id="link_{{ $key }}" value="{{ $media->link }}" required>
                                        </div>
                                        <div class="col align-items-end">
                                            <button type="button" class="btn btn-danger" onclick="$('#social_media_row_{{ $key }}').remove()"><i class="bi-dash-circle"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" id="social_media_row_count" value="{{ count($social_media) }}">
                            <a href="javascript:;" class="form-link" onclick="add_social_media_row()">
                                <i class="bi-plus"></i> Tambah Social Media Lain
                            </a>
                        </div>
                        <!-- Body -->
                    </div>
                </div>
            </div>
            <div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3" style="max-width: 40rem;">
                <!-- Card -->
                <div class="card card-sm mx-2">
                    <div class="card-body">
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <div class="d-flex gap-3">
                                    <a href="{{ route('admin.' . $main . '.index') }}" class="btn btn-warning">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </form>
        <!-- End Card -->
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('admin-assets/js/general/general.js') }}"></script>
    <script>
        $('#general-menu').addClass('active');
    </script>
@endsection
