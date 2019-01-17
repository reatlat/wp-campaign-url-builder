<div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-5">
    <h2 class="title"><?php _e('Knowledge base', 'campaign-url-builder'); ?></h2>
    <h3><?php _e('Best Practices', 'campaign-url-builder'); ?></h3>
    <p>
        <?php printf(__('%sBest practices%s for creating your Campaign.', 'campaign-url-builder'), '<a target="_blank" href="https://support.google.com/analytics/answer/1037445?hl=' . get_locale() . '">', '</a>'); ?>
    </p>

    <hr>

    <h3><?php _e('Frontend - Shortcodes', 'campaign-url-builder'); ?></h3>
    <p>Coming soon...</p>

    <hr>

    <h3><?php _e('Languages and String translation', 'campaign-url-builder'); ?></h3>
    <p>
        <?php printf(__('Missing your language? Needs update string translations? Use %sLoco Translate%s plugin.', 'campaign-url-builder'), '<a target="_blank" href="https://wordpress.org/plugins/loco-translate/">', '</a>'); ?>
    </p>

    <hr>

    <h3><?php _e('Google API key', 'campaign-url-builder'); ?></h3>
    <p>
        <?php _e('You will need to', 'campaign-url-builder'); ?>: <br>
        1. <?php printf( __('%sCreate an account%s on Google or %sSignIn%s with existing account', 'campaign-url-builder'), '<a target="_blank" href="https://accounts.google.com/SignUp">', '</a>', '<a href="https://accounts.google.com/signin/">', '</a>'); ?><br>
        2. <?php printf( __('%sCreate a project%s on Google Developer Console', 'campaign-url-builder'), '<a target="_blank" href="https://console.developers.google.com/">', '</a>'); ?><br>
        3. <?php printf( __('%sCreate an API key%s on Google Developer Console', 'campaign-url-builder'), '<a target="_blank" href="https://console.developers.google.com/apis/credentials">', '</a>'); ?><br>
        4. <a target="_blank" href="https://console.developers.google.com/apis/api/urlshortener.googleapis.com/overview"><?php _e('Enable URL Shortener API', 'campaign-url-builder'); ?></a><br>
        5. <?php printf( __('Setup plugin for using your own %sAPI key%s', 'campaign-url-builder'), '<strong>', '</strong>'); ?>
    </p>
    <p>
        <?php printf( __('Please check %sGoogle guide%s', 'campaign-url-builder'), '<a target="_blank" href="https://developers.google.com/url-shortener/v1/getting_started">', '</a>' ); ?>
    </p>

    <hr>

    <h3><?php _e('Bitly API key', 'campaign-url-builder'); ?></h3>
    <p>
        <?php _e('Set up the Bitly is not that easy, but doable in a few steps. You will need to', 'campaign-url-builder'); ?>:<br>
        1. <?php printf( __('%sCreate an account%s on bitly.com', 'campaign-url-builder'), '<a target="_blank" href="https://bitly.com/a/sign_up">', '</a>'); ?><br>
        2. <?php printf( __('%sCreate a Generic Access Token%s dedicated to communicate with bitly API.', 'campaign-url-builder'), '<a target="_blank" href="https://bitly.com/a/oauth_apps">', '</a>'); ?><br>
        3. <?php printf( __('Once your application is set up you will be able to retrieve the %sToken%s.', 'campaign-url-builder') , '<strong>', '</strong>'); ?>
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
