let social_media_row_count = $('#social_media_row_count').val();
var social_media_form = $('#social-media-form');
const add_social_media_row = () => {
    let key = parseFloat(social_media_row_count) + 1;
    var html = `<div class="row align-items-end mb-4" id="social_media_row_${key}">
                    <div class="col-md-3">
                        <label for="name" class="text-capitalize form-label">social media</label>
                        <input type="text" class="form-control" name="name[]" id="name_${key}" value="" required>
                        <input type="hidden" name="social_media_id[]" value="">
                    </div>
                    <div class="col-md-3">
                        <label for="user_name" class="text-capitalize form-label">username</label>
                        <input type="text" class="form-control" name="user_name[]" id="user_name_${key}" value="" required>
                    </div>
                    <div class="col-md-4">
                        <label for="link" class="text-capitalize form-label">link</label>
                        <input type="text" class="form-control" name="link[]" id="link_${key}" value="" required>
                    </div>
                    <div class="col align-items-end">
                        <button type="button" class="btn btn-danger" onclick="$('#social_media_row_${key}').remove()"><i class="bi-dash-circle"></i></button>
                    </div>
                </div>`;

    social_media_form.append(html);
    $('#social_media_row_count').val((key));
}
