/*GALLERY INSTANCES */
var gallery1;

jQuery(document).ready(function ($) {
    jsReady = true;
    gallery1 = $('#componentWrapper').multiGallery(kb_settings);
    kb_settings = null;
	
    /* FLEXY MENU SETTING */
    $(".flexy-menu").flexymenu({
        align: "right",
        indicator: true
    });
});

function Download()
{
	if($(window).width() <= 1279)
		{
		
		var r = confirm("Ce fichier HD peut ralentir votre appareil et consommer beaucoup de bande passante. \n\nÊtes-vous sûr de vouloir continuer ? ");
		
		if (r == true) 
		{
			window.open('download.html?file=' + $(location).attr('hash').substring(1) , '_parent');
		}
	}
	else
		window.open('download.html?file=' + $(location).attr('hash').substring(1) , '_parent');
}


var firstGalleryImage = 'index-gallery/' + $("#firstGalleryImage").val();
/* GALLERY SETTINGS */
var kb_settings = {
    /* GENERAL */
    /* componentHolder: dom element which holds the whole component */
    componentHolder: '#componentWrapper',
    /* componentFixedSize: true/false. Responsive = false, fixed = true */
    componentFixedSize: false,
    /* disableRightClick: true/false  */
    disableRightClick: true,
    /* forceImageFitMode: true/false. By default, only images bigger than component size will get proportionally resized to 'fit inside' or 'fit outside' mode. If this is true, all images will be forced into that mode. */
    forceImageFitMode: true,

    /* DEEPLINKING SETTINGS */
    /* useDeeplink: true/false */
    useDeeplink: true,
    /* startUrl: deeplink start url, enter 'div' data-address/'li' data-address (two levels). Or just 'div' data-address (single level). */
    startUrl: firstGalleryImage,

    /* NO DEEPLINKING SETTINGS */
    /* activeCategory: active category to start with (counting starts from zero, 0=first category, 1=second category, 2=third category... etc) */
    activeCategory: 0,

    /* SLIDESHOW */
    /* slideshowOn; true, false */
    slideshowOn: true,
    /* useGlobalDelay; true, false (use same timer delay for all slides, if false you need to set individual delays for every slide -> data-duration attribute) */
    useGlobalDelay: true,
    /* slideshowAdvancesToNextCategory: true/false. On the end of current category, go to next one, instead of loop current one. */
    slideshowAdvancesToNextCategory: false,
    /* randomPlay; true, false (random image play in category) */
    randomPlay: false,

    /* DESCRIPTION */
    /* autoOpenDescription; true/false (automatically open description, if exist)  */
    autoOpenDescription: true,
    /* maxDescriptionWidth: max width of the description */
    maxDescriptionWidth: 250,

    /* PLAYLIST */
    /* autoAdjustPlaylist: true/false (auto adjust thumb playlist and playlist buttons) */
    autoAdjustPlaylist: true,
    /* playlistPosition: top, right, left, bottom  */
    playlistPosition: 'bottom',
    /* autoOpenPlaylist: true/false. Auto open playlist on beginning */
    autoOpenPlaylist: false,
    /* playlistHidden: true/false. (leave css display none on componentPlaylist) */
    playlistHidden: false,
    /* playlistIndex: inside/outside ('outside' opens above the image, while 'inside' sits outside of the image area and cannot be closed)  */
    playlistIndex: 'inside',

    /* MENU */
    /* menuOrientation: horizontal/vertical  */
    menuOrientation: 'horizontal',
    /* menuItemOffOpacity: opacity of menu item when inactive */
    menuItemOffOpacity: 0.5,
    /* menuBtnSpace: space between menu buttons and the menu (enter 0 or more) */
    menuBtnSpace: 30,
    /* visibleMenuItems: visible menu items by default. Enter number (if they dont fit into provided area, the code will automatically reduce this number) or 'max' (maximum number that fits). */
    visibleMenuItems: 'max',
    /* fixMenu: true/false. false by default (menu centered). Can be true ONLY if 'visibleMenuItems' != 'max'. 
    Set this to true to fix it to one side. */
    fixMenu: false,
    /* fixMenuSettings: (if fixMenu = true), param1: side: -> left/right if menuOrientation = horizontal, top/bottom if menuOrientation = vertical, 
                                             param2: value -> offset value in px from that side */
    fixMenuSettings: { side: 'top', value: 100 },

    /* THUMBNAILS */
    /* thumbOrientation: horizontal/vertical  */
    thumbOrientation: 'horizontal',
    /* thumbOffOpacity: opacity of thumb when inactive */
    thumbOffOpacity: 0.5,
    /* visibleThumbs: visible thumb items by default. Enter number (if they dont fit into provided area, the code will automatically reduce this number) or 'max' (maximum number that fits). */
    visibleThumbs: 'max',
    /* thumbBtnSpace:  space between thumb buttons and the thumbs (enter 0 or more) */
    thumbBtnSpace: 30,
    /* fixThumbs: true/false. false by default (thumbs centered). Can be true ONLY if 'visibleThumbs' != 'max'. 
    Set this to true to fix it to one side. */
    fixThumbs: false,
    /* fixThumbsSettings:  (if fixThumbs = true), param1: side -> left/right if thumbOrientation = horizontal, top/bottom if thumbOrientation = vertical,
                                                  param2: value -> offset value in px from that side */
    fixThumbsSettings: { side: 'top', value: 100 },

    /* VIDEO SETTINGS */
    /* useVideo: true/false */
    useVideo: true,
    /* videoVolume: default volume for video (0-1) */
    videoVolume: 0.5,
    /* videoAutoPlay: true/false (Defaults to false on mobile) */
    videoAutoPlay: false,
    /* includeVideoInSlideshow: true/false (on video end resume slideshow, only if slideshow was playing before video request) */
    includeVideoInSlideshow: false,
    /* videoLoop: true/false (only if includeVideoInSlideshow = false) */
    videoLoop: false,
    /*playerBgOpacity: background opacity behind the video player when its opened (0-1) */
    playerBgOpacity: 0.8,
    /*playerHolder: dom elements which holds the whole player */
    playerHolder: '#componentWrapper .videoPlayer',
    /*flashHolder: id of the flash movie */
    flashHolder: '#flashPreview',

    /* AUDIO SETTINGS */
    /* useAudio: true/false */
    useAudio: false
};

/* END GALLERY SETTINGS */
