<?php 
/*------------------------ Custom Menu --------------------------*/
function register_main_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' ),
			'secondary-menu' => __( 'Footer Nav Menu' )
		
		)
	);
}
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );
/*------------------------ Custom Menu --------------------------*/
?>
<?php /*
function theme_name_scripts() {
wp_enqueue_script( 'new_js', "http://code.jquery.com/jquery-2.1.4.min.js", true );

//wp_enqueue_style( 'product_style', get_template_directory_uri() .'/admin/css/products.css', array('css'),'3.0.3' );
}
add_action('init', 'theme_name_scripts' );
/*------------------------ Add post thumbnails---Featured image --------------------------*/
if (function_exists('add_theme_support')) {
	add_theme_support( 'post-thumbnails', array( 'post', 'page','kindwords','product','blog') );
	/*set_post_thumbnail_size( 400, 350 ); // Add it for posts and pages*/
	add_image_size( 'blog_thumb', 322, 208, true ); //(cropped)
	add_image_size( 'blog_single',677,408, true ); //(cropped)
	add_image_size( 'news_thumb', 86, 44, true ); //(cropped)
	add_image_size( 'home_thumb', 233, 82, true ); //(cropped)
	}
/*------------------------ Add post thumbnails---Featured image --------------------------*/
?>
<?php
/*----------------------------- Theme Options -------------------------------------*/
$functions_path = TEMPLATEPATH . '/functions/';
require_once ($functions_path . 'theme-options.php');
require_once ($functions_path . 'custom_functions.php');
require_once ($functions_path . 'image_resizer.php');
//require_once ($functions_path . 'image_upload.php');
/*----------------------------- Theme Options -------------------------------------*/
?>
<?php 
// Side Bar Widget
if ( function_exists('register_sidebar') ){
	register_sidebar(array(
		'name'=>'Subscriber',
		'id' => 'sidebar-1',
		
	));
}
?>
<?php
/*----------Defining For the Custom Editor to Pages-------------*/
add_action('init', 'my_custom_init');
function my_custom_init() {
	add_post_type_support( 'page', 'excerpt' );
}
/*----------Defining For the Custom Editor to Pages-------------*/
?>
<?php
/*----------Defining Custom Posts for Kind Words Section Here-------------*/
add_action( 'init', 'kindwords_custom_post' );
function kindwords_custom_post()
		{
		register_post_type( 'kindwords',
		array(
			'labels' => array(
							'name' => __( 'Kind Words' ),
							'singular_name' => __( 'All Kind Words' ),
							'add_new' => __( 'Add New' ),
							'add_new_item' => __( 'Add New Kind Words  here' ),
							'edit' => __( 'Edit' ),
							'edit_item' => __( 'Edit Kind Words ' ),
							'new_item' => __( 'New Kind Words ' ),
							'view' => __( 'View Kind Words ' ),
							'view_item' => __( 'View Kind Words ' ),
							'search_items' => __( 'Search Kind Words ' ),
							'not_found' => __( 'No Kind Words found ' ),
							'not_found_in_trash' => __( 'No Kind Words  found in Trash' )
							),

			'supports' => array( 'title', 'editor', 'thumbnail','comments'),
			'hierarchical' => true,
			'public' => true,
			'rewrite' => true,
            'has_archive' =>true
			)
		);
	}
/*----------Defining Custom Posts for Kind Words Section Here-------------*/
?>
<?php
/*----------Defining  Kind Words Section Taxonomy Starts Here-------------*/
add_action( 'init', 'kindwords_taxonomies', 0 );
function kindwords_taxonomies() 
{
  $labels = array(
    'name' => _x( 'Kind Words  Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Kind Words Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Kind Words  Category' ),
    'all_items' => __( 'All Kind Words  Categories' ),
    'parent_item' => __( 'Parent Kind Words  Category' ),
    'parent_item_colon' => __( 'Parent Kind Words  Category:' ),
    'edit_item' => __( 'Edit Kind Words  Category' ), 
    'update_item' => __( 'Update Kind Words  Category' ),
    'add_new_item' => __( 'Add New Kind Words  Category' ),
    'new_item_name' => __( 'New Kind Words  Category Name' ),
    'menu_name' => __( 'Kind Words  Categories' ),
  ); 	
  register_taxonomy('kind-words',array('kindwords'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => true,
  ));
 }
