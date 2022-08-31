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
<html <?php language_attributes(); ?>>
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
        <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
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
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fonts/font-awesome.min.css" />
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.nivo.slider.js"></script>
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

</head>



<body <?php body_class(); ?>>


	<header class="nav_main">
     <div class="">

         <div class="container search_form_main">
    
             <div class="row">
             
             	 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="logo">
    
                        <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
    
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
    
                        </a>
    
                    </div>
				</div>
    
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 tb_padd">
                    <div class="nav_inn">
                          <?php wp_nav_menu( array( 'theme_location' => 'main_menu','container_class' => 'my_nav','menu_class' => 'my_nav') ); ?>
                    </div>
                    
                    <?php /*?><div class="navbar navbar-inverse nav_inn" role="navigation">
        
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
             
            </div>
            <div class="">
             <ul class="nav navbar-nav ">
                <li><a href="index.html" class="active">Home</a></li>
                <li><a href="about_us.html">About US</a></li>
                <li><a href="courses.html">Courses</a></li>
                <li><a href="who_can_use.html">who can user our services</a></li>
                <li><a href="contact_us.html">Enquiries</a></li>
                <li><a href="">Training Calendar</a></li>
              </ul><?php //wp_nav_menu( array( 'theme_location' => 'main_menu','container_class' => '','menu_class' => '') ); ?>
              
          
            </div>
         
        </div><?php */?>
                    
                    
             </div>
    
             </div><!--container end-->
    
         </div>

     </div>

  </header>

