<?php
$get_from = esc_attr( $plugin->plugin_real_name );
?>
<div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-5">
    <h2 class="title"><?php _e('Knowledge base', 'campaign-url-builder'); ?></h2>
    <h3><?php _e('Best Practices', 'campaign-url-builder'); ?></h3>
    <p>
        <?php printf(__('%sBest practices%s for creating your Campaign.', 'campaign-url-builder'), '<a target="_blank" href="https://support.google.com/analytics/answer/1037445?hl=' . get_locale() . '">', '</a>'); ?>
    </p>

    <hr>

    <h3><?php _e('Frontend - Shortcodes', 'campaign-url-builder'); ?></h3>
    <p>
        <?php printf(
                __('Shortcode option, works well, but still needs improvements. Read this %sarticle%s about all shortcode features.', 'campaign-url-builder'),
        '<a target="_blank" href="https://reatlat.net/campaign-url-builder-introducing-shortcodes/?utm_source=wp_plugin&utm_medium=kb_tab&utm_campaign=' . $get_from . '">',
        '</a>');
        ?>
    </p>
    <p>
        <?php printf(
            __('If you have ideas how improve it or add new features, please feel free left a %s5 star review and feedback%s.', 'campaign-url-builder'),
            '<a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/' . $get_from . '?rate=5#postform">',
            '</a>');
        ?>
    </p>

    <hr>

    <h3><?php _e('Languages and String translation', 'campaign-url-builder'); ?></h3>
    <p>
        <?php printf(__('Missing your language? Needs update string translations? Use %sLoco Translate%s plugin.', 'campaign-url-builder'), '<a target="_blank" href="https://wordpress.org/plugins/loco-translate/">', '</a>'); ?>
    </p>

    <hr>

    <h3><?php _e('Bitly API key', 'campaign-url-builder'); ?></h3>
    <p>
        <?php _e('How do I get my own Bitly OAuth access token?', 'campaign-url-builder'); ?>
        <a href="https://reatlat.net/how-do-i-find-my-bitly-oauth-access-token/?utm_source=wp_plugin&utm_medium=kb_tab&utm_campaign=<?php echo $get_from; ?>"><?php _e('read article', 'campaign-url-builder'); ?>.</a>
    </p>

    <hr>

    <h3><?php _e('You did not find an answer?', 'campaign-url-builder'); ?></h3>
    <p>
        <?php
            printf( __('Then you should visit the %ssupport page%s of the plugin on %swordpress.org%s or in the %sofficial wiki page%s of the plugin hosted on %sgithub.com%s.', 'campaign-url-builder'),
            '<a target="_blank" href="https://wordpress.org/support/plugin/campaign-url-builder"><strong>',
            '</strong></a>',
            '<a target="_blank" href="https://wordpress.org/support/plugin/campaign-url-builder">',
            '</a>',
            '<a target="_blank" href="https://github.com/reatlat/wp-campaign-url-builder/wiki"><strong>',
            '</strong></a>',
            '<a target="_blank" href="https://github.com/reatlat/wp-campaign-url-builder/wiki">',
            '</a>'
            );
        ?>
    </p>
</div>
