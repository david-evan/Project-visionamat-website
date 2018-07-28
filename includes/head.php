<head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="<?php echo $Translation->{'index_meta_description'} ?>" />
    <title><?php if($Translation->{'index_title'}) echo $Translation->{'index_title'}; else echo DEFAULT_PAGE_TITLE; ?></title>

    <link rel="icon" type="image/png" href="images/favicon.png" />
    <?php if(!DEVELOPPER_MODE) {?>
    	<link href="css/main.min.css" rel="stylesheet" type="text/css">
		<?php  if($PageName == 'index' or $PageName == 'portfolio'){ ?>
        <link href="css/index-portfolio.min.css" rel="stylesheet" type="text/css">
        <?php } else { ?>
        <link href="css/megafolio.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="plugins/megafolio/fancybox/jquery.fancybox.css?v=2.1.3" type="text/css" media="screen" />
        <?php } ?>
        
    <?php } else {?>
        <!--Main Element CSS-->
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/hexagon.css" rel="stylesheet" type="text/css">
        <link href="css/form.css" rel="stylesheet" type="text/css">
        <link href="css/flexy-menu.css" rel="stylesheet" type="text/css">
        
        <?php  if($PageName == 'index' or $PageName == 'portfolio'){ ?>
        <!--Multitransition Gallery Sliders CSS-->
        <link href="css/audioPlayer_tr.css" rel="stylesheet" type="text/css">
        <link href="css/flashblock.css" rel="stylesheet" type="text/css">
        <link href="css/playlistBottomInside.css" rel="stylesheet" type="text/css">
        <link href="css/videoPlayer.css" rel="stylesheet" type="text/css">
        
        <?php } else { ?>
        <!--LayerSlider CSS-->
        <link href="plugins/layerslider/css/layerslider.css" rel="stylesheet" type="text/css">
        <!-- MEGAFOLIO PRO GALLERY CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="plugins/megafolio/css/settings.css" media="screen" />
        <!-- THE FANYCYBOX ASSETS -->
        <link rel="stylesheet" href="plugins/megafolio/fancybox/jquery.fancybox.css?v=2.1.3" type="text/css" media="screen" />
        <?php 
		} 
	} 
	?>
    <!-- CSS Color -->
    <link href="css/color.css" rel="stylesheet" type="text/css">
    <!--Responsive CSS-->
    <link href="css/responsive.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900|Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <!--[if lte IE 8]>
    <meta HTTP-EQUIV="REFRESH" content="0; url=lte-ie8.html">
    <![endif]-->
</head>
