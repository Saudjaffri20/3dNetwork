<?php

/*

Template Name: Page Template Order Now

*/


get_header(); ?>

<?php $exp  = array_reverse(explode("/",$_SERVER['REQUEST_URI'])); ?>

<script type="text/javascript">
var currPkg = "<?php echo $exp[1]; ?>";

jQuery(window).load(function(){
   jQuery('#nf-field-17 option:selected').removeAttr('selected');
   jQuery("#nf-field-17 option:selected").each(function () {
	jQuery(this).removeAttr('selected'); 
	});

   
   if(currPkg==11){
   jQuery('#nf-field-17 option[value="Medium Enterprise"]').attr('selected','selected');
   }
   else if(currPkg==22){
   jQuery('#nf-field-17 option[value="Large Enterprise"]').attr('selected','selected');
   }
   else{
   }
	
});

</script>

	
    <div class="mainBox">
        <div class="orderNowBg">
            <div class="container">
                	<div class="orderNowPage">
					<?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>