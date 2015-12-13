<?php
// Theme Options
// Theme Name : My Creative Therapies Theme

$themename = "My Creative Therapies Options";
$shortname = "mct";
$version = "1.0";

// Create theme options
global $options;
$options = array (


	array( "name" => "Header Options","type" => "section"),
	  array( "type" => "open"),
		 array( "name" => "Main Site Logo",
		 "desc" => "Upload your logo here.",
		 "id" => $shortname."_logo_url",
		 "type" => "upload",
		 "std" => ""), 
		 array( "name" => "Product Page Logo",
		 "desc" => "Upload your logo here for Product Page.",
		 "id" => $shortname."_logo_url2",
		 "type" => "upload",
		 "std" => ""), 
	array( "type" => "close"),
	array( "name" => "Social Share Options","type" => "section"),
		array( "name" => "Facebbok Page Link",
		 "desc" => "Enter Facebook page link here.",
		 "id" => $shortname."_facebook",
		 "type" => "text",
		 "std" => ""),
		array( "name" => "Google Plus Link",
		 "desc" => "Enter Your link here.",
		 "id" => $shortname."_googlep",
		 "type" => "text",
		 "std" => ""),
		 array( "name" => "Twitter Page Link",
		 "desc" => "Enter Twitter page link here.",
		 "id" => $shortname."_twitter",
		 "type" => "text",
		 "std" => ""),
		 array( "name" => "Youtube Link",
		 "desc" => "Enter Your Youtube link here.",
		 "id" => $shortname."_youtube",
		 "type" => "text",
		 "std" => ""),
		 array( "name" => "RSS Feed Link",
		 "desc" => "Enter Your RSS Feed Link here.",
		 "id" => $shortname."_rssfeed",
		 "type" => "text",
		 "std" => ""),		 
		 array( "name" => "Linkedin Profile Link",
		 "desc" => "Enter Your Linkedin link here.",
		 "id" => $shortname."_linkedin",
		 "type" => "text",
		 "std" => ""),
		 array( "name" => "Skype Profile Link",
		 "desc" => "Enter Your Skype Profile Link here.",
		 "id" => $shortname."_skype",
		 "type" => "text",
		 "std" => ""),		 
		 array( "name" => "SoundCloud Profile Link",
		 "desc" => "Enter Your SoundCloud link here.",
		 "id" => $shortname."_soundcloud",
		 "type" => "text",
		 "std" => ""),
		array( "type" => "close"),
		
	array( "name" => "Mission Statement Options","type" => "section"),
		array( "type" => "open"),
		 array( "name" => "Mission Statement Image",
		 "desc" => "Upload your Mission Statement Image here.",
		 "id" => $shortname."_mission_img",
		 "type" => "upload",
		 "std" => ""),
		 array( "name" => "Mission Statement Texts",
		 "desc" => "Paste your Mission Statement Texts here.",
		 "id" => $shortname."_mission_texts",
		 "type" => "textarea",
		 "std" => ""),  
		array( "type" => "close"),
		
	array( "name" => "Contact Us Options","type" => "section"),
		array( "type" => "open"),
		 array( "name" => "Contact Us terms texts",
		 "desc" => "Paste your Texts here.",
		 "id" => $shortname."_contact_terms",
		 "type" => "textarea",
		 "std" => ""),
		array( "name" => "Contact Us Email",
		 "desc" => "Paste your Email to get Query here.",
		 "id" => $shortname."_contact_email",
		 "type" => "text",
		 "std" => ""),
		array( "type" => "close"),

	array( "name" => "Footer Options","type" => "section"),
		array( "type" => "open"),
		 array( "name" => "Copyright Texts",
		 "desc" => "Paste your Copyright Texts here.",
		 "id" => $shortname."_copyright",
		 "type" => "textarea",
		 "std" => ""),  
		array( "type" => "close"),
		

);
function p2h_add_admin() {

    global $themename, $shortname, $options;

	if ( isset ( $_GET['page'] ) && ( $_GET['page'] == basename(__FILE__) ) ) {

		if ( isset ($_REQUEST['action']) && ( 'save' == $_REQUEST['action'] ) ){

			foreach ( $options as $value ) {
				if ( array_key_exists('id', $value) ) {
				
			if ( isset( $_REQUEST[ $value['id'] ] ) ) {
						update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
					}
					else {
						delete_option( $value['id'] );
					}
					
					
					if(!empty( $_FILES['attachement_'.$value['id']]['name'])){ 
						$src = $_FILES['attachement_'.$value['id']]['tmp_name'];
						$newname = date('Ymdhis')."_".$_FILES['attachement_'.$value['id']]['name'];
						$dest_path = get_image_phy_destination_path_user().$newname;
						//$user_photo = image_resize_custom($src,$dest_path,1360,684);
						move_uploaded_file($src,$dest_path);
						//$photo_path = get_image_rel_destination_path_user().$user_photo['file'];
						$impath = get_image_rel_destination_path_user().$newname;
						update_option( $value['id'] , $impath );
						}
					
					
				}
			}
		header("Location: admin.php?page=".basename(__FILE__)."&saved=true");
		}
		else if ( isset ($_REQUEST['action']) && ( 'reset' == $_REQUEST['action'] ) ) {
			foreach ($options as $value) {
				if ( array_key_exists('id', $value) ) {
					delete_option( $value['id'] );
				}
			}
		header("Location: admin.php?page=".basename(__FILE__)."&reset=true");
		}
	}

add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'p2h_admin');
add_submenu_page(basename(__FILE__), $themename . ' Options', 'Theme Options', 'administrator',  basename(__FILE__),'p2h_admin'); // Default
}

