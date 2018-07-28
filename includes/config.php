<?php
/*
Fichier de config/initialisation du site web. 
*/

/** CONSTANTE MODIFIABLE POUR ADAPTER LE COMPORTEMENT DU SITE **/

//Config : Dev Mode 
const DEVELOPPER_MODE = false;
const CACHE_ACTIVATION = true;

// Config : Shuffle
const SHUFFLE_GALLERY_PHOTOS = true;
const SHUFFLE_PORTFOLIO_PHOTOS = false;
const SHUFFLE_FOOTER_PHOTOS = true;
const SHUFFLE_ABOUTME_PHOTOS = true;
const SHUFFLE_INDEX_PHOTOS = false;

// Config : Allow Download
const ALLOW_PORTFOLIO_DL = true;
const ALLOW_GALLERIES_DL = true;
const ALLOW_INDEX_DL = true;

// Config : Limit
const ABOUTME_LIMIT_PHOTOS = 9;
const FOOTER_LIMIT_PHOTOS = 8;

// Config : Contact E-mail
const CONTACT_EMAIL = 'sarah@visionamat.com';

// Default page title
const DEFAULT_PAGE_TITLE = 'Visionama\'t - Photography Portfolio';
// ----------------------------------------------------------------------------------

/** /!\ NE PAS MODIFIIER /!\ - Files paths **/

// Include : HTML ELEMENTS
const INC_HEADER = 'includes/header.php';
const INC_HEAD = 'includes/head.php';
const INC_FOOTER = 'includes/footer.php';
const INC_JSCRIPT = 'includes/jscript.php';
const INC_EXTENDED_JSCRIPT = 'includes/extended-jscript.php';
const INC_ANALYTICS = 'includes/analytics.php';

// Include : JS ELEMENTS
const INC_JS_ABOUTME = 'javascript/includes/about-me.js';
const INC_JS_INDEX = 'javascript/includes/index.js';
const INC_JS_PORTFOLIO = 'javascript/includes/portfolio.js';
const INC_JS_GALLERY = 'javascript/includes/gallery.js';
const INC_JS_CONTACT = 'javascript/includes/contact.js';

// Includes : Class
const CLASS_GALLERY = 'includes/class/gallery.class.php';
const CLASS_DOWNLOADER  = 'includes/class/downloader.class.php';
const CLASS_ENGINE  = 'includes/class/engine.class.php';
const CLASS_TEMPLATE  = 'includes/class/template.class.php';

// Directory : Photos galleries
const DIR_ABOUTME_FULLSIZE = './media/photos/aboutme-gallery/main/';
const DIR_ABOUTME_THUMB = './media/photos/aboutme-gallery/thumb/';
const DIR_FOOTER_FULLSIZE = './media/photos/footer-gallery/main/';
const DIR_FOOTER_THUMB = './media/photos/footer-gallery/thumb/';
const DIR_PORTFOLIO_FULLSIZE = './media/photos/portfolio-gallery/main/';
const DIR_PORTFOLIO_THUMB = './media/photos/portfolio-gallery/thumb/';
const DIR_INDEX_FULLSIZE = './media/photos/index-gallery/main/';
const DIR_INDEX_THUMB = './media/photos/index-gallery/thumb/';
const DIR_GALLERY_FULLSIZE = './media/photos/galleries/';

// Config : URL external website
const FACEBOOK_URL = 'https://www.facebook.com/visionamat/';
const TWITTER_URL = 'https://twitter.com/Visionamat';
const FLICKR_URL = 'https://www.flickr.com/photos/130597612@N02/';

/* Initialisation des variables initiales et lancement du moteur */
// ----------------------------------------------------------------------------------
include(CLASS_ENGINE);
Engine::defineLanguage(); // Crée les constantes : LANGUAGE et DATA_GALLERY

include_once(CLASS_GALLERY);
include_once(CLASS_TEMPLATE);

// ----------------------------------------------------------------------------------

// Config : Default value for variable
$ActivateBigFooter = true;
?>