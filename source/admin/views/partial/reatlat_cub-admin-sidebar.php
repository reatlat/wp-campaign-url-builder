<?php 
    $get_from = esc_attr( $plugin->plugin_real_name );
?>

<div class="reatlat_cub_promote_container">

    <?php //TODO: make news feed with reatlat API endpoint ?>

    <div class="reatlat_promote_widget notice-note">
        <div class="reatlat_promote_title"><span class="dashicons dashicons-flag"></span> <?php _e('Notice', 'campaign-url-builder'); ?></div>
        <div class="notice__container">
            <p>
                <?php
                printf( __('Starting March 2019, Campaign URL Builder plugin will be turning down support for goo.gl URL shortener. Previously created links will continue to redirect to their intended destination. Please see this %sblog post%s for more details.', 'campaign-url-builder'),
                    '<a target="_blank" href="https://reatlat.net/transitioning-google-url-shortener-to-bitly/?utm_source=wp_plugin&utm_medium=notice_sidebar&utm_campaign=' . $get_from . '">',
                    '</a>'
                );
                ?>
            </p>
        </div>
    </div>

    <div class="reatlat_promote_widget news-note">
        <div class="reatlat_promote_title"><span class="dashicons dashicons-megaphone"></span> <?php _e('News', 'campaign-url-builder'); ?></div>
        <div class="notice__container">
            <p>
                <?php
                printf( __('Introducing a new feature. Frontend %sshortcodes%s. More information in %sblog post%s.', 'campaign-url-builder'),
                    '<a class="reatlat_cub_tab_link" href="#reatlat_cub_tab-4">',
                    '</a>',
                    '<a target="_blank" href="https://reatlat.net/campaign-url-builder-introducing-shortcodes/?utm_source=wp_plugin&utm_medium=news_sidebar&utm_campaign=' . $get_from . '">',
                    '</a>'
                );
                ?>
            </p>
            <p>
                <?php
                printf( __('The changelog, about developer, technologies cards moved to %sAbout%s tab.','campaign-url-builder'),
                    '<a class="reatlat_cub_tab_link" href="#reatlat_cub_tab-6">',
                    '</a>'); ?>
            </p>

        </div>
    </div>

    <div class="reatlat_promote_widget buymeacoffee">
        <a href="https://www.paypal.me/reatlat/<?php echo rand(3,10); ?>usd" target="_blank" title="<?php _e('Buy me a coffee', 'campaign-url-builder'); ?>">
            <img src="<?php echo str_replace('/admin', '', plugin_dir_url( dirname(__DIR__) ) ); ?>admin/views/images/buymeacoffee.png" alt="<?php _e('Buy me a coffee', 'campaign-url-builder'); ?>">
        </a>
    </div>

    <div class="reatlat_promote_widget rateus">
        <a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/<?php echo $get_from; ?>?rate=5#postform">
            <span class="reatlat_promote_title"><?php _e('Rate it to show your support!', 'campaign-url-builder'); ?></span>
            <img src="<?php echo str_replace('/admin', '', plugin_dir_url( dirname(__DIR__) ) ); ?>admin/views/images/rateus.png" alt="<?php _e('Buy me a coffee', 'campaign-url-builder'); ?>">
        </a>
    </div>

	<div class="reatlat_promote_widget author-card">
            <a target="_blank" href="https://reatlat.net/contact/?utm_source=wp_plugin&utm_medium=authorcard_sidebar&utm_campaign=<?php echo $get_from; ?>">
                <img src="<?php echo str_replace('/admin', '', plugin_dir_url( dirname(__DIR__) ) ); ?>admin/views/images/help-sign.png" alt="">
                <h2 class="mtn"><?php _e('Looking for WordPress Developer?', 'campaign-url-builder'); ?></h2>
                <h3><?php _e('Hire me to make custom integration for your WordPress project.', 'campaign-url-builder'); ?></h3>
            </a>
	</div>

</div>