/*----------Defining  Kind Words Section Taxonomy Ends Here-------------*/
?>
<?php
/*----------Defining Custom Posts for Blog Posts Section Here-------------*/
add_action( 'init', 'blog_custom_post' );
function blog_custom_post()
		{
		register_post_type( 'blog',
		array(
			'labels' => array(
							'name' => __( 'Blog Posts' ),
							'singular_name' => __( 'All Blog Posts' ),
							'add_new' => __( 'Add Blog Posts' ),
							'add_new_item' => __( 'Add New Blog Posts  here' ),
							'edit' => __( 'Edit' ),
							'edit_item' => __( 'Edit Blog Posts ' ),
							'new_item' => __( 'New Blog Posts ' ),
							'view' => __( 'View Blog Posts ' ),
							'view_item' => __( 'View Blog Posts ' ),
							'search_items' => __( 'Search Blog Posts ' ),
							'not_found' => __( 'No Blog Posts found ' ),
							'not_found_in_trash' => __( 'No Blog Posts  found in Trash' )
							),

			'supports' => array( 'title', 'editor', 'thumbnail','comments'),
			'hierarchical' => true,
			'public' => true,
			'rewrite' => true,
            'has_archive' =>true
			)
		);
	}
/*----------Defining Custom Posts for Blog Posts Section Here-------------*/
?>
<?php
/*----------Defining  Blog Posts Section Taxonomy Starts Here-------------*/
add_action( 'init', 'blog_taxonomies', 0 );
function blog_taxonomies() 
{
  $labels = array(
    'name' => _x( 'Blog Posts  Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Blog Posts Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Blog Posts  Category' ),
    'all_items' => __( 'All Blog Posts  Categories' ),
    'parent_item' => __( 'Parent Blog Posts  Category' ),
    'parent_item_colon' => __( 'Parent Blog Posts  Category:' ),
    'edit_item' => __( 'Edit Blog Posts  Category' ), 
    'update_item' => __( 'Update Blog Posts  Category' ),
    'add_new_item' => __( 'Add New Blog Posts  Category' ),
    'new_item_name' => __( 'New Blog Posts  Category Name' ),
    'menu_name' => __( 'Blog Posts  Categories' ),
  ); 	
  register_taxonomy('blogs',array('blog'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => true,
  ));
 }
/*----------Defining  Blog Posts Section Taxonomy Ends Here-------------*/
?>
<?php
/*----------------------------- Metabox added for Caption Area  ----------------------------*/

/***** Code for the Meta Box by Post Id:******/
add_action('admin_init','my_meta_init');

function my_meta_init()
{
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

	// checks for post/page ID
	if ($post_id == '2')
	{
		add_meta_box( 'wpshed-meta-box2', __( 'Header Content', 'textdomain2' ), 'custom_meta_box_output2', 'page','normal', 'high' );
	}


}

/***** Code for the Meta Box by Post Id:******/


function wpshed_get_custom_field2( $value ) {
	global $post;

    $custom_field2 = get_post_meta( $post->ID, $value, true );
    if ( !empty( $custom_field2 ) )
	    return is_array( $custom_field2 ) ? stripslashes_deep( $custom_field2 ) : stripslashes( wp_kses_decode_entities( $custom_field2 ) );

    return false;
}
// Register the Metabox




