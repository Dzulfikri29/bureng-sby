$(document).on('ready', function () {
    // INITIALIZATION OF DATATABLES
    // =======================================================
    HSCore.components.HSDatatables.init($('#datatable-structure'), {
        ajax: {
            url: `${base_url}/admin/structure`,
        },
        columns: [{
                data: "checkbox",
                orderable: false,
                searchable: false,
            },
            {
                data: "photo",
                orderable: false,
                searchable: false,
            },
            {
                data: "name",
            },
            {
                data: "position",
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

$("#datatable-structure").css("width", "100%");
