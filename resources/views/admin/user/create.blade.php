@extends('admin.layouts.app')

@php
    $main = 'user';
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
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">{{ Str::headline("tambah data $main baru") }}</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="name" class="form-label">{{ Str::headline('nama user') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" required value="{{ @old('name') }}">
                                    @error('name')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="email" class="form-label">{{ Str::headline('email') }}</label>
                                    <input type="email" class="form-control" name="email" id="email" required value="{{ @old('email') }}">
                                    @error('email')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="password" class="form-label">{{ Str::headline('password') }}</label>
                                    <input type="password" class="form-control" name="password" id="password" required value="{{ @old('password') }}">
                                    @error('password')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="photo" class="form-label">{{ Str::headline('photo') }}</label>
                                    <br>
                                    <span class="avatar avatar-xl avatar-circle my-3">
                                        <img class="avatar-img" src="" id="photo_preview">
                                    </span>
                                    <input type="file" class="form-control" name="photo" id="photo" onchange="image_preview(this, $('#photo_preview'))" required>
                                    @error('photo')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="family_id" class="form-label">{{ Str::headline('keluarga terkait') }}</label>
                                    <div class="tom-select-custom mb-1">
                                        <select class="form-select" id="family_id" name="family_id">
                                            <option value="">Pilih Keluarga Terkait...</option>
                                        </select>
                                    </div>
                                    @error('family_id')
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
    <script>
        $('#user-menu').addClass('active');

        var family_id = new TomSelect('#family_id', {
            valueField: 'id',
            labelField: 'name',
            searchField: 'name',
            createOnBlur: false,
            create: false,
            load: function(query, callback) {
                var url = `${base_url}/family/select`;
                fetch(url, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            'search': encodeURIComponent(query),
                            '_token': token,
                        }),
                    })
                    .then(response => response.json())
                    .then(json => {
                        callback(json);
                    }).catch(() => {
                        callback();
                    });

            },
        });
    </script>
@endsection
