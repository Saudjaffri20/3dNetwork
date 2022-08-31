<?php

/*

Template Name: Page Template Pricing

*/


get_header(); ?>


   <!--<div class="before_blog_2">
		<h1>Activity Page</h1>
	</div><div class="before_blog"></div>-->
    <?php  $package_detail 	= get_field("package_detail",get_the_ID())?>
	
    <div class="mainBox">
        <div class="pkgBg">
            <div class="container">
            <div class="row">
            	<div class="pageHeading"> <h1 class="bounceInDown animated">Choose Your Plan</h1></div>
            <?php 
                if(!empty($package_detail)){
					$i=1;
                    foreach($package_detail as $pkgDet){
					$cls="";
					if($i==1){
						$cls ='fadeInLeft';
					}
					if($i==2){
						$cls ='fadeInDown';
					}
					if($i==3){
						$cls ='fadeInRight';
					}
					
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="pkgBox <?= $cls ?> animated">
                        
                        <ul>
                            <li class="pkgName"><?php echo $pkgDet['package_name'];?></li>
                            <li class="pkgPrice"><?php echo $pkgDet['package_price'];?></li>
                            <?php
                                if(!empty($pkgDet['list_item'])){
                                    foreach($pkgDet['list_item'] as $item){
                                    ?>
                                    <li class="listItem"><?php echo $item['listing']; ?></li>
                                    <?php
                                    }
                                }
                             ?>
                          
                            <li class="addtocartBtn"><a href="<?php echo $pkgDet['button_link'];?>">Order Now</a></li>
                        </ul>
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
    
        <div class="container demo">
            
            <div class="mainAcc">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php 
                $accordion 	= get_field("accordion",get_the_ID());
                ?>
                    <?php 
                        echo "<div class='row'>";
                        if($accordion ){
                            $x=1;
                            foreach($accordion as $acc){
                            ?>
                            <div class="col-sm-6">
                                <div class="panel1 panel-default">
                                <div class="panel-heading1" role="tab" id="heading<?php echo $x;?>">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $x;?>" aria-expanded="true" aria-controls="collapseOne">
                                            <!--<i class="more-less glyphicon glyphicon-plus"></i>-->
                                            
                                             <span class="hi-icon-effect-5 hi-icon-effect-5c">
                                                <i class="more-less hi-icon  glyphicon glyphicon-plus"></i>
                                            </span>
                                            
                                            
                                           <span class="pkgQst"> <?php echo $acc['package_question']; ?></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse<?php echo $x;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $x;?>">
                                    <div class="panel-body">
                                         <?php echo $acc['packages_answer']; ?>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <?php
                            if($x % 2 == 0) {echo '</div><div id='.$x.' class="row">';}
                            $x++;
                            }
                            echo "</div>";
                        }
                    ?>
        
            </div><!-- panel-group -->
            </div>
        
        </div><!-- container -->
    </div>





<style type="text/css">
.hi-icon {
	display: inline-block;
	width: 20px;
	height: 20px;
	text-align: center;
	position: relative;
	z-index: 1;
	color: #fff;
	top:-3px;
	font-weight:bold;
	font-size:14px;
	border:1px solid;
}

.hi-icon:after {
	pointer-events: none;
	position: absolute;
	width: 100%;
	height: 100%;
	border-radius: 50%;
	content: '';
	-webkit-box-sizing: content-box; 
	-moz-box-sizing: content-box; 
	box-sizing: content-box;
}

.hi-icon:before {
	speak: none;
	font-size: 24px;
	font-weight: bold;
	margin-top:-2px;
	text-transform: none;
	display: block;
	-webkit-font-smoothing: antialiased;
}


/* Effect 5 */
.hi-icon-effect-5 .hi-icon {
	box-shadow: 0 0 0 4px rgba(255,255,255,1);
	overflow: hidden;
	-webkit-transition: background 0.3s, color 0.3s, box-shadow 0.3s;
	-moz-transition: background 0.3s, color 0.3s, box-shadow 0.3s;
	transition: background 0.3s, color 0.3s, box-shadow 0.3s;
}

.hi-icon-effect-5 .hi-icon:after {
	display: none;
}

.hi-icon-effect-5a .hi-icon:hover:before {
	-webkit-animation: toRightFromLeft 0.3s forwards;
	-moz-animation: toRightFromLeft 0.3s forwards;
	animation: toRightFromLeft 0.3s forwards;
}

.hi-icon-effect-5b .hi-icon:hover:before {
	-webkit-animation: toLeftFromRight 0.3s forwards;
	-moz-animation: toLeftFromRight 0.3s forwards;
	animation: toLeftFromRight 0.3s forwards;
}

.hi-icon-effect-5c .hi-icon:hover:before {
	-webkit-animation: toTopFromBottom 0.3s forwards;
	-moz-animation: toTopFromBottom 0.3s forwards;
	animation: toTopFromBottom 0.3s forwards;
}

@-webkit-keyframes toTopFromBottom {
	49% {
		-webkit-transform: translateY(-100%);
	}
	50% {
		opacity: 0;
		-webkit-transform: translateY(100%);
	}
	51% {
		opacity: 1;
	}
}
@-moz-keyframes toTopFromBottom {
	49% {
		-moz-transform: translateY(-100%);
	}
	50% {
		opacity: 0;
		-moz-transform: translateY(100%);
	}
	51% {
		opacity: 1;
	}
}
@keyframes toTopFromBottom {
	49% {
		transform: translateY(-100%);
	}
	50% {
		opacity: 0;
		transform: translateY(100%);
	}
	51% {
		opacity: 1;
	}
}

  










/*******************************
* Does not work properly if "in" is added after "collapse".
* Get free snippets on bootpen.com
*******************************/
.panel-group i{
	font-size:30px;
	font-weight:bold!important;
}
.panel-group .panel {
	border:none;
}

.panel-default > .panel-heading {
	padding: 0;
	border-radius: 0;
	color: #212121;
	background-color: #FFFFFF;
	border:none!Important;
}

.panel-title {
	font-size: 14px;
}

.panel-title > a {
	display: block;
	padding: 15px;
	text-decoration: none;
	transition: all 0.375s ease-in-out 0s;
}
.panel-title i:hover::after{
	animation: 0.35s ease-in-out 0s reverse none 1 running g1_vertical_loop;
}

.more-less {
	float: left;
	color: #212121;
}


.panel-default > .panel-heading + .panel-collapse > .panel-body{
	border:1px solide red!important;
}
.panel{
	border:none;
}
.panel-body{
	padding:0px 40px;
}

</style>
<script type="text/javascript">
jQuery(document).ready(function(){
   function toggleIcon(e) {
    jQuery(e.target)
        .prev('.panel-heading1')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
jQuery('.panel-group').on('hidden.bs.collapse', toggleIcon);
jQuery('.panel-group').on('shown.bs.collapse', toggleIcon);
});
</script>
<?php get_footer(); ?>