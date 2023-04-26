const get_blogs = (page) => {
    if (page == undefined) {
        page = 1;
    }
    $.ajax({
        url: `${base_url}/blog?page=${page}&blog_category_id=${$('#blog_category_id').val()}&search=${$('#search').val()}`,
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': token,
        },
        success: function (res) {
            $('#blog-container').html(res.html);
        }
    });
}

$(document).on('click', '.data-pagination a', function (event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    get_blogs(page);
});

const set_category = (id) => {
    $('.category-list').removeClass('active');
    $('#category_' + id).addClass('active');

    $('#blog_category_id').val(id);
    get_blogs();
}

var typingTimer;
var doneTypingInterval = 2000;
var $input = $('#search');

//on keyup, start the countdown
$input.on('keyup', function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(get_blogs, doneTypingInterval);
});

//on keydown, clear the countdown
$input.on('keydown', function () {
    clearTimeout(typingTimer);
});
