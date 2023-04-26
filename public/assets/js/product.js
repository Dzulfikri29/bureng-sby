const get_products = (page) => {
    if (page == undefined) {
        page = 1;
    }
    $.ajax({
        url: `${base_url}/product?page=${page}&product_category_id=${$('#product_category_id').val()}&search=${$('#search').val()}`,
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': token,
        },
        success: function (res) {
            $('.product__all').html(res.html);
        }
    });
}

$(document).on('click', '.data-pagination a', function (event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    get_products(page);
});

const set_category = (id) => {
    $('.category-list').removeClass('active');
    $('#category_' + id).addClass('active');

    $('#product_category_id').val(id);
    get_products();
}

var typingTimer;
var doneTypingInterval = 2000;
var $input = $('#search');

//on keyup, start the countdown
$input.on('keyup', function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(get_products, doneTypingInterval);
});

//on keydown, clear the countdown
$input.on('keydown', function () {
    clearTimeout(typingTimer);
});
