<div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-2">
    <form method="POST" class="reatlat_cub_form">
        <h2 class="title"><?php _e('Add', 'campaign-url-builder'); ?></h2>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="new_campaign_source"><?php _e('Add new Campaign Source', 'campaign-url-builder'); ?></label></th>
                <td><input name="new_campaign_source" placeholder="<?php _e('The referrer: (e.g. google, newsletter)', 'campaign-url-builder'); ?>" type="text" id="new_campaign_source" value="" class="regular-text">
                    <p class="description"><?php _e('The Campaign Source will be formatted once submitted.', 'campaign-url-builder'); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="new_campaign_medium"><?php _e('Add new Campaign Medium', 'campaign-url-builder'); ?></label></th>
                <td><input name="new_campaign_medium" placeholder="<?php _e('Marketing medium: (e.g. cpc, banner, email)', 'campaign-url-builder'); ?>" type="text" id="new_campaign_medium" value="" class="regular-text">
                    <p class="description"><?php _e('The Campaign Medium will be formatted once submitted.', 'campaign-url-builder'); ?></p>
                </td>
            </tr>
        </table>
        <h2 class="title"><?php _e('Remove', 'campaign-url-builder'); ?></h2>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="remove_campaign_source"><?php _e('Remove Campaign Source', 'campaign-url-builder'); ?></label></th>
                <td>
                    <select name="remove_campaign_source">
                        <option value=""><?php _e('Select', 'campaign-url-builder'); ?></option>
                        <?php
                        $sources = $plugin->get_sources();
                        foreach ($sources as $source) {
                            ?>
                            <option value="<?php echo esc_attr( $source->source_name ); ?>"><?php echo esc_attr( $source->source_name ); ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="remove_campaign_medium"><?php _e('Remove Campaign Medium', 'campaign-url-builder'); ?></label>
                </th>
                <td>
                    <select name="remove_campaign_medium">
                        <option value=""><?php _e('Select', 'campaign-url-builder'); ?></option>
                        <?php
                        $mediums = $plugin->get_mediums();
                        foreach ($mediums as $medium) {
                            ?>
                            <option value="<?php echo esc_attr( $medium->medium_name ); ?>"><?php echo esc_attr( $medium->medium_name ); ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>

        <p class="submit">
            <input type="submit" name="submit_settings" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'campaign-url-builder'); ?>">
        </p>

    </form>
</div>
