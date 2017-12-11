<div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-1 active">
    <h3>Create a tracking link</h3>
    <form method="POST" id="reatlat_cub_campaign-form" class="reatlat_cub_form">
        <table class="form-table">

            <tr>
                <th scope="row"><label for="campaign_page">Website URL <span class="required">*</span></label></th>
                <td><input name="campaign_page" placeholder="<?php echo home_url(); ?>" type="text" id="campaign_page" value="<?php echo esc_attr( $plugin->campaign_page ); ?>" class="regular-text">
                    <p class="description">The full website URL (e.g. <?php echo home_url(); ?>)</p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="campaign_source">Campaign Source <span class="required">*</span></label></th>
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
                    <p class="description">The referrer: (e.g. google, newsletter)</p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="campaign_medium">Campaign Medium <span class="required">*</span></label></th>
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
                    <p class="description">Marketing medium: (e.g. cpc, banner, email)</p>

                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="campaign_name">Campaign Name <span class="required">*</span></label>
                </th>
                <td>
                    <input name="campaign_name" placeholder="Product, promo code, or slogan." type="text" id="campaign_name" value="<?php echo esc_attr( $plugin->campaign_name ); ?>" class="regular-text">
                    <p class="description">The Campaign Name will be formatted once submitted.</p>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="campaign_term">Campaign Term</label>
                    <span class="description">(optional)</span>
                </th>
                <td>
                    <input name="campaign_term" placeholder="Identify the paid keywords" type="text" id="campaign_term" value="<?php echo esc_attr( $plugin->campaign_term ); ?>" class="regular-text">
                    <p class="description">The Campaign Term will be formatted once submitted.</p>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="campaign_content">Campaign Content</label>
                    <span class="description">(optional)</span>
                </th>
                <td>
                    <input name="campaign_content" placeholder="Use to differentiate ads" type="text" id="campaign_content" value="<?php echo esc_attr( $plugin->campaign_content ); ?>" class="regular-text">
                    <p class="description">The Campaign Content will be formatted once submitted.</p>
                </td>
            </tr>

            <tr class="reatlat_cub_custom-params disabled">
                <th scope="row">
                    <label for="custom_key_1">Additional Parameters
                        <span class="description">(optional)</span>
                    </label>
                </th>
                <td>
                    <input name="custom_key_1" placeholder="Custom Key" type="text" id="custom_key_1" value="<?php echo esc_attr( $plugin->custom_key_1 ); ?>" class="regular-text">
                    <input name="custom_value_1" placeholder="Custom Value" type="text" id="custom_value_1" value="<?php echo esc_attr( $plugin->custom_value_1 ); ?>" class="regular-text">
                    <p class="description">It will generate a custom pair "key" and "value".</p>
                </td>
            </tr>

            <tr class="reatlat_cub_custom-params disabled">
                <th scope="row">
                    <label for="custom_key_2">Additional Parameters
                        <span class="description">(optional)</span>
                    </label>
                </th>
                <td>
                    <input name="custom_key_2" placeholder="Custom Key" type="text" id="custom_key_2" value="<?php echo esc_attr( $plugin->custom_key_2 ); ?>" class="regular-text">
                    <input name="custom_value_2" placeholder="Custom Value" type="text" id="custom_value_2" value="<?php echo esc_attr( $plugin->custom_value_2 ); ?>" class="regular-text">
                    <p class="description">It will generate a custom pair "key" and "value".</p>
                </td>
            </tr>

            <tr class="reatlat_cub_custom-params disabled">
                <th scope="row">
                    <label for="custom_key_3">Additional Parameters
                        <span class="description">(optional)</span>
                    </label>
                </th>
                <td>
                    <input name="custom_key_3" placeholder="Custom Key" type="text" id="custom_key_3" value="<?php echo esc_attr( $plugin->custom_key_3 ); ?>" class="regular-text">
                    <input name="custom_value_3" placeholder="Custom Value" type="text" id="custom_value_3" value="<?php echo esc_attr( $plugin->custom_value_3 ); ?>" class="regular-text">
                    <p class="description">It will generate a custom pair "key" and "value".</p>
                </td>
            </tr>

        </table>

        <p class="reatlat_cub_add_custom-params clickable"><span class="dashicons dashicons-plus"></span> Add additional parameters</p>

        <p class="submit">
            <input type="submit" name="submit_manage_links" id="submit" class="button button-primary" value="Generate Link">
        </p>

    </form>

    <hr>

    <h3>Existing generated links</h3>
    <div class="reatlat_cub_result">

        <table class="wp-list-table widefat fixed striped pages">
            <thead>
            <tr>
                <td class="campaign_info">Stats</td>
                <td>Campaign Name</td>
                <td>Short Link</td>
                <td>Full Link</td>
                <?php if ( get_option( $this->plugin_name . '_show_creator') ) : ?>
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
                    <?php if ( get_option( $this->plugin_name . '_show_creator') ) : ?>
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
                        <?php if ( get_option( $this->plugin_name . '_show_creator') ) : ?>
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
