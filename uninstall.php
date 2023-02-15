<?php 

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

if(  is_admin() ) {

	global $wpdb;
	$plugin_name = 'reatlat_cub';

	if ( ! get_option( $plugin_name . '_keep_settings' ) )
	{
        $wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . $plugin_name . '_links' );
        $wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . $plugin_name . '_mediums' );
        $wpdb->query( "DROP TABLE IF EXISTS " . $wpdb->prefix . $plugin_name . '_sources' );

        delete_option( $plugin_name . '_version' );
        delete_option( $plugin_name . '_advanced_api' );
        delete_option( $plugin_name . '_bitly_api_key' );
        delete_option( $plugin_name . '_google_api_key' );
        delete_option( $plugin_name . '_admin_only' );
        // delete_option( $plugin_name . '_keep_settings' );
        delete_option( $plugin_name . '_show_creator' );
        delete_option( $plugin_name . '_show_useronly' );
    }
}