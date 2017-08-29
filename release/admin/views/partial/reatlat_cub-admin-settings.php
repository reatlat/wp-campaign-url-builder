<div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-2">
    <form method="POST" class="reatlat_cub_form">
        <h2 class="title">Add</h2>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="new_campaign_source">Add new Campaign Source</label></th>
                <td><input name="new_campaign_source" placeholder="The referrer: (e.g. google, newsletter)" type="text" id="new_campaign_source" value="" class="regular-text">
                    <p class="description">The Campaign Source will be formatted once submitted.</p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="new_campaign_medium">Add new Campaign Medium</label></th>
                <td><input name="new_campaign_medium" placeholder="Marketing medium: (e.g. cpc, banner, email)" type="text" id="new_campaign_medium" value="" class="regular-text">
                    <p class="description">The Campaign Medium will be formatted once submitted.</p>
                </td>
            </tr>
        </table>
        <h2 class="title">Remove</h2>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="remove_campaign_source">Remove Campaign Source</label></th>
                <td>
                    <select name="remove_campaign_source">
                        <option value="">Select</option>
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
                    <label for="remove_campaign_medium">Remove Campaign Medium</label>
                </th>
                <td>
                    <select name="remove_campaign_medium">
                        <option value="">Select</option>
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
            <input type="submit" name="submit_settings" id="submit" class="button button-primary" value="Save Changes">
        </p>

    </form>
</div>
