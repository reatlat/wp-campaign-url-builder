<?php 

class reatlat_cub_Admin {

	private $plugin_real_name;
	private $plugin_name;
	private $version;
	private $messages;
	private $debug;

	/**
	 * constructor
	 */
	public function __construct( $plugin_real_name, $plugin_name, $version )
    {
		$this->plugin_real_name = $plugin_real_name;
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->debug = CUB_PLUGIN_DEBUG ? '' : '.min';

		global $wpdb;
        $this->db = $wpdb;

        $this->messages = array();

        $CLEAN_POST = stripslashes_deep( $_POST );
        $this->campaign_page       = (empty($CLEAN_POST['campaign_page'])       ? '' : self::get_cleaned($CLEAN_POST['campaign_page'], 'url'));
        $this->campaign_source     = (empty($CLEAN_POST['campaign_source'])     ? '' : self::get_cleaned($CLEAN_POST['campaign_source'], 'text'));
        $this->campaign_medium     = (empty($CLEAN_POST['campaign_medium'])     ? '' : self::get_cleaned($CLEAN_POST['campaign_medium'], 'text'));
        $this->campaign_name       = (empty($CLEAN_POST['campaign_name'])       ? '' : self::get_cleaned($CLEAN_POST['campaign_name'], 'text'));
        $this->campaign_term       = (empty($CLEAN_POST['campaign_term'])       ? '' : self::get_cleaned($CLEAN_POST['campaign_term'], 'text'));
        $this->campaign_content    = (empty($CLEAN_POST['campaign_content'])    ? '' : self::get_cleaned($CLEAN_POST['campaign_content'], 'text'));
        $this->custom_key_1        = (empty($CLEAN_POST['custom_key_1'])        ? '' : self::get_cleaned($CLEAN_POST['custom_key_1'], 'text'));
        $this->custom_value_1      = (empty($CLEAN_POST['custom_value_1'])      ? '' : self::get_cleaned($CLEAN_POST['custom_value_1'], 'text'));
        $this->custom_key_2        = (empty($CLEAN_POST['custom_key_2'])        ? '' : self::get_cleaned($CLEAN_POST['custom_key_2'], 'text'));
        $this->custom_value_2      = (empty($CLEAN_POST['custom_value_2'])      ? '' : self::get_cleaned($CLEAN_POST['custom_value_2'], 'text'));
        $this->custom_key_3        = (empty($CLEAN_POST['custom_key_3'])        ? '' : self::get_cleaned($CLEAN_POST['custom_key_3'], 'text'));
        $this->custom_value_3      = (empty($CLEAN_POST['custom_value_3'])      ? '' : self::get_cleaned($CLEAN_POST['custom_value_3'], 'text'));
        $this->submit_manage_links = (empty($CLEAN_POST['submit_manage_links']) ? '' : 1);

        $this->new_campaign_medium    = (empty($CLEAN_POST['new_campaign_medium'])    ? '' : self::get_cleaned($CLEAN_POST['new_campaign_medium'], 'text'));
        $this->new_campaign_source    = (empty($CLEAN_POST['new_campaign_source'])    ? '' : self::get_cleaned($CLEAN_POST['new_campaign_source'], 'text'));
        $this->remove_campaign_medium = (empty($CLEAN_POST['remove_campaign_medium']) ? '' : self::get_cleaned($CLEAN_POST['remove_campaign_medium'], 'text'));
        $this->remove_campaign_source = (empty($CLEAN_POST['remove_campaign_source']) ? '' : self::get_cleaned($CLEAN_POST['remove_campaign_source'], 'text'));
        $this->submit_settings        = (empty($CLEAN_POST['submit_settings'])        ? '' : 1);

        $this->advanced_api             = (empty($CLEAN_POST['advanced_api'])             ? '' : self::get_cleaned($CLEAN_POST['advanced_api'], 'text'));
        $this->custom_domain            = (empty($CLEAN_POST['custom_domain'])            ? '' : self::get_cleaned($CLEAN_POST['custom_domain'], 'text'));
        $this->remove_custom_domain     = (empty($CLEAN_POST['remove_custom_domain'])     ? '' : self::get_cleaned($CLEAN_POST['remove_custom_domain'], 'number'));
        $this->rebrandly_api_key        = (empty($CLEAN_POST['rebrandly_api_key'])        ? '' : self::get_cleaned($CLEAN_POST['rebrandly_api_key'], 'text'));
        $this->remove_rebrandly_api_key = (empty($CLEAN_POST['remove_rebrandly_api_key']) ? '' : self::get_cleaned($CLEAN_POST['remove_rebrandly_api_key'], 'number'));
        $this->bitly_api_key            = (empty($CLEAN_POST['bitly_api_key'])            ? '' : self::get_cleaned($CLEAN_POST['bitly_api_key'], 'text'));
        $this->remove_bitly_api_key     = (empty($CLEAN_POST['remove_bitly_api_key'])     ? '' : self::get_cleaned($CLEAN_POST['remove_bitly_api_key'], 'number'));
        $this->advanced_admin_only      = (empty($CLEAN_POST['advanced_admin_only'])      ? '' : self::get_cleaned($CLEAN_POST['advanced_admin_only'], 'checkbox'));
        $this->advanced_keep_settings   = (empty($CLEAN_POST['advanced_keep_settings'])   ? '' : self::get_cleaned($CLEAN_POST['advanced_keep_settings'], 'checkbox'));
        $this->advanced_keep_linkquery  = (empty($CLEAN_POST['advanced_keep_linkquery'])  ? '' : self::get_cleaned($CLEAN_POST['advanced_keep_linkquery'], 'checkbox'));
        $this->advanced_keep_linkanchor = (empty($CLEAN_POST['advanced_keep_linkanchor']) ? '' : self::get_cleaned($CLEAN_POST['advanced_keep_linkanchor'], 'checkbox'));
        $this->advanced_show_creator    = (empty($CLEAN_POST['advanced_show_creator'])    ? '' : self::get_cleaned($CLEAN_POST['advanced_show_creator'], 'checkbox'));
        $this->advanced_show_useronly   = (empty($CLEAN_POST['advanced_show_useronly'])   ? '' : self::get_cleaned($CLEAN_POST['advanced_show_useronly'], 'checkbox'));
        $this->advanced_metaboxes       = (empty($CLEAN_POST['advanced_metaboxes'])       ? '' : self::get_cleaned($CLEAN_POST['advanced_metaboxes'], 'checkbox'));
        $this->submit_advanced          = (empty($CLEAN_POST['submit_advanced'])          ? '' : 1);

        $this->shortcode_activator       = (empty($CLEAN_POST['shortcode_activator'])       ? '' : self::get_cleaned($CLEAN_POST['shortcode_activator'], 'checkbox'));
        $this->shortcode_anonymous       = (empty($CLEAN_POST['shortcode_anonymous'])       ? '' : self::get_cleaned($CLEAN_POST['shortcode_anonymous'], 'checkbox'));
        $this->shortcode_styles          = (empty($CLEAN_POST['shortcode_styles'])          ? '' : self::get_cleaned($CLEAN_POST['shortcode_styles'], 'checkbox'));
        $this->shortcode_recaptcha       = (empty($CLEAN_POST['shortcode_recaptcha'])       ? '' : self::get_cleaned($CLEAN_POST['shortcode_recaptcha'], 'checkbox'));
        $this->recaptcha_site_key        = (empty($CLEAN_POST['recaptcha_site_key'])        ? '' : self::get_cleaned($CLEAN_POST['recaptcha_site_key'], 'text'));
        $this->recaptcha_secret_key      = (empty($CLEAN_POST['recaptcha_secret_key'])      ? '' : self::get_cleaned($CLEAN_POST['recaptcha_secret_key'], 'text'));
        $this->remove_recaptcha_keys     = (empty($CLEAN_POST['remove_recaptcha_keys'])     ? '' : self::get_cleaned($CLEAN_POST['remove_recaptcha_keys'], 'number'));
        $this->submit_shortcode_settings = (empty($CLEAN_POST['submit_shortcode_settings']) ? '' : 1);

        $this->remove_link_id         = (empty($CLEAN_POST['remove_link_id'])        ? '' : self::get_cleaned($CLEAN_POST['remove_link_id'], 'text'));
        $this->remove_link_id_submit  = (empty($CLEAN_POST['remove_link_id_submit']) ? '' : 1);

        $this->reset_links   = (empty($CLEAN_POST['reset_links'])   ? '' : self::get_cleaned($CLEAN_POST['reset_links'], 'checkbox'));
        $this->reset_mediums = (empty($CLEAN_POST['reset_mediums']) ? '' : self::get_cleaned($CLEAN_POST['reset_mediums'], 'checkbox'));
        $this->reset_sources = (empty($CLEAN_POST['reset_sources']) ? '' : self::get_cleaned($CLEAN_POST['reset_sources'], 'checkbox'));
        $this->reset_options = (empty($CLEAN_POST['reset_options']) ? '' : self::get_cleaned($CLEAN_POST['reset_options'], 'checkbox'));
        $this->reset_all     = (empty($CLEAN_POST['reset_all'])     ? '' : self::get_cleaned($CLEAN_POST['reset_all'], 'checkbox'));
        $this->submit_reset  = (empty($CLEAN_POST['submit_reset'])  ? '' : 1);

    }

