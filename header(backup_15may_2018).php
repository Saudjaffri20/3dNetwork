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
.loginSecBtn{
	position: absolute;
	right: 22px;
	top: 22px;
}

.loginSecBtn .loginBtn{
	background: #00aae8 none repeat scroll 0 0;
	border: 1px solid #00aae8;
	border-radius: 5px;
	color: #ffffff;
	display: inline-block;
	font-weight: bold;
	font-size: 13px;
	margin-left: 10px;
	margin-top: 0;
	padding: 2px 17px;
	text-align: center;
	text-decoration: none;
	text-transform: uppercase;
	-webkit-transition: background 0.5s; /* Safari */
	transition: background 0.5s;
	float:right;

}
.loginSecBtn .loginBtn:hover{
	/*background:transparent;*/
	color:#231f20;
}
.loginSecBtn span{
	color:#FFF;
	display:inline-block;
	margin-top:2px;
}
.inner_page .woocommerce-MyAccount-navigation{
	width:20%;
}
.woocommerce-EditAccountForm legend{
	margin-top:10px;
	color:#858585;
	padding-bottom:10px;
}
.inner_page .woocommerce-MyAccount-navigation ul {
	list-style:none;
}
.inner_page .woocommerce-MyAccount-navigation ul li a{
	color:#00aae8;
}

.inner_page .woocommerce-MyAccount-content a{
	color:#00aae8;
}

.inner_page .woocommerce  input.button{
	background: #00aae8 none repeat scroll 0 0 ;
	border: 1px solid #00aae8;
	border-radius: 5px;
	color: #ffffff;
	display: inline-block;
	font-weight: bold;
	font-size: 13px;
	margin-top: 10px;
	padding:10px 17px;
	text-align: center;
	text-decoration: none;
	text-transform: uppercase;
	-webkit-transition: background 0.5s; /* Safari */
	transition: background 0.5s;
}

.inner_page .woocommerce  input.button:hover{
	background:transparent;
	color:#231f20;
}

.listItemNew li {
	background: #ffffff none repeat scroll 0 0;
	font-size: 13px;
	padding: 15px 0;
	text-transform: uppercase;
}

.greenClr{
   border:5px solid #b3e546;
}
.blueClr{
   border:5px solid #1ccbe6;
}
.orangeClr{
   border:5px solid #ff8d30;
}


.subsBox{
	width:100%;
	text-align:center;
	float:left;
	background:white;
	margin-bottom:20px;
}

.chargeTxt{
	margin: 21px 0px;
    display: block;
    padding: 0px 105px;
    line-height: 20px;
	color:#53585c;
	font-weight:bold;
}

.subsBox .addtocartBtn a {
    color: white;
    display: inline-block;
    font-size: 18px;
    font-weight: normal;
    padding: 15px 70px;
    text-decoration: none;
    text-transform: capitalize;
	  -webkit-transition: background 0.5s; /* Safari */
    transition: background 0.5s;
}

.greenClr .addtocartBtn a {
   background:#b3e546;
}
.blueClr .addtocartBtn a {
   background:#1ccbe6;
}
.orangeClr .addtocartBtn a {
   background: #ff8d30;
}

.subsBox ul{
	padding:0px;
	margin:0px;
}

.subsBox ul li{
	list-style:none;

}
.listItem{
	padding:15px 0px;
	text-transform:uppercase;
	font-size:13px;
}

.subsName{
	padding: 26px 25px;
	font-weight: normal;
	color: #53585c;
	font-size: 18px;
	margin: 0px 15px;
	text-transform: uppercase;
}
.greenClr .subsName{
   border-bottom:2px solid #b3e546;
}
.blueClr .subsName{
	border-bottom:2px solid #1ccbe6;
}
.orangeClr .subsName{
	border-bottom:2px solid #ff8d30;
}

.subsPrice {
	padding: 0px 0 ;
	color : #393a35;
	margin-bottom: -18px;
}
.subsPrice .large {
    font-size: 100px;
    line-height: 100px;
}

.subsPrice .smallTxt{
	position: relative;
    top: -24px;
    font-size: 15px;
}

.subsPrice small{
	position: relative;
    left: 28px;
    top: -13px;
}

    

.subsPrice strike {
	color: red;
	font-size: 19px;
	position: relative;
	text-decoration: line-through;
	top: 10px;
}
.accountPageHeader{
	color:white;
	text-decoration:none;
}
.accountPageHeader:hover{
	color:white;
	text-decoration:none;
}

    </style>

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

