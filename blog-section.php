<section id="blog">
<div class="container">
<h3 class="white-heading text-center">Blog</h3>

<div class="row">

<?php query_posts("post_type=blog&post_per_page=6");
 while ( have_posts() ) : the_post();
	$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); 								
?>
<div class="blog-box">
<?php $postdate=get_the_date('y/m/d');
$date=explode('/',$postdate);
//print_r($date);
?>
	<div class="col-md-2">
	<div class="date-wrap text-center"><span class="date"><?php echo $date[2];?></span> <span class="month"><?php echo $date[1];?>/<?php echo $date[0];?></span></div>
	</div>

	<div class="col-md-4">
		<div class="img-wrap">
			<?php
				if ( has_post_thumbnail() ) { 
					the_post_thumbnail( 'blog_thumb' ); 
				}
			?>
			<!--img alt="" class="img-responsive" height="272" src="<?php //echo $img[0]; ?>" width="421" /-->
		</div>
	</div>

	<div class="col-md-6">
	<div class="blog-content">
		<a href="<?php the_permalink();?>"><h5><?php the_title();?></h5></a>
		<p><?php echo wp_trim_words(get_the_content(), $num_words = 35, $more = null);?></p>
		<a class="read_more" href="<?php the_permalink();?>"><span>Read More </span>
			<span class="arrow"><img alt="" height="28" src="<?php bloginfo('template_directory')?>/img/blog/right-arrow.png" width="17" /></span>
		</a>
	</div>
	</div>

	<div class="clearfix"></div>

	<div class="megenta-line"></div>
</div>
<?php
	endwhile;
wp_reset_query();
?>
</div>
</div>
</section>