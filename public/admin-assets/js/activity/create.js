new TomSelect('#activity_category_id', {
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    createOnBlur: true,
    create: true,
    load: function (query, callback) {
        var url = `${base_url}/activity-category/select`;
        fetch(url, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'search': encodeURIComponent(query),
                    '_token': token,
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

Dropzone.options.activityImageUpload = {
    paramName: 'image',
    textTarget: null,
    maxFileSize: 1024,
    errorMessage: 'File is too big!',
    typeErrorMessage: 'Unsupported file type',
    mode: 'simple',
    targetAttr: null,
    resetTarget: null,
    allowTypes: [],
    thumbnailWidth: 300,
    thumbnailHeight: 300,
    removedfile: function (file) {
        var name = file.previewElement.querySelector("[data-dz-name]").dataset.dzName;
        delete_activity_image(name);

        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    },
    success: function (file, response) {
        var fileuploded = file.previewElement.querySelector("[data-dz-name]");
        fileuploded.dataset.dzName = response.path;

        get_activity_images();
    },
    previewTemplate: `<div class="col h-100 mb-4">
                            <div class="dz-preview dz-file-preview">
                                <div class="d-flex justify-content-end dz-close-icon">
                                    <small class="bi-x" data-dz-remove></small>
                                </div>
                                <div class="dz-details d-flex">
                                    <div class="dz-img flex-shrink-0">
                                        <img class="img-fluid dz-img-inner" data-dz-thumbnail>
                                    </div>
                                    <div class="dz-file-wrapper flex-grow-1">
                                        <h6 class="dz-filename">
                                            <span class="dz-title" data-dz-name></span>
                                        </h6>
                                        <div class="dz-size" data-dz-size></div>
                                    </div>
                                </div>
                                <div class="dz-progress progress">
                                    <div class="dz-upload progress-bar bg-success" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="dz-success-mark">
                                        <span class="bi-check-lg"></span>
                                    </div>
                                    <div class="dz-error-mark">
                                        <span class="bi-x-lg"></span>
                                    </div>
                                    <div class="dz-error-message">
                                        <small data-dz-errormessage></small>
                                    </div>
                                </div>
                            </div>
                        </div>`
};


const get_activity_images = () => {
    $('#fancyboxGallery').html('');
    $.ajax({
        url: `${base_url}/admin/activity-image`,
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': token,
        },
        data: {
            activity_id: $('#activity_id').val(),
        },
        success: function (res) {
            let html = '';
            res.data.forEach(e => {
                html += `<div class="col-6 col-sm-4 col-md-3 mb-3 mb-lg-5" id="${e.image}">
                                <div class="card card-sm">
                                    <img class="card-img-top" src="${base_url}/storage/${e.image}" alt="Image Description">

                                    <div class="card-body">
                                        <div class="row col-divider text-center">
                                            <div class="col">
                                                <a class="text-body lightbox" href="${base_url}/storage/${e.image}" data-bs-toggle="tooltip" data-bs-placement="top" data-fslightbox="gallery" aria-label="View" data-bs-original-title="View">
                                                    <i class="bi-eye"></i>
                                                </a>
                                            </div>

                                            <div class="col">
                                                <a class="text-danger" href="javascript:;" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete" onclick="delete_activity_image('${e.image}')">
                                                    <i class="bi-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;

            });
            $('#fancyboxGallery').html(html);

            setTimeout(() => {
                refreshFsLightbox()
            }, 1500);
        }
    });
}


const delete_activity_image = (name) => {
    $.ajax({
        url: `${base_url}/admin/activity-image-delete`,
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': token,
        },
        data: {
            image: name
        },
        success: function (res) {
            Toast.fire({
                icon: res.success ? 'success' : 'error',
                title: res.message,
            });

            get_activity_images();
        }
    });
}
