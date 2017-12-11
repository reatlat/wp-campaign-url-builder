<div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-3">

    <form method="POST" class="reatlat_cub_form">

        <h1 class="title">Advanced settings</h1>

        <table class="form-table">
            <tr>
                <th scope="row">
                    <label class="unclickable">Keep settings and data after delete the plugin</label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="advanced_keep_settings" <?php checked(get_option( $this->plugin_name . '_keep_settings')); ?> />
                        <span data-on="Enabled" data-off="Disabled"></span>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label class="unclickable">Author's column in the table of UTM Links</label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="advanced_show_creator" <?php checked(get_option( $this->plugin_name . '_show_creator')); ?> />
                        <span data-on="Enabled" data-off="Disabled"></span>
                    </label>
                </td>
            </tr>
        </table>

        <h2 class="title">Google URL Shortener API setting</h2>
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="google_api_key">Google API key </label>
                    <span class="description">(optional)<br>keep empty for use default one</span>
                </th>
                <td>
                    <?php if ( empty( get_option( $plugin->plugin_name . '_google_api_key' ) ) ) { ?>
                        <input name="google_api_key" type="text" id="google_api_key" value="<?php echo esc_attr( get_option( $plugin->plugin_name . '_google_api_key' ) ); ?>" class="regular-text"><br>
                    <?php } else { ?>
                        <input name="google_api_key" type="text" disabled id="google_api_key" value="<?php echo esc_attr( get_option( $plugin->plugin_name . '_google_api_key' ) ); ?>" class="regular-text"><br>
                        Reset API key: <input type="checkbox" name="remove_google_api_key" value="1">
                    <?php } ?>
                    <p class="description">How to get your <a class="reatlat_cub_tab_link" href="#reatlat_cub_tab-4">Google API key</a>?</p>
                </td>
            </tr>
        </table>

        <p class="submit">
            <input type="submit" name="submit_advanced" id="submit" class="button button-primary" value="Save Changes">
        </p>

    </form>

    <hr>

    <form method="POST" class="reatlat_cub_form">
        <h2 class="title"><span class="required">Danger zone</span></h2>
        <p><input type="checkbox" name="reset_links"> <label for="reset_links">Delete all campaign-links from DataBase </label></p>
        <p><input type="checkbox" name="reset_mediums"> <label for="reset_mediums">Reset to default - Mediums </label></p>
        <p><input type="checkbox" name="reset_sources"> <label for="reset_sources">Reset to default - Sources </label></p>
        <p><input type="checkbox" name="reset_options"> <label for="reset_options">Reset settings and options to default </label></p>
        <p><input type="checkbox" name="reset_all"> <label for="reset_all"><span class="required">Reset All plugin settings and data</span> </label></p>
        <p class="submit">
            <input type="submit" onclick="return confirm('Campaign URL Builder\n\nReset settings & data\n\nAre you sure?')" name="submit_reset" id="submit" class="button button-secondary" value="Reset settings & data">
        </p>

    </form>
</div>
