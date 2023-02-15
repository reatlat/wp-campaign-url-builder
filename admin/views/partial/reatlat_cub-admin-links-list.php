<div class="reatlat_cub_result">

    <table id="reatlat_cub_result__table" class="wp-list-table widefat fixed striped pages reatlat_cub_result__table">
        <thead>
        <tr class="reatlat_cub_result__table__headrow">
            <th class="campaign_info"><?php _e('Stats', 'campaign-url-builder'); ?></th>
            <th class="campaign_name"><?php _e('Campaign Name', 'campaign-url-builder'); ?></th>
            <th class="campaign_short_link"><?php _e('Short Link', 'campaign-url-builder'); ?></th>
            <th class="campaign_full_link"><?php _e('Full Link', 'campaign-url-builder'); ?></th>
            <?php if ( get_option( $this->plugin_name . '_show_creator') ) : ?>
                <th class="campaign_user_id"><?php _e('Creator', 'campaign-url-builder'); ?></th>
            <?php endif; ?>
            <?php if ( isset($_GET['page']) && $_GET['page'] === 'reatlat_cub-settings-page' ) : ?>
            <th class="campaign_remove_link"></th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody class="reatlat_cub_links-list">
        <?php

        $links = $plugin->get_links();

        if ( count($links) < 1 )
        {
            // Demo example link
            ?>
            <tr class="reatlat_cub_link-on-list first-link reatlat_cub_non-highlight" data-link-key="0">
                <td data-info="true" class="campaign_info tippy--hover" data-tippy-content="<?php _e('Open Analytics data', 'campaign-url-builder'); ?>">
                    <a target="_blank" href="https://goo.gl/info/3br2tn"><span class='dashicons dashicons-chart-area'></span></a>
                </td>
                <td class="campaign_name"><strong><?php _e('Example link', 'campaign-url-builder'); ?></strong></td>
                <td class="campaign_short_link tippy--hover" data-tippy-content="<?php _e('Click cell to copy to clipboard', 'campaign-url-builder'); ?>" data-clipboard-text="https://goo.gl/3br2tn" data-copy="true" >https://goo.gl/3br2tn<span class="dashicons dashicons-clipboard"></span></td>
                <td class="campaign_full_link tippy--hover" data-tippy-content="<?php _e('Click cell to copy to clipboard', 'campaign-url-builder'); ?>" data-clipboard-text="https://wordpress.org/support/view/plugin-reviews/campaign-url-builder?rate=5#postform" data-copy="true">http://example.com/?utm_source=affiliate&utm_medium=banner&utm_campaign=Example+link<span class="dashicons dashicons-clipboard"></span></td>
                <?php if ( get_option( $this->plugin_name . '_show_creator') ) : ?>
                    <td class="campaign_user_id">Alex Zappa<br><small>(<?php _e('Plugin Author', 'campaign-url-builder'); ?>)</small></td>
                <?php endif; ?>
                <?php if ( isset($_GET['page']) && $_GET['page'] === 'reatlat_cub-settings-page' ) : ?>
                <td class="campaign_remove_link tippy--hover" data-tippy-content="<?php _e('Remove link', 'campaign-url-builder'); ?>"><span class="campaign_remove_link__inner demo js-remove-link"><span class="dashicons dashicons-trash"></span></span></td>
                <?php endif; ?>
            </tr>
            <?php
        } else {
            foreach ( $links as $key => $link )
            {
                ?>
                <tr class="reatlat_cub_link-on-list <?php if ( $key === 0 ) { echo 'first-link'; } ?>" data-link-key="<?php echo $key; ?>" data-link-id="<?php echo esc_attr( $link->id ); ?>">

                    <?php if ( $plugin->strpos_array( esc_url_raw( $link->campaign_short_link ), array('://goo.gl', '://bit.ly', '://rebrand.ly') ) ) : ?>
                        <td data-info="true" class="campaign_info tippy--hover" data-tippy-content="<?php _e('Open Analytics data', 'campaign-url-builder'); ?>">
                            <a target="_blank" href="<?php $plugin->esc_info_link($link->campaign_short_link); ?>"><span class='dashicons dashicons-chart-area'></span></a>
                        </td>
                    <?php else : ?>
                        <td class="campaign_info"></td>
                    <?php endif; ?>

                    <td class="campaign_name"><strong><?php echo esc_attr( $link->campaign_name ); ?></strong></td>

                    <?php if ( esc_attr( $link->campaign_short_link ) !== 'n/a' ) : ?>
                        <td class="campaign_short_link tippy--hover" data-tippy-content="<?php _e('Click cell to copy to clipboard', 'campaign-url-builder'); ?>" data-clipboard-text="<?php echo esc_url_raw( $link->campaign_short_link ); ?>" data-copy="true"><?php echo esc_url_raw( $link->campaign_short_link ); ?><span class="dashicons dashicons-clipboard"></span></td>
                    <?php else : ?>
                        <td class="campaign_short_link"><?php echo esc_attr( $link->campaign_short_link ); ?></td>
                    <?php endif; ?>

                    <td class="campaign_full_link tippy--hover" data-tippy-content="<?php _e('Click cell to copy to clipboard', 'campaign-url-builder'); ?>" data-clipboard-text="<?php echo esc_url_raw( $link->campaign_full_link ); ?>" data-copy="true"><?php echo esc_url_raw( $link->campaign_full_link ); ?><span class="dashicons dashicons-clipboard"></span></td>

                    <?php if ( get_option( $this->plugin_name . '_show_creator') ) : ?>
                        <?php if ( $link->user_id == 0 ) : ?>
                            <td class="campaign_user_id"><?php _e('Anonymous', 'campaign-url-builder'); ?><br><small>(frontend-ajax)</small></td>
                        <?php else : ?>
                            <td class="campaign_user_id"><?php echo sanitize_user( get_userdata($link->user_id)->display_name ); ?><br><small>(<?php echo esc_attr( implode(', ', get_userdata($link->user_id)->roles) ); ?>)</small></td>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php //TODO: show remove button only for admin or for user who create link ?>
                    <?php if ( isset($_GET['page']) && $_GET['page'] === 'reatlat_cub-settings-page' ) : ?>
                    <td class="campaign_remove_link tippy--hover" data-tippy-content="<?php _e('Remove link','campaign-url-builder'); ?>">
                        <form method="POST">
                            <input name="remove_link_id" type="number" value="<?php echo esc_attr( $link->id ); ?>" hidden>
                            <button type="submit" name="remove_link_id_submit"
                                    class="campaign_remove_link__inner js-remove-link"
                                    onclick="return confirm('<?php _e('Campaign URL Builder', 'campaign-url-builder'); ?>\n\n<?php _e('Remove link', 'campaign-url-builder'); ?>: <?php echo esc_url_raw( $link->campaign_full_link ); ?>\n\n<?php _e('Are you sure?', 'campaign-url-builder'); ?>')">
                                <span class="dashicons dashicons-trash"></span>
                            </button>
                        </form>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php
            }
        }

        ?>
        </tbody>
    </table>

</div>