$(document).on('ready', function () {
    // INITIALIZATION OF DATATABLES
    // =======================================================
    HSCore.components.HSDatatables.init($('#datatable-gallery'), {
        ajax: {
            url: `${base_url}/admin/gallery`,
        },
        columns: [{
            data: "checkbox",
            orderable: false,
            searchable: false,
        },
        {
            data: "name",
        },
        {
            data: "action",
            orderable: false,
            searchable: false,
        },
        ],
        info: {
            totalQty: "#datatableWithPaginationInfoTotalQty"
        },
        search: "#datatableSearch",
        entries: "#datatableEntries",
        pageLength: 15,
        isResponsive: false,
        isShowPaging: false,
        pagination: "datatablePagination",
        serverSide: true,
        order: [
            [1, 'desc']
        ],
        dom: 'Bfrtip',
        buttons: [{
            extend: 'copy',
            className: 'd-none'
        },
        {
            extend: 'excel',
            className: 'd-none'
        },
        {
            extend: 'csv',
            className: 'd-none'
        },
        {
            extend: 'pdf',
            className: 'd-none'
        },
        {
            extend: 'print',
            className: 'd-none'
        },
        ],
        select: {
            style: 'multi',
            selector: 'td:first-child input[type="checkbox"]',
            classMap: {
                checkAll: '#datatableCheckAll',
                counter: '#datatableCounter',
                counterInfo: '#datatableCounterInfo'
            }
        },
        language: {
            zeroRecords: `<div class="text-center p-4">
                            <img class="mb-3" src="${base_url}/admin-assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
                            <img class="mb-3" src="${base_url}/admin-assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
                            <p class="mb-0">Tidak ada data</p>
                        </div>`
        }
    });

    const datatable = HSCore.components.HSDatatables.getItem(0)

    $('#export-copy').click(function () {
        datatable.button('.buttons-copy').trigger()
    });

    $('#export-excel').click(function () {
        datatable.button('.buttons-excel').trigger()
    });

    $('#export-csv').click(function () {
        datatable.button('.buttons-csv').trigger()
    });

    $('#export-pdf').click(function () {
        datatable.button('.buttons-pdf').trigger()
    });

    $('#export-print').click(function () {
        datatable.button('.buttons-print').trigger()
    });

    $('.js-datatable-filter').on('change', function () {
        var $this = $(this),
            elVal = $this.val(),
            targetColumnIndex = $this.data('target-column-index');

        datatable.column(targetColumnIndex).search(elVal).draw();
    });
});

$("#datatable-gallery").css("width", "100%");


var formModal = $('#formModal');
var formModalTitle = $('#formModalTitle');
var method = $('#_method');
var name_input = $('#name');

$('#form-data').submit(function (e) {
    e.preventDefault();
    Swal.showLoading();
    $('.validation-error-message').text('').addClass('d-none');

    var formData = new FormData(this)
    $.ajax({
        url: $(this).attr('action'),
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': token,
        },
        data: formData,
        processData: false,
        contentType: false,
        enctype: 'multipart/form-data',
        success: function (res) {
            Swal.close();
            Toast.fire({
                icon: res.success ? 'success' : 'error',
                title: res.message,
            });

            if (res.success) {
                formModal.modal('toggle');
                $('#form-data')[0].reset();
                $('#datatable-gallery').DataTable().ajax.reload();
            }
            name_input.val('');
        },
        error: function (res) {
            Swal.close();
            if (res.status === 422) {
                var errors = res.responseJSON;
                console.log(errors);
                $.each(res.responseJSON.errors, function (key, value) {
                    $("#" + key + "_error").html(value[0]);
                    $("#" + key + "_error").removeClass('d-none');
                });
            }
        }
    });
});

const edit_data = (id) => {
    $('.validation-error-message').text('').addClass('d-none');
    formModalTitle.text('edit galeri');
    $.ajax({
        url: `${base_url}/admin/gallery/${id}/edit`,
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': token,
        },
        success: function (res) {
            name_input.val(res.name);


            $('#form-data').attr('action', `${base_url}/admin/gallery/${res.id}`);
            formModal.modal('show');
            method.val('PUT');
        }
    });
}

const add_data = () => {
    $('.validation-error-message').text('').addClass('d-none');
    $('#form-data').attr('action', `${base_url}/admin/gallery`);
    formModalTitle.text('tambah galeri');
    formModal.modal('show');
    method.val('POST');
}
