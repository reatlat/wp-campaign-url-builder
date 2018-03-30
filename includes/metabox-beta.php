
/**
 * Register meta box(es).
 */
function wpdocs_register_meta_boxes() {
    add_meta_box( 'meta-box-id', __( 'Campaign URL Builder (BETA)', 'textdomain' ), 'wpdocs_my_display_callback', 'post' );
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function wpdocs_my_display_callback( $post ) {
    // Display code/markup goes here. Don't forget to include nonces!
    $plugin = new reatlat_cub_Admin('campaign-url-builder', 'reatlat_cub', '1.2.1');
    ?>
    <div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-1 active">
    <h3>Existing generated links</h3>
    <div class="reatlat_cub_result">

        <table class="wp-list-table widefat fixed striped pages">
            <thead>
            <tr>
                <td class="campaign_info">Stats</td>
                <td>Campaign Name</td>
                <td>Short Link</td>
                <td>Full Link</td>
                <?php if ( get_option( 'reatlat_cub_show_creator') ) : ?>
                    <td>Creator</td>
                <?php endif; ?>
                <td class="remove_link"></td>
            </tr>
            </thead>
            <tbody>
            <?php

            $links = $plugin->get_links();

            if ( count($links) < 1 )
            {
                // Demo example link
                ?>
                <tr class="reatlat_cub_non-highlight wow fadeInUp">
                    <td data-info="true" class="campaign_info">
                        <a target="_blank" title="Open Analytics data" href="https://goo.gl/info/3br2tn"><span class='dashicons dashicons-chart-area'></span></a>
                    </td>
                    <td class="campaign_name"><strong>Example link</strong></td>
                    <td class="campaign_short_link" title="Copy to clipboard" data-clipboard-text="https://goo.gl/3br2tn" data-copy="true" >https://goo.gl/3br2tn<span class="dashicons dashicons-clipboard"></span></td>
                    <td class="campaign_full_link" title="Copy to clipboard" data-clipboard-text="https://wordpress.org/support/view/plugin-reviews/campaign-url-builder?rate=5#postform" data-copy="true">http://example.com/?utm_source=affiliate&utm_medium=banner&utm_campaign=Example+link<span class="dashicons dashicons-clipboard"></span></td>
                    <?php if ( get_option( 'reatlat_cub_show_creator') ) : ?>
                        <td class="user_id">Alex Zappa <small>(Plugin Author)</small></td>
                    <?php endif; ?>
                    <td class="remove_link" title="Remove link"><span class="remove_link__inner demo js-remove-link"><span class="dashicons dashicons-trash"></span></span></td>
                </tr>
                <?php
            } else {
                foreach ( $links as $key => $link )
                {
                    ?>
                    <tr class="wow fadeInUp" data-link-id="<?php echo esc_attr( $link->id ); ?>">
                        <?php if ( strpos( esc_url_raw( $link->campaign_short_link ), 'https://goo.gl') !== false) { ?>
                            <td data-info="true" class="campaign_info">
                                <a target="_blank" title="Open Analytics data" href="<?php echo str_replace('https://goo.gl','https://goo.gl/info', esc_url_raw( $link->campaign_short_link ) ); ?>"><span class='dashicons dashicons-chart-area'></span></a>
                            </td>
                        <?php } else { ?>
                            <td class="campaign_info"></td>
                        <?php } ?>
                        <td class="campaign_name"><strong><?php echo esc_attr( $link->campaign_name ); ?></strong></td>
                        <td class="campaign_short_link" <?php if ( esc_url_raw( $link->campaign_short_link ) !== 'n/a' ) { ?>title="Copy to clipboard" data-clipboard-text="<?php echo esc_url_raw( $link->campaign_short_link ); ?>" data-copy="true" <?php } ?> ><?php echo esc_url_raw( $link->campaign_short_link ); ?><?php if ( esc_url_raw( $link->campaign_short_link ) !== 'n/a' ) { ?><span class="dashicons dashicons-clipboard"></span><?php } ?></td>
                        <td class="campaign_full_link" title="Copy to clipboard" data-clipboard-text="<?php echo esc_url_raw( $link->campaign_full_link ); ?>" data-copy="true"><?php echo esc_url_raw( $link->campaign_full_link ); ?><span class="dashicons dashicons-clipboard"></span></td>
                        <?php if ( get_option( 'reatlat_cub_show_creator') ) : ?>
                            <td class="user_id"><?php echo sanitize_user( get_userdata($link->user_id)->display_name ); ?> <small>(<?php echo esc_attr( implode(', ', get_userdata($link->user_id)->roles) ); ?>)</small></td>
                        <?php endif; ?>
                        <td class="remove_link" title="Remove link">
                            <form method="POST">
                                <input name="remove_link_id" type="number" value="<?php echo esc_attr( $link->id ); ?>" hidden>
                                <button type="submit" name="remove_link_id_submit" class="remove_link__inner js-remove-link" onclick="return confirm('Campaign URL Builder\n\nRemove link: <?php echo esc_url_raw( $link->campaign_full_link ); ?>\n\nAre you sure?')"><span class="dashicons dashicons-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            }

            ?>
            </tbody>
        </table>
    </div>

</div>
<?php
//    require_once plugin_dir_url('campaign-url-builder')."/admin/views/partial/reatlat_cub-admin-manage.php";

}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function wpdocs_save_meta_box( $post_id ) {
    // Save logic goes here. Don't forget to include nonce checks!
}
add_action( 'save_post', 'wpdocs_save_meta_box' );
