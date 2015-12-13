<?php
/****
Template Name: Home
****/
?>

<?php 
get_header();
?>
<!-- =================== Top Header Section Starts ==================-->

<?php get_template_part('top','header');?>

<!-- =================== Top Header Section Ends ==================-->

<!-- =================== Inspire Product Section Starts ==================-->

<?php get_template_part('inspire','product');?>

<!-- =================== Inspire Product Section Ends ==================-->

<!--=================== Our Prints Section Starts==============-->
<?php get_template_part('our','prints');?>
<!--=================== Our Prints Section Ends==============-->


<!-- =================== Who is Medyhne Section Starts ==================-->

<?php get_template_part('whoismedyhne');?>

<!-- =================== Who is Medyhne Section Ends ==================-->

<!-- =================== Kind Words Starts ==================-->

<?php get_template_part('kindwords');?>

<!-- =================== Kind Words Ends ==================-->

<!-- =================== Blog Section Starts ==================-->

<?php get_template_part('blog','section');?>

<!-- =================== Blog Section Ends ==================-->

<!-- =================== Kind Words Starts==================-->

<?php get_template_part('contact','section');?>

<!-- =================== Kind Words Ends ==================-->

<!-- =================== Terms of Use Starts ==================-->

<?php get_template_part('terms','use');?>

<!-- =================== Terms of Use Ends ==================-->


<?php 
get_footer();
?>