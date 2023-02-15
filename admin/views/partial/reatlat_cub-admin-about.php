<?php
$get_from = esc_attr( $plugin->plugin_real_name );

$changelog = array(
    array(
        'version' => '1.X.X',
        'date'    => '2018/05/XX',
        'changes' => array(
            sprintf(
                __('template', 'campaign-url-builder'),
                '<a target="_blank" href="https://www.tiago.art.br">',
                '</a>'
            ),
        ),
    ),
    array(
        'version' => '1.8.2',
        'date'    => '2023/02/15',
        'changes' => array(
            __('Fix vulnerability issues', 'campaign-url-builder'),
        ),
    ),
    array(
        'version' => '1.8.1',
        'date'    => '2019/05/20',
        'changes' => array(
            __('Fix export to CSV action', 'campaign-url-builder'),
            __('Fix rebrandly custom domains', 'campaign-url-builder'),
        ),
    ),
    array(
        'version' => '1.8.0',
        'date'    => '2019/05/17',
        'changes' => array(
            __('Finally destroy Goo.gl API endpoint', 'campaign-url-builder'),
            __('Add new shortener API endpoint, ReBrendly', 'campaign-url-builder'),
            __('Added support custom domains', 'campaign-url-builder'),
            __('Reduced the weight of the plugin', 'campaign-url-builder'),
            __('Compatible with WordPress version 5.2', 'campaign-url-builder'),
            __('Refactor shortener API function', 'campaign-url-builder'),
            __('Migrate Bit.ly API v3 to v4', 'campaign-url-builder'),
            __('Added new options to enforce UTM field naming consistency', 'campaign-url-builder'),
        ),
    ),
    array(
        'version' => '1.7.0',
        'date'    => '2019/01/27',
        'changes' => array(
            __('Added new feature - keep links query parameters and anchor fragment', 'campaign-url-builder'),
            __('Init JavaScript and CSS Debuging Variable (include uncompressed scripts/css)', 'campaign-url-builder'),
            __('Refactor full_link_builder function', 'campaign-url-builder'),
            __('Refactor backend JavaScript', 'campaign-url-builder')
        ),
    ),
    array(
        'version' => '1.6.0',
        'date'    => '2019/01/14',
        'changes' => array(
            __('Fix Security Vulnerability - Missing Validation', 'campaign-url-builder'),
            __('Added Security Nonces for all POST requests', 'campaign-url-builder'),
            __('Initial Frontend shortcodes', 'campaign-url-builder'),
            __('Minor changes', 'campaign-url-builder')
        ),
    ),
    array(
        'version' => '1.5.0',
        'date'    => '2018/10/21',
        'changes' => array(
            __('Added autocomplete function for link suggestion', 'campaign-url-builder'),
            __('Added pagination for links table', 'campaign-url-builder'),
            __('Added Export UTM lins list to CSV file', 'campaign-url-builder'),
            __('Fixed backend error for empty Bit.ly respond', 'campaign-url-builder'),
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

<div class="reatlat_cub_container reatlat_cub_tab reatlat_cub_tab-6">
    <h2 class="title"><?php _e('About Campaign URL Builder', 'campaign-url-builder'); ?></h2>

    <p>
        <?php _e('This plugin allows you to easily add campaign parameters to URLs so you can track Custom Campaigns in Google Analytics. Also, you can easily create short links and easily share it on social networks.', 'campaign-url-builder'); ?>
    </p>

    <hr>

    <h3><?php _e('Changelog', 'campaign-url-builder'); ?></h3>
    <div class="changelog">
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

    <hr>
    <?php /*
    <h3><?php _e('Debug info', 'campaign-url-builder'); ?></h3>
    <p>
        <?php _e('Coming soon...', 'campaign-url-builder'); ?>
    </p>

    <hr>
    */ ?>

    <div class="reatlat_cub_container__widget">
        <div class="reatlat_promote_title"><?php _e('Developed by', 'campaign-url-builder'); ?></div>
        <div class="author-card">
            <a target="_blank" href="https://alex.zappa.dev/?utm_source=wp_plugin&utm_medium=authorcard_sidebar&utm_campaign=<?php echo $get_from; ?>">
                <img src="<?php echo get_avatar_url('alex@zappa.dev', array("size"=>160) ); ?>" alt="Alex Zappa">
            </a>
            <h3>Alex Zappa</h3>
            <h4><?php _e('Sr. Software Engineer', 'campaign-url-builder'); ?></h4>
            <p><a target="_blank" href="https://alex.zappa.dev/?utm_source=wp_plugin&utm_medium=logo_sidebar&utm_campaign=<?php echo $get_from; ?>"><?php _e('Homepage', 'campaign-url-builder'); ?></a> | <a target="_blank" href="https://github.com/reatlat">GitHub</a></p>

        </div>
    </div>

    <hr>

    <div class="reatlat_cub_container__widget technologies">
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
