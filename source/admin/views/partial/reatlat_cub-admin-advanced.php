<div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-3">

    <form method="POST" class="reatlat_cub_form">

        <h1 class="title"><?php _e('Advanced settings', 'campaign-url-builder'); ?></h1>

        <table class="form-table">
            <?php if ( current_user_can('administrator') ) : ?>
            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e('Show advanced settings only for Administrators', 'campaign-url-builder'); ?> <span class="dashicons dashicons-editor-help tippy" data-tippy-content="<?php _e('This option will enable advanced settings only for users with editor role Administrators', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="advanced_admin_only" <?php checked(get_option( $plugin->plugin_name . '_admin_only')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>
            <?php endif; ?>

            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e('Keep settings and data after delete the plugin', 'campaign-url-builder'); ?> <span class="dashicons dashicons-editor-help tippy" data-tippy-content="<?php _e('Enable this option for keep plugin settings and data(links) after you delete the plugin from WP', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="advanced_keep_settings" <?php checked(get_option( $plugin->plugin_name . '_keep_settings')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e('Enforce UTM field naming consistency', 'campaign-url-builder'); ?> <span class="dashicons dashicons-editor-help tippy" data-tippy-content="<?php _e('Automatically sanitize all UTM names. (discard all characters which are non-alphanumeric, convert all uppercase letters to lowercase, convert spaces to hyphen)', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="advanced_enforce_link_sanitize" <?php checked(get_option( $plugin->plugin_name . '_enforce_link_sanitize')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e('Keep original query parameters link', 'campaign-url-builder'); ?> <span class="dashicons dashicons-editor-help tippy" data-tippy-content="<?php _e('Enable this option for keep original query parameters from campaign target link.', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="advanced_keep_linkquery" <?php checked(get_option( $plugin->plugin_name . '_keep_linkquery')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e('Keep original anchor fragment link', 'campaign-url-builder'); ?> <span class="dashicons dashicons-editor-help tippy" data-tippy-content="<?php _e('Enable this option for keep original anchor/hashtag fragment from campaign target link.', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="advanced_keep_linkanchor" <?php checked(get_option( $plugin->plugin_name . '_keep_linkanchor')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e("Author's column in the table of UTM Links", 'campaign-url-builder'); ?> <span class="dashicons dashicons-editor-help tippy" data-tippy-content="<?php _e('Show or hide Author\'s column in the table of UTM Links', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="advanced_show_creator" <?php checked(get_option( $plugin->plugin_name . '_show_creator')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e("Show only own links for each user", 'campaign-url-builder'); ?> <span class="description"><?php _e("(except for the administrator)", 'campaign-url-builder'); ?></span><span class="dashicons dashicons-editor-help tippy" data-tippy-content="<?php _e('Show only own links for each user, except for the administrator user role. Administrator can manage all links.', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="advanced_show_useronly" <?php checked(get_option( $plugin->plugin_name . '_show_useronly')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e("Show meta boxes on post/page editor", 'campaign-url-builder'); ?> <span class="dashicons dashicons-editor-help tippy" data-tippy-content="<?php _e('When a user edits a post, the edit screen is composed of several default boxes: Editor, Publish, Categories, Tags, etc. These boxes are meta boxes. You can add Campaign-URL-Builder meta boxes to an edit screen of any post type.', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="advanced_metaboxes" <?php checked(get_option( $plugin->plugin_name . '_metaboxes')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="custom_domain"><?php _e("Custom domain", 'campaign-url-builder'); ?>
                        <span class="description"><?php _e("(optional)", 'campaign-url-builder'); ?></span>
                        <span class="dashicons dashicons-editor-help tippy" data-tippy-content="<?php _e('Set your own custom domain for short links.', 'campaign-url-builder'); ?>"></span>
                    </label>
                </th>
                <td>
                    <?php if ( empty( get_option( $plugin->plugin_name . '_custom_domain' ) ) ) { ?>
                        <input name="custom_domain" type="text" id="custom_domain" placeholder="<?php _e('go.example.com', 'campaign-url-builder'); ?>" value="" class="regular-text"><br>
                    <?php } else { ?>
                        <input name="custom_domain" type="text" disabled id="custom_domain" value="<?php $plugin->esc_custom_domain(); ?>" class="regular-text"><br>
                        <?php _e('Reset custom domain', 'campaign-url-builder'); ?>: <input type="checkbox" name="remove_custom_domain" value="1">
                    <?php } ?>
                </td>
            </tr>
        </table>

        <h2 class="title"><?php _e('URL Shortener API settings', 'campaign-url-builder'); ?></h2>
        <div class="reatlat_cub_form__settings--api">
            <div class="reatlat_cub_form__settings--api__checkbox">

                <div class="reatlat_cub_form__settings--api__bitly pvxs">
                    <input type="radio" name="advanced_api" id="advanced_api_bitly" required <?php checked($plugin->is_shortener_vendor( 'bitly' ) ); ?> value="bitly" />
                    <label for="advanced_api_bitly">
                        <?php _e('Bitly URL Shortener API endpoint', 'campaign-url-builder'); ?>
                    </label>
                    <div class="radio-if-active">
                        <table class="form-table">
                            <tr>
                                <th scope="row" class="ptn">
                                    <label for="bitly_api_key"><?php _e('Bitly OAuth key', 'campaign-url-builder'); ?> </label>
                                    <span class="description"><?php _e('(optional)', 'campaign-url-builder'); ?><br><?php _e('keep empty for use default one', 'campaign-url-builder'); ?></span>
                                </th>
                                <td>
                                    <?php if ( empty( get_option( $plugin->plugin_name . '_bitly_api_key' ) ) ) { ?>
                                        <input name="bitly_api_key" type="text" id="bitly_api_key" placeholder="<?php _e('Paste you Bitly OAuth key here...', 'campaign-url-builder'); ?>" value="" class="regular-text"><br>
                                    <?php } else { ?>
                                        <input name="bitly_api_key" type="text" disabled id="bitly_api_key" value="<?php $plugin->esc_shortener_api_key('bitly'); ?>" class="regular-text"><br>
                                        <?php _e('Reset OAuth key', 'campaign-url-builder'); ?>: <input type="checkbox" name="remove_bitly_api_key" value="1">
                                    <?php } ?>
                                    <?php
                                    printf(
                                        __('%sHow to get your %sBitly API key%s?%s', 'campaign-url-builder'),
                                        '<p class="description">',
                                        '<a class="reatlat_cub_tab_link" href="#reatlat_cub_tab-5">',
                                        '</a>',
                                        '</p>'
                                    );
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="reatlat_cub_form__settings--api__rebrandly pvxs">
                    <input type="radio" name="advanced_api" id="advanced_api_rebrandly" required <?php checked($plugin->is_shortener_vendor( 'rebrandly' ) ); ?> value="rebrandly" />
                    <label for="advanced_api_rebrandly" class="new-feature">
                        <?php _e('Rebrandly URL Shortener API', 'campaign-url-builder'); ?>
                    </label>
                    <div class="radio-if-active">
                        <table class="form-table">
                            <tr>
                                <th scope="row" class="ptn">
                                    <label for="rebrandly_api_key"><?php _e('Rebrandly API key', 'campaign-url-builder'); ?> </label>
                                    <span class="description"><?php _e('(optional)', 'campaign-url-builder'); ?><br><?php _e('keep empty for use default one', 'campaign-url-builder'); ?></span>
                                </th>
                                <td>
                                    <?php if ( empty( get_option( $plugin->plugin_name . '_rebrandly_api_key' ) ) ) { ?>
                                        <input name="rebrandly_api_key" type="text" id="rebrandly_api_key" placeholder="<?php _e('Paste you Rebrandly API key here...', 'campaign-url-builder'); ?>" value="" class="regular-text"><br>
                                    <?php } else { ?>
                                        <input name="rebrandly_api_key" type="text" disabled id="rebrandly_api_key" value="<?php $plugin->esc_shortener_api_key('rebrandly'); ?>" class="regular-text"><br>
                                        <?php _e('Reset API key', 'campaign-url-builder'); ?>: <input type="checkbox" name="remove_rebrandly_api_key" value="1">
                                    <?php } ?>
                                    <?php
                                    printf(
                                        __('%sHow to get your %sRebrandly API key%s?%s', 'campaign-url-builder'),
                                        '<p class="description">',
                                        '<a class="reatlat_cub_tab_link" href="#reatlat_cub_tab-5">',
                                        '</a>',
                                        '</p>'
                                    );
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php wp_nonce_field('submit_advanced', 'Campaign-URL-Builder__submit_advanced--nonce'); ?>

        <p class="submit">
            <input type="submit" name="submit_advanced" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'campaign-url-builder'); ?>">
        </p>

    </form>

    <?php if ( current_user_can('administrator') ) : ?>

    <hr>

    <form method="POST" class="reatlat_cub_form">
        <h2 class="title"><span class="required"><?php _e('Danger zone', 'campaign-url-builder'); ?></span></h2>
        <p><input type="checkbox" id="reset_links" name="reset_links"> <label for="reset_links"><?php _e('Delete all campaign-links from DataBase', 'campaign-url-builder'); ?></label> </p>
        <p><input type="checkbox" id="reset_mediums" name="reset_mediums"> <label for="reset_mediums"><?php _e('Reset to default - Mediums', 'campaign-url-builder'); ?></label> </p>
        <p><input type="checkbox" id="reset_sources" name="reset_sources"> <label for="reset_sources"><?php _e('Reset to default - Sources', 'campaign-url-builder'); ?></label> </p>
        <p><input type="checkbox" id="reset_options" name="reset_options"> <label for="reset_options"><?php _e('Reset settings and options to default', 'campaign-url-builder'); ?></label> </p>
        <p><input type="checkbox" id="reset_all" name="reset_all"> <label for="reset_all"><span class="required"><?php _e('Reset All plugin settings and data', 'campaign-url-builder'); ?></span></label> </p>
        <?php wp_nonce_field('submit_reset', 'Campaign-URL-Builder__submit_reset--nonce'); ?>
        <p class="submit">
            <input type="submit" onclick="return confirm('Campaign URL Builder\n\nReset settings & data\n\nAre you sure?')" name="submit_reset" id="submit" class="button button-secondary" value="<?php _e('Reset settings & data', 'campaign-url-builder'); ?>">
        </p>
    </form>
    <?php endif; ?>
</div>
