<?php

/*
 * Plugin Name:       Simple Content update
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
include_once plugin_dir_path( __FILE__ ) . "helpers/update-content.php";

class Simple_Content_update {

    function __construct() {
        add_filter( "the_content", [$this, "update_content"] );
        // add_filter( "the_content", "make_uppercase" );
    }

    public function update_content( $content ) {
        // $content = strtoupper( $content );
        $content = SICU_helper::sicu_uppercase_content( $content );
        if ( is_single() ) {
            $message = "<p><b>Thanks</b></p>";
            $content .= $message;
        }
        return $content;
    }
}

new Simple_Content_update();
