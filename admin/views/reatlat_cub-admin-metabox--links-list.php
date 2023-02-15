<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$plugin = new reatlat_cub_Admin( $this->plugin_real_name, $this->plugin_name, $this->version );
?>

<div class="wrap wrap--metabox" id="reatlat_cub">

    <?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-notice-clipboard.php'; ?>

    <div class="reatlat_cub_tabs_container">

        <div class="reatlat_cub_container">

            <div class="reatlat_cub_result__table_pagination reatlat_cub_result__table_pagination--metabox" data-rows-per-page="7" data-current-page="1">
                <span class="table_pagination__currentpage"></span>&nbsp;
                <button name="sortTable--prev" class="js-sortTable--prev"><span class="dashicons dashicons-arrow-left-alt2"></span></button>
                <button name="sortTable--next" class="js-sortTable--next"><span class="dashicons dashicons-arrow-right-alt2"></span></button>
            </div>

            <?php include dirname( __FILE__ ) . '/partial/reatlat_cub-admin-links-list.php'; ?>

        </div>

    </div>

</div>