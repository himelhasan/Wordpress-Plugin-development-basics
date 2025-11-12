<?php

/*
Plugin Name: Simple QR Code
Description: A simple QR code generator shortcode for WordPress.
Version: 1.0.0
Author: Himel Hasan
*/

defined( 'ABSPATH' ) || exit;

class SQC_Plugin {

    const VERSION = '1.0.11';

    public function __construct() {
        $this->define_constants();
        $this->load_dependencies();
        $this->initialize();
    }

    function define_constants() {

        define( 'SQC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
        define( 'SQC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
        define( 'SQC_PLUGIN_ASSET_URL', plugin_dir_url( __FILE__ ) . 'assets/' );
        define( 'SQC_VERSION', self::VERSION );
    }

    function load_dependencies() {
        require_once SQC_PLUGIN_DIR . 'includes/class-sqc-asset-manager.php';
        require_once SQC_PLUGIN_DIR . 'includes/class-sqc-display.php';

    }

    function initialize() {
        new SQC_Asset_Manager();
        new SQC_Display();
    }
}

// new SQC_Plugin();

add_action( "plugin_loaded", function () {
    new SQC_Plugin();
} );