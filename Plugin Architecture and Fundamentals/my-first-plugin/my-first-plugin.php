<?php

/* 
* Plugin Name: My First Plugin
* Plugin URI: https://firstplugin.com
* Description: This is our Demo Plugin
* Author: Himel Hasan
* Author URI: https://himelhasan.com
* Version: 1.0
* License: GPL2
* license URI:

*/

class OurFirstPlugin {

    function __construct() {
        add_filter( 'the_title', [$this, 'ofp_change_title_case'] );
    }

    function ofp_change_title_case( $title ) {
        return strtoupper( $title ) . " Hoise";
    }

}

new OurFirstPlugin();

function wp_enqueue_styles_first_plugin() {

    wp_enqueue_style( "first-plugin",
        plugin_dir_url( __FILE__ ) . "my-style.css" );
    wp_enqueue_script( "first-plugin",
        plugin_dir_url( __FILE__ ) . "ajax-script.js", ["jquery"], "1.0.0", true );

    wp_localize_script( "first-plugin", "siteData", [
        "ajaxURL" => admin_url( "admin-ajax.php" ),
        "nonce"   => wp_create_nonce( "first-plugin" ),
    ] );

}

add_action( "wp_enqueue_scripts", "wp_enqueue_styles_first_plugin" );

function first_plugin_action_callback() {
    error_log( "===========================================" );
    error_log( print_r( $_REQUEST, true ) );
    error_log( "===========================================" );
}

add_action( "wp_ajax_first_plugin_action", "first_plugin_action_callback" );

function first_plugin_form_shortcode() {
    ob_start();
    include_once plugin_dir_path( __FILE__ ) . "form.php";
    return ob_get_clean();
}

add_shortcode( "first_plugin_form", "first_plugin_form_shortcode" );
