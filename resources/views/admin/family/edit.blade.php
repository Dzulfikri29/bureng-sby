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

                    <h1 class="page-header-title">{{ Str::headline('edit ' . $title) }}</h1>
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
                        <form class="form-data" action="{{ route('admin.' . $main . '.update', $model) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="name" class="form-label">{{ Str::headline('nama keluarga') }}</label>
                                        <input type="text" class="form-control" name="name" id="name" required value="{{ $model->name }}" placeholder="">
                                        @error('name')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="gallery_id" class="form-label">{{ Str::headline('gambar') }}</label>
                                        <div class="tom-select-custom mb-1">
                                            <select class="form-select" id="gallery_id" name="gallery_id" required>
                                                @if ($model->gallery_id)
                                                    <option value="{{ $model->gallery_id }}" selected>{{ $model->gallery->name }}</option>
                                                @endif
                                            </select>
                                        </div>
                                        @error('gallery_id')
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
                                                {!! $model->profile !!}
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
        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header">
                <div class="mb-2 mb-md-0">
                    <div class="row">
                        <div class="col">
                            <h1 class="page-header-title">{{ Str::headline('pohon keluarga') }}</h1>
                        </div>
                        <div class="col-md-4 text-end">
                            <button type="button" class="btn btn-primary" href="{{ route('admin.family-tree.create') }}" onclick="add_data()">
                                <i class="bi-plus me-1"></i> {{ Str::headline('tambah pohon keluarga') }}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-header-content-md-between mt-2">
                    <div class="mb-2 mb-md-0">
                        <form>
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend input-group-text">
                                    <i class="bi-search"></i>
                                </div>
                                <input id="datatableSearch" type="search" class="form-control" placeholder="Search Pohon Keluarga" aria-label="Search Pohon Keluarga">
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>
                    <div class="d-grid d-sm-flex justify-content-md-end align-items-sm-center gap-2">
                        <!-- Datatable Info -->
                        <div id="datatableCounterInfo" style="display: none;">
                            <div class="d-flex align-items-center">
                                <span class="fs-5 me-3">
                                    <span id="datatableCounter">0</span>
                                    Selected
                                </span>
                                <a class="btn btn-outline-danger btn-sm" href="javascript:;" onclick="multiple_delete('{{ $main }}')">
                                    <i class="bi-trash"></i> Delete
                                </a>
                            </div>
                        </div>
                        <!-- End Datatable Info -->
                    </div>
                </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <input type="hidden" id="family_id" value="{{ $model->id }}">
                <table id="datatable-family-tree" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                                    <label class="form-check-label" for="datatableCheckAll"></label>
                                </div>
                            </th>
                            <th>{{ Str::headline('nama anggota') }}</th>
                            <th>{{ Str::headline('nama induk') }}</th>
                            <th>{{ Str::headline('opsi') }}</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="me-2">Showing:</span>

                            <!-- Select -->
                            <div class="tom-select-custom">
                                <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto" autocomplete="off" data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true
                          }'>
                                    <option value="10">10</option>
                                    <option value="15" selected>15</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <!-- End Select -->

                            <span class="text-secondary me-2">of</span>

                            <!-- Pagination Quantity -->
                            <span id="datatableWithPaginationInfoTotalQty"></span>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->
    </div>

    <!-- Modal -->
    <div id="formModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="formModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="" id="form-data" method="post">
                    <input type="hidden" name="family_id" value="{{ $model->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title text-capitalize" id="formModalTitle">{{ Str::headline('tambah pohon keluarga') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="_method" name="_method">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="family_tree_id" class="form-label">{{ Str::headline('induk') }}</label>
                                    <div class="tom-select-custom mb-1">
                                        <select class="form-select" id="family_tree_id" name="family_tree_id">
                                            <option value="">Pilih Induk...</option>
                                        </select>
                                    </div>
                                    @error('family_tree_id')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="family_tree_name" class="form-label">{{ Str::headline('nama anggota') }}</label>
                                    <input type="text" class="form-control" id="family_tree_name" name="name" value="">
                                    <span class="form-text text-danger d-none validation-error-message" id="name_error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="birth_date" class="form-label">{{ Str::headline('tanggal lahir') }}</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="">
                                    <span class="form-text text-danger d-none validation-error-message" id="birth_date_error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="death_date" class="form-label">{{ Str::headline('tanggal wafat') }}</label>
                                    <input type="date" class="form-control" id="death_date" name="death_date" value="">
                                    <span class="form-text text-danger d-none validation-error-message" id="death_date_error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="place_of_death" class="form-label">{{ Str::headline('tempat makam') }}</label>
                                    <input type="text" class="form-control" id="place_of_death" name="place_of_death" value="">
                                    <span class="form-text text-danger d-none validation-error-message" id="place_of_death_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->
@endsection

@section('javascript')
    <script src="{{ asset('admin-assets/js/family/create.js') }}"></script>
    <script src="{{ asset('admin-assets/js/family-tree/family-tree.js') }}"></script>
    <script src="{{ asset('admin-assets/js/family-tree/create.js') }}"></script>
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
