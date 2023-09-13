const get_analytics = () => {
    $.ajax({
        url: `${base_url}`,
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': token,
        },
        success: function (res) {
            $('.total-users').html(format_float(parseFloat(res.total_users) + 3203));
            $('.total-durations').html(format_float(parseFloat(res.total_durations)));
            $('.total-pageviews').html(format_float(parseFloat(res.total_pageviews) + 24000));
        }
    });
}

// format float to thousands separator
const format_float = (num) => {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
