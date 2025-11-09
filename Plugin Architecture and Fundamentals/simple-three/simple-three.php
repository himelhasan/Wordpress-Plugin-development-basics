<?php

/*
 * Plugin Name:       SIMPLE THREE
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

register_activation_hook( __FILE__, [Simple_Three_plugin::class, "activation_hook"] );
register_deactivation_hook( __FILE__, [Simple_Three_plugin::class, "deactivation_hook"] );
register_uninstall_hook( __FILE__, [Simple_Three_plugin::class, "uninstallation_hook"] );

// echo "hello world";

// add_filter( "the_content", "make_uppercase" );
