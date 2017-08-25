<?php 
    $get_from = esc_attr( $plugin->plugin_real_name );
?>

<div class="reatlat_cub_promote_container">
	<div class="reatlat_promote_widget">
        <div class="reatlat_promote_title">Like this plugin?</div>
        <p>
            <a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/<?php echo $get_from; ?>?rate=5#postform">
                <strong>Rate it</strong>
            </a> to show your support!
        </p>
        <p>
            <a target="_blank" href="https://www.paypal.me/reatlat/<?php echo rand ( 3, 10 ); ?>">
                <strong>Donate</strong></a> to encourage me updating this plugin!
        </p>
	</div>


    <div class="reatlat_promote_widget changelog">
        <div class="reatlat_promote_title">Changelog</div>
        <h4>1.0.1 - 2017/08/25</h4>
        <ul>
            <li>Input/Output - sanitize, validate, and escape</li>
            <li>Update plugin name</li>
        </ul>
        <h4>1.0.0 - 2017/08/22</h4>
        <ul>
            <li>First live release</li>
        </ul>
    </div>


	<div class="reatlat_promote_widget">
		<div class="reatlat_promote_title">Developed by</div>
        <div class="author-card">
            <a target="_blank" href="https://reatlat.net/?utm_source=wp_plugin&utm_medium=authorcard_sidebar&utm_campaign=<?php echo $get_from; ?>">
                <img src="<?php echo get_avatar_url('reatlat@gmail.com', array("size"=>160) ); ?>" alt="Alex Zappa a.k.a. re[at]lat">
            </a>
            <h3>Alex Zappa <small>a.k.a. re[at]lat</small></h3>
            <h4>Software Engineer</h4>
            <p><a target="_blank" href="https://reatlat.net/?utm_source=wp_plugin&utm_medium=logo_sidebar&utm_campaign=<?php echo $get_from; ?>">Homepage</a> | <a target="_blank" href="https://github.com/reatlat">GitHub</a></p>

        </div>
	</div>


    <div class="reatlat_promote_widget technologies">
        <a href="https://github.com/reatlat/wp-campaign-url-builder" target="_blank">
            <img src="<?php echo plugin_dir_url( __FILE__ ); ?>images/github-octcat.png" alt="">
        </a>
        <a href="https://www.gnu.org/licenses/quick-guide-gplv3.en.html" target="_blank">
            <img src="<?php echo plugin_dir_url( __FILE__ ); ?>images/gplv3.png" alt="">
        </a>
        <a href="https://opensource.org/" target="_blank">
            <img src="<?php echo plugin_dir_url( __FILE__ ); ?>images/opensource.png" alt="">
        </a>
    </div>

</div>