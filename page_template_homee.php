<?php

    /* Template Name: Page Template Home */
    get_header(); 
?>

    <div class="slider-wrapper home-banner-slider theme-default">
        <div id="slider" class="nivoSlider">
            <div class="overlay"></div>
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $post_per_page = -1;
            $the_query = new WP_Query( array('posts_per_page' => $post_per_page, 'post_type' => 'slider', 'paged' => $paged,'order'=>'DESC',  )  );
            if ($the_query->found_posts!=0)
            {
                $i=1;
                while ( $the_query->have_posts() ) : $the_query->the_post();
                    $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                    ?>
                    <img src="<?php echo $feat_image; ?>" title="#htmlcaption<?php echo $i; ?>"/>
                    <?php
                    $i++;
                endwhile;
                wp_reset_postdata();
                wp_reset_query();
            }?>
        </div>
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $post_per_page = -1;
        $the_query = new WP_Query( array('posts_per_page' => $post_per_page, 'post_type' => 'slider', 'paged' => $paged,'order'=>'DESC',  )  );
        if ($the_query->found_posts!=0)
        {
            $i=1;
            while ( $the_query->have_posts() ) : $the_query->the_post();
                $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                ?>
                <div id="htmlcaption<?php echo $i; ?>" class="nivo-html-caption">
                    <?php //echo get_the_content($post->ID);
                    $first_heading = get_post_meta($post->ID ,'first_heading');
                    $second_heading = get_post_meta($post->ID ,'second_heading');
                    $heading_border_width = get_post_meta($post->ID ,'heading_border_width');
                    $button_text = get_post_meta($post->ID ,'button_text');
                    $button_link = get_post_meta($post->ID ,'button_link');
                    $hr = "<hr/>";
                    if($heading_border_width[0]){
                        $hr = '<hr style="width:'.$heading_border_width[0].'%" />';
                    }
                    ?>


                    <?php ?>

                    <?php echo ($first_heading[0]) ? "<div class='headingOneBox'><h1> ".$first_heading[0]."</h1></div>" : ""; ?>
                    <div class="seprator">
                        <?php echo ($first_heading[0]) ? $hr : ""; ?>
                    </div>
                    <?php echo ($second_heading[0]) ? "<div class='headingTwoBox'><h2> ".$second_heading[0]."</h2></div>" : ""; ?>
                    <?php
                    if($button_link[0] ){
                        ?>
                        <div class="btnLink"><a href="<?php echo ($button_link[0]) ? $button_link[0]: "#"; ?>">
                                <?php echo ($button_text[0]) ? $button_text[0]: "Get Started"; ?>
                            </a></div>
                        <?php
                    }
                    ?>


                </div>
                <?php
                $i++;
            endwhile;
            wp_reset_postdata();
            wp_reset_query();
        }?>
    </div>
    <div class="cont_sec">
        <?php if ( have_posts() ) : ?>
            <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content();?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <section class="featured_product">
        <h2>Featured Products</h2>
        <h4>Explore our most selling products world wide.</h4>
        <?php 
        $gallery_images 	= get_field("gallery_images",get_the_ID());
        ?>
        <div class="slider">
        <!-- <div class="showcase-carousel owl-theme"> -->
            <?php
                if(!empty($gallery_images )){
                    $i=1;
                    foreach($gallery_images  as $gal){
                        // print_r($gal);exit();
                    ?>
                    <div class="item"> 
                        <img src="<?php echo $gal['images']; ?>" />
                    </div>
                    <?php
                    
                    }
                }
            ?>
            <div>
                <img src="https://images.unsplash.com/photo-1519699047748-de8e457a634e?ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVvcGxlfGVufDB8MnwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60" />
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1529068755536-a5ade0dcb4e8?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8MnwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60" />
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1499887142886-791eca5918cd?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8cGVvcGxlfGVufDB8MnwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60" />
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1484186304838-0bf1a8cff81c?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8cGVvcGxlfGVufDB8MnwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60" />
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1484611941511-3628849e90f7?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8cGVvcGxlfGVufDB8MnwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60" />
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1485206412256-701ccc5b93ca?ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8cGVvcGxlfGVufDB8MnwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=60" />
            </div>
        </div>
        <div class="custom_btn">
            <a href="<?php echo get_the_permalink(92);?>" class="expBtn">Explore</a>
        </div>
    </section>
    <section class="subscription-section">
        <div class="subscription-container">
            <div class="content">
                <h1 class="">Subscription Plans</h1>
                <p class="">Subscribe to one of our plans and download unlimited symbols and templates.The subscription plan is recommended for frequent Network Designers and allows the users to download updates and new symbols and templates with no additional cost.</p>
                <p class="">Please click on the <a href="#_" class="">policy</a> to review our subscription policy before subscribing.</p>
            </div>
            <div class="subscription-container-inner">
                <div class="subscription-card">
                    <h6 class="">1 Month Plan</h6>
                    <h2 class="">$<span>145</span> </h2>
                    <ul>
                        <li>Unlimited downloads</li>
                        <li>
                            File Formats 
                            <br> 
                            <div class="">
                                <div class="">.PNG</div>
                                <div class="">.VSDX</div>
                            </div>
                        </li>
                        <li>Networks Symbols</li>
                        <li>Networks Templete</li>
                        <li>Symbols with Shadows</li>
                        <li>Symbols without Shadows</li>
                    </ul>
                    <button type="button" class="">Subscribe Now</button>
                </div>
                <div class="subscription-card">
                    <h6 class="">1 Month Plan</h6>
                    <h2 class="">$<span>145</span> </h2>
                    <ul>
                        <li>Unlimited downloads</li>
                        <li>
                            File Formats 
                            <br> 
                            <div class="">
                                <div class="">.PNG</div>
                                <div class="">.VSDX</div>
                            </div>
                        </li>
                        <li>Networks Symbols</li>
                        <li>Networks Templete</li>
                        <li>Symbols with Shadows</li>
                        <li>Symbols without Shadows</li>
                    </ul>
                    <button type="button" class="">Subscribe Now</button>
                </div>
                <div class="subscription-card">
                    <h6 class="">1 Month Plan</h6>
                    <h2 class="">$<span>145</span> </h2>
                    <ul>
                        <li>Unlimited downloads</li>
                        <li>
                            File Formats 
                            <br> 
                            <div class="">
                                <div class="">.PNG</div>
                                <div class="">.VSDX</div>
                            </div>
                        </li>
                        <li>Networks Symbols</li>
                        <li>Networks Templete</li>
                        <li>Symbols with Shadows</li>
                        <li>Symbols without Shadows</li>
                    </ul>
                    <button type="button" class="">Subscribe Now</button>
                </div>
            </div>
        </div>
    </section>
    <section class="industries-section">
        <h2>Our Users In Various Industries World Wide</h2>
        <p>We have hundreds of network designers, administrators and engineers working in various industries around the globe building amazing network topology diagrams for their network infrastructure or their clients.</p>
        <div class="industries-gallery">
            <div class="item mid">
                <div class="slideleft">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Energy/1.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Energy/2.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Energy/3.jpg" alt="" srcset="">
                </div>
                <span>Energy</span>
            </div>
            <div class="item min">
            <div class="slidedown">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/EducationandTraining/1.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/EducationandTraining/2.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/EducationandTraining/3.jpg" alt="" srcset="">
                </div>
                <span>
                EDUCATION <br> & <br> TRAINING
                </span>
            </div>
            <div class="item max">
            <div class="slideleft">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Aerospace/1.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Aerospace/2.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Aerospace/3.jpg" alt="" srcset="">
                </div>
                <span>AEROSPACE</span>
            </div>
            <div class="item min">
            <div class="slidedown">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Healthcare/1.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Healthcare/2.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Healthcare/3.jpg" alt="" srcset="">
                </div>
            <span>HEALTHCARE</span>
            </div>
            <div class="item max">
            <div class="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/technology.png" alt="" srcset="">
                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/Aerospace/2.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Aerospace/3.jpg" alt="" srcset=""> -->
                </div>
            <span>TECHNOLOGY</span>
            </div>
            <div class="item mid">
            <div class="slideleft">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/SoftwareHouse/1.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/SoftwareHouse/2.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/SoftwareHouse/3.jpg" alt="" srcset="">
                </div>
            <span>SOFTWARE <br>HOUSES</span>
            </div>
            <div class="item mid">
            <div class="slideleft">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/MilitaryandDefence/1.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/MilitaryandDefence/2.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/MilitaryandDefence/3.jpg" alt="" srcset="">
                </div>
            <span>MILITARY & <br>DEFENCE</span>
            </div>
            <div class="item max">
            <div class="slideleft">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Finance/1.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Finance/2.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Finance/3.jpg" alt="" srcset="">
                </div>
            <span>FINANCE</span>
            </div>
            <div class="item min">
            <div class="slidedown">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/NetworkTelecomandCloud/1.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/NetworkTelecomandCloud/2.jpg" alt="" srcset="">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/NetworkTelecomandCloud/3.jpg" alt="" srcset="">
                </div>
            <span>NETWORK <br> TELECOM & CLOUD</span>
            </div>
        </div>
    </section>
    <section class='logo-section'>
        <div class="showcase-carousel owl-theme">
            <div class="item">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Apple.png" alt="" srcset="">
            </div>
            <div class="item">
                <img src="<?php echo get_template_directory_uri(); ?>/images/nuPSYS.png" alt="" srcset="">
            </div>
            <div class="item">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Amazon.png" alt="" srcset="">
            </div>
            <div class="item">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Boson.png" alt="" srcset="">
            </div>
            <div class="item">
                <img src="<?php echo get_template_directory_uri(); ?>/images/mrytiebeach.png" alt="" srcset="">
            </div>
        </div>
    </section>

<?php get_footer(); ?>