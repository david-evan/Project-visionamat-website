<!DOCTYPE HTML>
<html>
<?php include(INC_HEAD);?>
<body>
    <?php
    include(INC_HEADER);
    ?>

	<div class="container background backimage4">
   		<div id="description">
        	<h1><?php echo $Translation->{'aboutme_description_title'} ?></h1>
            <strong><?php echo $Translation->{'keywords'} ?></strong>
        </div>
        <!--All Content Start-->
        <div class="wrapper boxstyle">
            <!--Feature Image and Details-->
            <section class="box-container">

                <!--Page Navigation-->
                <nav class="pagenav">
                	<ul>
                    	<li><a href="index.html"><?php echo $Translation->{'aboutme_link_index'} ?></a></li>
                        <li><?php echo $Translation->{'aboutme_link_self'} ?></li>
                    </ul>
                </nav>

                <!--Feature Image-->
                <figure class="feature-image">
                	<img src="images/upload/about-us-feature-image.jpg" alt="about us" />
                </figure>

                <!--Blockquote-->
                <blockquote class="quote-pagefullwidth">
					<p><span class="quote-icon"><?php echo $Translation->{'aboutme_head_quote'} ?></span></p>
                    <p class="quote-subtext">- Anne Geddes -</p>
                </blockquote>

                <div class="blog-details">
                    <!--Text Content Area-->
                    <div class="aboutus-content">
                    <h2><?php echo $Translation->{'aboutme_whoiam'} ?></h2><hr />
                        <br /><p>Hello ! <span class="smiley">☺</span></p>
						<?php include('./lang/'.LANGUAGE.'/aboutme_content.html')?>
                    </div>
                </div>
                 <!--Sidebar Start-->
                    <aside class="page-sidebar">
                        <!--Sidebar Equipment Start-->
                        <section class="sidebar-category">
                            <?php include('./lang/'.LANGUAGE.'/aboutme_equipment.html')?>
                        </section>
                        <!--Sidebar Equipment End-->

                        <!--Sidebar Gallery Start-->
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

            <section class="our-team">
            	<div class="team-title-area">
                	<h1><span class="team-title"><?php echo $Translation->{'aboutme_discover_work'} ?></span></h1>
                </div>
                <ul>

                    <!--Team 1-->
                    <li>
                    	<div class="team-mask" onclick="" >
                        	<div class="team-details">
                                <div class="team-name"><?php echo $Translation->{'aboutme_work_first_pic_title'} ?></div>
                                <div class="team-position">#PairiDaiza</div>
                                <div class="team-more"><a href="gallery.html"><?php echo $Translation->{'aboutme_more_work'} ?></a></div>
                            </div>
                        </div>
                        <div class="thumbnail-hover team"></div>
                    	<figure><img src="images/upload/team1.jpg" alt="team" /></figure>
                    </li>
                    <!--End-->

                    <!--Team 2-->
                    <li>
                    	<div class="team-mask">
                        	<div class="team-details">
                                <div class="team-name"><?php echo $Translation->{'aboutme_work_second_pic_title'} ?></div>
                                <div class="team-position">#PairiDaiza</div>
                                <div class="team-more"><a href="gallery.html"><?php echo $Translation->{'aboutme_more_work'} ?></a></div>
                            </div>
                        </div>
                        <div class="thumbnail-hover team"></div>
                    	<figure><img src="images/upload/team2.jpg" alt="team" /></figure>
                    </li>
                    <!--End-->

                    <!--Team 3-->
                    <li>
                    	<div class="team-mask">
                        	<div class="team-details">
                                <div class="team-name"><?php echo $Translation->{'aboutme_work_third_pic_title'} ?></div>
                                <div class="team-position">#PairiDaiza</div>
                                <div class="team-more"><a href="gallery.html"><?php echo $Translation->{'aboutme_more_work'} ?></a></div>
                            </div>
                        </div>
                        <div class="thumbnail-hover team"></div>
                    	<figure><img src="images/upload/team3.jpg" alt="team" /></figure>
                    </li>
                    <!--End-->

                </ul>

                <div class="clearfix"></div>

                <!--Blockquote-->
                <blockquote class="quote-pagefullwidth">
                    <p><span class="quote-icon"><?php echo $Translation->{'aboutme_footer_quote'} ?></span></p>
                    <p class="quote-subtext">Henri Cartier-Bresson - 1908 - 2004</p>
                </blockquote>
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
