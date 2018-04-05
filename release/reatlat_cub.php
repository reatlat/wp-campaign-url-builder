<?php
/**
 * Plugin Name:       Campaign URL Builder
 * Plugin URI:        https://wordpress.org/plugins/campaign-url-builder
 * Description:       Generates links for Analytics tools and short link. Enter your Campaign Name, Source, Medium (UTM link) to generate a full link and a short link (trough the Google URL Shortener API) all in once
 * Version:           1.3.1
 * Author:            Alex Zappa a.k.a. re[at]lat
 * Author URI:        https://reatlat.net
 * Donate link:       https://www.paypal.me/reatlat/5usd
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       campaign-url-builder
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) )
{
	die;
}


function activate_reatlat_cub()
{

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-reatlat_cub.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-reatlat_cub-activator.php';
	
	$plugin_ = new reatlat_cub();
	$activation = new reatlat_cub_Activator( $plugin_->get_plugin_name() );
	$activation->run();

}

function deactivate_reatlat_cub()
{

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-reatlat_cub.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-reatlat_cub-deactivator.php';
	
	$plugin_ = new reatlat_cub();
	$plugin = new reatlat_cub_Deactivator( $plugin_->get_plugin_name() );
	$plugin->deactivate();

}

register_activation_hook( __FILE__, 'activate_reatlat_cub' );
register_deactivation_hook( __FILE__, 'deactivate_reatlat_cub' );

define( 'CUB_VERSION',   '1.3.1');
define( 'CUB_NAME',      'reatlat_cub');
define( 'CUB_REAL_NAME', 'campaign-url-builder');

require plugin_dir_path( __FILE__ ) . 'includes/class-reatlat_cub.php';

$plugin = new reatlat_cub();
$plugin->run();

