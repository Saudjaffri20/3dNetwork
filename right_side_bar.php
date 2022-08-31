 <?php 
 $Post159= 159;//This is page id or post id
$WeHaveUp = get_post($Post159);
$WeHaveUpContent = $WeHaveUp->post_content;
$WeHaveUpTitle = $WeHaveUp->post_title;


$Post160= 160;//This is page id or post id
$AboutCctv = get_post($Post160);
$AboutCctvContent = $AboutCctv->post_content;
$AboutCctvTitle = $AboutCctv->post_title;
 ?>
 <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="sidebar_box">
                            <h2><?php echo $WeHaveUpTitle; ?></h2>
                           <p> <?php echo $WeHaveUpContent; ?></p>
                            <!--  <h2>We have upgraded.!</h2>
                                <p>To serve our customers better we have created a brand new design website incorporating support facilities <br/>for our clients. We hope you like it as much as we do.
    </p>-->
    						<div class="border_seprator"></div>
                             </div>
                             
                             <div class="sidebar_box">
                             <h2><?php echo $AboutCctvTitle; ?></h2>
                             <?php echo $AboutCctvContent ; ?>
                             <!--<h2>Absolute CCTV Services</h2>
                             <p>We can also provide specialized consultancy, supply and installation for vehicles,business premesis and homes.</p>
                             <ul>

                             	<li>Business Fleets</li>
                                <li>Logistics / Trucking Fleets</li>
                                <li>Car Hire & Leasing Fleets</li>
                                <li>Delivery Fleets</li>
                                <li>Regrigeration Deliver Fleets</li>
                                <li>Plant & Equipment Hire</li>
                                <li>Construction Fleets</li>
                                <li>Taxi Fleets</li>
                                <li>Bikes, Boats & Ships</li>
                             </ul>
                             
                             <img src="<?php echo get_template_directory_uri(); ?>/images/cameragprs.jpg" />
                             <a href="">Click here to view</a>-->
                             
                             </div>
                             
                             
                             <div class="sidebar_box">
                             
          
                             </div>
                         </div>