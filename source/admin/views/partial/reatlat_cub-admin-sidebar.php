<?php
$get_from = esc_attr($plugin->plugin_real_name);

$widgets = array(
    'news' => false,
    'notice' => (bool)(empty(get_option( $this->plugin_name . '_rebrandly_api_key' )) && empty(get_option( $this->plugin_name . '_bitly_api_key' )))
);
?>

<div class="reatlat_cub_promote_container">

    <?php //TODO: make news feed with reatlat API endpoint ?>

    <?php if ($widgets['notice']) : ?>
        <div class="reatlat_promote_widget notice-note">
            <div class="reatlat_promote_title"><span
                        class="dashicons dashicons-flag"></span> <?php _e('Notice', 'campaign-url-builder'); ?></div>
            <div class="notice__container">
                <p>
                    <?php
                    printf(__('The plugin use default API keys, but we strongly recommend to use your own key for %s. %sRead more%s', 'campaign-url-builder'),
                        ucfirst($plugin->get_shortener_vendor()),
                        '<a class="reatlat_cub_tab_link" href="#reatlat_cub_tab-5">',
                        '</a>'
                    );
                    ?>
                </p>
            </div>
        </div>
    <?php endif; ?>


    <?php if ($widgets['news']) : ?>
        <div class="reatlat_promote_widget news-note">
            <div class="reatlat_promote_title"><span
                        class="dashicons dashicons-megaphone"></span> <?php _e('News', 'campaign-url-builder'); ?></div>
            <div class="notice__container">
                <p>
                    <?php
                    printf(__('The changelog, about developer, technologies cards moved to %sAbout%s tab.', 'campaign-url-builder'),
                        '<a class="reatlat_cub_tab_link" href="#reatlat_cub_tab-6">',
                        '</a>'); ?>
                </p>
            </div>
        </div>
    <?php endif; ?>


    <div class="reatlat_promote_widget rateus">
        <a target="_blank"
           href="https://wordpress.org/support/view/plugin-reviews/<?php echo $get_from; ?>?rate=5#postform">
            <span class="reatlat_promote_title"><?php _e('Rate it to show your support!', 'campaign-url-builder'); ?></span>
            <img src="<?php echo str_replace('/admin', '', plugin_dir_url(dirname(__DIR__))); ?>admin/views/images/rateus.png"
                 alt="<?php _e('Buy me a coffee', 'campaign-url-builder'); ?>">
        </a>
    </div>


</div>