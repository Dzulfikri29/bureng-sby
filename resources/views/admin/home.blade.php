@extends('admin.layouts.app')

@section('title', Str::headline('dashboard'))

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
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->
    </div>
    <!-- End Content -->
@endsection

@section('javascript')
    <script src="{{ asset('admin-assets/vendor/chart.js/dist/chart.min.js') }}"></script>
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
