<div class="col-md-4">
        <div class="sidebar">
        	<div class="recent-blog">
              <h4>Recent Blogs</h4>
              <ul>
			  <?php 
				query_posts("post_type=blog&post_per_page=5");
				while ( have_posts() ) : the_post();
				
				?>
                <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                <?php 
				endwhile;
				wp_reset_query();
				?>
              </ul>
          </div>
          <div class="our-product">
              <h4>Our Products</h4>
              <ul>
                 <?php 
				query_posts("post_type=product&post_per_page=5");
				while ( have_posts() ) : the_post();
				
				?>
                 <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                <?php 
				endwhile;
				wp_reset_query();
				?>
              </ul>
          </div>
        </div>
      </div>