@extends('admin.layouts.app')

@php
    $main = 'family';
    $title = 'keluarga';
@endphp

@section('title', Str::headline($main))

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

                    <h1 class="page-header-title">{{ Str::headline('tambah ' . $title) }}</h1>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3 mb-lg-5">
                    <!-- Body -->
                    <div class="card-body">
                        <form class="form-data" action="{{ route('admin.' . $main . '.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="name" class="form-label">{{ Str::headline('nama keluarga') }}</label>
                                        <input type="text" class="form-control" name="name" id="name" required value="{{ old('name') }}" placeholder="">
                                        @error('name')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">{{ Str::headline('keterangan') }}</label>
                                        <textarea name="profile" id="body" style="display: none" cols="30" rows="10"></textarea>
                                        <div class="quill-custom">
                                            <div class="advance-editor" style="height: 15rem;" data-url="{{ route('admin.family.upload-image') }}" data-delete-url="{{ route('admin.family.delete-image') }}">
                                                {!! @old('profile') !!}
                                            </div>
                                        </div>
                                        @error('body')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('admin.' . $main . '.index') }}" class="btn btn-warning">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Body -->
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('admin-assets/js/family/create.js') }}"></script>
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
