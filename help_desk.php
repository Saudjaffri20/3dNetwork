<?php 
$helpDesk55= 55;//This is page id or post id
$helpDesk = get_post($helpDesk55);
$helpDeskdata = $helpDesk->post_content;
$feat_image    = wp_get_attachment_url( get_post_thumbnail_id($helpDesk55) );
?>
<div class="help_desk">
    <img src="<?php echo $feat_image; ?>" title="<?php echo $helpDesk->post_title ;?>">
    <div class="help_desk_small">
        <h2><?php echo $helpDeskdata ; ?></h2>
        <h3><?php echo $helpDesk->post_title ;?></h3>
    </div>
</div>