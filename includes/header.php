    <header class="header-section" <?php if ($PageName == 'gallery') echo 'style="position:fixed;"'; ?>> 
    	<div class="wrapper header">
        	
            <div class="logo">
            	<a href="index.html"><img src="images/header-logo.png" width="350" height="65" alt="logo" /></a>
            </div>
			<!--Social Button-->
            <div id="shareme" class="sharrre">
                <div class="box">
                    <a href="<?php echo FACEBOOK_URL ?>" target="_blank" class="facebook"><img src="images/facebook-share.png" alt="facebook" width="30" height="30"></a>
                    <a href="<?php echo TWITTER_URL ?>" target="_blank" class="twitter"><img src="images/twitter-share.png" alt="twitter" width="30" height="30"></a>
                    <a href="<?php echo FLICKR_URL ?>" target="_blank" class="flickr"><img src="images/flickr-share.png" width="30" height="30" alt="Flickr"></a>
                </div>
            </div>
            <!-- Social Button -->
            <!--Navigation Menu Start-->
            <ul class="flexy-menu thick">
            	<li <?php if ($PageName == 'index') echo 'class="active"'; ?>><a href="index.html"><?php echo $Translation->{'header_home'} ?></a><div class="arrow-down"></div></li>
                <li <?php if ($PageName == 'portfolio') echo 'class="active"'; ?>><a href="portfolio.html">Portfolio</a><div class="arrow-down"></div>
                    <ul>
                        <?php
                          foreach (PortfolioGallery::getPortfolioGallery() as $Gallery)
                          {
                              echo '<li><a href="portfolio.html#/'.$Gallery['categoryId'].'">'.$Gallery['name'].'</a></li>';
                          }
                        ?>
                    </ul>
                </li>
                <li <?php if ($PageName == 'gallery') echo 'class="active"'; ?>><a href="gallery.html"><?php echo $Translation->{'header_gallery'} ?></a><div class="arrow-down"></div>
                	<ul>
                     <?php
                          foreach (GalleryForGalleryPage::getGalleryForGalleryPage() as $Gallery)
                          {
                              echo '<li><a href="gallery.html?cat='.$Gallery['categoryId'].'">'.$Gallery['name'].'</a></li>';
                          }
                        ?>
                    </ul>
                </li>
                <li <?php if ($PageName == 'about-me') echo 'class="active"'; ?>><a href="about-me.html"><?php echo $Translation->{'header_aboutme'} ?></a><div class="arrow-down"></div></li>
                <li <?php if ($PageName == 'contact') echo 'class="active"'; ?>><a href="contact.html">Contact</a><div class="arrow-down"></div></li>
            </ul>
            <!--Navigation Menu End-->
            
        </div>
    </header>