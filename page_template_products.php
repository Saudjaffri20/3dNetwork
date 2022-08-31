<?php
/*
Template Name: Page Template Products
*/

get_header(); ?>
<?php $subsStatus =  getSubscriptionStatus() ?>
<link rel='stylesheet prefetch' href='<?php echo get_template_directory_uri(); ?>/gallery/css/ybgpzy.css'>
<style type="text/css">

.nav_main{
	z-index:1!important;
}
.fancybox-arrow{
	display:none!important;
}
.prodTitle{margin-top:30px;}
</style>
	  <?php
        $proCate =  get_field("product_category",get_the_ID());
        $productTerm = $proCate[0];

		if(isset($_SESSION['encryptUrl'])){
			unset($_SESSION['encryptUrl']);
		}
		  $encryptedArr = array();
		  $userLogin = $start_date = $end_date = $download = 0;
		  if ( is_user_logged_in() ) {
			  $userLogin = 1;
			  
				$start_date = get_the_author_meta( 'start_date', get_current_user_id() );
				$end_date 	= get_the_author_meta( 'end_date', get_current_user_id() );
				if(strtotime(date("d-m-Y"))>=strtotime($start_date) && strtotime(date("d-m-Y"))<=strtotime($end_date)){
					$download =1;
				}					  
		  }
	  
	  $show_banner 		= get_field("show_banner",get_the_ID());
	  $banner_image 	= get_field("banner_image",get_the_ID());
      $sub_heading 	    = get_field("banner_sub_heading",get_the_ID());
	  $pageId 			= get_the_ID();
	  $shareImg 		= get_template_directory_uri()."/images/logo.png";
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

             <h2 style="position: absolute;
                top: 56%;
                text-align: center;
                width: 100%;
                color: white;" class="bounceInDown animated"><?= $sub_heading? $sub_heading : "" ?>
             </h2>
        </div>
        <div class="symbolsPage">
            <div class="container">
                <?php
                $prodId = array();
                foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
                    $prodId[$values['data']->id] = $values['data']->id;
                }
                ?>
                <div class="row">
                   <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                     <?php endwhile; ?>
                    <?php
                    $prodId = array();
                    foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
                        $prodId[$values['data']->id] = $values['data']->id;
                    }

                    ?>
                </div>
             </div>
		
		
            <div class="container">
                <div class="row mtb20">
                <?php
                    // And
                    $tax_query2[] = array(
                    'taxonomy'      => 'product_cat',
                    'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                    'terms'         => $productTerm,
                    'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                    );

                    $args = array(
                        'post_type'           => 'product',
                        'post_status'         => 'publish',
                        'ignore_sticky_posts' => 1,
                        'posts_per_page'      =>-1,
                        'orderby'             => 'desc',
                        'order'               => 'desc',
                        'tax_query'           => $tax_query2
                    );
                       $the_query = new WP_Query( $args );

                       if ($the_query->found_posts!=0)
                        {
                        $i=1;
                        while ( $the_query->have_posts() ) : $the_query->the_post();


                        $product = get_product( $post->ID);
                        if($product->featured!="yes"){
                        $title_background_color = get_post_meta($post->ID ,'title_background_color');
                        $product_large_image 	= get_field("product_large_image",$post->ID );
                        $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                        if($product_large_image ==""){
                            $product_large_image  = $feat_image;
                        }
                        ?>
                         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                          <div class="prodTitle" style="background:<?php echo $title_background_color[0];?>"><?php echo get_the_title(); ?></div>
                            <a href="<?php echo  $product_large_image; ?>" data-fancybox="images">
                                <img class="img-reponsive" src="<?php echo  $feat_image; ?>" />
                            </a>

                          <div class="prodPriceSec">

                            <span class="addToCart">
                            <?php

                                if($userLogin && $download && $subsStatus=='active'){
                                     foreach($product->downloads as $k=>$v){
                                        $donwloadLink =  $product->downloads[$k]['file'];
                                     }
                                     $rand 									= 	md5(rand(10,100));
                                     $encryptedArr[$rand]['file_url'] 		=  $donwloadLink;
                                    ?>
                                    <a href="<?= get_the_permalink(509);?>?str=<?=$rand ?>">Download</a>
                                    <?php
                                }

                                else{
                                    if($product->price==""){
                                        foreach($product->downloads as $k=>$v){
                                          $freedownloadLink =  $product->downloads[$k]['file'];
                                       }
                                       ?>
                                       <a href="<?php echo   $freedownloadLink;?>" download>Download</a>
                                       <?php
                                    }
                                    else{

                                        if(!empty($prodId) && $prodId[$post->ID]==$post->ID){
                                        ?>
                                        <a href="<?php echo wc_get_checkout_url() ; ?>">Download</a>
                                        <?php
                                        }
                                        else{
                                        woocommerce_template_loop_add_to_cart(); //ouptput the woocommerce loop add to cart button
                                        }
                                    }
                                }
                            ?>
                            </span>
                              <?php
                                if(!$userLogin || !$download || $subsStatus!='active') {
                                    ?>
                                    <span class="prodPrice">
                                        <?php
                                            if ($product->price == "") {
                                                echo "Free";
                                            } else {
                                                echo $product->get_price_html();
                                            }
                                        ?>
                                    </span>
                                 <?php
                                }
                                 ?>
                          </div>
                        </div>
                        <?php
                        }
                        $i++;
                        endwhile;
                        wp_reset_postdata();
                        wp_reset_query();
                        }
                    ?>
                </div>
              </div>
        </div>
    </div>
		<?php 
		$_SESSION['encryptUrl'] = $encryptedArr;
		?>

<div class="mask1_help"></div>
<div id="popup_help" class="clearfix">
    <div id="bd">
    	<p>Please Wait...</p>
    </div>
</div>


<script src='<?php echo get_template_directory_uri(); ?>/gallery/js/ybgpzy.js'></script>

  
<script type="text/javascript">
jQuery(document).ready(function($){
   $(".add_to_cart_button").click(function(){
	  	$(this).addClass('disabledAnchor');
		$('#popup_help').fadeIn(1000);
		$('.mask1_help').fadeTo('slow', 0.8);
   })

  jQuery(".test").fancybox({
  selector : '[data-fancybox="images"]',
  thumbs   : false,
  hash     : false,
})
});
</script>
    
    
<?php get_footer(); ?>