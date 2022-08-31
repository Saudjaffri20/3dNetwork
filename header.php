<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes();?> id='networking-html'>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!--[if lt IE 9]>

	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>

	<![endif]-->
    <link  href="./assets/img/fav-icon.png">

        <link href="<?php echo get_template_directory_uri(); ?>/images/fav-icon.png" rel="icon" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"/>
        <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/short.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fonts/font_sheet.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/font/stylesheet.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fonts/font-awesome.min.css" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.nivo.slider.js"></script>
	
	
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.new.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick.min.css" type="text/css" />
	
	
    <script type="text/javascript">
	var j = jQuery.noConflict();

    j(document).ready(function() {
        j('#slider').nivoSlider({
        animSpeed: 1000,
        pauseTime: 5000,
        });

    });
    </script>
	<?php wp_head(); ?>
     <link href="<?php echo get_template_directory_uri(); ?>/css/custom.css" rel="stylesheet" type="text/css">
     <link href="<?php echo get_template_directory_uri(); ?>/css/animate.css" rel="stylesheet" type="text/css">
     
     <?php 
	 if(is_page(307)){
			  $tax_query[] = array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'featured',
					'operator' => 'IN',
				);
				
				$args = array(
					'post_type'           => 'product',
					'post_status'         => 'publish',
					'ignore_sticky_posts' => 1,
					'posts_per_page'      =>1,
					'orderby'             => 'desc',
					'order'               => 'desc',
					'tax_query'           => $tax_query
				);
				
               $the_query = new WP_Query( $args );
               if ($the_query->found_posts!=0)
                {
                while ( $the_query->have_posts() ) : $the_query->the_post();
                $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				$title = get_the_title();
                endwhile;
                wp_reset_postdata();
                wp_reset_query();
                }
				
				//$feat_image = get_template_directory_uri()."/images/logo.png";
            ?>
        <meta property="og:title" content="<?php echo $title ; ?>"/>
        <meta property="og:type" content="website"/>
        <meta property="og:description" content="<?php echo $title ; ?>"/>
        <meta property="og:image" content="<?php echo $feat_image; ?>"/>
        <!-- simplesharebuttons.com/plus twitter share details -->
        <meta name="twitter:title" content="<?php echo $title ; ?>">
        <meta name="twitter:description" content="<?php echo $title ; ?>">
        <meta name="twitter:image:src" content="<?php echo $feat_image; ?>">
        <!-- simplesharebuttons.com/plus google+ share details -->
        <meta itemprop="name" content="<?php echo $title ; ?>">
        <meta itemprop="description" content="<?php echo $title ; ?>">
        <meta itemprop="image" content="<?php echo $feat_image; ?>">
	 <?php
	 }
	 ?>
	 <!--new styling-->
	     <style type="text/css">


    </style>
</head>



<body <?php body_class(); ?>>



<header class="main-header">
    
    <div class="logo">
        <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg">
        </a>
    </div>

    <div class='mobile-bar-show'>
        <div class="lang-search-container">
            <div class="search-bar">
                <input type="search" name="" id="" class="" />
                <i class="fa fa-search search-btn"></i>
            </div>
            <div class="language-select">
                <select name="" id="">
                    <option value="EN">EN</option>
                    <option value="UR">UR</option>
                </select>
            </div>
        </div>

        <div class="dropdown profile-dropdown mobile-profile">
            <a id="dLabel" type="button" class="d-inline-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="" alt="">
            </a>
            <ul class="dropdown-menu" aria-labelledby="dLabel">
                <li>
                    <a href="#_">Logout</a>
                </li>
            </ul>
        </div>

        <div class="nav_inn">
            <?php wp_nav_menu( array( 'theme_location' => 'main_menu','container_class' => 'my_nav','menu_class' => 'my_nav') ); ?>
        </div>

        

        <div class="signup-container">
            
            <!-- if  -->
            
            <!-- <button class="signup-btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                Signup
            </button> -->
            
            <!-- else  -->

            <img src="" alt="">
            
            <!-- <div class="dropdown profile-dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a href="#_">Logout</a>
                    </li>
                </ul>
            </div> -->
            
            
            <div class="dropdown profile-dropdown">
                <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bars"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a href="#_">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
</header>

<div class='main-content-wrapper'>
