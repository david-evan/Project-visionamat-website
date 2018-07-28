<?php
//Récupération de la catégorie à afficher
if(isset($_GET['cat']))
    $Category = htmlentities($_GET['cat']);
else
    $Category = 'cat-all';
?>
<!DOCTYPE HTML>
<html>
<?php include(INC_HEAD);?>
<body>
    <?php include(INC_HEADER); ?>
	<div class="container">
   		<div id="description">
        	<h1><?php echo $Translation->{'gallery_description_title'} ?></h1>
            <strong><?php echo $Translation->{'keywords'} ?></strong>
        </div>
        <!--Header With Feature Image-->
        <section class="header-image header-feature2">
        	<div class="wrapper">
                <h1><?php echo $Translation->{'gallery_h1_title'} ?></h1>
                <p><?php echo $Translation->{'gallery_p_subtitle'} ?></p>
                
                <!--Page Navigation-->
                <nav class="pagenav">
                	<ul>
                    	<li><a href="index.html"><?php echo $Translation->{'gallery_link_index'} ?></a></li>
                        <li><?php echo $Translation->{'gallery_link_self'} ?></li>
                    </ul>
                </nav>
                
        	</div>
        </section>
        <!--Header With Feature Image End-->

        <!--Portfolio Container Start-->
        <section class="portfolio-container">
        	
            <!--Category Filter-->
            <div class="category-filter">
            	<div class="wrapper center">
                    <ul>
                        <li id="cat-all" class="filter <?php if($Category == 'cat-all') echo 'selected'; ?>" data-category="cat-all">TOUTES</li>
                        
                        <?php

                        $GalleryForGalleryPage = new GalleryForGalleryPage();

                        foreach($GalleryForGalleryPage->getGallery() as $Gallery)
                        {
                            if($Gallery['categoryId'] == $Category) $Selected = ' selected'; else $Selected = '';
                            echo '<li id="'.$Gallery['categoryId'].'" class="filter'.$Selected.'" data-category="'.$Gallery['categoryId'].'">'.$Gallery['name'].'</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <!--End-->
            <!--Gallery Fullwidth Thumbnails-->
            <div class="grid-fullwidth">
            	<div class="megafolio-container noborder norounded">        
                    <?php
                    foreach ($GalleryForGalleryPage->getGallery() as $Gallery)
                    {
                        foreach($Gallery['photos'] as $Photo)
                        {
                        ?>
                            <div class="mega-entry cat-all <?php echo $Gallery['categoryId'];?>" data-src="<?php echo $GalleryForGalleryPage->getFullSizeDirectory().$Gallery['directory'].'/'.$Photo['link']; ?>" data-width="504" data-height="400">
                                

                                    <div class="mega-hover alone">
                                    
										<a class="fancybox" data-fancybox-group="group" href="<?php echo $GalleryForGalleryPage->getFullSizeDirectory().$Gallery['directory'].'/'.$Photo['link']; ?>">
                                            <!--Title and Subtitle-->
                                            <div style="height:100%;" >
                                            </div>
                                            <div  class="mega-hovertitle"><?php echo $Photo['name']; ?>
                                                <div class="mega-hoversubtitle"><?php echo $Photo['subtitle']; ?> </div>
                                            </div>
                                            <!-- Preview Button   -->
                                            <div class="mega-hoverview mega-zoom">
                                            </div>
                                        </a>
                                        <?php if(ALLOW_GALLERIES_DL) {?>
                                        <div class="GalleryPageDownloadBtn" 
                                             onMouseOver="$('img', this).attr('src', 'media/data/gallery_icons/download_on.png');"  
                                             onMouseOut="$('img', this).attr('src', 'media/data/gallery_icons/download.png');"  
                                             onClick="Download('download.html?file=<?php echo '/'.DownloaderURLParser::GalleriesDirName.'/'.$Gallery['directory'].'/'.$Photo['link'] ?>');">
                                                          
                                        <img 
                                            class="GalleryPageDownloadImg"
                                            src="media/data/gallery_icons/download.png" width="30" height="30" alt="download" />
                                            
                                        <span> <?php echo $Translation->{'gallery_download'}?></span>
                                        </div>
                                        
                                        <?php }?>
                                    </div>
                                    
                                
                                
                            </div>

                        <?php
                        }
                    }
                    ?>
                    <input type="hidden" id="categoryStart" value="<?php echo $Category; ?>" />
               </div>
            </div>
            <!--Portfolio Fullwidth Thumbnails End-->
            
        </section>
        <!--Portfolio Container End-->
        
        <!--Footer Start-->
        <footer>
            <!--Footer Bottom-->
           <?php include (INC_FOOTER); ?>
            
        </footer>
        <!--Footer End-->
    
	</div>

    <?php include (INC_JSCRIPT); ?>
	<script type="text/javascript"> <?php include(INC_JS_GALLERY) ?></script>
    <?php include(INC_ANALYTICS); ?>
</body>
</html>
