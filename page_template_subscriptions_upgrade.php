<?php
/*
Template Name: Subscription Packages Upgrade
*/

get_header(); ?>
<?php
$redirect       = false;
$subsPageLink 	= get_the_permalink(513);

if (!is_user_logged_in() ) {
    $redirect           = true;

}else{
    $currentPlan    =  strtolower(get_the_author_meta( 'subscription_plan', get_current_user_id() ));
    $planArr        =  array(
        '1 month'   => array(518,520),
        '6 months'  => array(520),
    );

    if(isset($planArr[$currentPlan])){
        $currentPlanArr = $planArr[$currentPlan];
    }else{
        $redirect           = true;
    }

}
if($redirect){
     wp_redirect($subsPageLink);
     exit();
}

?>

    <div class="mainBox">
        <?php
        if(!empty($currentPlanArr)){?>
            <div class="subsBg">

                <div class="container">
                    <div class="row mtb20">
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
                            'tax_query'           => $tax_query2,
                            'post__in'            => $currentPlanArr

                        );
                        $the_query = new WP_Query( $args );

                        if ($the_query->found_posts!=0)
                        {
                            $i=1;
                            while ( $the_query->have_posts() ) : $the_query->the_post();
                                $product = wc_get_product( $post->ID);
                                ?>

                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                    <div class="subsBox  animated">
                                        <h3><?php echo get_the_title(); ?></h3>
                                        <h2>$<?php echo $product->price; ?></h2>
                                        <p><?php echo get_the_content();?></p>
                                        <p>
                                        <span class="addtocartBtn">

                                            <?php
                                                $prodId = array();
                                                foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
                                                    $prodId[$values['data']->id] = $values['data']->id;
                                                }

                                                if(!empty($prodId) && $prodId[$post->ID]==$post->ID){
                                                    ?>
                                                    <a href="<?php echo wc_get_checkout_url() ; ?>">Subscribe Now</a>
                                                    <?php
                                                }
                                                else{
                                                    woocommerce_template_loop_add_to_cart(); //ouptput the woocommerce loop add to cart button
                                                }

                                            ?>
                                        </span>
                                        </p>
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
            </div>
            <?php
        }
        ?>
    </div>

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