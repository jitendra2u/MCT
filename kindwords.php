<section class="kindwords" id="kindwords">
  <div class="container">
    <h3 class="text-center">Kind Words</h3>
    <div class="row kind-wrap">
      <div class="col-md-6 left-sec">
	  <?php 
		//echo $user_post_count = count_user_posts( $userid ,'kindwords' ); 
		//$pcount=intval($user_post_count/2);
		//	query_posts("post_type=kindwords&term_id=2&post_per_page=-1");
			 query_posts(array( 'post_type' => 'kindwords','taxonomy' => 'kind-words','term' => 'Left',     'showposts' => -1, 'order'=>'desc') );
			while ( have_posts() ) : the_post();
			$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); 		 
	?>
		
		
        <div class="kind-box">
		 <?php  
			if($img[0]=='')
			{
		?>
		<div class="img-box">
			<img alt="" class="img-responsive" height="187" src="http://dev.slantwebtech.com/medyhne/wp-content/uploads/2015/09/FB_IMG_1440974999939.jpg" width="187" />
		</div>
		<?php
			}
			else
			{
		?>
		<div class="img-box">
			<img alt="" class="img-responsive" height="187" src="<?php echo $img[0]; ?>" width="187" />
		</div>
		<?php
			}
		?>

		<h5 class="text-center"><?php the_title();?></h5>

		<div class="wild-content">
			<?php the_content();?>
		</div>
		<span class="pink-text"><?php echo $author_name = get_post_meta( $post->ID, 'author_name', true );?></span>
</div>
		
		<?php 
			endwhile;
			wp_reset_query();
		?>
        
      </div>
      <!--===============Right Sec=====================-->
      
      <div class="col-md-6 right-sec">
        <?php 
		//echo $user_post_count = count_user_posts( $userid ,'kindwords' ); 
		//$pcount=intval($user_post_count/2);
			 query_posts(array( 'post_type' => 'kindwords','taxonomy' => 'kind-words','term' => 'Right',     'showposts' => -1,'order'=>'desc' ) );
			while ( have_posts() ) : the_post();
			$img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); 		 
			
		?>


	
        <div class="kind-box">
		 <?php  
			if($img[0]=='')
			{
		?>
		<div class="img-box">
			<img alt="" class="img-responsive" height="187" src="http://dev.slantwebtech.com/medyhne/wp-content/uploads/2015/09/FB_IMG_1440974999939.jpg" width="187" />
		</div>
		<?php
			}
			else
			{
		?>
		<div class="img-box">
			<img alt="" class="img-responsive" height="187" src="<?php echo $img[0]; ?>" width="187" />
		</div>
		<?php
			}
		?>

		<h5 class="text-center"><?php the_title();?></h5>

		<div class="wild-content">
			<?php the_content();?>
		</div>
		<span class="pink-text"><?php echo $author_name = get_post_meta( $post->ID, 'author_name', true );?></span>
</div>
		
		<?php 
			endwhile;
			wp_reset_query();
		?>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</section>