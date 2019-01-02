<?php

class reatlat_cub_Public
{
	private $plugin_name;
	private $version;

	// constructor
	public function __construct( $plugin_name, $version )
    {
		$this->plugin_name     = $plugin_name;
		$this->version         = $version;
	}

	/**
	 * Enqueue scripts
	 */
	function enqueue_scripts()
    {
		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/js/reatlat_plugin_name-public.js', array( 'jquery' ), $this->version, true );
	}

	/**
	 * Enqueue styles
	 */
	function enqueue_styles()
    {
		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/css/reatlat_plugin_name-public.css', array(), $this->version, 'all' );
	}

	/**
     * Register Shortcodes
     */
	public function register_shortcodes()
    {
        function shortcode_frontend_link_generator_form( $atts )
        {
            $atts = shortcode_atts( array(
                'wrapper' => '', // set specific CSS classes for add specific stile for your form
                'wrapper-inline-style' => 'false',
                'form' => '', // set specific CSS classes for add specific stile for your form
                'form-inline-style' => 'false',
                'type' => 'default', // default | simple | advanced | preset
                'utm_source' => '',
                'utm_medium' => '',
                'utm_campaign' => '',
                'utm_term' => '',
                'utm_content' => '',
                'custom_parameters' => '', // any custom parameters separate by | Vertical bar https://en.wikipedia.org/wiki/Vertical_bar
                'recaptcha' => 'false', // TODO: add recaptcha v3
            ), $atts, 'Campaign-URL-Builder' );

            ob_start();

            ?>

            <div class="Campaign-URL-Builder Campaign-URL-Builder--form-wrapper <?php echo $atts['wrapper']; ?>" <?php if ( $atts['wrapper-inline-style'] !== 'false' ) { echo 'style="' . $atts['wrapper-inline-style'] . '"'; } ?>>
                <form action="#" method="post" class="Campaign-URL-Builder--form-wrapper__form <?php echo $atts['form']; ?>" <?php if ( $atts['form-inline-style'] !== 'false' ) { echo 'style="' . $atts['form-inline-style'] . '"'; } ?>>

                    <input type="text">
                    <input type="submit" value="send">

                </form>
            </div>

            <?php

            $content = ob_get_contents();

            ob_end_clean();

            return $content;
        }
        add_shortcode( 'Campaign-URL-Builder', 'shortcode_frontend_link_generator_form' );
    }

}