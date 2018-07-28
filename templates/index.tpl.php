<!DOCTYPE HTML>
<html>
<?php include(INC_HEAD); ?>
<body>
	<!--Header Start-->
    <?php include(INC_HEADER); ?>
         <!-- wrapper for the whole component -->
         <div id="componentWrapper">
         	<div id="description">
            	<h1><?php echo $Translation->{'index_description_title'} ?></h1>
                <strong><?php echo $Translation->{'keywords'} ?></strong>
            </div>
          	  <div class="componentHolder">
                  <div class="mediaHolder1"></div>
                  <div class="mediaHolder2"></div>
                  <!-- playlist -->
                  <div class="componentPlaylist">
                      
                     <div class="menuHolder">
                         <div class="menuWrapper">
                         </div>
                     </div>
                     
                    <!--Playlist Image-->
                     <div class="thumbHolder">
                         <div class="thumbWrapper">

                             <!-- Start index gallery -->
                             <div class="playlist" data-address='index-gallery' data-title='gallery' data-transitionType='alpha' data-imageFitMode='fit-outside' data-duration='5000' data-transitionTime='1500' data-transitionEase='easeOutSine' data-bgColor='#aaaaaa' data-playlistSize='165'>
                                   <ul> 
                                      <?php 
                                      $IndexGallery = new IndexGallery();
                                      foreach($IndexGallery->getGallery() as $Photo)
                                      {
                                      ?>
                                        <li data-address='<?php echo $Photo['caption']['captionId'] ?>' class='playlistItem' data-caption-id='#<?php echo $Photo['caption']['captionId'] ?>' data-imagePath='<?php echo $IndexGallery->getFullSizeDirectory().$Photo['link'] ?>' data-link='#' data-target='_blank' data-description="<?php echo $Photo['description'] ?>"><a href='#'><img src='<?php echo $IndexGallery->getThumbDirectory().$Photo['link'] ?>' width='120' height='80' alt="<?php echo htmlspecialchars($Photo['description']);?>"/></a></li>
                                      <?php
                                      }
                                      ?>
                                  </ul>  
                             </div>
                        </div>
                     </div>                                   
                     <div class="caption_holder">
                      
                         <?php 
                         foreach($IndexGallery->getGallery() as $Photo)
                         {
                             if($Photo['caption']['activateCaption'])
                             {
                                 ?>
                                <div id="<?php echo $Photo['caption']['captionId'] ?>">
                                    <div class="caption_bg_<?php echo $Photo['caption']['firstCaptionColor'] ?> top" data-startX="0" data-startY="-100" data-endX="0" data-endY="0" data-time="500" data-ease="easeOutBack" data-delay="0"><?php echo $Photo['caption']['firstCaptionTitle'] ?></div>
                        	        <div class="caption_bg_<?php echo $Photo['caption']['secondCaptionColor'] ?> bottom" data-startX="0" data-startY="100" data-endX="0" data-endY="0" data-time="500" data-ease="easeOutBack" data-delay="300"><?php echo $Photo['caption']['secondCaptionTitle'] ?></div>
                                </div> 
                                 <?php
                             }
                         }
                         ?>
                         
                  </div>
                     <input type="hidden" id="firstGalleryImage" value="<?php echo $IndexGallery->getGallery()[0]['caption']['captionId']; ?>" />            
                     <!-- menu buttons -->
                     <div class="prevMenuBtn"><img src='media/data/gallery_icons/playlist_prev_h.png' width='12' height='18' alt=''/></div>   
                     <div class="nextMenuBtn"><img src='media/data/gallery_icons/playlist_next_h.png' width='12' height='18' alt=''/></div> 
                     
                     <!-- thumb buttons -->
                     <div class="prevThumbBtn"><img src='media/data/gallery_icons/playlist_prev_h.png' width='12' height='18' alt=''/></div>   
                     <div class="nextThumbBtn"><img src='media/data/gallery_icons/playlist_next_h.png' width='12' height='18' alt=''/></div>  
                     
                     <!-- playlist toggle -->
                     <div class="playlist_toggle"><img src='media/data/gallery_icons/plus.png' width='30' height='30' alt='playlist_toggle'/></div>

                  
                  </div>
              </div> 

              <!-- toggle music player -->
              <div class="music_toggle"><img src='media/data/audio_icons/music.png' width='30' height='30' alt='music_toggle'/></div>
              
              <!-- slideshow controls - previous,pause/play,next -->
              <div class="slideshow_controls">
              	  <div class="controls_next"><img src='media/data/gallery_icons/next.png' width='30' height='30' alt='controls_next'/></div>
                  <div class="controls_toggle"><img src='media/data/gallery_icons/play.png' width='30' height='30' alt='controls_toggle'/></div>
                  <div class="controls_prev"><img src='media/data/gallery_icons/prev.png' width='30' height='30' alt='controls_prev'/></div>
                  
				  <?php if(ALLOW_INDEX_DL){?>
                  <div class="DownloadBtn"> 
                      <img 
					  onClick="Download();"
                      class="DownloadImg"
                      onMouseOver="this.src='media/data/gallery_icons/download_on.png'"  
                      onMouseOut="this.src='media/data/gallery_icons/download.png'" 
                      src="media/data/gallery_icons/download.png" width="30" height="30" alt="download" />
				  </div>
                  <?php }?>
              </div>
           		<!-- data controls - link/description -->
              <div class="data_controls">
                  <div class="info_toggle"><img src='media/data/gallery_icons/info.png' width='30' height='30' alt='info_toggle'/></div>
              </div>
              <div class="CopyrightButton">
              <a href="legals.html#copyright">
              <span><?php echo $Translation->{'copyright_button'} ?></span>
              <img 
                  onMouseOver="this.src='media/data/gallery_icons/copyright_on.png'"  
                  onMouseOut="this.src='media/data/gallery_icons/copyright.png'" 
                  src="media/data/gallery_icons/copyright.png" width="30" height="30" alt="copyright link" />
              </a>
              </div>
              <div class="languageButton">
                   <a href="<?php echo Engine::getActualPage(); ?>?setLang=fr">
                      <img onMouseOver="$(this).attr('src', 'images/fr_on.png');"  
                           onMouseOut="$(this).attr('src', 'images/fr.png');"   
                           src="images/fr.png" width="25" height="25" alt="Français" />
                   </a>
                   <a href="<?php echo Engine::getActualPage(); ?>?setLang=en">
                      <img onMouseOver="$(this).attr('src', 'images/uk_on.png');"  
                           onMouseOut="$(this).attr('src', 'images/uk.png');"   
                           src="images/uk.png" width="25" height="25" alt="English" />
                   </a>
              </div>
              
              <!-- description holder -->
              <div class="info_holder"></div>
              
              <!-- preloader for images -->
              <div class="componentPreloader"></div>  
               
              <!-- video player -->
              <div class="videoPlayer"></div>
              
              
<?php include (INC_JSCRIPT); include(INC_EXTENDED_JSCRIPT) ?>
<script type="text/javascript"> <?php include(INC_JS_INDEX) ?></script>
<?php include(INC_ANALYTICS); ?>
</body>
</html>