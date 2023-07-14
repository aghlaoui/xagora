jQuery(function ($) {

    'use strict';

    (function ($, wp) {
        wp.customize.control('use_logo', function (control) {
            var logoField = wp.customize.control('logo_img');

            toggleFieldVisibility(control.setting.get());

            control.container.on('change', 'input', function () {
                toggleFieldVisibility(control.setting.get());
            });

            function toggleFieldVisibility(isChecked) {
                if (isChecked) {
                    logoField.container.slideDown();
                } else {
                    logoField.container.slideUp();
                }
            }
        });
    })(jQuery, wp);
})