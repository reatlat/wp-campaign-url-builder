<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $wpdb;

$plugin = new reatlat_cub_Admin( $this->plugin_real_name, $this->plugin_name, $this->version );

?>

<div class="wrap wrap--metabox" id="reatlat_cub">

    <div class="reatlat_cub_tabs_container">

        <div class="reatlat_cub_container">

            <?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-create-form.php'; ?>

        </div>

    </div>

</div>