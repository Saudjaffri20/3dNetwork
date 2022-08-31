<?php
/*
Template Name: Page Template Woocomerece
*/
get_header(); ?>
	  <?php  
	  $show_banner 		= get_field("show_banner",get_the_ID());
	  $banner_image 	= get_field("banner_image",get_the_ID());
	  ?>
	<div class="mainBox">
    	<?php 
			$imgUrl  = get_template_directory_uri()."/images/banner1.jpg";
			if(($show_banner && $show_banner=='Yes') && $banner_image){
				$imgUrl  = $banner_image ;
			}
		?>
    	<div class="bannerSec" >
            <img class="img-reponsive" src="<?php echo $imgUrl ;?>" />
             <h1 class="bounceInDown animated"><?php echo get_the_title(); ?></h1>
        </div>
        
        <div class="container">
        	<div class="row">
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="inner_page woopage">
                    
                    <div class="woocommerce-message-s">
                    <?php 
					if(!is_cart()){
					?>
					 <span class="removeCart"><a href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>">Remove Cart</a></span>
					<?php
					}
					?>
                   
                    <span class="contShop">
                        <a class="button wc-forward" href="<?php echo get_the_permalink(307);?>">Continue shopping</a>
                    </span>
                    </div>
                    
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
if (is_cart() || is_checkout()) {
?>
<style type="text/css">
.woocommerce-message{
display:none;
}
.return-to-shop{
display:none;
}

</style>
<?php

}
?> 

    
<?php get_footer(); ?>