<?php if ( (bool)strpos( get_post_status(), 'draft' ) ) : ?>

    <p><?php _e('You can use this section only if the post is published', 'campaign-url-builder'); ?></p>

<?php else : ?>

    <div id="reatlat_cub_campaign-form--create-link" class="reatlat_cub_form">
        <table class="form-table">

            <tr>
                <th scope="row"><label for="campaign_page"><?php _e('Website URL', 'campaign-url-builder'); ?> <span class="required">*</span></label></th>
                <td>
                    <input name="campaign_page" placeholder="<?php _e('https://example.com/example-page/', 'campaign-url-builder'); ?>" type="text" id="campaign_page" value="<?php if ( ! empty(get_permalink()) ) { echo get_permalink(); } ?>" class="regular-text">
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
                    <input name="campaign_name" placeholder="<?php _e('Product, promo code, or slogan.', 'campaign-url-builder'); ?>" type="text" id="campaign_name" value="<?php echo esc_attr( $plugin->campaign_name ); ?>" class="regular-text">
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
            <input type="submit" name="submit_manage_links" id="submit_manage_links" class="button button-primary js-reatlat_cub--create-link" value="<?php _e('Generate Link', 'campaign-url-builder'); ?>">
        </p>

    </div>

<?php endif; ?>