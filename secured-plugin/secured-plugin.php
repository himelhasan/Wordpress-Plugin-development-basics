<?php

/*
 * Plugin Name:       SECURED Plugin
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
*/

/* 
1. Nonce Validation
2. Input Validation
3. Sanitize Inputs
4. Escaping Outputs
*/

function secure_plugin_enqueue_assets() {
    wp_enqueue_style(
        "secure-plugin",
        plugin_dir_url( __FILE__ ) . "style.css"
    );
    wp_enqueue_script( "secure-plugin",
        plugin_dir_url( __FILE__ ) . "ajax-script.js", ["jquery"], "1.0.0", true );

    wp_localize_script( "secure-plugin", "siteInfo", [
        "ajaxUrl" => admin_url( "admin-ajax.php" ),
        "nonce"   => wp_create_nonce( "secure_form_nonce" ),
    ] );
}

add_action( "wp_enqueue_scripts", "secure_plugin_enqueue_assets" );

function secured_plugin_form_shortcode() {
    ob_start();
    include_once dirname( __FILE__ ) . "/form.php";
    return ob_get_clean();
}

add_shortcode( "secured_form", "secured_plugin_form_shortcode" );

function secure_form_submit_handler() {
    error_log( "===========================================" );
    error_log( print_r( $_REQUEST, true ) );
    error_log( "===========================================" );

}

add_action( "wp_ajax_secure_form_submit", "secure_form_submit_handler" );
