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
                'wrapper-inline-style' => '',
                'form' => '', // set specific CSS classes for add specific stile for your form
                'form-inline-style' => '',
                'type' => 'default', // default | simple | advanced | preset
                'campaign_page' => '',
                'utm_source' => '',
                'utm_medium' => '',
                'utm_campaign' => '',
                'utm_term' => '',
                'utm_content' => '',
                'custom_parameters' => '', // any custom parameters separate by &
                'hidden' => '', // hidden input field separate by comma
                'recaptcha' => 'false', // TODO: add recaptcha v3
            ), $atts, 'Campaign-URL-Builder' );

            if ( $atts['hidden'] ) {
                $atts['hidden'] = explode(',', $atts['hidden'] );
            }

            ob_start();

            ?>

            <div class="Campaign-URL-Builder Campaign-URL-Builder--form-wrapper <?php echo $atts['wrapper']; ?>" <?php if ( $atts['wrapper-inline-style'] ) { echo 'style="' . $atts['wrapper-inline-style'] . '"'; } ?>>
                <form action="#" method="post" class="Campaign-URL-Builder--form-wrapper__form <?php echo $atts['form']; ?>" <?php if ( $atts['form-inline-style'] ) { echo 'style="' . $atts['form-inline-style'] . '"'; } ?>>

                    <input id="campaign_page"
                           class="regular-text"
                           name="campaign_page"
                           placeholder="<?php _e('https://example.com/example-page/', 'campaign-url-builder'); ?>"
                           type="<?php if( $atts['hidden'] && in_array('campaign_page', $atts['hidden'] )) { echo 'hidden'; } else { echo 'text'; } ?>"
                           value="<?php if ( $atts['campaign_page'] ) { echo esc_attr( $atts['campaign_page'] ); } else { echo get_permalink(); } ?>"
                           <?php if ( $atts['type'] === 'preset' && $atts['campaign_page'] ) : ?>readonly="readonly"<?php endif; ?>>

                    <input id="campaign_source"
                           class="regular-text"
                           name="campaign_source"
                           placeholder="<?php _e('utm_source', 'campaign-url-builder'); ?>"
                           type="<?php if( $atts['hidden'] && in_array('utm_source', $atts['hidden'] )) { echo 'hidden'; } else { echo 'text'; } ?>"
                           value="<?php echo esc_attr( $atts['utm_source'] ) ?>"
                           <?php if ( $atts['type'] === 'preset' && $atts['utm_source'] ) : ?>readonly="readonly"<?php endif; ?>>

                    <input id="campaign_medium"
                           class="regular-text"
                           name="campaign_medium"
                           placeholder="<?php _e('utm_medium', 'campaign-url-builder'); ?>"
                           type="<?php if( $atts['hidden'] && in_array('utm_medium', $atts['hidden'] )) { echo 'hidden'; } else { echo 'text'; } ?>"
                           value="<?php echo esc_attr( $atts['utm_medium'] ) ?>"
                           <?php if ( $atts['type'] === 'preset' && $atts['utm_medium'] ) : ?>readonly="readonly"<?php endif; ?>>

                    <input id="campaign_name"
                           class="regular-text"
                           name="campaign_name"
                           placeholder="<?php _e('Product, promo code, or slogan.', 'campaign-url-builder'); ?>"
                           type="<?php if( $atts['hidden'] && in_array('utm_campaign', $atts['hidden'] )) { echo 'hidden'; } else { echo 'text'; } ?>"
                           value="<?php echo esc_attr( $atts['utm_campaign'] ); ?>"
                           <?php if ( $atts['type'] === 'preset' && $atts['utm_campaign'] ) : ?>readonly="readonly"<?php endif; ?>>

                    <input id="campaign_term"
                           class="regular-text"
                           name="campaign_term"
                           placeholder="<?php _e('Identify the paid keywords', 'campaign-url-builder'); ?>"
                           type="<?php if( $atts['hidden'] && in_array('utm_term', $atts['hidden'] )) { echo 'hidden'; } else { echo 'text'; } ?>"
                           value="<?php echo esc_attr( $atts['utm_term'] ); ?>"
                           <?php if ( $atts['type'] === 'preset' && $atts['utm_term'] ) : ?>readonly="readonly"<?php endif; ?>>

                    <input id="campaign_content"
                           class="regular-text"
                           name="campaign_content"
                           placeholder="<?php _e('Use to differentiate ads', 'campaign-url-builder'); ?>"
                           type="<?php if( $atts['hidden'] && in_array('utm_content', $atts['hidden'] )) { echo 'hidden'; } else { echo 'text'; } ?>"
                           value="<?php echo esc_attr( $atts['utm_content'] ); ?>"
                           <?php if ( $atts['type'] === 'preset' && $atts['utm_content'] ) : ?>readonly="readonly"<?php endif; ?>>

                    <?php if ( $atts['custom_parameters'] ) : ?>
                        <input id="custom_parameters"
                               class="regular-text"
                               name="custom_parameters"
                               type="<?php if( $atts['hidden'] && in_array('custom_parameters', $atts['hidden'] )) { echo 'hidden'; } else { echo 'text'; } ?>"
                               value="<?php echo esc_attr( $atts['custom_parameters'] ); ?>"
                               <?php if ( $atts['type'] === 'preset' && $atts['custom_parameters'] ) : ?>readonly="readonly"<?php endif; ?>>
                    <?php endif; ?>

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