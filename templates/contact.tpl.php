<!DOCTYPE HTML>
<html>
<?php include(INC_HEAD);?>
<body>
    <?php
    include(INC_HEADER);
    ?>
	<div class="container background backimage4">
    	<div id="description">
        	<h1><?php echo $Translation->{'contact_description_title'} ?></h1>
            <strong><?php echo $Translation->{'keywords'} ?></strong>
        </div>
        <!--All Content Start-->
        <div class="wrapper boxstyle">
        	
            <!--Page Header Start-->
            <section class="page-header">
            	<h1><?php echo $Translation->{'contact_h1_title'} ?></h1>
                <p><?php echo $Translation->{'contact_p_subtitle'} ?></p>
            </section>
            <!--Page Header End-->
            
            <!--Map and Details-->
            <section class="box-container">
            	
                <!--Page Navigation-->
                <nav class="pagenav">
                	<ul>
                    	<li><a href="index.html"><?php echo $Translation->{'contact_link_index'} ?></a></li>
                        <li><?php echo $Translation->{'contact_link_self'} ?></li>
                    </ul>
                </nav>
                
                <!--Map-->
                <div class="map-container">
                    <div id="map-canvas"></div>
                </div>
                
                <!--Contact Area-->
                <div class="contact-area">
                
                	<!--Send Message Start-->
                	<div class="send-message">
                    	<h2><?php echo $Translation->{'contact_sendmessage_h2'} ?></h2>
                        <div class="comment-fieldbox">
                            <form id="form_contact" method="post">
                                <input id="name" class="input-name" type="text" name="name" placeholder="<?php echo $Translation->{'contact_form_name'} ?> *" required />
                                <input id="email" class="input-email" type="text" name="email" placeholder="<?php echo $Translation->{'contact_form_email'} ?> *" required />
                                <input id="mysubject" class="input-subject" type="text" name="mysubject" placeholder="<?php echo $Translation->{'contact_form_subject'} ?> *" required />
                                <textarea id="comments" class="input-textarea" name="comment" placeholder="<?php echo $Translation->{'contact_form_message'} ?>*" required></textarea>
                                <div class="comment-active">
                                    <span><?php echo $Translation->{'contact_inforequired'} ?></span>
                                    <input id="email_submit" class="submit-button" type="submit" value="<?php echo $Translation->{'contact_send_button'} ?>"/>
                                </div>
                                <div class="email_success">
                                    <div id="reply_message" class="email_loading" ></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--Send Message End-->
                    
                    <!--Contact Info Start-->
                    <div class="contact-info">
					<?php include('./lang/'.LANGUAGE.'/contact_content.html')?> 
                    </div> 
                    <!--Contact Info End-->
                    
                </div>
                <!--Content Area End-->
                
            </section>
            <!--Map and Details End-->

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

<!--Google Map Script-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript"> <?php include(INC_JS_CONTACT) ?></script>
<?php include(INC_ANALYTICS); ?>
</body>
</html>
