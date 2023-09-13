const get_analytics = () => {
    $.ajax({
        url: `${base_url}`,
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': token,
        },
        success: function (res) {
            $('.total-users').html(parseFloat(res.total_users) + 3203);
            $('.total-durations').html(parseFloat(res.total_durations));
            $('.total-pageviews').html(parseFloat(res.total_pageviews) + 24000);
        }
    });
}
