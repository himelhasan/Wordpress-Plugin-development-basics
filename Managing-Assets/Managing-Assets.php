<?php

/*
Plugin Name: Managing Assets
Description: A plugin to manage and optimize assets in WordPress.
Version: 1.0
Author: Your Name
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( "ASSET_URL", plugin_dir_url( __FILE__ ) . "assets/" );
define( "MA_VERSION", "1.0.1" );

class Managing_Assets_Plugin {
    public function __construct() {
        add_action( "wp_head", [$this, "header_assets"] );
        add_action( "wp_footer", [$this, "footer_assets"] );
        add_action( "wp_enqueue_scripts", [$this, "enqueue_assets"] );
    }

    public function header_assets() {
        echo "<script> console.log('" . ASSET_URL . "') </script>";
    }

    public function footer_assets() {
        echo "<!-- Managing Assets Plugin Footer -->";
    }

    public function enqueue_assets() {
        wp_enqueue_script(
            "ma-main-js",
            ASSET_URL . "js/script.js",
            ["ma-function-js"],
            MA_VERSION,
            ["in_footer" => true]
        );

        wp_enqueue_script( "ma-secondary-js", ASSET_URL . "js/script2.js", [], MA_VERSION, true );

        wp_enqueue_style( "ma-main-css", ASSET_URL . "css/style.css", [], MA_VERSION );

        wp_enqueue_script( "ma-function-js", ASSET_URL . "js/function.js", [], MA_VERSION, true );
    }
}

new Managing_Assets_Plugin();