	public function get_plugin_name()
    {
		return $this->plugin_name;
	}

	/**
	 * Add submenu to left page in admin
	 */
	public function add_submenu_page()
    {
		add_menu_page(
		    __('Campaign URL Builder', $this->plugin_real_name), // page_title
            __('Campaign URL Builder', $this->plugin_real_name), // menu_title
            'edit_posts', // capability
            $this->plugin_name . '-settings-page', array($this, 'render_settings_page'), // menu_slug
            'dashicons-share-alt' // icon_url
        );
	}

    /**
     * Register meta box links list.
     */
	public function add_meta_box__links_list()
    {
        add_meta_box(
            'reatlat_cub-metabox--links-list',
            __( 'Campaign URL Builder: Existing generated links', 'campaign-url-builder' ),
            function() {
                require plugin_dir_path( __FILE__ ) . 'views/' . $this->plugin_name . '-admin-metabox--links-list.php';
            },
            null
        );
    }

    /**
     * Register meta box create a tracking link.
     */
    public function add_meta_box__create_link()
    {
        add_meta_box(
            'reatlat_cub-metabox--create-link',
            __( 'Campaign URL Builder: Create a tracking link', 'campaign-url-builder' ),
            function() {
                require plugin_dir_path( __FILE__ ) . 'views/' . $this->plugin_name . '-admin-metabox--create-link.php';
            },
            null
        );
    }

