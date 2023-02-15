<?php

class reatlat_cub_Public
{
	private $plugin_name;
	private $version;
	private $debug;

	// constructor
	public function __construct( $plugin_name, $version )
    {
		$this->plugin_name     = $plugin_name;
		$this->version         = $version;
		$this->debug           = CUB_PLUGIN_DEBUG ? '' : '.min';
	}

	/**
	 * Enqueue scripts
	 */
	function enqueue_scripts()
    {
        wp_enqueue_script( 'tippy-all','https://cdnjs.cloudflare.com/ajax/libs/tippy.js/3.4.1/tippy.all' . $this->debug . '.js', array(), '3.4.1', true );
        wp_enqueue_script( 'clipboard','https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard' . $this->debug . '.js', array(), '2.0.4', true );
        wp_enqueue_script( 'jquery-validate','https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate' . $this->debug . '.js', array( 'jquery' ), '1.19.0', true );
        wp_enqueue_script( 'jquery-additional-methods','https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods' . $this->debug . '.js', array( 'jquery' ), '1.19.0', true );

        wp_enqueue_script( $this->plugin_name . '-public-script', CUB_PLUGIN_URL_PATH . 'assets/js/reatlat_cub-public' . $this->debug . '.js', array( 'jquery', 'tippy-all', 'clipboard' ), $this->version, true );

        wp_localize_script(
            $this->plugin_name . '-public-script',
            strtoupper($this->plugin_name) . '_APP',
            array(
                'AJAXURL' => admin_url( 'admin-ajax.php' ),
                'SC_ACTION' => $this->plugin_name . '_sc_create_link',
                'DEBUG_JS' => CUB_PLUGIN_DEBUG
            )
        );
	}

