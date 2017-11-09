<?php
// Prevent direct file access
if ( ! defined( 'ABSPATH' ) ) {
header( 'Status: 403 Forbidden' );
header( 'HTTP/1.1 403 Forbidden' );
exit;
}
/**
* Deactivates the plugin
*
* @return bool
*/
function wp_force_ssl_deactivate_self() {
if( ! current_user_can( 'activate_plugins' ) ) {
return false;
}
// deactivate self
deactivate_plugins( 'wp-force-ssl/wp-force-ssl.php' );
// get rid of "Plugin activated" notice
if( isset( $_GET['activate'] ) ) {
unset( $_GET['activate'] );
}
// show notice to user
add_action( 'admin_notices', 'wp_force_ssl_requirement_notice' );
return true;
}
/**
* Outputs a notice telling the user that the plugin deactivated itself
*/
function wp_force_ssl_requirement_notice() {
?>
<div class="updated">
<p><?php _e( 'WP Force SSL did not activate because it requires your server to run PHP 5.4 or higher. <a href="http://www.wpupdatephp.com/update/" target="_blank">Learn More</a>', 'wp-force-ssl' ); ?></p>
</div>
<?php
}
// Hook into `admin_init`
add_action( 'admin_init', 'wp_force_ssl_deactivate_self' );
?>