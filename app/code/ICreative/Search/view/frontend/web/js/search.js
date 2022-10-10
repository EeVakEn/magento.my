require(['jquery', 'ko'],
    function ($, ko) {
        query = ko.observable('')
        cat_id = ko.observable(0)
        products = ko.observableArray([]);

        query.subscribe(function () {
            getProducts(query(), cat_id())
        })

        cat_id.subscribe(function () {
            getProducts(query(), cat_id())
        })

        const getProducts = function (query, cat_id) {
            products([])
            if (query.length > 2) {
                $.ajax({
                    url: '/rest/V2/search/' + query + '/' + cat_id,         /* URL запросa */
                    method: 'get',                                          /* Метод запроса */
                    dataType: 'json',                                       /* Тип данных в ответе */
                    success: function (data) {
                        products(data)
                    }
                })
            }
        }
    });