	/**
	 * Enqueue styles
	 */
	function enqueue_styles()
    {
        if ( get_option( $this->plugin_name . '_shortcode_styles' ) ) {
            wp_enqueue_style( $this->plugin_name,plugin_dir_url( __FILE__ ) . 'assets/css/reatlat_cub-public.css', array(), $this->version, 'all' );
        }
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
                'input-class' => '',
                'type' => 'default', // default | simple | advanced | preset
                'campaign_page' => '',
                'utm_source' => '',
                'utm_medium' => '',
                'utm_campaign' => '',
                'utm_term' => '',
                'utm_content' => '',
                'custom_parameters' => '', // any custom parameters separate by Vertical Bar |
                'hidden' => '', // hidden input field separate by comma
                'recaptcha' => 'false', // TODO: add recaptcha v3
            ), $atts, 'Campaign-URL-Builder' );

            if ( $atts['hidden'] )
            {
                $atts['hidden'] = explode(',', $atts['hidden'] );
            }

            if ( $atts['custom_parameters'] )
            {
                $atts['custom_parameters'] = explode('|', $atts['custom_parameters'] );

                for($i=0; $i < count($atts['custom_parameters']); $i++)
                {
                    $atts['custom_parameters'][$i] = explode('=', $atts['custom_parameters'][$i]);
                }
            }


            ob_start();

            ?>

            <div class="Campaign-URL-Builder Campaign-URL-Builder--form-wrapper <?php echo esc_attr($atts['wrapper']); ?>" <?php if ( $atts['wrapper-inline-style'] ) { echo 'style="' . esc_attr($atts['wrapper-inline-style']) . '"'; } ?>>
                <form action="#" method="post" class="Campaign-URL-Builder--form-wrapper__form <?php echo esc_attr($atts['form']); ?>" <?php if ( $atts['form-inline-style'] ) { echo 'style="' . esc_attr($atts['form-inline-style']) . '"'; } ?>>

                    <input id="campaign_page"
                           class="campaign_page input-regular-text <?php echo esc_attr($atts['input-class']); ?>"
                           name="campaign_page"
                           placeholder="<?php _e('Website URL', 'campaign-url-builder'); ?>"
                           type="<?php if( $atts['hidden'] && in_array('campaign_page', $atts['hidden'] )) { echo 'hidden'; } else { echo 'text'; } ?>"
                           value="<?php if ( $atts['campaign_page'] ) { echo esc_attr( $atts['campaign_page'] ); } else { echo get_permalink(); } ?>"
                           <?php if ( $atts['type'] === 'preset' && $atts['campaign_page'] ) : ?>readonly="readonly"<?php endif; ?>>

                    <input id="campaign_source"
                           class="campaign_source input-regular-text <?php echo esc_attr($atts['input-class']); ?>"
                           name="campaign_source"
                           placeholder="<?php _e('Campaign Source', 'campaign-url-builder'); ?>"
                           type="<?php if( $atts['hidden'] && in_array('utm_source', $atts['hidden'] )) { echo 'hidden'; } else { echo 'text'; } ?>"
                           value="<?php echo esc_attr( $atts['utm_source'] ) ?>"
                           <?php if ( $atts['type'] === 'preset' && $atts['utm_source'] ) : ?>readonly="readonly"<?php endif; ?>>

                    <input id="campaign_medium"
                           class="campaign_medium input-regular-text <?php echo esc_attr($atts['input-class']); ?>"
                           name="campaign_medium"
                           placeholder="<?php _e('Campaign Medium', 'campaign-url-builder'); ?>"
                           type="<?php if( $atts['hidden'] && in_array('utm_medium', $atts['hidden'] )) { echo 'hidden'; } else { echo 'text'; } ?>"
                           value="<?php echo esc_attr( $atts['utm_medium'] ) ?>"
                           <?php if ( $atts['type'] === 'preset' && $atts['utm_medium'] ) : ?>readonly="readonly"<?php endif; ?>>

                    <input id="campaign_name"
                           class="campaign_name input-regular-text <?php echo esc_attr($atts['input-class']); ?>"
                           name="campaign_name"
                           placeholder="<?php _e('Campaign Name, Product, promo code, or slogan.', 'campaign-url-builder'); ?>"
                           type="<?php if( $atts['hidden'] && in_array('utm_campaign', $atts['hidden'] )) { echo 'hidden'; } else { echo 'text'; } ?>"
                           value="<?php echo esc_attr( $atts['utm_campaign'] ); ?>"
                           <?php if ( $atts['type'] === 'preset' && $atts['utm_campaign'] ) : ?>readonly="readonly"<?php endif; ?>>

                    <input id="campaign_term"
                           class="campaign_term input-regular-text <?php echo esc_attr($atts['input-class']); ?>"
                           name="campaign_term"
                           placeholder="<?php _e('Identify the paid keywords', 'campaign-url-builder'); ?>"
                           type="<?php if( $atts['hidden'] && in_array('utm_term', $atts['hidden'] )) { echo 'hidden'; } else { echo 'text'; } ?>"
                           value="<?php echo esc_attr( $atts['utm_term'] ); ?>"
                           <?php if ( $atts['type'] === 'preset' && $atts['utm_term'] ) : ?>readonly="readonly"<?php endif; ?>>

                    <input id="campaign_content"
                           class="campaign_content input-regular-text <?php echo esc_attr($atts['input-class']); ?>"
                           name="campaign_content"
                           placeholder="<?php _e('Use to differentiate ads', 'campaign-url-builder'); ?>"
                           type="<?php if( $atts['hidden'] && in_array('utm_content', $atts['hidden'] )) { echo 'hidden'; } else { echo 'text'; } ?>"
                           value="<?php echo esc_attr( $atts['utm_content'] ); ?>"
                           <?php if ( $atts['type'] === 'preset' && $atts['utm_content'] ) : ?>readonly="readonly"<?php endif; ?>>


                    <?php for ($x = 0; $x <= 2; $x++) : ?>
                        <input id="custom_key_<?php echo $x+1; ?>"
                               class="custom_key input-regular-text <?php echo esc_attr($atts['input-class']); ?>"
                               name="custom_key_<?php echo $x+1; ?>"
                               type="hidden"
                               value="<?php if ( isset( $atts['custom_parameters'][$x][0] ) ) { echo esc_attr($atts['custom_parameters'][$x][0]); } ?>"
                               readonly="readonly">
                        <input id="custom_value_<?php echo $x+1; ?>"
                               class="custom_value input-regular-text <?php echo esc_attr($atts['input-class']); ?>"
                               name="custom_value_<?php echo $x+1; ?>"
                               type="hidden"
                               value="<?php if ( isset( $atts['custom_parameters'][$x][1] ) ) { echo esc_attr($atts['custom_parameters'][$x][1]); } ?>"
                               readonly="readonly">
                    <?php endfor; ?>

                    <?php wp_nonce_field('submit_manage_links', 'Campaign-URL-Builder__submit_manage_links--nonce'); ?>

                    <input class="input-submit-button js-reatlat_cub--create-link" type="submit" name="submit_manage_links" id="submit_manage_links" value="<?php _e('Get a link', 'campaign-url-builder'); ?>">

                </form>

                <div class="Campaign-URL-Builder--form-wrapper__link-container">
                    <div class="link-container--result">
                        <div class="link-container--result__link"><?php _e('Click button above to get a link', 'campaign-url-builder'); ?></div>
                        <div class="link-container--result__copy cub-tippy" data-clipboard-text="" data-copy="true" title="<?php _e('The link has been copied to clipboard.', 'campaign-url-builder'); ?>">
                            <span class="dashicons dashicons-clipboard"></span>
                        </div>
                    </div>

                </div>

                <div class="Campaign-URL-Builder--form-wrapper__notification">
                    <div class="notification--success">
                        <p>
                            <?php _e('Success', 'campaign-url-builder'); ?>
                        </p>
                    </div>
                    <div class="notification--error">
                        <p>
                            <?php _e('Sorry, something went wrong. Please try again.', 'campaign-url-builder'); ?>
                        </p>
                    </div>
                </div>

            </div>

            <?php

            $content = ob_get_contents();

            ob_end_clean();

            return $content;
        }
        add_shortcode( 'Campaign-URL-Builder', 'shortcode_frontend_link_generator_form' );
    }

}