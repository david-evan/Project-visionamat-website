function initialize() {
    "use strict";

    var mapOptions = {
        zoom: 14,
        center: new google.maps.LatLng(47.5866999,1.3336276),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDefaultUI : true
    };

    var map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);

$("#email_submit").click(function () {

    "use strict";

    $('#reply_message').removeClass();
    $('#reply_message').html('');
    var regEx = "";

    /* validate Name */				
    var name = $("input#name").val();
    regEx = /^[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ .'-]+$/;
    if (name == "" || name == "Name" || !regEx.test(name)) {
        $("input#name").val('');
        $("input#name").focus();
        return false;
    }

    /* validate Email */						  
    var email = $("input#email").val();
    regEx = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
    if (email == "" || email == "Email" || !regEx.test(email)) {
        $("input#email").val('');
        $("input#email").focus();
        return false;
    }

    /* validate Subject	*/			
    var mysubject = $("input#mysubject").val();
    regEx = /^[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ .'-]+$/;
    if (mysubject == "" || mysubject == "Mysubject" || !regEx.test(mysubject)) {
        $("input#mysubject").val('');
        $("input#mysubject").focus();
        return false;
    }

    /* validate Comment	*/	
    var comments = $("textarea#comments").val();
    if (comments == "" || comments == "Comments..." || comments.length < 2) {
        $("textarea#comments").val('');
        $("textarea#comments").focus();
        return false;
    }

    var dataString = 'name=' + $("input#name").val() + '&email=' + $("input#email").val() + '&mysubject=' + $("input#mysubject").val() + '&comments=' + $("textarea#comments").val();
    $('#reply_message').addClass('email_loading');

    /* Send form data to mailer.php */
    $.ajax({
        type: "POST",
        url: "mailer.html",
        data: dataString,
        success: function () {
            $('#reply_message').removeClass('email_loading');
            $('#reply_message').addClass('list3');
            $('#reply_message').html('<span class="greenmsg"><img src="./images/service-icon/success.png" height="20" width="20" alt="success" /> &nbsp; Email envoyé avec succès</span>')
            .hide()
            .fadeIn(1500);
            $('#form_contact')[0].reset();
        }
    });
    return false;

});

   jQuery(document).ready(function() {
	  "use strict"; 
	  
	  /* THE FANCYBOX PLUGIN INITALISATION */
      jQuery(".fancybox").fancybox();
 
      /* FLEXY MENU SETTING */
	  $(".flexy-menu").flexymenu({
            align: "right",
            indicator: true
         });
		 
		/* GO TO TOP SETTING */
		var offset = 220;
		var duration = 500;
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.back-to-top').fadeIn(duration);
			} else {
				jQuery('.back-to-top').fadeOut(duration);
			}
		});
		
		jQuery('.back-to-top').click(function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		})
   });