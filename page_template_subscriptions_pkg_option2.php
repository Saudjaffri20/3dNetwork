<?php
/*
Template Name: SubsCription Packages Option 2
*/

get_header(); ?>

<?php $subsStatus =  getSubscriptionStatus() ?>
<?php

$registrationLink 	= get_the_permalink(505);

$downloadLink 		= get_the_permalink(509);

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

/*$show_banner 		= get_field("show_banner",get_the_ID());
$banner_image 	= get_field("banner_image",get_the_ID());*/
$pageId           = get_the_ID();
$shareImg         = get_template_directory_uri()."/images/logo.png";
?>
    <div class="mainBox">
        <?php
        $imgUrl  = get_template_directory_uri()."/images/banner.jpg";
        if(($show_banner && $show_banner=='Yes') && $banner_image){
            $imgUrl  = $banner_image ;
        }
        ?>

        <?php
        if(!$download || $subsStatus!='active'){

            $prodId = array();
            foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
                $prodId[$values['data']->id] = $values['data']->id;
            }
            ?>

            <section class="subscription-section subscription-banner">
                <div class="subscription-container">
                    <div class="content">
                        <?php
                            if($download){
                                ?>
                                <div class="alert alert-info"  style="color:white;">
                                    <strong>Info! </strong>
                                    Your payment is under processing OR your subscription plan is not active yet.
                                </div>
                                <?php
                            }
                        ?>
                        <h1 class="">Choose your plan</h1>
                        <p class="">Subscribe to one of our plans and download unlimited symbols and templates.The subscription plan is recommended for frequent Network Designers and allows the users to download updates and new symbols and templates with no additional cost.</p>
                        <p class="">Please click on the <a href="#_" class="">policy</a> to review our subscription policy before subscribing.</p>
                    </div>
                    <div class="subscription-container-inner">
                    <?php
                        // And

                        $tax_query2[] = array(
                            'taxonomy'      => 'product_cat',
                            'field'         => 'term_id', //This is optional, as it defaults to 'term_id'
                            'terms'         => 17,
                            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                        );

                        $args = array(
                            'post_type'           => 'product',
                            'post_status'         => 'publish',
                            'ignore_sticky_posts' => 1,
                            'posts_per_page'      =>-1,
                            'orderby'             => 'date',
                            'order'               => 'ASC',
                            'tax_query'           => $tax_query2
                        );
                        $the_query = new WP_Query( $args );

                        if ($the_query->found_posts!=0)
                        {
                            $i=1;
                            while ( $the_query->have_posts() ) : $the_query->the_post();

                                $cls="";
                                if($i==1){
                                    $cls ='fadeInLeft orangeClr';
                                }
                                if($i==2){
                                    $cls ='fadeInDown blueClr';
                                }
                                if($i==3){
                                    $cls ='fadeInRight greenClr';
                                }


                                $product = get_product( $post->ID);

                                $title_background_color = get_post_meta($post->ID ,'title_background_color');
                                $product_large_image 	= get_field("product_large_image",$post->ID );
                                $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                if($product_large_image ==""){
                                    $product_large_image  = $feat_image;
                                }
                                $str 	= get_field("custom_price",$post->ID );
                                $price = explode(".",$str);
                                ?>

                                <div class="subscription-card <?= $cls ?> animated">
                                    <div class="subsBox">
                                        <h6><?php echo get_the_title(); ?></h6>
                                        <h2>$<?php echo $product->price; ?></h2>
                                        <?php echo get_the_content();?>
                                        <div class='addtocartBtn'>
                                                <?php

                                                if($userLogin){
                                                    if(!empty($prodId) && $prodId[$post->ID]==$post->ID){
                                                        ?>
                                                        <a href="<?php echo wc_get_checkout_url() ; ?>">Subscribe Now</a>
                                                        <?php
                                                    }
                                                    else{
                                                        woocommerce_template_loop_add_to_cart(); //ouptput the woocommerce loop add to cart button
                                                    }
                                                }
                                                else{
                                                    ?>
                                                    <a href="<?php echo $registrationLink ; ?>">Subscribe Now</a>
                                                    <?php
                                                }
                                                ?>
                                            </div>

                                    </div>
                                </div>
                                <?php
                                $i++;
                            endwhile;
                            wp_reset_postdata();
                            wp_reset_query();
                        }
                        ?>
                    </div>
                </div>
            </section>

            <section class="faq-section">
                <div class="custom-container">
                    <h2 class="text-center">Frequently Asked Questions</h2>
                    <ul>
                        <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $post_per_page = -1;
                            $the_query = new WP_Query( array('posts_per_page' => $post_per_page, 'post_type' => 'faq', 'paged' => $paged,'order'=>'DESC',  )  );
                            if ($the_query->found_posts!=0)
                            {
                                $f=1;
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    ?>
                                    <li>
                                        <details>
                                            <summary><?php echo get_the_title();?></summary>
                                            <div>
                                                <p><?php echo get_the_content(); ?></p>
                                            </div>
                                        </details>
                                    </li>
                                    <?php
                                    $f++;
                                endwhile;
                                wp_reset_postdata();
                                wp_reset_query();
                            }
                        ?>
                    </ul>
                </div>
            </section>

            <?php
        }
        else{
            ?>
            <section class="subscription-section subscription-banner subscription-banner-after">
                <div class="subscription-container">
                    <div class="">
                        <?php
                            $prodId = array();
                            foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
                                $prodId[$values['data']->id] = $values['data']->id;
                            }
                        ?>
                    </div>
                    <div class="content">
                        <h1>Your Current Plan is <?= get_the_author_meta( 'subscription_plan', get_current_user_id() );?></h1>
                        <p>Want to upgrade your plan</p>
                        <p class='mt-1'>You just need to pay the amount difference in order to updgrade the plan.</p>
                        <a href="#_" class='upgrade-btn'>Upgrade Now</a>
                    </div>
                    <div class="row row-no-gutters images-cards-main">
                        <?php
                        $network_pages 	= get_field("network_pages",get_the_ID());
                        if (!empty($network_pages)) {
                            $i = 1;
                            foreach ($network_pages as $networkPage){
                                ?>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-12">
                                    <div class="image-card">
                                        <a href="<?php echo $networkPage['page_url']; ?>">
                                            <img class="img-reponsive" src="<?php echo $networkPage['network_page_image']; ?>"/>
                                            <div class="prodTitle">
                                                <?php echo $networkPage['page_name']; ?>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                                <?php
                                $i++;
                            }

                        }
                        ?>
                    </div>
                </div>
            </div>


            <?php
        }
        ?>
    </div>

    <a class="loginBtn" href="<?php echo wp_logout_url( get_permalink(6) ); ?>">Logout</a>



<div class="mask1_help"></div>
<div id="popup_help" class="clearfix">
    <div id="bd">
        <p>Please Wait...</p>
    </div>
</div>





    <script type="text/javascript">
        jQuery(document).ready(function($){
            $(".add_to_cart_button").click(function(){
                $(this).addClass('disabledAnchor');
                $('#popup_help').fadeIn(1000);
                $('.mask1_help').fadeTo('slow', 0.8);
            })

        });
    </script>
<?php get_footer(); ?>