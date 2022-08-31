<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div class="mainBox">
    	<?php $imgUrl  = get_template_directory_uri()."/images/banner.jpg";?>
    	<div class="bannerSec" >
            <img class="img-reponsive" src="<?php echo $imgUrl ;?>" />
            <h1>Error 404 : page not found</h1>
        </div>
        <div class="container">
        		  <h1><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'twentythirteen' ); ?></h1>
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>
        </div>
    </div>

	
<?php get_footer(); ?>