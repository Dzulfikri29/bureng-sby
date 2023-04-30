const get_activities = (page) => {
    if (page == undefined) {
        page = 1;
    }
    $.ajax({
        url: `${base_url}/activity?page=${page}&search=${$('#search').val()}`,
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': token,
        },
        success: function (res) {
            $('#activity-container').html(res.html);
        }
    });
}

$(document).on('click', '.data-pagination a', function (event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    get_activities(page);
});

var typingTimer;
var doneTypingInterval = 1000;
var $input = $('#search');

//on keyup, start the countdown
$input.on('keyup', function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(get_activities, doneTypingInterval);
});

//on keydown, clear the countdown
$input.on('keydown', function () {
    clearTimeout(typingTimer);
});
