<?php

/*

Template Name: Page Template Home

*/


get_header(); ?>
    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
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

<?php get_footer(); ?>