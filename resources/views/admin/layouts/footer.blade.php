@php
    $general = \App\Models\General::first();
@endphp
<div class="footer">
    <div class="row justify-content-between align-items-center">
        <div class="col">
            <p class="fs-6 mb-0">&copy; {{ $general->website_name }} <span class="d-none d-sm-inline-block">{{ date('Y') }}.</span>
            </p>
        </div>
        <!-- End Col -->

        <div class="col-auto">
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>
