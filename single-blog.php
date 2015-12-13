<?php 
get_header('inner');
?>
<section id="blogsingle">
  <div class="container">
  <?php 
 if ( have_posts() ) : the_post();
$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
$content=get_the_content(); 								
?>
    <h3 class="text-center"><?php the_title();?></h3>
    <div class="row">
	
	 <?php  
		if($img[0]!='')
		{
	  ?>
		<div class="col-md-6 vid-bone img-box">
		<?php
				if ( has_post_thumbnail() ) { 
					the_post_thumbnail( 'blog_single' ); 
				}
			?>
        <!--img alt=""  src="<?php //echo $img[0]; ?>"  width="883" height="560"/-->
      </div>
	   <?php
		}
		?>
	  <?php   $blog_video = get_post_meta( $post->ID, 'blog_video', true );
		if($blog_video!='')
		{
	  ?>
	   <div class="col-md-6 vid-btwo vid-box">
       <iframe width="500" height="298" src="<?php echo $blog_video;?>" frameborder="0" allowfullscreen></iframe>
      </div>
	  <?php
		}
		else{
			get_sidebar();
		}
		?>
	 

     
      <div class="clearfix"></div>
    </div>
    <div class="row">
		<?php
			if($blog_video!='')
			{
		?>
      <div class="col-md-8 blog-desc">
        	
		<?php 
			}
		else
		{
		?>
	<div class="col-md-12 blog-desc">
	<?php
		}	
		the_content();
				
			?>
      </div>
	   
        	<?php get_sidebar();?>
 
	   
    </div>
<?php comments_template(); ?>
  </div>
  	<?php endif;?>


</section>
<?php
get_footer();
?>