
<header>
<div class="container">
<div class="row">
<div class="col-md-3 mydhyne-box">
<div class="img-box"><img alt="" class="img-responsive" height="399" src="<?php echo $top_left_url = get_post_meta( 2, 'top_left_url', true );?>" width="285" /></div>
</div>

<div class="col-md-6 video">
<div class="video-box">
<iframe width="560" height="315" src="<?php echo $video_link = get_post_meta( 2, 'video_link', true );?>" frameborder="0" allowfullscreen></iframe>

</div>
</div>

<div class="col-md-3">
<div class="header-content">
<p>
<?php echo $right_text = get_post_meta( 2, 'right_text', true );?>
</p>
</div>
</div>

<div class="clearfix"></div>
</div>
</div>
</header>
<!--better life section-->

<section class="betterLifeBg" id="betterLife">
<?php 
/*$pageid=2;
$page=get_pages($pageid);
print_r($page);
echo $page->post_content;*/

if ( have_posts() ) : while ( have_posts() ) : the_post();
	the_content();
	endwhile;
endif;


?>
</section>
