<?php
/*
Plugin Name:  User Submissions
Plugin URI:   https://www.amirsandila.com/ 
Description:  My first ever plugin n history of technology. You will love this plugin. 
Version:      1.0
Author:       Amir Sandila  
Author URI:   https://www.amirsandila.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  amirsandila
Domain Path:  /languages
*/

define("version", strtotime(date("Ymd")));

function my_theme_enqueue_scripts() {
  wp_enqueue_script( 'custom-jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), version, true );
  wp_enqueue_style( 'main-style', plugin_dir_url( __FILE__ ) . 'asset/css/style.css', false, '1.1', 'all' );
  wp_register_script('ajax-script', plugin_dir_url( __FILE__ ) . 'asset/js/script.js', array('jquery'), false, true);
  wp_localize_script( 'ajax-script', 'blog', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' )
  ));
  wp_enqueue_script('ajax-script');
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_scripts' );

include('inc/publish.php'); // file that handles ajax data
include('inc/form.php'); // form shortcode