    /**
     * Add ajax for create link form.
     */
    public function ajax_create_link()
    {
        if ( $this->campaign_page && $this->campaign_source && $this->campaign_medium && $this->campaign_name ) {

            $link = self::add_link();

            $response = array(
                "result"              => true,
                "campaign_full_link"  => $link["campaign_full_link"],
                "campaign_short_link" => $link["campaign_short_link"],
                "campaign_name"       => $link["campaign_name"],
                "user_id"             => $link["user_id"],
                "user_name"           => $link["user_name"],
                "user_role"           => $link["user_role"]
            );

            header( "Content-Type: application/json" );
            echo json_encode($response);

        } else {

            $response = array(
                "result" => false,
                "message" => "Sorry, something went wrong. Please try again.",
                "request" => array(
                    "campaign_page" => $this->campaign_page,
                    "campaign_source" => $this->campaign_source,
                    "campaign_medium" => $this->campaign_medium,
                    "campaign_name" => $this->campaign_name
                )
            );

            header( "Content-Type: application/json" );
            echo json_encode($response);

        }

        //Don't forget to always exit in the ajax function.
        exit();
    }

    /**
     * Autocomplete for campaign link field
     */
    public function autocomplete_link_js()
    {
        // TODO: add support custom post type
        $args = array(
            'post_type'      => ['post', 'page'],
            'post_status'    => 'publish',
            'posts_per_page' => -1 // all posts
        );

        $posts = get_posts( $args );

        if( $posts ) :
            foreach( $posts as $k => $post ) {
                $source[$k]['id']    = $post->ID;
                $source[$k]['label'] = $post->post_title; // The name of the post
                $source[$k]['value'] = get_permalink( $post->ID );
            }

            ?>
            <script type="text/javascript">
                jQuery(document).ready(function($){
                    var posts = <?php echo json_encode( array_values( $source ) ); ?>;
                    $('input.js-reatlat_cub--autocomplete-link').autocomplete({
                        source: posts,
                        minLength: 2
                    });
                });
            </script>
            <?php
        endif;
    }

    /**
     * Add ajax for export csv
     */
    public function ajax_export_csv()
    {
        if ( isset($_POST['Campaign-URL-Builder__export_to_csv--nonce']) && wp_verify_nonce( $_POST['Campaign-URL-Builder__export_to_csv--nonce'], 'export_to_csv' ) ) :

            $links = self::get_links();

            $array = array(
                array('#', 'URL_ID', 'CAMPAIGN_NAME', 'SHORT_URL', 'SHORT_URL_INFO', 'FULL_URL', 'USERNAME', 'USER_ROLE')
            );

            if ( count($links) > 0 )
            {
                foreach ( $links as $key => $link )
                {
                    $info_link = strtr($link->campaign_short_link, array(
                        '://goo.gl' => '://goo.gl/info',
                        '://bit.ly' => '://bit.ly/info'
                    ));

                    $username = sanitize_user( get_userdata($link->user_id)->display_name );
                    $userrole = implode(', ', get_userdata($link->user_id)->roles);

                    array_push($array, array(
                        $key + 1,
                        $link->id,
                        $link->campaign_name,
                        $link->campaign_short_link,
                        $info_link,
                        $link->campaign_full_link,
                        $username,
                        $userrole
                    ));
                }
            }

            echo self::array2csv($array);

        else :
            echo 'error';
        endif;

        //Don't forget to always exit in the ajax function.
        exit();
    }

    /**
     * Convert array to csv format
     */
    public function array2csv(array &$array)
    {
        if (count($array) == 0) {
            return null;
        }
        ob_start();
        $df = fopen("php://output", 'w');
        //fputcsv($df, array_keys(reset($array))); // optional row with IDs
        foreach ($array as $row) {
            fputcsv($df, $row);
        }
        fclose($df);
        return ob_get_clean();
    }

