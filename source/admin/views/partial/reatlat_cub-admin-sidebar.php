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
                    '<a target="_blank" href="https://developers.googleblog.com/2018/03/transitioning-google-url-shortener.html">',
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
                    '<a href="#reatlat_cub_tab-4">',
                    '</a>',
                    '<a target="_blank" href="https://reatlat.net">',
                    '</a>'
                );
                ?>
            </p>
            <p>
                <?php
                printf( __('The changelog move to %sAbout%s tab.','campaign-url-builder'),
                    '<a target="_blank" href="#reatlat_cub_tab-6">',
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



	<div class="reatlat_promote_widget">
		<div class="reatlat_promote_title"><?php _e('Developed by', 'campaign-url-builder'); ?></div>
        <div class="author-card">
            <a target="_blank" href="https://reatlat.net/?utm_source=wp_plugin&utm_medium=authorcard_sidebar&utm_campaign=<?php echo $get_from; ?>">
                <img src="<?php echo get_avatar_url('reatlat@gmail.com', array("size"=>160) ); ?>" alt="Alex Zappa a.k.a. re[at]lat">
            </a>
            <h3>Alex Zappa <small>a.k.a. re[at]lat</small></h3>
            <h4><?php _e('Software Engineer', 'campaign-url-builder'); ?></h4>
            <p><a target="_blank" href="https://reatlat.net/?utm_source=wp_plugin&utm_medium=logo_sidebar&utm_campaign=<?php echo $get_from; ?>"><?php _e('Homepage', 'campaign-url-builder'); ?></a> | <a target="_blank" href="https://github.com/reatlat">GitHub</a></p>

        </div>
	</div>


    <div class="reatlat_promote_widget technologies">
        <a href="https://github.com/reatlat/wp-campaign-url-builder" target="_blank">
            <img src="<?php echo str_replace('/admin', '', plugin_dir_url( dirname(__DIR__) ) ); ?>admin/views/images/github-octcat.png" alt="">
        </a>
        <a href="https://www.gnu.org/licenses/quick-guide-gplv3.en.html" target="_blank">
            <img src="<?php echo str_replace('/admin', '', plugin_dir_url( dirname(__DIR__) ) ); ?>admin/views/images/gplv3.png" alt="">
        </a>
        <a href="https://opensource.org/" target="_blank">
            <img src="<?php echo str_replace('/admin', '', plugin_dir_url( dirname(__DIR__) ) ); ?>admin/views/images/opensource.png" alt="">
        </a>
    </div>

</div>