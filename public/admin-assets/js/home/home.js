var country_json;
fetch(base_url + '/admin-assets/vendor/flag-icon-css/country.json')
    .then((response) => response.json())
    .then((json) => {
        country_json = json;
    });

const get_chart_data = () => {
    $.ajax({
        url: `${base_url}/admin/home`,
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        data: {
            from_date: $('#from_date').val(),
            to_date: $('#to_date').val(),
        },
        success: function (res) {
            console.log(res.user_types);
            init_user_types_chart(res);
            init_top_countries_table(res.top_countries);
            init_most_visited_pages_table(res.most_visited_pages);
            init_top_browser_list(res.top_browsers);
            init_total_visitors_page_views_chart(res);
        },
    });
}

const init_user_types_chart = (chart_data) => {
    $('#user-types-chart').remove();
    $('#user-types-chart-container').append('<canvas id="user-types-chart"></canvas>');
    var popCanvas = document.getElementById("user-types-chart");

    console.log(chart_data);
    var bubbleChart = new Chart(popCanvas, {
        type: 'doughnut',
        data: {
            labels: chart_data.user_types_labels,
            datasets: [{
                data: chart_data.user_types_data,
                borderColor: chart_data.user_types_Color,
                backgroundColor: chart_data.user_types_Color,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Grafik Jenis Pengguna'
                }
            }
        },
    });
}

const init_total_visitors_page_views_chart = (chart_data) => {
    $('#total-visitors-page-views-chart').remove();
    $('#total-visitors-page-views-chart-container').append('<canvas id="total-visitors-page-views-chart" style="max-height: 20rem;"></canvas>');
    var canvas = document.getElementById("total-visitors-page-views-chart");

    new Chart(canvas, {
        type: 'bar',
        data: {
            labels: chart_data.total_visitors_page_views.labels,
            datasets: [{
                    label: 'Pengunjung',
                    data: chart_data.total_visitors_page_views.visitor_data,
                    "backgroundColor": "#377dff",
                    "hoverBackgroundColor": "#377dff",
                    "borderColor": "#377dff",
                    "maxBarThickness": "10"
                },
                {
                    label: 'Halaman Dilihat',
                    data: chart_data.total_visitors_page_views.page_view_data,
                    "backgroundColor": "#e7eaf3",
                    "borderColor": "#e7eaf3",
                    "maxBarThickness": "10"
                }
            ]
        },
        "options": {
            "scales": {
                "y": {
                    "grid": {
                        "color": "#e7eaf3",
                        "drawBorder": false,
                        "zeroLineColor": "#e7eaf3"
                    },
                    "ticks": {
                        "beginAtZero": true,
                        "stepSize": 100,
                        "fontSize": 12,
                        "fontColor": "#97a4af",
                        "fontFamily": "Open Sans, sans-serif",
                        "padding": 10,
                        "postfix": "$"
                    }
                },
                "x": {
                    "grid": {
                        "display": false,
                        "drawBorder": false
                    },
                    "ticks": {
                        "fontSize": 12,
                        "fontColor": "#97a4af",
                        "fontFamily": "Open Sans, sans-serif",
                        "padding": 5
                    },
                    "categoryPercentage": 0.5,
                    "maxBarThickness": "10"
                }
            },
            "cornerRadius": 2,
            "plugins": {
                "tooltip": {
                    "prefix": "$",
                    "hasIndicator": true,
                    "mode": "index",
                    "intersect": false
                }
            },
            "hover": {
                "mode": "nearest",
                "intersect": true
            }
        }
    });
}

const init_top_countries_table = (chart_data) => {
    let html = '';
    chart_data.forEach(e => {
        let country_flag = country_json.filter(function (item) {
            return item.name == e[0][0];
        });

        html += `  <tr>
                        <th scope="row">
                            <span>
                                <img class="avatar avatar-xss avatar-circle" src="${base_url}/admin-assets/vendor/flag-icon-css/${country_flag[0].flag_1x1}">
                            </span> ${e[0][0]}
                        </th>
                        <td>
                            <span class="badge bg-soft-success text-success">${e[0][1]}</span> Sesi
                        </td>
                    </tr>`;
    });

    $('#top-countries-table').html(html);
}

const init_most_visited_pages_table = (chart_data) => {
    let html = '';
    chart_data.forEach(item => {
        html += `  <tr>
                        <th scope="row">
                          <a href="${base_url}/${item.url}">${item.pageTitle}<a>
                        </th>
                        <td>
                            <span class="badge bg-soft-success text-success">${item.pageViews}</span> View
                        </td>
                    </tr>`;
    });

    $('#most-visited-pages-table').html(html);
}


const init_top_browser_list = (chart_data) => {
    let html = '';
    chart_data.forEach(e => {
        html += `<li class="list-group-item">
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
                <i class="bi-browser-${e.browser}"></i>
            </div>
            <div class="flex-grow-1 ms-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0 text-capitalize">${e.browser}</h5>
                    </div>
                    <!-- End Col -->

                    <div class="col-auto">
                        <span class="badge bg-soft-info text-info">${e.sessions}</span> Sesi
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
    </li>`;
    });

    $('#top-browser-list').html(html);
}
