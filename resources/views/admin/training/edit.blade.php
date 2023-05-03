@extends('admin.layouts.app')

@php
    $main = 'training';
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
                                    <label for="from_date" class="form-label">{{ Str::headline('tanggal mulai') }}</label>
                                    <input type="date" class="form-control" name="from_date" id="from_date" required value="{{ $model->from_date }}">
                                    @error('from_date')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="to_date" class="form-label">{{ Str::headline('tanggal selesai') }}</label>
                                    <input type="date" class="form-control" name="to_date" id="to_date" required value="{{ $model->to_date }}">
                                    @error('to_date')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="institution" class="form-label">{{ Str::headline('peserta pelatihan') }}</label>
                                    <input type="text" class="form-control" name="institution" id="institution" required value="{{ $model->institution }}">
                                    @error('institution')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="phone" class="form-label">{{ Str::headline('telepon') }}</label>
                                    <input type="number" class="form-control" name="phone" id="phone" required value="{{ $model->phone }}" placeholder="62xxxxxxxxx">
                                    @error('phone')
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
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="activity" class="form-label">{{ Str::headline('nama pelatihan') }}</label>
                                    <input type="text" class="form-control" name="activity" id="activity" required value="{{ $model->activity }}">
                                    @error('activity')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="participant_total" class="form-label">{{ Str::headline('jumlah peserta') }}</label>
                                    <input type="number" class="form-control" name="participant_total" id="participant_total" required value="{{ $model->participant_total }}">
                                    @error('participant_total')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="description" class="form-label">{{ Str::headline('keterangan') }}</label>
                                    <textarea class="form-control" name="description" id="description" required rows="5">{{ $model->description }}</textarea>
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
    <script>
        $('#training-menu').addClass('active');
    </script>
@endsection
