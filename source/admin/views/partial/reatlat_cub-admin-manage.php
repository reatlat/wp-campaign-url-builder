<div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-1 active">

    <h3><?php _e('Existing generated links', 'campaign-url-builder'); ?></h3>
    <div class="reatlat_cub_result">

        <table class="wp-list-table widefat fixed striped pages">
            <thead>
                <tr>
                    <td class="campaign_info"><?php _e('Stats', 'campaign-url-builder'); ?></td>
                    <td><?php _e('Campaign Name', 'campaign-url-builder'); ?></td>
                    <td><?php _e('Short Link', 'campaign-url-builder'); ?></td>
                    <td><?php _e('Full Link', 'campaign-url-builder'); ?></td>
                    <?php if ( get_option( $this->plugin_name . '_show_creator') ) : ?>
                        <td><?php _e('Creator', 'campaign-url-builder'); ?></td>
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
                        <a target="_blank" title="<?php _e('Open Analytics data', 'campaign-url-builder'); ?>" href="https://goo.gl/info/3br2tn"><span class='dashicons dashicons-chart-area'></span></a>
                    </td>
                    <td class="campaign_name"><strong><?php _e('Example link', 'campaign-url-builder'); ?></strong></td>
                    <td class="campaign_short_link" title="<?php _e('Copy to clipboard', 'campaign-url-builder'); ?>" data-clipboard-text="https://goo.gl/3br2tn" data-copy="true" >https://goo.gl/3br2tn<span class="dashicons dashicons-clipboard"></span></td>
                    <td class="campaign_full_link" title="<?php _e('Copy to clipboard', 'campaign-url-builder'); ?>" data-clipboard-text="https://wordpress.org/support/view/plugin-reviews/campaign-url-builder?rate=5#postform" data-copy="true">http://example.com/?utm_source=affiliate&utm_medium=banner&utm_campaign=Example+link<span class="dashicons dashicons-clipboard"></span></td>
                    <?php if ( get_option( $this->plugin_name . '_show_creator') ) : ?>
                        <td class="user_id">Alex Zappa <small>(<?php _e('Plugin Author', 'campaign-url-builder'); ?>)</small></td>
                    <?php endif; ?>
                    <td class="remove_link" title="<?php _e('Remove link', 'campaign-url-builder'); ?>"><span class="remove_link__inner demo js-remove-link"><span class="dashicons dashicons-trash"></span></span></td>
                </tr>
                <?php
            } else {
                foreach ( $links as $key => $link )
                {
                    ?>
                    <tr class="wow fadeInUp" data-link-id="<?php echo esc_attr( $link->id ); ?>">
                        <?php if ( strpos( esc_url_raw( $link->campaign_short_link ), 'https://goo.gl') !== false) { ?>
                            <td data-info="true" class="campaign_info">
                                <a target="_blank" title="<?php _e('Open Analytics data', 'campaign-url-builder'); ?>" href="<?php echo str_replace('https://goo.gl','https://goo.gl/info', esc_url_raw( $link->campaign_short_link ) ); ?>"><span class='dashicons dashicons-chart-area'></span></a>
                            </td>
                        <?php } else { ?>
                            <td class="campaign_info"></td>
                        <?php } ?>
                        <td class="campaign_name"><strong><?php echo esc_attr( $link->campaign_name ); ?></strong></td>
                        <td class="campaign_short_link" <?php if ( esc_url_raw( $link->campaign_short_link ) !== 'n/a' ) { ?>title="Copy to clipboard" data-clipboard-text="<?php echo esc_url_raw( $link->campaign_short_link ); ?>" data-copy="true" <?php } ?> ><?php echo esc_url_raw( $link->campaign_short_link ); ?><?php if ( esc_url_raw( $link->campaign_short_link ) !== 'n/a' ) { ?><span class="dashicons dashicons-clipboard"></span><?php } ?></td>
                        <td class="campaign_full_link" title="<?php _e('Copy to clipboard', ''); ?>" data-clipboard-text="<?php echo esc_url_raw( $link->campaign_full_link ); ?>" data-copy="true"><?php echo esc_url_raw( $link->campaign_full_link ); ?><span class="dashicons dashicons-clipboard"></span></td>
                        <?php if ( get_option( $this->plugin_name . '_show_creator') ) : ?>
                            <td class="user_id"><?php echo sanitize_user( get_userdata($link->user_id)->display_name ); ?><br><small>(<?php echo esc_attr( implode(', ', get_userdata($link->user_id)->roles) ); ?>)</small></td>
                        <?php endif; ?>
                        <td class="remove_link" title="<?php _e('Remove link','campaign-url-builder'); ?>">
                            <form method="POST">
                                <input name="remove_link_id" type="number" value="<?php echo esc_attr( $link->id ); ?>" hidden>
                                <button type="submit" name="remove_link_id_submit" class="remove_link__inner js-remove-link" onclick="return confirm('<?php _e('Campaign URL Builder', 'campaign-url-builder'); ?>\n\n<?php _e('Remove link', 'campaign-url-builder'); ?>: <?php echo esc_url_raw( $link->campaign_full_link ); ?>\n\n<?php _e('Are you sure?', 'campaign-url-builder'); ?>')"><span class="dashicons dashicons-trash"></span></button>
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