	/**
	 * Render settings page for plugin
	 */
	public function render_settings_page()
    {
        require plugin_dir_path( __FILE__ ) . 'views/' . $this->plugin_name . '-admin-settings-page.php';
	}

	/**
	 * prepare enqueue styles for wordpress hook
	 */
	public function enqueue_styles()
    {
		wp_enqueue_style( $this->plugin_name, CUB_PLUGIN_URL_PATH . 'assets/css/reatlat_cub-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * prepare enqueue scripts for wordpress hook
	 */
	public function enqueue_scripts()
    {
        wp_enqueue_script( 'tippy-all','https://cdnjs.cloudflare.com/ajax/libs/tippy.js/3.4.1/tippy.all' . $this->debug . '.js', array(), '3.4.1', true );
        wp_enqueue_script( 'clipboard','https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard' . $this->debug . '.js', array(), '2.0.4', true );
        wp_enqueue_script( 'jquery-validate','https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate' . $this->debug . '.js', array( 'jquery' ), '1.19.0', true );
        wp_enqueue_script( 'jquery-additional-methods','https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods' . $this->debug . '.js', array( 'jquery' ), '1.19.0', true );

        wp_enqueue_script( $this->plugin_name.'-admin-script', CUB_PLUGIN_URL_PATH . 'assets/js/reatlat_cub-admin' . $this->debug . '.js', array(  'jquery', 'tippy-all', 'clipboard' ), null, true );

        // Enqueue jQuery UI and autocomplete
        wp_enqueue_script( 'jquery-ui-core' );
        wp_enqueue_script( 'jquery-ui-autocomplete' );

        wp_localize_script(
            $this->plugin_name . '-admin-script',
            strtoupper($this->plugin_name) . '_APP',
            array(
                'AJAXURL' => admin_url( 'admin-ajax.php' ),
                'DEBUG_JS' => CUB_PLUGIN_DEBUG,
                'CLIPBOARD' => version_compare( get_bloginfo('version'), '5.2', '>=' ) ? 'ClipboardJS' : 'Clipboard'
            )
        );
	}

	/**
	 * prepare enqueue scripts for wordpress hook
	 */
	public function enqueue_notices()
    {
		foreach( $this->messages as $message )
		{
			// error warning info success
			echo '<div class="notice notice-' . $message[1] . ' is-dismissible"><p>' . $message[0] . '</p></div>';
		}
	}

	/**
	 * add a settings link to plugin page.
	 * @param string $links array of links
	 */
	public function add_settings_link( $links )
    {
	    $settings_link = '<a href="admin.php?page=' . $this->plugin_name . '-settings-page">' . __( 'Settings', 'campaign-url-builder' ) . '</a>';
	    array_unshift($links, $settings_link);
	  	return $links;
	}

    /**
     * Print additional links to plugin meta row
     */
    public function add_plugin_row_meta()
    {
        add_filter( 'plugin_row_meta', function( $links, $file ) {
            if (strpos($file, $this->plugin_name . '.php') !== false) {
                $new_links = array(
                    'donate' => '<a href="https://www.paypal.me/reatlat/' . rand(3, 10) . 'usd" target="_blank"><span class="dashicons dashicons-heart"></span> ' . __('Donate', 'campaign-url-builder') . '</a>',
                    'rateit' => '<a href="https://wordpress.org/support/view/plugin-reviews/' . $this->plugin_real_name . '?rate=5#postform" target="_blank"><span class="dashicons dashicons-star-filled"></span> ' . __('Rate it', 'campaign-url-builder') . '</a>'
                );
                $links = array_merge($links, $new_links);
            }
            return $links;
        }, 10, 3 );
    }

	/**
	 * clean query string like POST or GET
	 * @param  string $string POST OR GET
	 * @param  string $type   text, number or url...
	 * @param  string $length limit length
	 */
	private function get_cleaned( $string, $type = 'text', $length = '' )
    {
        if ( empty( $string ) ) return false;
		if ( $type === 'text' )	return sanitize_text_field( $string );
		if ( $type === 'number' ) return intval( $string );
		if ( $type === 'checkbox' ) return wp_validate_boolean( $string );
        if ( $type === 'url' && substr(esc_url_raw($string), 0, 4) !== 'http' )
        {
            array_push( $this->messages, array( __('Page to link is not a valid url. It has to start with http.', 'campaign-url-builder'), 'warning' ) );
        } else {
            return esc_url_raw( $string );
        }
        return false;
	}

	public function check_manage_links()
    {
        if ( isset($_POST['Campaign-URL-Builder__submit_manage_links--nonce']) && wp_verify_nonce( $_POST['Campaign-URL-Builder__submit_manage_links--nonce'], 'submit_manage_links' ) ) :
            if ( $this->campaign_page && $this->campaign_source && $this->campaign_medium && $this->campaign_name )
            {
                self::add_link();
            } else {
                if (!empty($this->submit_manage_links)) {
                    array_push($this->messages, array(__('Page to link, Source, Medium or Campaign Name ar missing', 'campaign-url-builder'), 'error'));
                }
            }
        endif;
	}

	public function get_full_link()
    {
        $target_url = parse_url( $this->campaign_page );

        $campaign_term    = $this->campaign_term ? '&utm_term=' . urlencode($this->campaign_term) : '';
        $campaign_content = $this->campaign_content ? '&utm_content=' . urlencode($this->campaign_content) : '';
		$custom_pair_1    = ( $this->custom_key_1 && $this->custom_value_1 ) ? '&' . urlencode($this->custom_key_1) . '=' . urlencode($this->custom_value_1) : '';
		$custom_pair_2    = ( $this->custom_key_2 && $this->custom_value_2 ) ? '&' . urlencode($this->custom_key_2) . '=' . urlencode($this->custom_value_2) : '';
		$custom_pair_3    = ( $this->custom_key_3 && $this->custom_value_3 ) ? '&' . urlencode($this->custom_key_3) . '=' . urlencode($this->custom_value_3) : '';

		// Build full target link
        $campaign_target_url = $target_url['scheme'] . '://' . $target_url['host'] . $target_url['path'];

        $campaign_target_url .= '?utm_source=' . urlencode($this->campaign_source);
        $campaign_target_url .= '&utm_medium=' . urlencode($this->campaign_medium);
        $campaign_target_url .= '&utm_campaign=' . urlencode($this->campaign_name);
        $campaign_target_url .= $campaign_term;
        $campaign_target_url .= $campaign_content;
        $campaign_target_url .= $custom_pair_1;
        $campaign_target_url .= $custom_pair_2;
        $campaign_target_url .= $custom_pair_3;

        if ( get_option( $this->plugin_name . '_keep_linkquery' ) && isset($target_url['query']) )
        {
            $exclude_query_parameters = array('utm_source', 'utm_medium', 'utm_campaign');

            if ( !empty( $campaign_term ) )
                array_push($exclude_query_parameters, 'utm_term');

            if ( !empty( $campaign_content ) )
                array_push($exclude_query_parameters, 'utm_content');

            if ( !empty( $custom_pair_1 ) )
                array_push($exclude_query_parameters, urlencode($this->custom_key_1) );

            if ( !empty( $custom_pair_2 ) )
                array_push($exclude_query_parameters, urlencode($this->custom_key_2) );

            if ( !empty( $custom_pair_3 ) )
                array_push($exclude_query_parameters, urlencode($this->custom_key_3) );

            $target_url['query'] = explode('&', $target_url['query']);

            foreach ( $target_url['query'] as $query_item ) {
                if ( ! in_array( explode('=', $query_item)[0],  $exclude_query_parameters, true ) ) {
                    $campaign_target_url .= '&' . $query_item;
                }
            }
        }

        if ( get_option( $this->plugin_name . '_keep_linkanchor' ) )
        {
            $campaign_target_url .= ( isset($target_url['fragment']) && !empty($target_url['fragment']) ) ? '#' . $target_url['fragment'] : '';
        }

        return $campaign_target_url;
	}

	private function add_link()
    {
        $campaign_full_link = self::get_full_link();

        $campaign_short_link = self::get_shortlink( $campaign_full_link );

        $current_user = wp_get_current_user();

        $this->db->insert(
            $this->db->prefix . $this->plugin_name . '_links',
            array(
                'campaign_name'       => $this->campaign_name,
                'campaign_full_link'  => $campaign_full_link,
                'campaign_short_link' => $campaign_short_link,
                'user_id'             => $current_user->ID,
                'date'                => time()
            )
        );

        $response = array(
            "campaign_full_link"  => $campaign_full_link,
            "campaign_short_link" => $campaign_short_link,
            "campaign_name"       => $this->campaign_name,
            "user_id"             => $current_user->ID,
            "user_name"           => $current_user->user_login,
            "user_role"           => get_userdata($current_user->ID)->roles
        );

        array_push( $this->messages, array( __('A new Campaign Link has been created successfully.', 'campaign-url-builder'), 'success') );

        $this->campaign_page    = '';
        $this->campaign_source  = '';
        $this->campaign_medium  = '';
        $this->campaign_name    = '';
        $this->campaign_term    = '';
        $this->campaign_content = '';
        $this->custom_key_1     = '';
        $this->custom_value_1   = '';
        $this->custom_key_2     = '';
        $this->custom_value_2   = '';
        $this->custom_key_3     = '';
        $this->custom_value_3   = '';

        return $response;
	}

	private function get_shortlink($full_link)
    {
        if ( get_option( $this->plugin_name . '_advanced_api' ) === 'rebrandly' ) {

            $domain = !empty($this->get_custom_domain()) ? $this->get_custom_domain() : 'rebrand.ly';

            $response = wp_remote_post( 'https://api.rebrandly.com/v1/links', array(
                    'method'      => 'POST',
                    'headers'     => array(
                        'apikey'       => $this->get_shortener_api_key('rebrandly'),
                        'Content-Type' => 'application/json',
                    ),
                    'body'        => json_encode (array(
                        'domain'       => $domain,
                        'destination'  => $full_link
                    ))
                )
            );

        } else { // if ( get_option( $this->plugin_name . '_advanced_api' ) === 'bitly' ) {

            $response = wp_remote_post( 'https://api-ssl.bit.ly/v4/shorten', array(
                    'method'      => 'POST',
                    'headers'     => array(
                        'Authorization' => 'Bearer ' . $this->get_shortener_api_key('bitly'),
                        'Content-Type'  => 'application/json',
                    ),
                    'body'        => json_encode (array(
                        'long_url'  => $full_link
                    ))
                )
            );

        }

        if ( is_wp_error( $response ) ) {
            $error_message = $response->get_error_message();
            array_push($this->messages, array( sprintf(__('Something went wrong: %s', 'campaign-url-builder'), $error_message), 'error'));
            return 'n/a';
        }

        // DEBUG
        // echo 'Response:<pre>';
        // print_r( $response );
        // echo '</pre>';

        $response = json_decode($response["body"], true);

        if ( $this->is_shortener_vendor('rebrandly') && isset($response['shortUrl']) && $response['shortUrl'] )
            return $response['shortUrl'];

        if( $this->is_shortener_vendor('bitly') && isset($response['link']) && $response['link'] )
            return $response['link'];

        return 'n/a';
    }

    public function is_shortener_vendor($vendor)
    {
	    return ( get_option( $this->plugin_name . '_advanced_api' ) === $vendor );
    }

    private function get_shortener_api_key($vendor)
    {
        $key = '';

        switch ($vendor) {
            case 'bitly':
                $key = get_option( $this->plugin_name . '_bitly_api_key' ) ? get_option( $this->plugin_name . '_bitly_api_key' ) : '13064f875b10a4e38709f8b963ca9f32acbc0937';
                break;

            case 'rebrandly':
                $key = get_option( $this->plugin_name . '_rebrandly_api_key' ) ? get_option( $this->plugin_name . '_rebrandly_api_key' ) : 'd3ca01cdd8114a91a76314286cfdb32f';
                break;
        }


        return $key;
    }

    public function esc_shortener_api_key($vendor, $visible = false)
    {
        $key = $this->get_shortener_api_key($vendor);

        if ( !$visible )
            $key = str_repeat( '*', strlen( $key ) - 5 ) . substr( $key, - 5 );

        echo esc_attr( $key );
    }

    private function get_info_link($url)
    {
        $url = strtr($url, array(
            '://goo.gl' => '://goo.gl/info',
            '://bit.ly' => '://bit.ly/info',
        ));

        // this part only for rebrandly
        $domain = parse_url($url);
        $custom_domain = !empty($this->get_custom_domain()) ? $this->get_custom_domain() : false;
        if ( $domain['host'] === 'rebrand.ly' || $domain['host'] === $custom_domain )
            $url .= '.stats';

        return $url;
    }

    public function esc_info_link($url)
    {
        $url = $this->get_info_link( esc_url_raw($url) );
        echo esc_url_raw( $url );
    }

    private function get_custom_domain()
    {
        return get_option( $this->plugin_name . '_custom_domain' );
    }

    public function esc_custom_domain()
    {
        echo esc_attr( $this->get_custom_domain() );
    }

	public function get_links()
    {
        if ( current_user_can('administrator') || ! get_option( $this->plugin_name . '_show_useronly' ) )
            return $this->db->get_results( "SELECT * FROM " . $this->db->prefix . $this->plugin_name . "_links ORDER by date DESC" );

        return $this->db->get_results( "SELECT * FROM " . $this->db->prefix . $this->plugin_name . "_links WHERE user_id = " . get_current_user_id() . " ORDER by date DESC" );
    }

	public function get_sources()
    {
        return $this->db->get_results( "SELECT * FROM " . $this->db->prefix . $this->plugin_name . "_sources ORDER by source_name ASC" );
	}

	public function get_mediums()
    {
        return $this->db->get_results( "SELECT * FROM " . $this->db->prefix . $this->plugin_name . "_mediums ORDER by medium_name ASC" );
	}

	public function check_settings()
    {
        if ( isset($_POST['Campaign-URL-Builder__submit_settings--nonce']) && wp_verify_nonce( $_POST['Campaign-URL-Builder__submit_settings--nonce'], 'submit_settings' ) ) :
            if ( !empty($this->submit_settings) )
            {
                // add new source / medium
                if ( !empty($this->new_campaign_medium) )
                {
                    $this->db->insert( $this->db->prefix . $this->plugin_name . '_mediums',array('medium_name' => $this->new_campaign_medium ));
                    array_push( $this->messages, array( __('New Campaign Medium has been added', 'campaign-url-builder'), 'success' ) );
                }
                if ( !empty($this->new_campaign_source) )
                {
                    $this->db->insert( $this->db->prefix . $this->plugin_name . '_sources',array('source_name' => $this->new_campaign_source ));
                    array_push( $this->messages, array( __('New Campaign Source has been added', 'campaign-url-builder'), 'success' ) );
                }

                // remove source / medium
                if ( !empty($this->remove_campaign_medium) )
                {
                    $this->db->delete( $this->db->prefix . $this->plugin_name . '_mediums',array('medium_name' => $this->remove_campaign_medium));
                    array_push( $this->messages, array( __('A Campaign Medium has been removed', 'campaign-url-builder'), 'success' ) );

                }
                if ( !empty($this->remove_campaign_source) )
                {
                    $this->db->delete( $this->db->prefix . $this->plugin_name . '_sources',array('source_name' => $this->remove_campaign_source));
                    array_push( $this->messages, array( __('A Campaign Source has been removed', 'campaign-url-builder'), 'success' ) );
                }
            }
        endif;
	}

    public function check_advanced()
    {
        if ( isset($_POST['Campaign-URL-Builder__submit_advanced--nonce']) && wp_verify_nonce( $_POST['Campaign-URL-Builder__submit_advanced--nonce'], 'submit_advanced' ) ) :
            if (!empty($this->submit_advanced))
            {
                if ( ! $this->advanced_keep_settings && $this->advanced_keep_settings !== get_option( $this->plugin_name . '_keep_settings' ) )
                {
                    array_push( $this->messages, array( __('Option <strong>"Keep settings and data after delete plugin"</strong> was disabled', 'campaign-url-builder'), 'warning' ) );
                }
                update_option( $this->plugin_name . '_admin_only', $this->advanced_admin_only );
                update_option( $this->plugin_name . '_keep_settings', $this->advanced_keep_settings );
                update_option( $this->plugin_name . '_keep_linkquery', $this->advanced_keep_linkquery );
                update_option( $this->plugin_name . '_keep_linkanchor', $this->advanced_keep_linkanchor );
                update_option( $this->plugin_name . '_show_creator', $this->advanced_show_creator );
                update_option( $this->plugin_name . '_show_useronly', $this->advanced_show_useronly );
                update_option( $this->plugin_name . '_metaboxes', $this->advanced_metaboxes );

                // Choose API endpoint
                if ( !empty($this->advanced_api) && $this->advanced_api != get_option( $this->plugin_name . '_advanced_api' ) )
                {
                    update_option( $this->plugin_name . '_advanced_api', $this->advanced_api );
                }

                // Custom domain name
                if ( !empty($this->custom_domain) && $this->custom_domain != get_option( $this->plugin_name . '_custom_domain' ) )
                {
                    // TODO check if user pass URL
                    update_option( $this->plugin_name . '_custom_domain', $this->custom_domain );
                    array_push( $this->messages, array( __('Custom domain name has been updated.', 'campaign-url-builder'), 'success' ) );
                }

                if ( !empty($this->remove_custom_domain) && $this->remove_custom_domain == 1 )
                {
                    update_option( $this->plugin_name . '_custom_domain', '' );
                    array_push( $this->messages, array( __('Custom domain name is reset to default.', 'campaign-url-builder'), 'success' ) );
                }

                // Rebrandly API key
                if ( !empty($this->rebrandly_api_key) && $this->rebrandly_api_key != get_option( $this->plugin_name . '_rebrandly_api_key' ) )
                {
                    update_option( $this->plugin_name . '_rebrandly_api_key', $this->rebrandly_api_key );
                    array_push( $this->messages, array( __('Rebrandly API key has been updated.', 'campaign-url-builder'), 'success' ) );
                }

                if ( !empty($this->remove_rebrandly_api_key) && $this->remove_rebrandly_api_key == 1 )
                {
                    update_option( $this->plugin_name . '_rebrandly_api_key', '' );
                    array_push( $this->messages, array( __('Rebrandly API key is empty now.', 'campaign-url-builder'), 'success' ) );
                }

                // Bitly API key
                if ( !empty($this->bitly_api_key) && $this->bitly_api_key != get_option( $this->plugin_name . '_bitly_api_key' ) )
                {
                    update_option( $this->plugin_name . '_bitly_api_key', $this->bitly_api_key );
                    array_push( $this->messages, array( __('Bitly API key has been updated.', 'campaign-url-builder'), 'success' ) );
                }

                if ( !empty($this->remove_bitly_api_key) && $this->remove_bitly_api_key == 1 )
                {
                    update_option( $this->plugin_name . '_bitly_api_key', '' );
                    array_push( $this->messages, array( __('Bitly API key is empty now.', 'campaign-url-builder'), 'success' ) );
                }

                array_push( $this->messages, array( __('Advanced setting has been updated', 'campaign-url-builder'), 'success' ) );
            }
        endif;
    }

    public function check_shortcode_settings()
    {
        if ( isset($_POST['Campaign-URL-Builder__submit_shortcode_settings--nonce']) && wp_verify_nonce( $_POST['Campaign-URL-Builder__submit_shortcode_settings--nonce'], 'submit_shortcode_settings' ) ) :
            if (!empty($this->submit_shortcode_settings))
            {
                update_option( $this->plugin_name . '_shortcode_activator', $this->shortcode_activator );
                update_option( $this->plugin_name . '_shortcode_anonymous', $this->shortcode_anonymous );
                update_option( $this->plugin_name . '_shortcode_styles', $this->shortcode_styles );
                update_option( $this->plugin_name . '_shortcode_recaptcha', $this->shortcode_recaptcha );

                if ( !empty($this->remove_recaptcha_keys) && $this->remove_recaptcha_keys == 1 ) :
                    update_option( $this->plugin_name . '_recaptcha_site_key', '' );
                    update_option( $this->plugin_name . '_recaptcha_secret_key', '' );
                    array_push( $this->messages, array( __('Google reCaptcha API keys is empty now.', 'campaign-url-builder'), 'success' ) );
                else :
                    if ( !empty($this->recaptcha_site_key) && $this->recaptcha_site_key != get_option( $this->plugin_name . '_recaptcha_site_key' ) )
                    {
                        update_option( $this->plugin_name . '_recaptcha_site_key', $this->recaptcha_site_key );
                    }

                    if ( !empty($this->recaptcha_secret_key) && $this->recaptcha_secret_key != get_option( $this->plugin_name . '_recaptcha_secret_key' ) )
                    {
                        update_option( $this->plugin_name . '_recaptcha_secret_key', $this->recaptcha_secret_key );
                    }
                endif;

                array_push( $this->messages, array( __('Shortcodes setting has been updated', 'campaign-url-builder'), 'success' ) );
            }
        endif;
    }

    public function check_reset()
    {
        if ( isset($_POST['Campaign-URL-Builder__submit_reset--nonce']) && wp_verify_nonce( $_POST['Campaign-URL-Builder__submit_reset--nonce'], 'submit_reset' ) ) :
            if (!empty($this->submit_reset))
            {
                $reset = new reatlat_cub_Reset( $this->plugin_name );

                if ( $this->reset_all || ( $this->reset_links && $this->reset_mediums && $this->reset_sources && $this->reset_options) )
                {
                    $this->reset_all = true;
                    $reset->reset_all();
                    array_push( $this->messages, array( __('All plugin settings and data has been reset to default', 'campaign-url-builder'), 'error' ) );
                }

                if ( $this->reset_links && ! $this->reset_all )
                {
                    $reset->reset_links();
                    array_push( $this->messages, array( __('All <strong>"campaign-links"</strong> has been deleted', 'campaign-url-builder'), 'warning' ) );
                }

                if ( $this->reset_mediums && ! $this->reset_all )
                {
                    $reset->reset_mediums();
                    array_push( $this->messages, array( __('All <strong>"Mediums"</strong> has been deleted', 'campaign-url-builder'), 'warning' ) );
                }

                if ( $this->reset_sources && ! $this->reset_all )
                {
                    $reset->reset_sources();
                    array_push( $this->messages, array( __('All <strong>"Sources"</strong> has been deleted', 'campaign-url-builder'), 'warning' ) );
                }

                if ( $this->reset_options && ! $this->reset_all )
                {
                    $reset->reset_options();
                    array_push( $this->messages, array( __('All <strong>"Settings & Options"</strong> has been reset to default', 'campaign-url-builder'), 'warning' ) );
                }

                unset($reset);

                $activation = new reatlat_cub_Activator( $this->plugin_name );
                $activation->run();
                unset($activation);
            }
        endif;
    }

    public function remove_link_id()
    {
        if (!empty($this->remove_link_id))
        {
            $this->db->delete( $this->db->prefix . $this->plugin_name . '_links',array('id' => $this->remove_link_id));
        }
    }

	public function get_promote_content( $url, $arg = array() )
    {
        //TODO: make news feed with reatlat API endpoint
        //TODO: create my own REST API on https://api.reatlat.net

        $request = wp_remote_get( $url, $arg );

        $response = wp_remote_retrieve_body( $request );

        return $response;
	}

	// helpers
    public function strpos_array( $haystack, $needle, $offset=0 )
    {
        if(!is_array($needle)) $needle = array($needle);
        foreach($needle as $query) {
            if(strpos($haystack, $query, $offset) !== false)
                return true; // stop on first true result
        }
        return false;
    }

}
