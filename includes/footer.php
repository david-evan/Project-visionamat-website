            <?php 
            if($ActivateBigFooter)
            {
                include_once(CLASS_GALLERY);
                ?>
                <div class="footer-container">
                    <div class="wrapper">
                
                	    <!--Footer About Us-->
                        <section class="footer-aboutus">
                    	    <figure>
                        	    <img src="images/footer-logo.png" alt="logo" width="265" height="51" />
                            </figure>
							<?php include('./lang/'.LANGUAGE.'/footer_aboutus.html')?>
                        </section>
                        <!--Footer About Us End-->
                    
                        <!--Footer Gallery-->
                        <section class="footer-gallery">
                    	    <h2 class="footer-title"><?php echo $Translation->{'footer_gallery_title'} ?></h2>
                            <ul>

                            <?php
                            $FooterGallery = new FooterGallery();
                            $i = 0;
                            foreach ($FooterGallery->getGallery() as $Photo)
                            {
                                $i++;
                                ?>
                        	    <li>
                            	    <a class="fancybox" data-fancybox-group="footergallery" href="<?php echo $FooterGallery->getFullSizeDirectory().$Photo;?>">
                                        <div class="thumbnail-hover"></div>
                                        <img src="<?php echo $FooterGallery->getThumbDirectory().$Photo;?>" alt="gallery thumbnail" width="80" height="80" />
                                    </a>
                                </li>
                                <?php
                                if($i == FOOTER_LIMIT_PHOTOS)
                                    break;
                            }
                             ?>
                            </ul>
                        </section>
                        <!--Footer Gallery End-->
                    
                        <!--Footer Contact-->
                        <section class="footer-contact">
                    	    <?php include('./lang/'.LANGUAGE.'/footer_contactinfo.html')?> 
                            <!--Footer Social-->
                            <ul class="footer-social">
                                <li>
                                    <a href="<?php echo FACEBOOK_URL ?>" target="_blank">
                                        <img src="images/social-icon/social-icon1.png" alt="Facebook - Visionama't" width="20" height="20" />
                                    </a>
                                </li>
                                <li class="social-color2">
                                	<a href="<?php echo TWITTER_URL ?>" target="_blank">
                                    	<img src="images/social-icon/social-icon2.png" alt="Twitter" width="20" height="20" />
                                    </a>
                                </li>
                                <li class="social-color7">
                                    <a href="<?php echo FLICKR_URL ?>" target="_blank">
                                    	<img src="images/social-icon/social-icon7.png" alt="Flickr" width="20" height="20" />
                                    </a>
                                </li>
                                <li class="social-color4">
                                	<a href="./contact.html">
                                    	<img src="images/social-icon/social-icon9.png" alt="contact" width="20" height="20" />
                                    </a>
                                </li>
                            </ul>
                            <!--Footer Social End-->
							<div class="languageButtonFooter">
                                 <a href="<?php echo Engine::getActualPage(); ?>?setLang=fr">
                                 	<img onMouseOver="$(this).attr('src', 'images/fr_on.png');"  
                                         onMouseOut="$(this).attr('src', 'images/fr.png');"   
                                         src="images/fr.png" width="25" height="25" alt="Français" />
                                 </a>&nbsp;&nbsp;&nbsp;
                                 <a href="<?php echo Engine::getActualPage(); ?>?setLang=en">
                                 	<img onMouseOver="$(this).attr('src', 'images/uk_on.png');"  
                                         onMouseOut="$(this).attr('src', 'images/uk.png');"   
                                         src="images/uk.png" width="25" height="25" alt="English" />
                                 </a>
                            </div>
                        </section>
                        <!--Footer Contact End-->
                    </div>
                </div>

            <?php
            }
            ?>
        <section class="footer-bottom">
            <div class="wrapper">
  			<?php include('./lang/'.LANGUAGE.'/footer_bottom_menu.html')?> 
            </div>
        </section>
<!--Footer Bottom End-->
<!--Go To Top-->
<a href="#" class="back-to-top"></a>
<!--End-->