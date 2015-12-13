<?php
 include('../../../wp-config.php');
	include('../../../wp-load.php');
//include('../includes/class-wc-product-variable.php');
	echo $size=$_POST['Psize'];
	
	if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
	global $product;
	global $woocommerce;
}

 //$size_var = $product->get_variation_attributes();
						
//	print_r($size_var);					
  ?>                  
