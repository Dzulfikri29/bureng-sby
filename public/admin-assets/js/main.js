const show_delete_confirmation = (main, delete_url) => {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Anda tidak akan dapat mengembalikan ini!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0a993c',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: delete_url,
                method: "POST",
                data: {
                    _method: 'DELETE',
                    _token: token,
                },
                success: function (res) {
                    Toast.fire({
                        icon: res.success ? 'success' : 'error',
                        title: res.message,
                    });

                    if (res.success) {
                        $('#datatable-' + main).DataTable().ajax.reload();
                    }
                }
            });
        }
    });
}

const multiple_delete = (main) => {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Anda tidak akan dapat mengembalikan ini!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0a993c',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.value) {
            let get_selected_ids = [];
            $(`input[name="multi_delete_${main}[]"]:checked`).map(function () {
                get_selected_ids.push($(this).val());
            });

            $.ajax({
                url: `${base_url}/admin/${main}/multiple-destroy`,
                method: "POST",
                data: {
                    _token: token,
                    ids: get_selected_ids,
                },
                success: function (res) {
                    Toast.fire({
                        icon: res.success ? 'success' : 'error',
                        title: res.message,
                    });

                    if (res.success) {
                        $('#datatable-' + main).DataTable().ajax.reload();
                    }
                }
            });
        }
    });
}

const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

const image_preview = (input, target) => {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            target.attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

const init_basic_editor = () => {
    new Quill('.basic-editor', {
        placeholder: "Masukkan Deskripsi Produk",
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                ['blockquote', 'code-block'],

                [{
                    'header': 1
                }, {
                    'header': 2
                }],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }],
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }],
                [{
                    'direction': 'rtl'
                }],
                [{
                    'size': ['small', false, 'large', 'huge']
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                [{
                    'color': []
                }, {
                    'background': []
                }],
                [{
                    'font': []
                }],
                [{
                    'align': []
                }],
                ['clean']
            ]
        },
        theme: 'snow'
    });
}

var advanceEditor;
const init_advance_editor = () => {
    advanceEditor = new Quill('.advance-editor', {
        placeholder: "Masukkan Deskripsi Produk",
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                ['blockquote', 'code-block'],

                [{
                    'header': 1
                }, {
                    'header': 2
                }],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }],
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }],
                [{
                    'direction': 'rtl'
                }],
                [{
                    'size': ['small', false, 'large', 'huge']
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                [{
                    'color': []
                }, {
                    'background': []
                }],
                [{
                    'font': []
                }],
                [{
                    'align': []
                }],
                ['clean'],
                ['link', 'image'],
            ],
        },
        theme: 'snow',
    });
    advanceEditor.getModule("toolbar").addHandler("image", () => {
        select_local_image();
    });

    advanceEditor.on('text-change', (delta, oldContents, source) => {
        if (source !== 'user') return;

        const inserted = getImgUrls(delta);
        const deleted = getImgUrls(advanceEditor.getContents().diff(oldContents));
        var delete_url = $('.advance-editor').data('delete-url');

        if (deleted.length > 0) {
            $.ajax({
                url: delete_url,
                method: "POST",
                data: {
                    _token: token,
                    paths: deleted,
                },
                success: function (res) {
                    Toast.fire({
                        icon: res.success ? 'success' : 'error',
                        title: res.message,
                    });
                }
            });
        }

    });
}

const select_local_image = () => {
    var input = document.createElement("input");
    input.setAttribute("type", "file");
    input.click();
    // Listen upload local image and save to server
    input.onchange = () => {
        const file = input.files[0];
        // file type is only image.
        if (/^image\//.test(file.type)) {
            var url = $('.advance-editor').data('url');
            save_to_server(file, url);
        } else {
            console.warn("Only images can be uploaded here.");
        }
    };
}

const save_to_server = (file, url) => {
    var data = new FormData();
    data.append('image', file);
    $.ajax({
        url: url,
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': token,
        },
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (res) {
            insertToEditor(res.url);
            Toast.fire({
                icon: res.success ? 'success' : 'error',
                title: res.message,
            });
        }
    });
}

function insertToEditor(url) {
    // push image url to editor.
    const range = advanceEditor.getSelection();
    advanceEditor.insertEmbed(range.index, "image", url);
}

function getImgUrls(delta) {
    return delta.ops.filter(i => i.insert && i.insert.image).map(i => i.insert.image);
}

$('.form-data').each(function (e) {
    $(this).on('submit', function (e) {
        $(document).find('button[type="submit"]').attr('disabled', true);
        $(document).find('button[value="submit"]').attr('disabled', true);
        Swal.fire({
            title: "Harap Tunggu",
            text: "Sedang memproses data",
            showConfirmButton: false,
            allowOutsideClick: false
        });
    })
})


$(document).ready(function () {
    var inputElements = document.getElementsByClassName('number-inputs');
    inputElements.forEach(function (e) {
        IMask(e, {
            mask: Number,
            scale: 2,
            signed: false,
            thousandsSeparator: '.',
            padFractionalZeros: false,
            normalizeZeros: true,
            radix: ',',
            mapToRadix: ['.'],
        });
    });
});
