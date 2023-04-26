@extends('admin.layouts.app')

@php
    $main = 'structure';
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
        <div class="row">
            <form class="form-data" action="{{ route('admin.' . $main . '.update', $model) }}" method="post" enctype="multipart/form-data">
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">{{ Str::headline("edit data $main") }}</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="structure_id" class="form-label">{{ Str::headline('induk') }}</label>
                                    <div class="tom-select-custom mb-1">
                                        <select class="form-select" id="structure_id" name="structure_id">
                                            @if ($model->structure)
                                                <option value="{{ $model->structure_id }}">{{ $model->structure->position }}</option>
                                            @endif
                                        </select>
                                    </div>
                                    @error('structure_id')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="name" class="form-label">{{ Str::headline('nama') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" required value="{{ $model->name }}">
                                    @error('name')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="position" class="form-label">{{ Str::headline('position') }}</label>
                                    <input type="text" class="form-control" name="position" id="position" required value="{{ $model->position }}">
                                    @error('position')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="photo" class="form-label">{{ Str::headline('photo') }}</label>
                                    <br>
                                    <br>
                                    <span class="avatar avatar-xl avatar-circle my-3">
                                        <img class="avatar-img" src="{{ asset('storage/' . $model->photo) }}" id="photo_preview">
                                    </span>
                                    <input type="file" class="form-control" name="photo" id="photo" onchange="image_preview(this, $('#photo_preview'))">
                                    @error('photo')
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
    <script src="{{ asset('admin-assets/js/structure/create.js') }}"></script>
    <script>
        $('#structure-menu').addClass('active');
    </script>
@endsection
