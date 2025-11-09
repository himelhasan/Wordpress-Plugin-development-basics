<?php

/*
 * Plugin Name:       SIMPLE ONE
 * Plugin URI:        https://CODERSCROWN.COM/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      8.2
 * Author:            Himel Hasan
 * Author URI:        https://Himelhasan.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin 
 * Text Domain:       simple-one
 * License:           GPLv2
 */

//  check if the plugin file is run by wordpress and prevent it to run from outside

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

defined( 'ABSPATH' ) or exit;

// echo "hello world";

// add_filter( "the_content", "make_uppercase" );
// function make_uppercase( $content ) {
//     return strtolower( $content );
// }

register_activation_hook( __FILE__, "activation_hook" );
register_deactivation_hook( __FILE__, "deactivation_hook" );
register_uninstall_hook( __FILE__, "uninstallation_hook" );

function activation_hook() {
    update_option( 'simple-data', "true" );
}

function deactivation_hook() {
    update_option( 'simple-data', "false" );
}

function uninstallation_hook() {
    delete_option( 'simple-data' );
}

function simple_one_enqueue_scripts() {

    wp_enqueue_style( "simple-one",
        plugin_dir_url( __FILE__ ) . "my-style.css" );

    wp_enqueue_script( "simple-one",

        plugin_dir_url( __FILE__ ) . "my-script.js", ["jquery"],
        "1.0.0", true );

    wp_localize_script( "simple-one", "webData", [
        "siteAjaxUrl" => admin_url( "admin-ajax.php" ),
        "nonce"       => wp_create_nonce( "simple_site_nonce" ),
    ] );

}

add_action( "wp_enqueue_scripts", "simple_one_enqueue_scripts" );

function simple_one_form_shortcode() {
    ob_start();
    include_once plugin_dir_path( __FILE__ ) . "form.php";
    return ob_get_clean();
}

add_shortcode( "simple_form", "simple_one_form_shortcode" );

function contact_form_submit_handler() {
    error_log( "===========================================" );
    error_log( print_r( $_REQUEST, true ) );
    error_log( "===========================================" );
}

add_action( "wp_ajax_contact_form_submit", "contact_form_submit_handler" );