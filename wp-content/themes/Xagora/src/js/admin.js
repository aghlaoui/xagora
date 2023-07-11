jQuery(function ($) {

    'use strict';

    $(document).ready(function () {
        $('#most-popular-badge input[type="checkbox"]').change(function () {
            var currrentCheckBox = $(this);
            $('#most-popular-badge input[type="checkbox"]').not(currrentCheckBox).prop('checked', false);
        })
    })

})