function p2h_add_init() {

$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("p2hCss", $file_dir."/functions/theme-options.css", false, "1.0", "all");
wp_enqueue_script("p2hScript", $file_dir."/functions/theme-options.js", false, "1.0");

}

function p2h_admin() {

    global $themename, $shortname, $version, $options;
	$i=0;

	if ( isset ($_REQUEST['saved']) && ($_REQUEST['saved'] ) )echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	if ( isset ($_REQUEST['reset']) && ($_REQUEST['reset'] ) ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>

<div class="wrap ">
<div class="options_wrap">
<h2 class="settings-title"><?php echo $themename; ?> Settings</h2>
<form method="post" enctype="multipart/form-data">

<?php foreach ($options as $value) {
switch ( $value['type'] ) {
case "section":
?>
	<div class="section_wrap">
	<h3 class="section_title"><?php echo $value['name']; ?></h3>
	<div class="section_body">

<?php
break;
case "upload":
?>
<div class="options_input options_text">
<div class="options_desc"><?php echo $value['desc']; ?></div>
<span class="labels"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></span>
<input type="file" name="<?php echo 'attachement_'.$value['id'] ?>" class="upload_input"></input>
<span class="submit"><input name="save" type="submit" value="Upload" class="button upload_save" /></span>
<div class="clear"></div>
<input class="upload-input-text" name="<?php echo $value['id'] ?>" value="<?php echo get_option($value['id']) ?>" style="width:490px !important;"/>
<div class="clear"></div>
<?php if(get_option($value['id']) !=''){ ?>
<img src="<?php echo get_option($value['id']) ?>" alt="" width="500" height="200" />
<?php } ?>
<div class="clear"></div>
</div>
<?php
break;
case 'text':
?>

	<div class="options_input options_text">
		<div class="options_desc"><?php echo $value['desc']; ?></div>
		<span class="labels"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></span>
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
	</div>

<?php
break;
case 'textarea':
?>
	<div class="options_input options_textarea">
		<div class="options_desc"><?php echo $value['desc']; ?></div>
		<span class="labels"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></span>
		<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
	</div>

<?php
break;
case 'select':
?>
	<div class="options_input options_select">
		<div class="options_desc"><?php echo $value['desc']; ?></div>
		<span class="labels"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></span>
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		<?php foreach ($value['options'] as $option) { ?>
				<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
		</select>
	</div>

<?php
break;
case "radio":
?>
	<div class="options_input options_select">
		<div class="options_desc"><?php echo $value['desc']; ?></div>
		<span class="labels"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></span>
		  <?php foreach ($value['options'] as $key=>$option) {
			$radio_setting = get_option($value['id']);
			if($radio_setting != ''){
				if ($key == get_option($value['id']) ) {
					$checked = "checked";
					} else {
						$checked = "";
					}
			}else{
				if($key == $value['std']){
					$checked = "checked";
				}else{
					$checked = "";
				}
			}?>
			<input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />
			<?php } ?>
	</div>

<?php
break;
case "checkbox":
?>
	<div class="options_input options_checkbox">
		<div class="options_desc"><?php echo $value['desc']; ?></div>
		<?php if(get_option($value['id'])){ $checked = "checked"; }else{ $checked = "";} ?>
		<input type="checkbox" name="<?php echo $value['id']; ?>2" id="<?php echo $value['id']; ?>2" value="true" <?php echo $checked; ?> />
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	 </div>

<?php
break;
case "close":
$i++;
?>
<span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save Changes" /></span>
</div><!--#section_body-->
</div><!--#section_wrap-->

<?php break;
}
}
?>

<input type="hidden" name="action" value="save" />
<span class="submit">
<input name="save" type="submit" value="Save All Changes" />
</span>
</form>

<!--<form method="post">
<span class="submit">
<input name="reset" type="submit" value="Reset All Options" />
<input type="hidden" name="action" value="reset" />
</span>
</form>-->

</div><!--#options-wrap-->

</div><!--#wrap-->
<?php
}
add_action('admin_init', 'p2h_add_init');
add_action('admin_menu' , 'p2h_add_admin');
?>
