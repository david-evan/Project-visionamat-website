<!DOCTYPE HTML>
<html>
<?php include(INC_HEAD); ?>
<body>
    <?php
    include(INC_HEADER);
    ?>
    
	<div id="legalspage" class="container background backimage4">
    	<div id="description">
        	<h1><?php echo $Translation->{'legals_description_title'} ?></h1>
            <strong><?php echo $Translation->{'keywords'} ?></strong>
        </div>
        <!--All Content Start-->
        <div class="wrapper boxstyle">
            <!--Feature Image and Details-->
            <section class="box-container">
            	
                <!--Page Navigation-->
                <nav class="pagenav">
                	<ul>
                    	<li><a href="index.html"><?php echo $Translation->{'legals_link_index'} ?></a></li>
                        <li><?php echo $Translation->{'legals_link_self'} ?></li>
                    </ul>
                </nav>
                <!--Blockquote-->
                
                <div class="blog-details">
                    <!--Text Content Area-->
				<?php if(isset($_GET['lang']) && $_GET['lang'] == 'fr') include('./lang/fr/legals_content.html'); else { include('./lang/'.LANGUAGE.'/legals_content.html'); }?> 
                </div>

                 <!--Sidebar Start-->
                    <aside id="legalsgallery" class="page-sidebar">
                        <section class="sidebar-gallery">
                        	<h2 class="sidebar-title"><?php echo $Translation->{'aboutme_gallery_name'} ?></h2>
                            <ul>
                                <?php
                                $i = 0;
                                $AboutMeGallery = new AboutMeGallery();
                                foreach ($AboutMeGallery->getGallery() as $Photo)
                                {
                                ?>
                            	<li>
                                	<figure>
                                    	<a class="fancybox" data-fancybox-group="sidebargallery" href="<?php echo $AboutMeGallery->getFullSizeDirectory().$Photo;?>">
                                        	<div class="thumbnail-hover"></div>
                                        	<img src="<?php echo $AboutMeGallery->getThumbDirectory().$Photo;?>" alt="gallery" />
                                        </a>
                                    </figure>
                                </li>
                                <?php
                                    $i++;
                                    if($i == ABOUTME_LIMIT_PHOTOS)
                                        break;
                                }
                                ?>
                            </ul>
                        </section>
                        <!--Sidebar Gallery End-->
                </aside>
            </section>
        </div>
        <!--All Content End-->
        <!--Footer Start-->
        <footer>
            <!--Footer Bottom-->
           <?php include (INC_FOOTER); ?>
            
        </footer>
        <!--Footer End-->
	</div>
	<?php include (INC_JSCRIPT); ?>
    <script type="text/javascript"><?php include(INC_JS_ABOUTME); ?></script>
    <?php include(INC_ANALYTICS); ?>
</body>
</html>
