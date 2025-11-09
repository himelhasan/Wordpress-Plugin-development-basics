<?php

/*
 * Plugin Name:       Repeat Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Domain Path:       /repeat-plugin
 */

defined( 'ABSPATH' ) || exit;
defined( "ABSPATH" ) or exit;
if ( ! defined( "ABSPATH" ) ) {
    exit;
}

// add_filter( 'the_content', 'repeat_content_uppercase' );

// function repeat_content_uppercase( $content ) {
//     return strtoupper( $content );
// }

// register_activation_hook( __FILE__, 'repeat_plugin_activate' );

// // we can add data on options page of wordpress at /wp-admin/options.php
// function repeat_plugin_activate() {
//     update_option( "repeat_plugin_activate", "Plugin Activated" );
// }

// register_deactivation_hook( __FILE__, 'repeat_plugin_deactivate' );

// function repeat_plugin_deactivate() {
//     update_option( "repeat_plugin_activate", "Plugin Deactivated" );
// }

// register_uninstall_hook( __FILE__, 'repeat_plugin_uninstall' );

// function repeat_plugin_uninstall() {
//     delete_option( "repeat_plugin_activate" );
// }

// object oriented programming approach

Class Repeat_plugin {

    public function __construct() {

        add_filter( "the_content", [$this, "thanks_note"] );
    }

    public static function activate() {
        add_option( "oop_style_plugin_status", "OOP Style Plugin Activated" );
    }

    public static function deactivate() {
        update_option( "oop_style_plugin_status", "OOP Style Plugin Deactivated" );
    }

    public static function uninstall() {
        delete_option( "oop_style_plugin_status" );
    }

    public function thanks_note( $content ) {
        if ( is_single() ) {
            $content = strtoupper( $content );
            return $content . "<p>Thank you for reading this post!</p>";
        }
        return $content;
    }
}

new Repeat_plugin();