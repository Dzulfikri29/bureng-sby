var family_tree_id = new TomSelect('#family_tree_id', {
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    createOnBlur: false,
    create: false,
    load: function (query, callback) {
        var url = `${base_url}/family-tree/select`;
        fetch(url, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                'search': encodeURIComponent(query),
                '_token': token,
                'family_id': $('#family_id').val(),
            }),
        })
            .then(response => response.json())
            .then(json => {
                callback(json);
            }).catch(() => {
                callback();
            });

    },
});


var formModal = $('#formModal');
var formModalTitle = $('#formModalTitle');
var method = $('#_method');

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
                $('#datatable-family-tree').DataTable().ajax.reload();
            }
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
    formModalTitle.text('edit pohon keluarga');
    $.ajax({
        url: `${base_url}/admin/family-tree/${id}/edit`,
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': token,
        },
        success: function (res) {
            $('#family_tree_name').val(res.name);
            $('#birth_date').val(res.birth_date);
            $('#death_date').val(res.death_date);
            $('#place_of_death').val(res.place_of_death);

            $('input[name="family_id"]').val($('#family_id').val());
            if (res.family_tree_id != null) {
                family_tree_id.addOption({
                    id: res.family_tree_id,
                    name: res.parent_name,
                });
                family_tree_id.setValue(res.family_tree_id);
            }

            $('#form-data').attr('action', `${base_url}/admin/family-tree/${res.id}`);
            formModal.modal('show');
            method.val('PUT');
        }
    });
}

const add_data = () => {
    $('#form-data')[0].reset();
    $('input[name="family_id"]').val($('#family_id').val());
    family_tree_id.clear();
    $('.validation-error-message').text('').addClass('d-none');
    $('#form-data').attr('action', `${base_url}/admin/family-tree`);
    formModalTitle.text('tambah pohon keluarga');
    formModal.modal('show');
    method.val('POST');
}