// Output the Metabox
function custom_meta_box_output2( $post ) {
	// create a nonce field
	wp_nonce_field( 'header_meta_box', 'wpshed_meta_box_nonce2' ); ?>	
	
	<table>
	<tr>
		<th scope="row"><label for="top_left_url"><?php _e( 'Enter URL for top left Image', 'textdomain2_left' ); ?>:</label></th>
		<td><input type="text" name="top_left_url" id="top_left_url" value="<?php echo wpshed_get_custom_field2( 'top_left_url' ); ?>" size="75" /></td>
	</tr>
	<tr>
		<th scope="row"><label style="width:220px;">Paste your youtube embaded  video Iframe here:</label></th>
		<td><textarea name="video_link" id="video_link" rows="2" cols="75" placeholder="Paste your Iframe here"><?php echo wpshed_get_custom_field2( 'video_link' ); ?></textarea></td>
	</tr>
	<tr>
		<th scope="row"><label for="right_text"><?php _e( 'Enter top right texts here', 'textdomain2_left' ); ?>:</label></th>
		<td><textarea name="right_text" id="right_text" rows="5" cols="75" placeholder="Paste your texts here"><?php echo wpshed_get_custom_field2( 'right_text' ); ?></textarea></td>
	</tr>
</table>
<?php
}
// Save the Metabox values
function custom_meta_box_save2( $post_id ) {
	// Stop the script when doing autosave
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	// Verify the nonce. If insn't there, stop the script
	if( !isset( $_POST['wpshed_meta_box_nonce2'] ) || !wp_verify_nonce( $_POST['wpshed_meta_box_nonce2'], 'header_meta_box' ) ) return;
	// Stop the script if the user does not have edit permissions
	if( !current_user_can( 'edit_post' ) ) return;
    // Save the textfield
	if( isset( $_POST['top_left_url'] ) )
		update_post_meta( $post_id, 'top_left_url', esc_attr( $_POST['top_left_url'] ) );  
	if( isset( $_POST['video_link'] ) )
		update_post_meta( $post_id, 'video_link', esc_attr( $_POST['video_link'] ) );  
	if( isset( $_POST['right_text'] ) )
		update_post_meta( $post_id, 'right_text', esc_attr( $_POST['right_text'] ) );  
 }
add_action( 'save_post', 'custom_meta_box_save2' );
/*----------------------------- Metabox added for Caption Area  ----------------------------*/

/*----------------------------- Metabox added for Who is Medhyne Page  ----------------------------*/




/***** Code for the Meta Box by Post Id:******/
add_action('admin_init','my_meta_init_video');

function my_meta_init_video()
{
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

	// checks for post/page ID
	if ($post_id == '14')
	{
		add_meta_box( 'wpshed-meta-box2-video', __( 'Video Link', 'textdomain2' ), 'custom_meta_box_output3', 'page','normal', 'high' );
	}


}

/***** Code for the Meta Box by Post Id:******/


function wpshed_get_custom_field3( $value ) {
	global $post;

    $custom_field2 = get_post_meta( $post->ID, $value, true );
    if ( !empty( $custom_field2 ) )
	    return is_array( $custom_field2 ) ? stripslashes_deep( $custom_field2 ) : stripslashes( wp_kses_decode_entities( $custom_field2 ) );

    return false;
}
// Register the Metabox




// Output the Metabox
function custom_meta_box_output3( $post ) {
	// create a nonce field
	wp_nonce_field( 'whois_meta_box', 'wpshed_meta_box_nonce3' ); ?>	
	
	<table>
	
	<tr>
		<th scope="row"><label style="width:220px;">Paste your youtube embaded  video Iframe here:</label></th>
		<td><textarea name="whois_video_box" id="whois_video_box" rows="2" cols="75" placeholder="Paste your Iframe here"><?php echo wpshed_get_custom_field3( 'whois_video_box' ); ?></textarea></td>
	</tr>
	<tr>
		<th scope="row"><label for="medyhne_img">Paste Medyhne Image URL:</label></th>
		<td><input type="text" name="medyhne_img" id="medyhne_img" value="<?php echo wpshed_get_custom_field3( 'medyhne_img' ); ?>" size="75" /></td>
	</tr>
	<tr>
		<th scope="row"><label for="heart_img">Paste Heart Image URL:</label></th>
		<td><input type="text" name="heart_img" id="heart_img" value="<?php echo wpshed_get_custom_field3( 'heart_img' ); ?>" size="75" /></td>
	</tr>
	<tr>
		<th scope="row"><label for="booke_img">Paste Booke Image URL:</label></th>
		<td><input type="text" name="booke_img" id="booke_img" value="<?php echo wpshed_get_custom_field3( 'booke_img' ); ?>" size="75" /></td>
	</tr>
	
	
</table>
<?php
}
// Save the Metabox values
function custom_meta_box_save3( $post_id ) {
	// Stop the script when doing autosave
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	// Verify the nonce. If insn't there, stop the script
	if( !isset( $_POST['wpshed_meta_box_nonce3'] ) || !wp_verify_nonce( $_POST['wpshed_meta_box_nonce3'], 'whois_meta_box' ) ) return;
	// Stop the script if the user does not have edit permissions
	if( !current_user_can( 'edit_post' ) ) return;

	if( isset( $_POST['whois_video_box'] ) )
		update_post_meta( $post_id, 'whois_video_box', esc_attr( $_POST['whois_video_box'] ) );  
	if( isset( $_POST['medyhne_img'] ) )
		update_post_meta( $post_id, 'medyhne_img', esc_attr( $_POST['medyhne_img'] ) );  
	if( isset( $_POST['heart_img'] ) )
		update_post_meta( $post_id, 'heart_img', esc_attr( $_POST['heart_img'] ) );  
	if( isset( $_POST['booke_img'] ) )
		update_post_meta( $post_id, 'booke_img', esc_attr( $_POST['booke_img'] ) );  
	
 }
