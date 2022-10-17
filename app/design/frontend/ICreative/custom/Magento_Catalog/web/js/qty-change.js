define([
    'jquery'
], function ($) {
    'use strict';
    return function ($config){
        alert('hi');
        $('#qty-inc').click(()=>{
            $('#qty').value++;
        })
        $('#qty-dec').click(()=>{
            !(isNaN($('#qty').val()) || $('#qty').val() < 2) ? $('#qty').value = 1 : $('#qty').value--;
        })
    }

});
