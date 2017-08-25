<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $wpdb;

$plugin = new reatlat_cub_Admin( $this->plugin_real_name, $this->plugin_name, $this->version );
$plugin->check_manage_links();
$plugin->check_settings();
$plugin->enqueue_notices();

?>
<div class="wrap" id="reatlat_cub">

    <div class="reatlat_cub_notice animated fadeInDown" style="display: none;">
        <div class="reatlat_cub_notice__inner">
            <h3><span class="dashicons dashicons-share-alt"></span> Campaign URL Builder</h3>
            <p>The link has been copied to clipboard.</p>
        </div>
    </div>

	<h1><span class="dashicons dashicons-share-alt"></span> Campaign URL Builder <i class="reatlat_cub_by">by <a href="https://reatlat.net/?utm_source=wp_plugin&utm_medium=title_header&utm_campaign=<?php echo esc_attr( $plugin->plugin_real_name ); ?>" target="_blank">re[at]lat</a></i> </h1>

	<ul class="reatlat_cub_tabs">
		<li><a href="#reatlat_cub_tab-1" class="active"><span class="dashicons dashicons-dashboard"></span> Manage</a></li>
		<li><a href="#reatlat_cub_tab-2"><span class="dashicons dashicons-admin-settings"></span> Settings</a></li>
		<li><a href="#reatlat_cub_tab-3"><span class="dashicons dashicons-welcome-learn-more"></span> Help</a></li>
	</ul>

	<div class="reatlat_cub_tabs_container">
		
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
                            <td>Creator</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $links = $plugin->get_links();

                        foreach ( $links as $key => $link )
                        {
                            $class = 'reatlat_cub_non-highlight';
                            if( !empty($_POST['submit_manage_links']) ) {
                                $full_link = $plugin->get_full_link( $_POST['campaign_page'], $_POST['campaign_source'], $_POST['campaign_medium'], $_POST['campaign_name'], $_POST['custom_key_1'], $_POST['custom_value_1'], $_POST['custom_key_2'], $_POST['custom_value_2'], $_POST['custom_key_3'], $_POST['custom_value_3'] );
                                if( !empty($_POST['submit_manage_links']) && !empty( $full_link ) && $full_link == $link->campaign_full_link ) $class = 'reatlat_cub_highlight';
                            }
                        ?>
                        <tr class="<?php echo $class; ?> wow fadeInUp">
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
                            <td class="user_id"><?php echo sanitize_user( get_userdata($link->user_id)->display_name ); ?> <small>(<?php echo esc_attr( implode(', ', get_userdata($link->user_id)->roles) ); ?>)</small></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>

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
                            <p class="description">How to get your <a class="reatlat_cub_tab_link" href="#reatlat_cub_tab-3">Google API key</a>?</p>

                        <?php } else { ?>
                            <input name="google_api_key" type="text" disabled id="google_api_key" value="<?php echo esc_attr( get_option( $plugin->plugin_name . '_google_api_key' ) ); ?>" class="regular-text"><br>
                            Reset API key: <input type="checkbox" name="remove_google_api_key" value="1">
                            <p class="description">How to get your <a class="reatlat_cub_tab_link" href="#reatlat_cub_tab-3">Get Google API key</a>?</p>
                        <?php } ?>
                    </td>
                </tr>

            </table>

            <p class="submit">
                <input type="submit" name="submit_settings" id="submit" class="button button-primary" value="Save Changes">
            </p>

            </form>
        </div>

        <div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-3">
            <h2 class="title">Help</h2>
            <h3>Best Practices</h3>
            <p>
                <a target="_blank" href="https://support.google.com/analytics/answer/1037445?hl=en">Best practices</a> for creating your Campaign.
            </p>
            <h3>Google API key</h3>
            <p>
                You will need to: <br>
                1. <a target="_blank" href="https://accounts.google.com/SignUp">Create an account</a> on Google or <a href="https://accounts.google.com/signin/">SignIn</a> with existing account.<br>
                2. <a target="_blank" href="https://console.developers.google.com/">Create a project</a> on Google Developer Console<br>
                3. <a target="_blank" href="https://console.developers.google.com/apis/credentials">Create an API key</a> on Google Developer Console<br>
                4. <a target="_blank" href="https://console.developers.google.com/apis/api/urlshortener.googleapis.com/overview">Enable URL Shortener API</a><br>
                5. Setup plugin for using your own <strong>API key</strong>.
            </p>
            <p>
                Please check <a target="_blank" href="https://developers.google.com/url-shortener/v1/getting_started">Google guide</a>
            </p>
        </div>

	</div>

	<?php include dirname( __FILE__ ) . '/reatlat_cub-admin-partial.php'; ?>

</div>