add_action( 'save_post', 'custom_meta_box_save3' );
/*----------------------------- Metabox added for for Who is Medhyne Page  ----------------------------*/
?>
<?php 

/*----------------------------- Dynamic Metabox for Stay and treat Title starts ----------------------------*/
function alldocdetails($cnt, $p = null) {
if ($p === null){
    $a = $b =  '';
}else{ 
	$a = $p['link_title'];
	$b = $p['link_url'];
	
}
return  <<<HTML
<li>
<table>
<tr>
    <th scope="row"><label style="width:220px;">Enter Label for Link $cnt</label></th>
    <td><input type="text" name="docdetails[$cnt][link_title]" id="docdetails[$cnt][link_title]" style="height:30px; width:470px;" value="$a"/></td>
</tr>
<tr>
    <th scope="row"><label style="width:220px;">Enter URL for Link $cnt</label></th>
    <td><input type="text" name="docdetails[$cnt][link_url]" id="docdetails[$cnt][link_url]" style="height:30px; width:470px;" value="$b"/></td>
</tr>
<tr>	
	<input type="button" value="Remove Product Documentation" class="removedoc" />
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
</table>
</li>
HTML
;
}
//add custom field - representer
$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
// check for a template type
//if ($template_file == 'template-air-earth-body-type.php') {


function my_meta_init_favlinks()
{
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

	// checks for post/page ID
	if ($post_id == '14')
	{
		 add_meta_box("docdetails", "Favourite Links","docdetails", "page", "normal", "low");
	}


}
add_action("add_meta_boxes", "my_meta_init_favlinks");

/*
function show_docdetails(){
  add_meta_box("docdetails", "Product Documentation","docdetails", "page", "normal", "low");
  
}
*/
function docdetails(){
global $post;

$data = get_post_meta($post->ID,"docdetails",true);

echo '<div>';
echo '<ul id="docdetails">';
$c =0;
if (count($data) > 0){
	foreach((array)$data as $p ){
		if ( isset($p['link_title'])){
			echo alldocdetails($c,$p);
			$c = $c +1;
		}
	}
}
echo '</ul>';
?>
<span id="heredoc"></span>
<span class="docdetails"><?php echo __('<input type="button" value="Add Product Documentation" />'); ?></span>

<script>
	var $ = jQuery.noConflict();
		$(document).ready(function() {
		var count = <?php echo $c; ?>;
		$(".docdetails").click(function() {
			count = count + 1;
		   $('#heredoc').append('<? echo implode('',explode("\n",alldocdetails('count'))); ?>'.replace(/count/g, count));
			return false;
		});
		$(".removedoc").click(function() {
			count = count - 1;
			$(this).parent().remove();
		});
	});
</script>
<style>#docdetails {list-style: none;}</style>
<?php
	echo '</div>';
}

//Save product price
add_action('save_post', 'save_docdetails');

function save_docdetails($post_id){ 
global $post;

    // to prevent metadata or custom fields from disappearing... 
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return $post_id; 
    // OK, we're authenticated: we need to find and save the data
    if (isset($_POST['docdetails'])){
        $data1 = $_POST['docdetails'];
        update_post_meta($post_id,'docdetails',$data1);
    }else{
        delete_post_meta($post_id,'docdetails');
    }
} 
/*----------------------------- Dynamic Metabox for docs in Stay Ends ----------------------------*/
?>
<?php
/***** Code for the Meta Box by for Author Details******/


