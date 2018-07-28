jQuery(document).ready(function () {
    "use strict";

    /* THE FANCYBOX PLUGIN INITALISATION */
    jQuery(".fancybox").fancybox();

    /* FLEXY MENU SETTING */
    $(".flexy-menu").flexymenu({
        align: "right",
        indicator: true
    });

	/* LOAD GOOGLE ANALYTICS */
	loadAnalytics();
    /* GO TO TOP SETTING */
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });

    jQuery('.back-to-top').click(function (event) {
        event.preventDefault();
        jQuery('html, body').animate({ scrollTop: 0 }, duration);
        return false;
    });

    jQuery(".team-mask").click(function () {
        window.location = "./gallery.html";
    });
});
