<?php
/**
 * Template Name: Page Woo info 
 */

get_header(); ?>
<style type="text/css">
.woocommerce-info{
display:block!Important;
}
</style>
	  <?php  
	  $show_banner 		= get_field("show_banner",get_the_ID());
	  $banner_image 	= get_field("banner_image",get_the_ID());
	  ?>
	<div class="mainBox">
    	<?php 
			$imgUrl  = get_template_directory_uri()."/images/banner.jpg";
			if(($show_banner && $show_banner=='Yes') && $banner_image){
				$imgUrl  = $banner_image ;
			}
		?>
    	<div class="bannerSec" >
            <img class="img-reponsive" src="<?php echo $imgUrl ;?>" />
             <h1 class="bounceInDown animated"><?php echo get_the_title(); ?></h1>
        </div>
        <div class="container">
	        <div class="inner_page">
			<?php while ( have_posts() ) : the_post(); ?>
	            <?php the_content(); ?>
	        <?php endwhile; ?>
	        </div>
        </div>
    </div>
<?php get_footer(); ?>