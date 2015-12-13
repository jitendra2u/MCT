
<footer>
<div class="container">
<div class="row">
<div class="col-md-12"><span class="text-center footleft"><?php echo stripslashes(get_option('mct_copyright'));?></span>
 <a class="footer-pop" data-toggle="modal" data-target="#myModal" href="#">
	<span class="text-center footright">Terms of Uses</span>
</a>
</div>
</div>
</div>
</footer>
<!-- jQuery -->

<!-- =================== Terms of Use Starts ==================-->

<?php get_template_part('terms','use');?>

<!-- =================== Terms of Use Ends ==================-->


<!---========= for the light box ========--->
<script src="<?php bloginfo('template_directory')?>/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php bloginfo('template_directory')?>/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php bloginfo('template_directory')?>/js/classie.js"></script>
<script src="<?php bloginfo('template_directory')?>/js/cbpAnimatedHeader.js">
</script><!-- Contact Form JavaScript -->
<script src="<?php bloginfo('template_directory')?>/js/jqBootstrapValidation.js"></script>
<!--script src="<?php// bloginfo('template_directory')?>/js/contact_me.js"></script><!-- Custom Theme JavaScript -->
<script src="<?php bloginfo('template_directory')?>/js/agency.js"></script>
<?php wp_footer();?>
</body>
</html>
<script>
$(document).ready(function () {
		//alert('Hello');
  
    $("#submit").click(function () {
	//alert('Hello');
	
	var name = $("input#name").val();
        if (name == "") {
		
		alert("Name can not be blank");
            $("input#name").focus();
			
            return false;
        }
		
		var email = $("input#email").val();
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
        if (email == "") {
            alert("Email ID can not be blank");
            $("input#email").focus();
            return false;
        }
		
		
		if(!regex.test(email)){
		$("input#email").focus();
		alert("Please Enter a valid E-mail Address");
		
		return false;
		}
		
	
		var msg = $("textarea#message").val();
        if (msg == "") {
		
		alert("Write how you know about Us.");
            $("textarea#msg").focus();
		        return false;
        }
		
		
        var dataString = 'name=' + name +'&email=' + email + '&msg=' + msg ;
		//alert(dataString);
		
        $.ajax({
            type: "POST",
            url: "<?php bloginfo('template_directory');?>/send-mail.php",
            data: dataString,
            success: function () {
				alert('THANKS!, WE DO OUR BEST TO RESPOND AS QUICKLY AS POSSIBLE.');
				window.location.href = '<?php bloginfo('url');?>';
				$('form#form_one input#fname').val('');
				$('form#form_one input#email').val('');
				$('form#form_one textarea#msg').val('');
						
				}
        });
        return false;

    });
	
	
	$(function(){
		$( "select").change(function(){
			var Psize = $( "select option:selected").val()
			var sizeData = 'Psize=' + Psize;
			
			 $.ajax({
				type: "POST",
				url: "<?php bloginfo('template_directory');?>/ajax_variation_price.php",
				data: sizeData,
				success: function (text) 
					{
				alert(text);
						
					}
				});
		});
		
		
	});
	
});
</script>