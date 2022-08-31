<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

?>

		
		<footer>
     	<div class="footer_sec">
            <div class="container">
                <div class="row">
               <!-- slideInLeft animated-->
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 quick_link ">
                    <h4>Quick Links</h4>
                    <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'menu_class' => '', 'menu_id' => '' ) ); ?>
                 </div>
                 
                <!-- slideInDown animated-->
                 
                  <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 our_office quick_link ">
                   	<?php dynamic_sidebar('footer_contact'); ?>
                    <?php /*?><h4>contact us</h4>
                    <ul>
                    	<li>sales@3d-networking.com</li>
                        <li>support@3d-networking.com</li>
                    </ul>
                    <h4>address</h4>
                    <p>1/38 A main shahra e faisal , karachi</p><?php */?>
                 </div>
                 <!--slideInRight animated-->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 socialConnect ">
                <?php dynamic_sidebar('social_connect');?>
                    
                    
                 </div>
                
                
                </div>
            </div>
        </div>
        <div class="footer_bottom_sec">
        	<div class="container">
               <div class="row">
			     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                 	<p>&copy; 2017-<?php echo date("Y")?> 3D Networking. All rights reserved.</p>
                 </div>
                </div>
              </div>
        </div>
	 </footer>
	 
 <script type="text/javascript">
jQuery(window).load(function($){
  var redUrl ="<?php echo get_the_permalink(307);?>";
  jQuery('.product-name a').attr('href',redUrl);
  jQuery('.product-thumbnail a').attr('href',redUrl);
  jQuery('.download-product a').attr('href',redUrl);
  
});
</script>  
     
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
	<?php wp_footer(); ?>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5df12c9c43be710e1d21a7e3/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>