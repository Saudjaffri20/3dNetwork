<?php
/*
Template Name: Page Template Gallery
*/

get_header(); ?>
<link rel='stylesheet prefetch' href='<?php echo get_template_directory_uri(); ?>/gallery/css/ybgpzy.css'>
<style type="text/css">
.nav_main{
	z-index:1!important;
}



</style>
	 <?php  
	  $show_banner 		= get_field("show_banner",get_the_ID());
	  $banner_image 	= get_field("banner_image",get_the_ID());
	  $gallery_images 	= get_field("gallery_images",get_the_ID());
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
		<?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
        
        <div class="container">
           <div class="main-slider hover15 column_ss">
           		<?php
                	if(!empty($gallery_images )){
						$i=1;
						echo "<div class='row'>";
						foreach($gallery_images  as $gal){
						?>
						<div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="galBox galHoverBox">
                            	<figure>
                                <a href="<?php echo $gal['images']; ?>" data-fancybox="images">
                                    <img class="img-reponsive" src="<?php echo $gal['images']; ?>" />
                                </a>
                                </figure>
                            </div>
                        </div>
						<?php
						if($i % 4 == 0) {echo '</div><div id='.$i.' class="row">';}
						$i++;
						}
						
						echo "</div>";
					}
				?>
            </div>
    	</div>
    </div>
<script src='<?php echo get_template_directory_uri(); ?>/gallery/js/ybgpzy.js'></script>

  
<script type="text/javascript">
jQuery(document).ready(function(){
  jQuery(".test").fancybox({
  selector : '[data-fancybox="images"]',
  thumbs   : false,
  hash     : false,
});
});
</script>
    
<?php get_footer(); ?>