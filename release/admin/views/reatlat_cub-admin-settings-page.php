<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $wpdb;

$plugin = new reatlat_cub_Admin( $this->plugin_real_name, $this->plugin_name, $this->version );
$plugin->check_manage_links();
$plugin->check_settings();
$plugin->check_advanced();
$plugin->check_reset();
$plugin->enqueue_notices();


?>
<div class="wrap" id="reatlat_cub">

    <div class="reatlat_cub_notice animated fadeInDown" style="display: none;">
        <div class="reatlat_cub_notice__inner">
            <h3><span class="dashicons dashicons-share-alt"></span> Campaign URL Builder</h3>
            <p>The link has been copied to clipboard.</p>
        </div>
    </div>

	<h1><span class="dashicons dashicons-share-alt"></span> Campaign URL Builder <i class="reatlat_cub_by">by <a href="https://reatlat.net/?utm_source=wp_plugin&utm_medium=title_header&utm_campaign=<?php echo esc_attr( $plugin->plugin_real_name ); ?>" target="_blank">re[at]lat</a></i> </h1>

	<ul class="reatlat_cub_tabs">
		<li><a href="#reatlat_cub_tab-1" class="active"><span class="dashicons dashicons-dashboard"></span> Manage</a></li>
		<li><a href="#reatlat_cub_tab-2"><span class="dashicons dashicons-admin-settings"></span> Settings</a></li>
		<li><a href="#reatlat_cub_tab-3"><span class="dashicons dashicons-warning"></span> Advanced Settings</a></li>
		<li><a href="#reatlat_cub_tab-4"><span class="dashicons dashicons-welcome-learn-more"></span> Help</a></li>
	</ul>

	<div class="reatlat_cub_tabs_container">

        <?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-manage.php'; ?>
        <?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-settings.php'; ?>
        <?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-advanced.php'; ?>
        <?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-help.php'; ?>

	</div>

	<?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-sidebar.php'; ?>

</div>