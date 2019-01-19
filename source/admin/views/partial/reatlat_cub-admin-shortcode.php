<?php
$get_from = esc_attr( $plugin->plugin_real_name );
?>
<div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-4">

    <h1 class="title"><?php _e('Shortcode settings', 'campaign-url-builder'); ?></h1>

    <p class="description">
        <?php _e('Shortcode works only if you use your own Bitly API key or Goo.gl API Key', 'campaign-url-builder'); ?>.
        How to get your <a target="_blank" href=https://reatlat.net/how-do-i-find-my-bitly-oauth-access-token/?utm_source=wp_plugin&utm_medium=shortcode_tab&utm_campaign=<?php echo $get_from; ?>"><?php _e('Bitly API key', 'campaign-url-builder'); ?></a>?
    </p>

    <?php if ( current_user_can('administrator') || ! get_option( $this->plugin_name . '_admin_only' ) ) : ?>

    <?php // TODO: remove Google in March 2019 ?>

    <?php if ( ! ( get_option( $this->plugin_name . '_google_api_key' ) || get_option( $this->plugin_name . '_bitly_api_key' ) ) ) : ?>
        <h4><?php _e('Shortcodes status','campaign-url-builder'); ?>: <span class="alert"><?php _e('Disabled', 'campaign-url-builder'); ?></span> - <?php _e('For reason, you use default API key for Bitly or Goo.gl', 'campaign-url-builder'); ?></h4>
    <?php endif; ?>

    <form method="POST" class="reatlat_cub_form">

        <table class="form-table">
            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e('Front-end shortcodes (global)', 'campaign-url-builder'); ?> <span class="dashicons dashicons-editor-help tippy" title="<?php _e('This option will enable front-end shortcodes globaly for all visitors(except anonymous).', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="shortcode_activator" <?php checked(get_option( $this->plugin_name . '_shortcode_activator')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e('Allow anonymous users', 'campaign-url-builder'); ?> <span class="dashicons dashicons-editor-help tippy" title="<?php _e('Any website visitor can generate a link', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="shortcode_anonymous" <?php checked(get_option( $this->plugin_name . '_shortcode_anonymous')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e('Default styles', 'campaign-url-builder'); ?> <span class="dashicons dashicons-editor-help tippy" title="<?php _e('Use default CSS styles for front-end shortcoes.', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="shortcode_styles" <?php checked(get_option( $this->plugin_name . '_shortcode_styles')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>

            <?php // TODO: implement recaptcha ajax, perhaps with third party plugin :) ?>
            <!--
            <tr>
                <th scope="row">
                    <label class="unclickable"><?php _e("Google reCaptcha", 'campaign-url-builder'); ?> <span class="dashicons dashicons-editor-help tippy" title="<?php _e('Activate Google reCaptcha version 3', 'campaign-url-builder'); ?>"></span></label>
                </th>
                <td>
                    <label class="tgl">
                        <input type="checkbox" name="shortcode_recaptcha" <?php checked(get_option( $this->plugin_name . '_shortcode_recaptcha')); ?> />
                        <span data-on="<?php _e('Enabled', 'campaign-url-builder'); ?>" data-off="<?php _e('Disabled', 'campaign-url-builder'); ?>"></span>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row" class="ptn">
                    <label for="recaptcha_site_key"><?php _e('reCaptcha v3 API keys', 'campaign-url-builder'); ?> </label>
                    <span class="description"><?php _e('(optional)', 'campaign-url-builder'); ?><br><?php _e('if keep empty, recaptcha will be disabled', 'campaign-url-builder'); ?></span>
                </th>
                <td>
                    <?php if ( empty( get_option( $plugin->plugin_name . '_recaptcha_site_key' ) ) ) : ?>
                        <input name="recaptcha_site_key" type="text" id="recaptcha_site_key" placeholder="<?php _e('Site key', 'campaign-url-builder'); ?>" value="" class="regular-text"><br>
                    <?php else : ?>
                        <?php
                        $visible_recaptcha_site_key = str_repeat( '*', strlen( get_option( $plugin->plugin_name . '_recaptcha_site_key' ) ) - 5 ) . substr( get_option( $plugin->plugin_name . '_recaptcha_site_key' ), - 5 );
                        ?>
                        <input name="recaptcha_site_key" type="text" disabled id="recaptcha_site_key" value="<?php echo esc_attr( $visible_recaptcha_site_key ); ?>" class="regular-text"><br>
                    <?php endif; ?>

                    <?php if ( empty( get_option( $plugin->plugin_name . '_recaptcha_secret_key' ) ) ) : ?>
                        <input name="recaptcha_secret_key" type="text" id="recaptcha_secret_key" placeholder="<?php _e('Secret key', 'campaign-url-builder'); ?>" value="" class="regular-text"><br>
                    <?php else : ?>
                        <?php
                        $visible_recaptcha_secret_key = str_repeat( '*', strlen( get_option( $plugin->plugin_name . '_recaptcha_secret_key' ) ) - 5 ) . substr( get_option( $plugin->plugin_name . '_recaptcha_secret_key' ), - 5 );
                        ?>
                        <input name="recaptcha_secret_key" type="text" disabled id="recaptcha_secret_key" value="<?php echo esc_attr( $visible_recaptcha_secret_key ); ?>" class="regular-text"><br>
                    <?php endif; ?>

                    <?php if ( !empty( get_option( $plugin->plugin_name . '_recaptcha_site_key' ) ) || !empty( get_option( $plugin->plugin_name . '_recaptcha_secret_key' ) ) ) : ?>
                        <?php _e('Reset API keys', 'campaign-url-builder'); ?>: <input type="checkbox" name="remove_recaptcha_keys" value="1">
                    <?php endif; ?>

                    <p class="description">
                        <?php _e('Register your website with Google to get required API keys and enter them above.', 'campaign-url-builder'); ?>
                        <a href="https://www.google.com/recaptcha/admin#list" target="_blank"><?php _e('Get the API Keys', 'campaign-url-builder'); ?></a>
                    </p>
                </td>

            </tr>

            -->

        </table>

        <?php wp_nonce_field('submit_shortcode_settings', 'Campaign-URL-Builder__submit_shortcode_settings--nonce'); ?>

        <p class="submit">
            <input type="submit" name="submit_shortcode_settings" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'campaign-url-builder'); ?>">
        </p>

    </form>

    <?php else : ?>

    <h3 class="alert"><span class="dashicons dashicons-lock alert"></span><?php _e('Shortcode setting available only for Administrator', 'campaign-url-builder'); ?></h3>

    <?php endif; ?>

    <hr>

    <h3><?php _e('Tools', 'campaign-url-builder'); ?></h3>
    <p>
        <a class="button button-primary button-shortcode-generator" href="https://reatlat.net/wp-plugin-campaign-url-builder/#generator?utm_source=wp_plugin&utm_medium=shortcode_tab&utm_campaign=<?php echo $get_from; ?>" target="_blank"><span class="dashicons dashicons-hammer"></span><?php _e('Shortcode generator', 'campaign-url-builder'); ?></a>
    </p>

    <hr>

    <h3><?php _e('Examples', 'campaign-url-builder'); ?></h3>
    <p><?php _e( 'Simple example:', 'campaign-url-builder' ); ?></p>

    <div class="reatlat_cub__shortcode-example">
        <span>
            [Campaign-URL-Builder]
        </span>
    </div>

    <p><?php _e( 'Advanced example:', 'campaign-url-builder' ); ?></p>

    <div class="reatlat_cub__shortcode-example">
        <span>
            [Campaign-URL-Builder wrapper="MegaWrapperClass" wrapper-inline-style="background:#ccc;padding:15px;" form="MegaFormClass" form-inline-style="padding:10px; background:#c19393" campaign_page="https://reatlat.net" utm_source="" utm_medium="" utm_campaign="" utm_term="" utm_content=""]
        </span>
    </div>

    <p><?php _e( 'PHP example:', 'campaign-url-builder' ); ?></p>

    <div class="reatlat_cub__shortcode-example">
        <span>
            &lt;?php echo do_shortcode('[Campaign-URL-Builder]'); ?&gt;
        </span>
    </div>

</div>
