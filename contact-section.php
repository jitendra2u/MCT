
<section id="contactus">
<div class="container">
<h3 class="text-center">Contact Us</h3>
<h6 class="text-center"><span class="star">*</span><?php echo stripslashes(get_option('mct_contact_terms'));?></h6>
<div class="row">
<div class="col-md-4 form-wrap">
<form class="form contactFrom" role="form" method="post" action="">
<div class="form-group"><label for="name">Name:</label>

<div class="input-wrap"><input class="form-control" name="name" id="name" type="text" /></div>
</div>

<div class="form-group"><label for="email">Email:</label>

<div class="input-wrap"><input class="form-control" name="email" id="email" type="email" /></div>
</div>

<div class="form-group"><label for="message">Message:</label>

<div class="input-wrap"><textarea class="form-control" name="message" id="message" rows="5"></textarea></div>
</div>

<div class="btn-wrap"><button class="btn btn-default" type="submit" name="submit" id="submit">Send</button></div>

<div class="clearfix"></div>
</form>
</div>

<div class="col-md-4 form-wrap">
<h4>Subscribe to our Newsletter</h4>

<?php dynamic_sidebar('sidebar-1');?>
<!--form class="form contactFrom" role="form">
<div class="form-group"><label for="subname">Name:</label>

<div class="input-wrap"><input class="form-control" id="subname" type="text" /></div>
</div>

<div class="form-group"><label for="subemail">Email:</label>

<div class="input-wrap"><input class="form-control" id="subemail" type="email" /></div>
</div>

<div class="btn-wrap"><button class="btn btn-default" type="submit">Subscribe</button></div>

<div class="clearfix"></div>
</form-->
</div>

<div class="col-md-4 social-wrap">
	<a href="<?php echo stripslashes(get_option('mct_facebook'));?>" target="_blank">
		<span class="social-icon"><img alt="" height="" src="<?php bloginfo('template_directory')?>/img/socialIcon/fb.png" width="" /></span> 
		<span class="social-text">Facebook</span> 
	</a> 
	<a href="<?php echo stripslashes(get_option('mct_googlep'));?>"target="_blank"> 
		<span class="social-icon"><img alt="" height="" src="<?php bloginfo('template_directory')?>/img/socialIcon/g.png" width="" /></span> 
		<span class="social-text">Google Plus</span> 
	</a>
	<a href="<?php echo stripslashes(get_option('mct_twitter'));?>" target="_blank"> 
		<span class="social-icon"><img alt="" height="" src="<?php bloginfo('template_directory')?>/img/socialIcon/t.png" width="" /></span> 
		<span class="social-text">Twitter</span> 
	</a> 
	<a href="<?php echo stripslashes(get_option('mct_youtube'));?>" target="_blank"> 
		<span class="social-icon"><img alt="" height="" src="<?php bloginfo('template_directory')?>/img/socialIcon/you.png" width="" /></span>
		<span class="social-text">You Tube</span> 
	</a> 
	<!--a href="<?php //echo stripslashes(get_option('mct_rssfeed'));?>" target="_blank"> 
		<span class="social-icon"><img alt="" height="" src="<?php //bloginfo('template_directory')?>/img/socialIcon/rss.png" width="" /></span> 
		<span class="social-text">Rss Feed</span>
	</a--> 
	<a href="<?php echo stripslashes(get_option('mct_linkedin'));?>" target="_blank"> 
		<span class="social-icon"><img alt="" height="" src="<?php bloginfo('template_directory')?>/img/socialIcon/in.png" width="" /></span> 
		<span class="social-text">Linked In</span> 
	</a>
	<a href="<?php echo stripslashes(get_option('mct_skype'));?>" target="_blank"> 
		<span class="social-icon"><img alt="" height="" src="<?php bloginfo('template_directory')?>/img/socialIcon/skype.png" width="" /></span> 
		<span class="social-text">Skype</span> 
	</a>
	<a href="<?php echo stripslashes(get_option('mct_soundcloud'));?>" target="_blank"> 
		<span class="social-icon"><img alt="" height="" src="<?php bloginfo('template_directory')?>/img/socialIcon/sound.png" width="" /></span> 
		<span class="social-text">SoundCloud</span> 
	</a>
</div>

<div class="clearfix"></div>

<div class="contact-bottom">
<div class="medhyne-img-contact pull-left"><img alt="" height="321" src="<?php echo stripslashes(get_option('mct_mission_img'));?>" width="214" /></div>

<div class="statement pull-left">
<h5><?php echo stripslashes(get_option('mct_mission_texts'));?></h5>
</div>

<div class="clearfix"></div>
</div>
</div>
</div>
</section>