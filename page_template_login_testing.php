<?php
/*
Template Name: Page Template Login
*/

get_header(); ?>
<style type="text/css">

</style>

<!--	<h1><a href="javascript:void(0)" class="xoo-el-login-tgr">Login</a></h1>
    <h1><a href="javascript:void(0)" class=" xoo-el-reg-tgr">Register</a></h1>-->

    <br/><br/><br/><br/>
<?php //echo do_shortcode('[myregister]'); ?>
<?php
//echo do_shortcode('[lost_password_form]');
?>
<div class="popup-losspwd-sec" style="display:none;">
    <?php
          //echo do_shortcode('[wc_forgotpwd_form_bbloomer]');
    ?>
    <span>Back to login</span>
</div>
<div class="popup-login-sec">
    <h4>Login</h4>
    <div class="login_msg fail"></div>
    <div class="login_msg success"></div>
    <?php echo do_shortcode('[wc_login_form_bbloomer]'); ?>
    <p>Forgot your password</p>
    <p>Dont have account yet</p>
    <a href="javascript:void(0)">Create an account</a>
</div>
<div class="popup-forgotpwd-sec">
    <?php //echo do_shortcode('[wc_reg_form_bbloomer]'); ?>
</div>

<style type="text/css">
    .popup-login-sec label , .popup-login-sec .lost_password{
        display:none;
    }

</style>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.popup-login-sec #username').attr('placeholder', 'Email');
        jQuery('.popup-login-sec #password').attr('placeholder', 'Password');
    });
</script>

<?php get_footer(); ?>