<div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-3">

    <form method="POST" class="reatlat_cub_form">

        <h1 class="title"><?php _e('Advanced settings', 'campaign-url-builder'); ?></h1>

        <table class="form-table">
            <?php if ( current_user_can('administrator') ) : ?>
            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e('Show advanced settings only for Administrators', 'campaign-url-builder'); ?> <span class="dashicons dashicons-editor-help tippy" title="<?php _e('This option will enable advanced settings only for users with editor role Administrators', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="advanced_admin_only" <?php checked(get_option( $this->plugin_name . '_admin_only')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>
            <?php endif; ?>

            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e('Keep settings and data after delete the plugin', 'campaign-url-builder'); ?> <span class="dashicons dashicons-editor-help tippy" title="<?php _e('Enable this option for keep plugin settings and data(links) after you delete the plugin from WP', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="advanced_keep_settings" <?php checked(get_option( $this->plugin_name . '_keep_settings')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e("Author's column in the table of UTM Links", 'campaign-url-builder'); ?> <span class="dashicons dashicons-editor-help tippy" title="<?php _e('Show or hide Author\'s column in the table of UTM Links', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="advanced_show_creator" <?php checked(get_option( $this->plugin_name . '_show_creator')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e("Show only own links for each user", 'campaign-url-builder'); ?> <span class="description"><?php _e("(except for the administrator)", 'campaign-url-builder'); ?></span><span class="dashicons dashicons-editor-help tippy" title="<?php _e('Show only own links for each user, except for the administrator user role. Administrator can manage all links.', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="advanced_show_useronly" <?php checked(get_option( $this->plugin_name . '_show_useronly')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e("Show meta boxes on post/page editor", 'campaign-url-builder'); ?> <span class="dashicons dashicons-editor-help tippy" title="<?php _e('When a user edits a post, the edit screen is composed of several default boxes: Editor, Publish, Categories, Tags, etc. These boxes are meta boxes. You can add Campaign-URL-Builder meta boxes to an edit screen of any post type.', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="advanced_metaboxes" <?php checked(get_option( $this->plugin_name . '_metaboxes')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>
        </table>

        <h2 class="title"><?php _e('Google URL Shortener API setting', 'campaign-url-builder'); ?></h2>
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="google_api_key"><?php _e('Google API key', 'campaign-url-builder'); ?> </label>
                    <span class="description"><?php _e('(optional)', 'campaign-url-builder'); ?><br><?php _e('keep empty for use default one', 'campaign-url-builder'); ?></span>
                </th>
                <td>
                    <?php if ( empty( get_option( $plugin->plugin_name . '_google_api_key' ) ) ) { ?>
                        <input name="google_api_key" type="text" id="google_api_key" placeholder="<?php _e('Paste you Google API key here...', 'campaign-url-builder'); ?>" value="" class="regular-text"><br>
                    <?php } else { ?>
                        <?php
                        $visible_google_api_key = str_repeat( '*', strlen( get_option( $plugin->plugin_name . '_google_api_key' ) ) - 5 ) . substr( get_option( $plugin->plugin_name . '_google_api_key' ), - 5 );
                        ?>
                        <input name="google_api_key" type="text" disabled id="google_api_key" value="<?php echo esc_attr( $visible_google_api_key ); ?>" class="regular-text"><br>
                        <?php _e('Reset API key', 'campaign-url-builder'); ?>: <input type="checkbox" name="remove_google_api_key" value="1">
                    <?php } ?>
                    <?php
                    printf(
                        __('%sHow to get your %sGoogle API key%s?%s', 'campaign-url-builder'),
                        '<p class="description">',
                        '<a class="reatlat_cub_tab_link" href="#reatlat_cub_tab-4">',
                        '</a>',
                        '</p>'
                    );
                    ?>
                </td>
            </tr>
        </table>

        <p class="submit">
            <input type="submit" name="submit_advanced" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'campaign-url-builder'); ?>">
        </p>

    </form>

    <hr>

    <form method="POST" class="reatlat_cub_form">
        <h2 class="title"><span class="required"><?php _e('Danger zone', 'campaign-url-builder'); ?></span></h2>
        <p><input type="checkbox" id="reset_links" name="reset_links"> <label for="reset_links"><?php _e('Delete all campaign-links from DataBase', 'campaign-url-builder'); ?></label> </p>
        <p><input type="checkbox" id="reset_mediums" name="reset_mediums"> <label for="reset_mediums"><?php _e('Reset to default - Mediums', 'campaign-url-builder'); ?></label> </p>
        <p><input type="checkbox" id="reset_sources" name="reset_sources"> <label for="reset_sources"><?php _e('Reset to default - Sources', 'campaign-url-builder'); ?></label> </p>
        <p><input type="checkbox" id="reset_options" name="reset_options"> <label for="reset_options"><?php _e('Reset settings and options to default', 'campaign-url-builder'); ?></label> </p>
        <p><input type="checkbox" id="reset_all" name="reset_all"> <label for="reset_all"><span class="required"><?php _e('Reset All plugin settings and data', 'campaign-url-builder'); ?></span></label> </p>
        <p class="submit">
            <input type="submit" onclick="return confirm('Campaign URL Builder\n\nReset settings & data\n\nAre you sure?')" name="submit_reset" id="submit" class="button button-secondary" value="<?php _e('Reset settings & data', 'campaign-url-builder'); ?>">
        </p>
    </form>

</div>
