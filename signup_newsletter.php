<?php
/*
Plugin Name: signup_newsletter
Plugin URI: 
Description: A simple signup plugin.
Version: 1.0
Author: piyush patel
Author URI: 
*/
?>
<script type="text/javascript">
var pluginurl = '<?= plugins_url('signup_newsletter'); ?>';
</script>
<?php 
function prefix_add_my_stylesheet() {
        wp_register_style( 'prefix-style', plugins_url('css/my-stylesheet.css', __FILE__) );
        wp_enqueue_style( 'prefix-style' );
    }
add_action( 'wp_enqueue_scripts', 'prefix_add_my_stylesheet' );  
function my_scripts_method() {
	wp_enqueue_script('newscript',plugins_url( '/js/newsletter.js' , __FILE__ ),array( 'scriptaculous' ));
	wp_enqueue_script('newscript',plugins_url( '/js/jquery.cookie.js' , __FILE__ ),array( 'scriptaculous' ));
	wp_localize_script( 'newscript', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );	
}
add_action( 'init', 'my_scripts_method' );
function pro_install()
{
    global $wpdb;
    $table = "email_signups ";
    $structure = "create table email_signups (id int, email varchar(100), name varchar(100), primary key(id));";
    $wpdb->query($structure);
}
register_activation_hook(__FILE__,'pro_install');
function display_newsletter_form() {
   global $wpdb;
   $newsform="<div class='mainform' id='mainform'>
   			<div class='signcls'>Sign up for our news letter<a href='javascript:void(0);' id='cancel' onclick='cnacle()' class='cncle'>X</a></div>
   			<form name='newlatteform' class='class_div' id='newlatteform' method='post' action='' >
			<div class='newsget' >Get the latest scoop!</div>
			<div id='successful'></div>
			<div>
			<input type='text' name='name' value='' placeholder='Youe name...' id='nw_name' class='txtbox'/>
			</div>
			<div>
			<input type='text' name='email' value='' placeholder='Youe Email...' id='nw_email' class='txtbox'/>
			</div>
			<div>
			<input type='button' name='submit' value='submit' id='submit' class='sbmtcls' onclick='return validation();' />
			</div>
			</form>
		   </div>";
	echo $newsform;
}
add_action('wp_footer', 'display_newsletter_form');
?>
