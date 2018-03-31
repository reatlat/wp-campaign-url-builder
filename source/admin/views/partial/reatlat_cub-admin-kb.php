<div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-4">
    <h2 class="title"><?php _e('Knowledge base', 'campaign-url-builder'); ?></h2>
    <h3><?php _e('Best Practices', 'campaign-url-builder'); ?></h3>
    <p>
        <?php
        printf(
            __('%sBest practices%s for creating your Campaign.', 'campaign-url-builder'),
            '<a target="_blank" href="https://support.google.com/analytics/answer/1037445?hl=' . get_locale() . '">',
            '</a>'
        );
        ?>
    </p>
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
        <?php
        printf(
            __('Please check %sGoogle guide%s', 'campaign-url-builder'),
            '<a target="_blank" href="https://developers.google.com/url-shortener/v1/getting_started">',
            '</a>'
        );
        ?>
    </p>
</div>
