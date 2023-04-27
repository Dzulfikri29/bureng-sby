@extends('admin.layouts.app')

@section('title', Str::headline('dashboard')))

@section('css')
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/daterangepicker/daterangepicker.css') }}">
@endsection

@section('content')
    <!-- Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title">Dashboard</h1>
                </div>
                <!-- End Col -->

                <div class="col-auto">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <input type="date" class="form-control" id="from_date" value="{{ $from_date }}">
                        </div>
                        <div class="col-auto">-</div>
                        <div class="col-auto">
                            <input type="date" class="form-control" id="to_date" value="{{ $to_date }}">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary" type="button" onclick="get_chart_data()">
                                <i class="bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->

        <div class="row">
            <div class="col-lg-12 mb-3 mb-lg-5">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header card-header-content-sm-between">
                        <h4 class="card-header-title mb-2 mb-sm-0">{{ Str::headline('total pengunjung dan tampilan halaman') }}</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Bar Chart -->
                        <div class="chartjs-custom" id="total-visitors-page-views-chart-container">
                        </div>
                        <!-- End Bar Chart -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->

            <div class="col-lg-12 mb-3 mb-lg-5">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">{{ Str::headline('halaman yang paling banyak dikunjungi') }}</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-lg table-nowrap card-table mb-0">
                                <tbody id="most-visited-pages-table"></tbody>
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Row -->

        <div class="row">
            <div class="col-lg-4 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header card-header-content-sm-between">
                        <h4 class="card-header-title mb-2 mb-sm-0">{{ Str::headline('jenis pengguna') }}</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chartjs-custom mx-auto" id="user-types-chart-container">
                        </div>
                        <!-- End Chart -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>

            <div class="col-lg-4 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Negera Teratas</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-lg table-nowrap card-table mb-0">
                                <tbody id="top-countries-table"></tbody>
                            </table>
                        </div>
                        <!-- End Table -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>

            <div class="col-lg-4 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Header -->
                    <div class="card-header card-header-content-between">
                        <h4 class="card-header-title">Top Browsers</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <ul class="list-group list-group-flush list-group-no-gutters" id="top-browser-list">

                        </ul>
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->
        </div>
    </div>
    <!-- End Content -->
@endsection

@section('javascript')
    <script src="{{ asset('admin-assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/chartjs-chart-matrix/dist/chartjs-chart-matrix.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/tom-select/dist/js/tom-select.complete.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/clipboard/dist/clipboard.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/datatables.net.extensions/select/select.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/home/home.js') }}"></script>

    <!-- JS Front -->
    <script src="{{ asset('admin-assets/js/hs.theme-appearance-charts.js') }}"></script>
    <script>
        $('#home-menu').addClass('active');
    </script>
    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            get_chart_data();
            HSCore.components.HSDaterangepicker.init('.js-daterangepicker')

            // INITIALIZATION OF DATERANGEPICKER
            // =======================================================
            $('.js-daterangepicker').daterangepicker();
        });
    </script>
@endsection
