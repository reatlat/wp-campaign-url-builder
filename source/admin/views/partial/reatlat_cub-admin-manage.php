<div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-1 active">

    <h3><?php _e('Existing generated links', 'campaign-url-builder'); ?></h3>

    <div class="reatlat_cub_result__table_pagination" data-rows-per-page="15" data-current-page="1">
        <span class="table_pagination__currentpage"></span>&nbsp;
        <button name="sortTable--prev" class="js-sortTable--prev"><span class="dashicons dashicons-arrow-left-alt2"></span></button>
        <button name="sortTable--next" class="js-sortTable--next"><span class="dashicons dashicons-arrow-right-alt2"></span></button>
    </div>

    <button name="export_to_csv" class="export_to_csv js-export_to_csv"><span class="dashicons dashicons-media-spreadsheet"></span> <?php _e('Export CSV', 'campaign-url-builder'); ?></button>

    <?php include dirname( __FILE__ ) . '/reatlat_cub-admin-links-list.php'; ?>

</div>
