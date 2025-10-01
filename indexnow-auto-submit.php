<?php
/*
Plugin Name: IndexNow Auto Submit
Description: Auto-submit published/updated posts, pages, and events (plus sitemap) to IndexNow. Keeps your site indexed faster.
Version: 1.0
Author: Matt Adlard
*/

if ( ! defined( 'ABSPATH' ) ) exit;

// === CONFIGURATION ===
// Replace this with your IndexNow key
define( 'INDEXNOW_KEY', 'YOUR_KEY_HERE' );

// URL to your sitemap
define( 'INDEXNOW_SITEMAP', '/sitemap.xml' );

// === FUNCTIONS ===

// Submit a single URL to IndexNow
function indexnow_submit_url( $url ) {
    $endpoint = "https://www.bing.com/indexnow?url=" . urlencode( $url ) . "&key=" . INDEXNOW_KEY;
    wp_remote_get( $endpoint );
}

// Submit sitemap to IndexNow
function indexnow_submit_sitemap() {
    $sitemap_url = home_url( INDEXNOW_SITEMAP );
    $endpoint = "https://www.bing.com/indexnow?url=" . urlencode( $sitemap_url ) . "&key=" . INDEXNOW_KEY;
    wp_remote_get( $endpoint );
}

// Hook into post save for posts, pages, and events
function indexnow_on_publish( $post_ID ) {
    if ( get_post_status( $post_ID ) !== 'publish' ) {
        return;
    }

    $post_type = get_post_type( $post_ID );
    $allowed_types = array( 'post', 'page', 'event' ); // add custom post types if needed

    if ( in_array( $post_type, $allowed_types ) ) {
        $url = get_permalink( $post_ID );
        indexnow_submit_url( $url );
        indexnow_submit_sitemap();
    }
}
add_action( 'save_post', 'indexnow_on_publish' );

// Submit homepage + sitemap on plugin activation
function indexnow_on_activate() {
    indexnow_submit_url( home_url() );
    indexnow_submit_sitemap();
}
register_activation_hook( __FILE__, 'indexnow_on_activate' );
