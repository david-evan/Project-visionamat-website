function Download(url)
{
	if($(window).width() <= 1279)
		{
		
		var r = confirm("Ce fichier HD peut ralentir votre appareil et consommer beaucoup de bande passante. \n\nÊtes-vous sûr de vouloir continuer ? ");
		
		if (r == true) 
		{
			window.open(url , '_parent');
		}
	}
	else
		window.open(url , '_parent');
}

jQuery(document).ready(function () {
    "use strict";
    /* MEGAFOLIO PRO GALLERY SETTING */
    var api = jQuery('.megafolio-container').megafoliopro(
       {
           filterChangeAnimation: "fade",
           filterChangeSpeed: 1000,
           filterChangeRotate: 99,
           filterChangeScale: 0.3,
           delay: 100,
           paddingHorizontal: 0,
           paddingVertical: 0,
           layoutarray: [8],
       });


    var categoryStart = jQuery('#categoryStart').val();
    if (categoryStart == 'cat-one')
        api.megafilter(jQuery('#cat-one').data('category'));

    else if (categoryStart == 'cat-two')
        api.megafilter(jQuery('#cat-two').data('category'));

    else if (categoryStart == 'cat-three')
        api.megafilter(jQuery('#cat-three').data('category'));

    else if (categoryStart == 'cat-four')
        api.megafilter(jQuery('#cat-four').data('category'));

    else
        api.megafilter(jQuery('#cat-all').data('category'));

    /* CALL FILTER FUNCTION IF ANY FILTER HAS BEEN CLICKED */
    jQuery('.filter').click(function () {
        jQuery('.filter').each(function () { jQuery(this).removeClass("selected") });
        api.megafilter(jQuery(this).data('category'));
        jQuery(this).addClass("selected");
    });

    /* THE FANCYBOX PLUGIN INITALISATION */
    jQuery(".fancybox").fancybox();

    /* FLEXY MENU SETTING */
    $(".flexy-menu").flexymenu({
        align: "right",
        indicator: true
    });

    /* GO TO TOP SETTING*/
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
    })
});