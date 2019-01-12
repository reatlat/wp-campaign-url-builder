<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $wpdb;

$plugin = new reatlat_cub_Admin( $this->plugin_real_name, $this->plugin_name, $this->version );
$plugin->check_manage_links();
$plugin->check_settings();
$plugin->check_advanced();
$plugin->check_shortcode_settings();
$plugin->check_reset();

$plugin->remove_link_id();

$plugin->enqueue_notices();


?>
<div class="wrap <?php echo get_locale(); ?>" id="reatlat_cub">

    <?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-notice-clipboard.php'; ?>

    <h1><span class="dashicons dashicons-share-alt"></span> <?php _e('Campaign URL Builder', 'campaign-url-builder'); ?> <i class="reatlat_cub_by">by <a href="https://reatlat.net/?utm_source=wp_plugin&utm_medium=title_header&utm_campaign=<?php echo esc_attr( $plugin->plugin_real_name ); ?>" target="_blank">re[at]lat</a></i> </h1>

	<ul class="reatlat_cub_tabs">
		<li><a href="#reatlat_cub_tab-0"><span class="dashicons dashicons-plus"></span> <?php _e('Create link', 'campaign-url-builder'); ?></a></li>
		<li><a href="#reatlat_cub_tab-1" class="active"><span class="dashicons dashicons-dashboard"></span> <?php _e('Manage links', 'campaign-url-builder'); ?></a></li>
		<li><a href="#reatlat_cub_tab-2"><span class="dashicons dashicons-admin-settings"></span> <?php _e('Settings', 'campaign-url-builder'); ?></a></li>
        <?php if ( current_user_can('administrator') || ! get_option( $this->plugin_name . '_admin_only' ) ) : ?>
        <li><a href="#reatlat_cub_tab-3"><span class="dashicons dashicons-warning"></span> <?php _e('Advanced Settings', 'campaign-url-builder'); ?></a></li>
        <?php endif; ?>
        <li class="new-feature"><a href="#reatlat_cub_tab-4"><span class="dashicons dashicons-editor-code"></span> <?php _e('Shortcode', 'campaign-url-builder'); ?></a></li>
        <li><a href="#reatlat_cub_tab-5"><span class="dashicons dashicons-welcome-learn-more"></span> <?php _e('Knowledge base', 'campaign-url-builder'); ?></a></li>
	</ul>

	<div class="reatlat_cub_tabs_container">

        <?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-create.php'; ?>
        <?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-manage.php'; ?>
        <?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-settings.php'; ?>
        <?php if ( current_user_can('administrator') || ! get_option( $this->plugin_name . '_admin_only' ) ) : ?>
        <?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-advanced.php'; ?>
        <?php endif; ?>
        <?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-shortcode.php'; ?>
        <?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-kb.php'; ?>

	</div>

	<?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-sidebar.php'; ?>

</div>