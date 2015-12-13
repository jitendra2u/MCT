<!-- ======================== whoMedhyne Section =======================-->

<section id="whoMedhyne">
<div class="container">
<div class="row">
<div class="col-md-12">
<?php 
$pageid=14;
$page=get_page($pageid);
?>
<h3 class="text-center"><?php echo $page->post_title;?></h3>

<div class="video-wrap">
	<iframe width="560" height="315" src="<?php echo $whois_video_box = get_post_meta( 14, 'whois_video_box', true );?>" frameborder="0" allowfullscreen></iframe>
</div>

<div class="who-content text-left">
<p>
<?php
//print_r($page);
echo $page->post_content;
?>
</p>


<img alt="" class="medhyne-img" height="359" src="<?php echo $medyhne_img = get_post_meta( 14, 'medyhne_img', true );?>" width="226" /> 
<img alt="" class="heart-img" height="240" src="<?php echo $heart_img = get_post_meta( 14, 'heart_img', true );?>" width="284" />
<img alt="" class="flower-img" height="569" src="<?php echo $booke_img = get_post_meta( 14, 'booke_img', true );?>" width="756" />
 </div>

<div class="favlink text-left">
	<p>My Fave Links</p>

	<div class="linkslists">
			<?php 
					$data = get_post_meta(14,"docdetails",true);
					$a=(array)$data;
					//print_r($a);
					if($a[0]!=''){
						$data = get_post_meta(14,"docdetails",true);
						//print_r($data);
						if (count($data) > 0){
						foreach((array)$data as $p ){
						if (isset($p['link_url']) || isset($p['link_title']))
						{
			?>
			
		<p><a href="<?php echo $p['link_url'];?>" target="_blank"><?php echo $p['link_title'];?></a></p>
		
		<?php 
						}
						}
						}
					}?>
	</div>
</div>
</div>

</div>
</div>
</section>