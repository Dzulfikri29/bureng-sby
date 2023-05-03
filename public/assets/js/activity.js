const get_activities = (page) => {
    if (page == undefined) {
        page = 1;
    }
    $.ajax({
        url: `${base_url}/activity?page=${page}&activity_id=${$('#activity_id').val()}`,
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': token,
        },
        success: function (res) {
            $('#activity-container').html(res.html);
            setTimeout(() => {
                refreshFsLightbox()
            }, 1200);
        }
    });
}

$(document).on('click', '.data-pagination a', function (event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    get_activities(page);
});

const set_activity = (id) => {
    $('.category-list').removeClass('active');
    $('#activity_' + id).addClass('active');

    $('#activity_id').val(id);
    get_activities();
}
