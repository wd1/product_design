<?php
/*
	Plugin Name: WP Force SSL
	Plugin URI: https://www.codesigns.gr/
	Description: Redirect all traffic from HTTP to HTTPS to all pages of your WordPress website.
	Stable Tag: 1.3
	Author: Kostas Vrouvas
	Version: 1.3
 */

//
register_activation_hook( __FILE__, 'wpfssl_welcome_screen_activate' );
function wpfssl_welcome_screen_activate() {
set_transient( '_welcome_screen_activation_redirect', true, 30 );
}

add_action( 'admin_init', 'wpfssl_welcome_screen_do_activation_redirect' );
function wpfssl_welcome_screen_do_activation_redirect() {
// Bail if no activation redirect
if ( ! get_transient( '_welcome_screen_activation_redirect' ) ) {
return;
}

// Delete the redirect transient
delete_transient( '_welcome_screen_activation_redirect' );

// Bail if activating from network, or bulk
if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
return;
}

// Redirect to bbPress about page
wp_safe_redirect( add_query_arg( array( 'page' => 'wpfssl-welcome-screen' ), admin_url( 'index.php' ) ) );
}

add_action('admin_menu', 'wpfssl_welcome_screen_pages');
function wpfssl_welcome_screen_pages() {
add_dashboard_page(
'Welcome to WP Force SSL',
'Welcome to WP Force SSL',
'read',
'wpfssl-welcome-screen',
'wpfssl_welcome_screen_content'
);
}
function wpfssl_welcome_screen_content() {
?>
<div id="wpbody">
<div id="wpbody-content">
<div class="wrap about-wrap">
	<h1>Thank you for installing WP Force SSL!</h1>
	<div class="about-text">
		This plugin helps you redirect HTTP traffic to HTTPS without the need of touching any code.</div>
	<h3>Some things are required for this to happen:</h3>
	<ul class="ul-disc">
			<li>You need an SSL Certificate in order for this plugin to work.</li>
			<li>You need to add https to the WordPress Address (URL) and Site Address (URL) parameters under General > Settings. (Required by WordPress itself)</li>
	</ul>
	<br>
	<br>
	<hr>
	<h1>Changelog:</h1>
	<br>
	<h4>1.3</h4>
		<p><small>Release date: February 11th, 2016</small></p>
		<ul class="ul-disc">
			<li>Dropping support for PHP 5.3: Only 15.9% of the people that use WordPress use PHP 5.3, it reached end of life and you should ask your host to upgrade.</li>
		</ul>
	<h4>1.2.1</h4>
		<p><small>Release date: April 22th, 2015</small></p>
		<ul class="ul-disc">
			<li>Fixed an issue where some users were getting a error message for no valid header when activating the plugin.</li>
		</ul>
	<h4>1.2</h4>
		<ul class="ul-disc">
			<li>Dropping support for PHP 5.2: Only 5.7% of the people that use WordPress use PHP 5.2, it's old, buggy, and insecure.</li>
		</ul>
</div>
</div>
</div><!-- wpbody-content -->

<?php
}

add_action( 'admin_head', 'wpfssl_welcome_screen_remove_menus' );
function wpfssl_welcome_screen_remove_menus() {
remove_submenu_page( 'index.php', 'wpfssl-welcome-screen' );
}


// Prevent direct access to this file.
if( !defined( 'ABSPATH' ) ) {
        exit( 'You are not allowed to access this file directly.' );
}

// Check if PHP is at the minimum required version
if( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
define( 'WP_FORCE_SSL_FILE', __FILE__ );
require_once dirname( __FILE__ ) . '/plugin.php';
} else {
require_once dirname( __FILE__ ) . '/php-backwards-compatibility.php';
}

?>