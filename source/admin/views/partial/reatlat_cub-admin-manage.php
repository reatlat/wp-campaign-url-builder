<div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-1 active">
    <h3><?php _e('Create a tracking link', 'campaign-url-builder'); ?></h3>
    <form method="POST" id="reatlat_cub_campaign-form" class="reatlat_cub_form">
        <table class="form-table">

            <tr>
                <th scope="row"><label for="campaign_page"><?php _e('Website URL', 'campaign-url-builder'); ?> <span class="required">*</span></label></th>
                <td><input name="campaign_page" placeholder="<?php _e('https://example.com/example-page/', 'campaign-url-builder'); ?>" type="text" id="campaign_page" value="<?php echo esc_attr( $plugin->campaign_page ); ?>" class="regular-text">
                    <p class="description"><?php _e('The full website URL (e.g. https://example.com/example-page/)', 'campaign-url-builder'); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="campaign_source"><?php _e('Campaign Source', 'campaign-url-builder'); ?> <span class="required">*</span></label></th>
                <td>
                    <select name="campaign_source">
                        <?php
                        $sources = $plugin->get_sources();
                        foreach ($sources as $source) {
                            ?>
                            <option value="<?php echo esc_attr( $source->source_name ); ?>" <?php if( $source->source_name === $plugin->campaign_source ) { echo " selected='selected' ";} ?>><?php echo esc_attr( $source->source_name ); ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <p class="description"><?php _e('The referrer: (e.g. google, newsletter)', 'campaign-url-builder'); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="campaign_medium"><?php _e('Campaign Medium', 'campaign-url-builder'); ?> <span class="required">*</span></label></th>
                <td>
                    <select name="campaign_medium">
                        <?php
                        $mediums = $plugin->get_mediums();
                        foreach ($mediums as $medium) {
                            ?>
                            <option value="<?php echo esc_attr( $medium->medium_name ); ?>" <?php if( $medium->medium_name === $plugin->campaign_medium ) { echo " selected='selected' "; } ?>><?php echo esc_attr( $medium->medium_name ); ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <p class="description"><?php _e('Marketing medium: (e.g. cpc, banner, email)', 'campaign-url-builder'); ?></p>

                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="campaign_name"><?php _e('Campaign Name', 'campaign-url-builder'); ?> <span class="required">*</span></label>
                </th>
                <td>
                    <input name="campaign_name" placeholder="<?php _e('Product, promo code, or slogan.', ''); ?>" type="text" id="campaign_name" value="<?php echo esc_attr( $plugin->campaign_name ); ?>" class="regular-text">
                    <p class="description"><?php _e('The Campaign Name will be formatted once submitted.', 'campaign-url-builder'); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="campaign_term"><?php _e('Campaign Term', 'campaign-url-builder'); ?></label>
                    <span class="description"><?php _e('(optional)', 'campaign-url-builder'); ?></span>
                </th>
                <td>
                    <input name="campaign_term" placeholder="<?php _e('Identify the paid keywords', 'campaign-url-builder'); ?>" type="text" id="campaign_term" value="<?php echo esc_attr( $plugin->campaign_term ); ?>" class="regular-text">
                    <p class="description"><?php _e('The Campaign Term will be formatted once submitted.', 'campaign-url-builder'); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="campaign_content"><?php _e('Campaign Content', 'campaign-url-builder'); ?></label>
                    <span class="description"><?php _e('(optional)', 'campaign-url-builder'); ?></span>
                </th>
                <td>
                    <input name="campaign_content" placeholder="<?php _e('Use to differentiate ads', 'campaign-url-builder'); ?>" type="text" id="campaign_content" value="<?php echo esc_attr( $plugin->campaign_content ); ?>" class="regular-text">
                    <p class="description"><?php _e('The Campaign Content will be formatted once submitted.', 'campaign-url-builder'); ?></p>
                </td>
            </tr>

            <?php for ($x = 1; $x <= 3; $x++) : ?>

            <tr class="reatlat_cub_custom-params disabled">
                <th scope="row">
                    <?php
                    printf(
                        '<label for="custom_key_%s">%s<span class="description">%s</span></label>',
                        $x,
                        __('Additional Parameters', 'campaign-url-builder'),
                        __('(optional)', 'campaign-url-builder')
                    );
                    ?>
                </th>
                <td>
                    <input name="custom_key_<?php echo $x; ?>" placeholder="<?php _e('Custom Key', 'campaign-url-builder'); ?>" type="text" id="custom_key_<?php echo $x; ?>" value="" class="regular-text">
                    <input name="custom_value_<?php echo $x; ?>" placeholder="<?php _e('Custom Value', 'campaign-url-builder'); ?>" type="text" id="custom_value_<?php echo $x; ?>" value="" class="regular-text">
                    <p class="description"><?php _e('It will generate a custom pair "key" and "value".', 'campaign-url-builder'); ?></p>
                </td>
            </tr>

            <?php endfor; ?>

        </table>

        <p class="reatlat_cub_add_custom-params clickable"><span class="dashicons dashicons-plus"></span> <?php _e('Add additional parameters', 'campaign-url-builder'); ?></p>

        <p class="submit">
            <input type="submit" name="submit_manage_links" id="submit" class="button button-primary" value="<?php _e('Generate Link', 'campaign-url-builder'); ?>">
        </p>

    </form>

    <hr>

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
                            <td class="user_id"><?php echo sanitize_user( get_userdata($link->user_id)->display_name ); ?> <small>(<?php echo esc_attr( implode(', ', get_userdata($link->user_id)->roles) ); ?>)</small></td>
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