function my_meta_init1()
{

		add_meta_box( 'wpshed-meta-box2', __( 'Author Details', 'textdomain2' ), 'custom_meta_box_output4', 'kindwords','normal', 'high' );

}
add_action('admin_init','my_meta_init1');
/***** Code for the Meta Box by Post Id:******/


function wpshed_get_custom_field4( $value ) {
	global $post;

    $custom_field4 = get_post_meta( $post->ID, $value, true );
    if ( !empty( $custom_field4 ) )
	    return is_array( $custom_field4 ) ? stripslashes_deep( $custom_field4 ) : stripslashes( wp_kses_decode_entities( $custom_field4 ) );

    return false;
}
// Register the Metabox




// Output the Metabox
function custom_meta_box_output4( $post ) {
	// create a nonce field
	wp_nonce_field( 'kindwords_meta_box', 'wpshed_meta_box_nonce4' ); ?>	
	
	<table>
	<tr>
		<th scope="row"><label for="author_name"><?php _e( 'Enter Author Name', 'textdomain2_left' ); ?>:</label></th>
		<td><input type="text" name="author_name" id="author_name" value="<?php echo wpshed_get_custom_field4( 'author_name' ); ?>" size="75" /></td>
	</tr>
	
</table>
<?php
}
// Save the Metabox values
function custom_meta_box_save4( $post_id ) {
	// Stop the script when doing autosave
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	// Verify the nonce. If insn't there, stop the script
	if( !isset( $_POST['wpshed_meta_box_nonce4'] ) || !wp_verify_nonce( $_POST['wpshed_meta_box_nonce4'], 'kindwords_meta_box' ) ) return;
	// Stop the script if the user does not have edit permissions
	if( !current_user_can( 'edit_post' ) ) return;
    // Save the textfield
	if( isset( $_POST['author_name'] ) )
		update_post_meta( $post_id, 'author_name', esc_attr( $_POST['author_name'] ) );  
	
 }
add_action( 'save_post', 'custom_meta_box_save4' );
/***** Code for the Meta Box by for Author Details******/
?>
<?php
/***** Code for the Meta Box by for Author Details******/


function my_meta_init5()
{

		add_meta_box( 'wpshed-meta-box2', __( 'Video Section', 'textdomain2' ), 'custom_meta_box_output5', 'blog','normal', 'high' );

}
add_action('admin_init','my_meta_init5');
/***** Code for the Meta Box by Post Id:******/


function wpshed_get_custom_field5( $value ) {
	global $post;

    $blog_video = get_post_meta( $post->ID, $value, true );
    if ( !empty( $blog_video ) )
	    return is_array( $blog_video ) ? stripslashes_deep( $blog_video ) : stripslashes( wp_kses_decode_entities( $blog_video ) );

    return false;
}
// Register the Metabox




// Output the Metabox
function custom_meta_box_output5( $post ) {
	// create a nonce field
	wp_nonce_field( 'blogvideo_meta_box', 'wpshed_meta_box_nonce5' ); ?>	
	
	<table>
	<tr>
		<th scope="row"><label for="blog_video"><?php _e( 'Enter embadded URL here', 'textdomain2_left' ); ?>:</label></th>
		<td><input type="text" name="blog_video" id="blog_video" value="<?php echo wpshed_get_custom_field5( 'blog_video' ); ?>" size="75" /></td>
	</tr>
	
</table>
<?php
}
// Save the Metabox values
function custom_meta_box_save5( $post_id ) {
	// Stop the script when doing autosave
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	// Verify the nonce. If insn't there, stop the script
	if( !isset( $_POST['wpshed_meta_box_nonce5'] ) || !wp_verify_nonce( $_POST['wpshed_meta_box_nonce5'], 'blogvideo_meta_box' ) ) return;
	// Stop the script if the user does not have edit permissions
	if( !current_user_can( 'edit_post' ) ) return;
    // Save the textfield
	if( isset( $_POST['blog_video'] ) )
		update_post_meta( $post_id, 'blog_video', esc_attr( $_POST['blog_video'] ) );  
	
 }
add_action( 'save_post', 'custom_meta_box_save5' );
/***** Code for the Meta Box by for Blog Video ******/
?>
