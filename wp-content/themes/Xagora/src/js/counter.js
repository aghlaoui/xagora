
jQuery(function ($) {

    'use strict';

    function initCounter(section, item, duration) {

        $(document).one('inview', item, function (event, inview) {

            if (inview) {

                $(item).each(function () {

                    var percent = $(this).data('percent');
                    var pcolor = getComputedStyle(document.documentElement).getPropertyValue('--secondary-color');
                    var scolor = getComputedStyle(document.documentElement).getPropertyValue('--secondary-color');

                    if ($(section).hasClass('odd')) {
                        var tmode = 'rgba(255, 255, 255, 0.075)';
                    } else {
                        var tmode = 'rgba(0, 0, 0, 0.075)';
                    }

                    if ($(section).hasClass('preloader') || $(section).hasClass('skills')) {
                        var symbol = '<i>%</i>';
                    } else {
                        var symbol = '';
                    }

                    if (section == '.counter.preloader' || section == '.counter.funfacts') {
                        var height = 70;
                    } else {
                        var height = 110;
                    }

                    $(this).radialProgress({
                        value: (percent / 100),
                        size: height,
                        thickness: 10,
                        lineCap: 'butt',
                        emptyFill: tmode,
                        animation: {
                            duration: duration,
                            easing: "radialProgressEasing"
                        },
                        fill: {
                            gradient: [[pcolor, 0.1], [scolor, 1]],
                            gradientAngle: Math.PI / 4
                        }
                    }).on('radial-animation-progress', function (event, progress) {
                        $(this).find('span').html(Math.round(percent * progress) + symbol);
                    })
                })
            }
        })
    }

    let preloader = $('.preloader');
    let preloader_timeout = (preloader.data('timeout') - 800);

    initCounter('.counter.preloader', '.counter.preloader .radial', preloader_timeout);
    initCounter('.counter.funfacts', '.counter.funfacts .radial', 5000);
    initCounter('.counter.skills', '.counter.skills .radial', 5000);
})
