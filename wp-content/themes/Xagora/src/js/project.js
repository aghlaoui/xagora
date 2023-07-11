/*----------------------------------------------
7. Shuffle
----------------------------------------------*/

jQuery(function ($) {

    'use strict';

    $('.filter-section').each(function (index) {

        var count = index + 1;

        $(this).find('.filter-items').removeClass('filter-items').addClass('filter-items-' + count);
        $(this).find('.filter-item').removeClass('filter-item').addClass('filter-item-' + count);
        $(this).find('.filter-sizer').removeClass('filter-sizer').addClass('filter-sizer-' + count);
        $(this).find('.btn-filter-item').removeClass('btn-filter-item').addClass('btn-filter-item-' + count);

        var Shuffle = window.Shuffle;
        var Filter = new Shuffle(document.querySelector('.filter-items-' + count), {
            itemSelector: '.filter-item-' + count,
            sizer: '.filter-sizer-' + count,
            buffer: 1,
        })

        $('.btn-filter-item-' + count).on('change', function (e) {

            var input = e.currentTarget;

            if (input.checked) {
                Filter.filter(input.value);
            }
        })
    })
})