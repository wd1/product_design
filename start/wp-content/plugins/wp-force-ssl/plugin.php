<?php
// Prevent direct access to this file.
if( !defined( 'ABSPATH' ) ) {
        exit( 'You are not allowed to access this file directly.' );
}

// "The Core"
define('FORCE_SSL' , true);

if (defined('FORCE_SSL'))
  add_action('template_redirect', 'force_ssl');

function force_ssl(){

if ( FORCE_SSL && !is_ssl () )
 {
  wp_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301 );
  exit();
 }
}
?>