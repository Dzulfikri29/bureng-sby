new TomSelect('#structure_id', {
    valueField: 'id',
    labelField: 'position',
    searchField: 'position',
    createOnBlur: true,
    load: function (query, callback) {
        var url = `${base_url}/structure/select`;
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
