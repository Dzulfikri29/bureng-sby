<div class="btn-group" role="group">
    @if ($can_edit ?? true)
        @isset($edit_ajax)
            <a class="btn btn-white btn-sm" href="javascript:;edit_data({{ $data->id }})">
                <i class="bi-pencil-fill me-1"></i> Edit
            </a>
        @else
            <a class="btn btn-white btn-sm" href="{{ $edit }}">
                <i class="bi-pencil-fill me-1"></i> Edit
            </a>
        @endisset
    @endif

    <!-- Button Group -->
    <div class="btn-group">
        <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="productsEditDropdown1" data-bs-toggle="dropdown" aria-expanded="false"></button>

        @if ($can_delete ?? true)
            <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="productsEditDropdown1">
                <a class="dropdown-item" href="javascript:;show_delete_confirmation('{{ $main }}', '{{ $delete }}')">
                    <i class="bi-trash dropdown-item-icon"></i> Delete
                </a>
            </div>
        @endif
    </div>
    <!-- End Button Group -->
</div>
