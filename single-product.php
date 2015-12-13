<?php 
get_header('product');
?>
<section id="blogsingle">
<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
	global $product;
}
if(have_posts()): the_post();
?>
  <div class="container">
    <h3 class="text-center"><?php the_title();?></h3>
    <div class="row">
      <div class="col-md-7 img-box">
		  <?php
				if ( has_post_thumbnail() ) { 
					the_post_thumbnail( 'blog_single' ); 
				}
			?>
        <!--img alt=""  src="<?php //bloginfo('template_directory')?>/img/blog/blog-thumb.jpg"  width="883" height="560"/-->
      </div>
	 
	   <div class="col-md-5">
        <div class="product-detail">
        	
        	<form action="" method="">
                <div class="size-wrap">
                    <span class="size-text">Size : </span>
                    <!--span class="size">
						<?php/* $size_var = $product->get_variation_attributes();?>
						<pre><?php //print_r($size_var);?></pre>
						
                        <select id="product_size" name="product_size">
						<?php
							//$i=0;
							foreach($size_var as $size)
								{
							foreach($size as $size1)	
								{
						?>	
						
							<option value="<?php echo $size1;?>"><?php echo $size1;?></option>
						<?php 
						//echo $i++;
								}
								}*/
						?>
                            
                           
                        </select>
                    </span-->
                </div>
                <div class="price-wrap">
                    <span class="price-text">Price : </span>
						<!--span class="price"><span><?php //echo get_woocommerce_currency(); ?></span>
						<span><?php //echo $product->get_price(); ?></span-->
						<span class="price"><?php echo $product->get_price_html(); ?></span>
					</span>
						<!--pre><?php //print_r($product->get_available_variations());?></pre-->
				 </div>
                <!--div class="btn-wrap">
                    <button  class="btn btn-default" name="submit" type="button"></button>
                </div-->
            </form>
			
			
			<?php
/**
 * Loop Add to Cart
 */
 
global $product; 
if( $product->get_price() === '' && $product->product_type != 'external' ) return;
?>

<?php if ( ! $product->is_in_stock() ) : ?>
		
	<a href="<?php echo get_permalink($product->id); ?>" class="button"><?php echo apply_filters('out_of_stock_add_to_cart_text', __('Read More', 'woocommerce')); ?></a>

<?php else : ?>
	
	<?php 
	
		switch ( $product->product_type ) {
			case "variable" :
				$link 	= get_permalink($product->id);
				$label 	= apply_filters('variable_add_to_cart_text', __('Select options', 'woocommerce'));
			break;
			case "grouped" :
				$link 	= get_permalink($product->id);
				$label 	= apply_filters('grouped_add_to_cart_text', __('View options', 'woocommerce'));
			break;
			case "external" :
				$link 	= get_permalink($product->id);
				$label 	= apply_filters('external_add_to_cart_text', __('Read More', 'woocommerce'));
			break;
			default :
				$link 	= esc_url( $product->add_to_cart_url() );
				$label 	= apply_filters('add_to_cart_text', __('Add to cart', 'woocommerce'));
			break;
		}
	
		//printf('<a href="%s" rel="nofollow" data-product_id="%s" class="button add_to_cart_button product_type_%s">%s</a>', $link, $product->id, $product->product_type, $label);
		
		if ( $product->product_type == 'simple' ) {
			
			?>
			<form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="cart" method="post" enctype='multipart/form-data'>
		
			 	<?php woocommerce_quantity_input(); ?>
		
			 	<button type="submit" class="button alt"><?php echo $label; ?></button>
		
			</form>
			<?php
			
		} else {
			
			printf('<a href="%s" rel="nofollow" data-product_id="%s" class="button add_to_cart_button product_type_%s">%s</a>', $link, $product->id, $product->product_type, $label);
			
		}
	?>

<?php endif; ?>
			
			
			
			
			
			<form class="cart" method="post" enctype='multipart/form-data'>
			

	 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>


	 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />
	<p class="buttons">
		<a href="<?php echo WC()->cart->get_cart_url(); ?>" class="button wc-forward"><?php _e( 'View Cart', 'woocommerce' ); ?></a>
		<a href="<?php echo WC()->cart->get_checkout_url(); ?>" class="button checkout wc-forward"><?php _e( 'Checkout', 'woocommerce' ); ?></a>
	</p>
		
	</form>
	
	
	

        </div>
      </div>
      <div class="clearfix"></div>
    </div>
	
	
 <?php
 // global $product;
 $attachment_ids = $product->get_gallery_attachment_ids();

foreach( $attachment_ids as $attachment_id ) 
{
	?>
	<div class="col-md-2">
  <img src="<?php echo $image_link = wp_get_attachment_url( $attachment_id );?>" class="img-responsive" width="50" height="50">
  </div>
  <?php 
}
?>
	
	
    <div class="row">
      <div class="col-md-12 product-desc">
        		<?php the_content();?>
      </div>
    </div>
  </div>
  <?php endif;?>
</section>
<?php
get_footer();
?>