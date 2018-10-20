<?php 
    $get_from = esc_attr( $plugin->plugin_real_name );

    $changelog = array(
        array(
            'version' => '1.X.X',
            'date'    => '2018/05/XX',
            'changes' => array(
                sprintf(
                    __('Added translation to Spanish and Portuguese, big Thank you for %sTihh Gonçalves%s', 'campaign-url-builder'),
                    '<a target="_blank" href="https://www.tiago.art.br">',
                    '</a>'
                ),
            ),
        ),
        array(
            'version' => '1.4.3',
            'date'    => '2018/10/20',
            'changes' => array(
                __('Compatibility with WordPress 5.0 and Gutenberg Editor', 'campaign-url-builder'),
                __('Fixed not working notification', 'campaign-url-builder'),
                __('Update AJAX-function for link creation', 'campaign-url-builder'),
            ),
        ),
        array(
            'version' => '1.4.2',
            'date'    => '2018/10/15',
            'changes' => array(
                __('Added notification about created link on page/post editor', 'campaign-url-builder'),
                __('Update AJAX-function for link creation', 'campaign-url-builder'),
            ),
        ),
        array(
            'version' => '1.4.1',
            'date'    => '2018/09/10',
            'changes' => array(
                __('Fixed not working button preview post', 'campaign-url-builder'),
                __('Fixed bug with plugin removal function', 'campaign-url-builder'),
                __('Minor bug fixes', 'campaign-url-builder'),
            ),
        ),
        array(
            'version' => '1.4.0',
            'date'    => '2018/05/11',
            'changes' => array(
                __('Improve language translation', 'campaign-url-builder'),
                __('Include new API endpoint Bitly', 'campaign-url-builder'),
                __('Switch to Bitly endpoint by default', 'campaign-url-builder'),
                __('Migrate to ES6', 'campaign-url-builder'),
                __('Implement fingerprints for assets', 'campaign-url-builder'),
                __('Improve code', 'campaign-url-builder'),
            ),
        ),
        array(
            'version' => '1.3.1',
            'date'    => '2018/04/05',
            'changes' => array(
                __('Fixed error with wrong variable on plugins page', 'campaign-url-builder'),
                __('Update missing translation strings', 'campaign-url-builder')
            ),
        ),
        array(
            'version' => '1.3.0',
            'date'    => '2018/04/01',
            'changes' => array(
                __('Update layout', 'campaign-url-builder'),
                __('Move "create a new tracking link" to own tab', 'campaign-url-builder'),
                __('Added new advanced settings', 'campaign-url-builder'),
                __('Make plugin translatable', 'campaign-url-builder'),
                __('Added translation to Russian', 'campaign-url-builder'),
                __('Added meta box: with links list', 'campaign-url-builder'),
                __('Added meta box: Link generator (beta option)', 'campaign-url-builder'),
            ),
        ),
        array(
            'version' => '1.2.1',
            'date'    => '2018/02/13',
            'changes' => array(
                __('Fix problem with global date_format override', 'campaign-url-builder'),
            ),
        ),
        array(
            'version' => '1.2.0',
            'date'    => '2017/12/11',
            'changes' => array(
                __('Add remove link function', 'campaign-url-builder'),
                __('Add example link', 'campaign-url-builder'),
                __('Update pattern for url source', 'campaign-url-builder'),
                __('Bug fixing', 'campaign-url-builder'),
            ),
        ),
        array(
            'version' => '1.1.0',
            'date'    => '2017/08/29',
            'changes' => array(
                __('Refactor code', 'campaign-url-builder'),
                __('Add advanced settings', 'campaign-url-builder'),
            ),
        ),
        array(
            'version' => '1.0.1',
            'date'    => '2017/08/25',
            'changes' => array(
                __('Input/Output - sanitize, validate, and escape', 'campaign-url-builder'),
                __('Update plugin name', 'campaign-url-builder'),
            ),
        ),
        array(
            'version' => '1.0.0',
            'date'    => '2017/08/22',
            'changes' => array(
                __('First live release', 'campaign-url-builder'),
            ),
        ),
    );
?>

<div class="reatlat_cub_promote_container">
	<div class="reatlat_promote_widget">
        <div class="reatlat_promote_title"><?php _e('Like this plugin?', 'campaign-url-builder'); ?></div>
        <p>
            <?php
            printf(
                __('%sRate it%s to show your support!', 'campaign-url-builder'),
                '<a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/' . $get_from . '?rate=5#postform"><strong>',
                '</strong></a>'
            );
            ?>
        </p>
        <p>
            <?php
            printf(
                __('%sDonate%s to encourage me updating this plugin!', 'campaign-url-builder'),
                '<a target="_blank" href="https://www.paypal.me/reatlat/' . rand ( 2, 10 ) . 'usd"><strong>',
                '</strong></a>'
            );
            ?>

        </p>
	</div>


    <div class="reatlat_promote_widget notice-note">
        <div class="reatlat_promote_title"><?php _e('Notice', 'campaign-url-builder'); ?></div>
        <div class="notice__container">
            <p>
                <?php
                printf( __('Starting March 30, 2018, Google will be turning down support for goo.gl URL shortener. From April 13, 2018 only existing users will be able to create short links on the goo.gl console. You will be able to view your analytics data and download your short link information in csv format for up to one year, until March 30, 2019, when Google will discontinue goo.gl. Previously created links will continue to redirect to their intended destination. Please see this %sblog post%s for more details.', 'campaign-url-builder'),
                    '<a target="_blank" href="https://developers.googleblog.com/2018/03/transitioning-google-url-shortener.html">',
                    '</a>'
                );
                ?>
            </p>
            <p>
                <?php printf( __('We switch "Campaign URL Builder" to Bitly API endpoint by default (you can %sswitch it back%s to Goo.gl if you want)', 'campaign-url-builder'), '<a class="reatlat_cub_tab_link" href="#reatlat_cub_tab-3">', '</a>'); ?>
            </p>
        </div>
    </div>

    <div class="reatlat_promote_widget changelog">
        <div class="reatlat_promote_title"><?php _e('Changelog', 'campaign-url-builder'); ?></div>
        <div class="changelog__container">
            <?php foreach ($changelog as $item) : ?>
            <?php if ( strpos( $item['date'], 'XX' ) === false ) : ?>
            <h4><?php echo $item['version']; ?> - <?php echo $item['date']; ?></h4>
            <ul>
                <?php foreach ( $item['changes'] as $change ) : ?>
                <li><?php echo $change; ?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
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