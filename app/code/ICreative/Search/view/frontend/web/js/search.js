
require([
    'jquery',
    'ko',
    'domReady!'
], function ($) {


    const productApiURL = '/rest/V2/search/'



    const searchViewModel = {
        query: ko.observable(''),
        cat_id: ko.observable(0)
    }

    ko.applyBindings(searchViewModel)

    searchViewModel.query.subscribe(function (newValue){
        console.log(newValue)
    })


    const getProducts = (cat_id, query) =>{
        $.ajax({
            url: productApiURL + cat_id + '/' + query,         /* Куда отправить запрос */
            method: 'get',             /* Метод запроса (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: {text: 'Текст'},     /* Данные передаваемые в массиве */
            success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                alert(data); /* В переменной data содержится ответ от index.php. */
            }
        });
    }
});
