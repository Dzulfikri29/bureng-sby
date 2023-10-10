@extends('admin.layouts.app')

@php
    $main = 'gallery';
    $model_param = 'gallery';
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
                            <li class="breadcrumb-item active" aria-current="page">{{ Str::headline('overview') }}</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">{{ Str::headline('overview') }}</h1>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <button type="button" class="btn btn-primary" href="{{ route("admin.$main.create") }}" onclick="add_data()">
                        <i class="bi-plus me-1"></i> {{ Str::headline('tambah ' . Str::headline($main)) }}
                    </button>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header card-header-content-md-between">
                <div class="mb-2 mb-md-0">
                    <form>
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-search"></i>
                            </div>
                            <input id="datatableSearch" type="search" class="form-control" placeholder="Search {{ Str::headline($main) }}" aria-label="Search {{ Str::headline($main) }}">
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
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable-{{ $main }}" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="table-column-pe-0">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                                    <label class="form-check-label" for="datatableCheckAll"></label>
                                </div>
                            </th>
                            <th>{{ Str::headline('nama') }}</th>
                            <th>{{ Str::headline('gambar') }}</th>
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
                    <div class="modal-header">
                        <h5 class="modal-title text-capitalize" id="formModalTitle">{{ Str::headline('tambah ' . $main) }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="_method" name="_method">
                        <div class="row">
                            @if (!auth()->user()->family_id)
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label for="family_id" class="form-label">{{ Str::headline('keluarga terkait') }}</label>
                                        <div class="tom-select-custom mb-1">
                                            <select class="form-select" id="family_id" name="family_id">
                                                <option value="">Pilih Keluarga Terkait...</option>
                                            </select>
                                            <span class="form-text text-danger d-none validation-error-message" id="family_id_error"></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="name" class="form-label">{{ Str::headline('nama') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="">
                                    <span class="form-text text-danger d-none validation-error-message" id="name_error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="file" class="form-label">{{ Str::headline('gambar') }}</label>
                                    <input type="file" class="form-control" name="file" id="file" value="" accept="image/*">
                                    <span class="form-text text-danger d-none validation-error-message" id="file_error"></span>
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
    <script src="{{ asset('admin-assets/js/' . $main . '/' . $main . '.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#{{ $main }}-menu').addClass('active');
        });
    </script>
@endsection
