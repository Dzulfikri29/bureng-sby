const get_analytics = () => {
    $.ajax({
        url: `${base_url}`,
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': token,
        },
        success: function (res) {
            $('.total-users').html(res.total_users);
            $('.total-durations').html(res.total_durations);
            $('.total-pageviews').html(res.total_pageviews);
        }
    });
}
