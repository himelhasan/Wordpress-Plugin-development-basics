<?php

/*
 * Plugin Name:       Hooks (Action and Filter)
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
 * Text Domain:       my-basics-plugin
 * Domain Path:       /Hooks-action-and-Filter

 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class wp_hooks_demo {
    public function __construct() {
        add_filter( "the_content", [$this, "change_content"] );
        add_filter( "the_title", [$this, "change_tittle_to_red"] );
        add_filter( "admin_footer_text", [$this, "change_admin_footer_text"] );

        add_action( "admin_notices", [$this, "display_our_notice"] );
        add_action( "wp_footer", [$this, "display_footer_text"] );
        add_action( "wp_head", [$this, "display_head_script"], 999 );
        add_action( "admin_footer", [$this, "add_admin_footer_text"] );
    }

    public function add_admin_footer_text() {
        echo "<p style='text-align:center'> coderscrown. </p>";
    }

    public function change_admin_footer_text( $admin_footer_text ) {
        return "$admin_footer_text  Developed by Himel Hasan";
    }

    public function display_head_script() {
        echo "<script> console.log('header script loaded') </script>";
    }

    public function display_footer_text() {
        echo "<script> console.log('hey bro') </script>";
    }

    public function display_our_notice() {

        echo "<div class='notice notice-success is-dismissible'>
           <p>This is our first custom admin notice!</p> </div>";
    }

    public function change_content( $content ) {

        if ( is_single() ) {

            $content .= "<p>This content is added by using action hook.</p>";
            return $content;
        }
        return $content;
    }

    public function change_tittle_to_red( $title ) {

        $id = get_the_id();
        if ( is_archive() ) {

            return "<span style='color: red;'>  $title - $id </span>";
        }
        return $title;
    }

}

new wp_hooks_demo();

class hoaf_post_reading_time {
    public function __construct() {
        add_filter( "the_content", [$this, "add_reading_time_to_content"] );
    }

    public function add_reading_time_to_content( $content ) {
        if ( is_single() ) {
            $word_count    = str_word_count( strip_tags( $content ) );
            $reading_time  = ceil( $word_count / 150 );
            $reading_times = "<p><strong>Estimated Reading Time: " . $reading_time . " minutes</strong></p><br/>";
            $content       = $reading_times . $content;
            return $content;
        }
        return $content;
    }

}

new hoaf_post_reading_time();