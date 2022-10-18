define([
    'jquery'
], function ($) {
    'use strict';
    return function qty(){
        $('#qty-inc').on('click',function(){
            let $qty=$('#qty');
            let currentVal = parseInt($qty.val());
            if (!isNaN(currentVal)) {
                $qty.val(currentVal + 1);
            }
        });
        $('#qty-dec').on('click',function(){
            let $qty=$('#qty');
            let currentVal = parseInt($qty.val());
            if (!isNaN(currentVal) && currentVal > 1) {
                $qty.val(currentVal - 1);
            }
        });
    }

});
