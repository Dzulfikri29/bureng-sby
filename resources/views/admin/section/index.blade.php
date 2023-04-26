@extends('admin.layouts.app')

@php
    $main = 'section';
    $model_param = 'section';
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
                            <li class="breadcrumb-item active"><a class="breadcrumb-link" href="{{ route('admin.page.index') }}">{{ Str::headline('page') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ Str::headline($model->name) }}</li>
                        </ol>
                    </nav>

                    <h1 class="page-header-title">{{ Str::headline('overview') }}</h1>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <button type="button" class="btn btn-primary" onclick="add_data()">
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

                    <!-- Dropdown -->
                    <div class="dropdown">
                        <button type="button" class="btn btn-white btn-sm dropdown-toggle w-100" id="{{ Str::headline($main) }}sExportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-download me-2"></i> Export
                        </button>

                        <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="{{ Str::headline($main) }}sExportDropdown">
                            <span class="dropdown-header">Options</span>
                            <a id="export-copy" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('admin-assets/svg/illustrations/copy-icon.svg') }}" alt="Image Description">
                                Copy
                            </a>
                            <a id="export-print" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('admin-assets/svg/illustrations/print-icon.svg') }}" alt="Image Description">
                                Print
                            </a>
                            <div class="dropdown-divider"></div>
                            <span class="dropdown-header">Download options</span>
                            <a id="export-excel" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('admin-assets/svg/brands/excel-icon.svg') }}" alt="Image Description">
                                Excel
                            </a>
                            <a id="export-csv" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('admin-assets/svg/components/placeholder-csv-format.svg') }}" alt="Image Description">
                                .CSV
                            </a>
                            <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                <img class="avatar avatar-xss avatar-4x3 me-2" src="{{ asset('admin-assets/svg/brands/pdf-icon.svg') }}" alt="Image Description">
                                PDF
                            </a>
                        </div>
                    </div>
                    <!-- End Dropdown -->
                </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <input type="hidden" id="page_id" value="{{ $model->id }}">
                <table id="datatable-{{ $main }}" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ Str::headline('bagian') }}</th>
                            <th>{{ Str::headline('judul') }}</th>
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
                        <input type="hidden" name="page_id" value="{{ $model->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label for="name" class="form-label">{{ Str::headline('nama') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="">
                                    <span class="form-text text-danger d-none validation-error-message" id="name_error"></span>
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
            $('#page-menu').addClass('active');
        });
    </script>
@endsection
