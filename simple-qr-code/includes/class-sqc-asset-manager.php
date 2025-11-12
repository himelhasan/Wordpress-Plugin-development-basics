<?php

class SQC_Asset_Manager {

    public function __construct() {
        add_action( 'wp_enqueue_scripts', [$this, 'load_scripts'] );
        add_action( 'wp_enqueue_scripts', [$this, 'load_styles'] );

    }

    public function load_styles() {

        wp_enqueue_style(
            'sqc-style',
            SQC_PLUGIN_ASSET_URL . 'css/qrcode.css',
            [],
            SQC_VERSION );
    }

    public function load_scripts() {

        if ( ! is_singular() ) {
            return;
        }

        $js_files = [
            "sqc-script"          => "qrcode.js",
            "sqc-function-script" => "functions.js",
        ];

        foreach ( $js_files as $handle => $js_file ) {

            wp_enqueue_script(
                $handle,
                SQC_PLUGIN_ASSET_URL . "js" . "/" . $js_file,
                [],
                SQC_VERSION,
                true
            );
        }

        wp_enqueue_script(
            'sqc-cdn-qrcodejs',
            "https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js",
            [],
            SQC_VERSION,
            true
        );

        wp_localize_script(
            'sqc-script',       // Script handle to attach data to
            'simpleQRCodeData', // JavaScript object name
            [
                'currentUrl' => get_permalink(), // Current post/page URL
            ]
        );

    }

}