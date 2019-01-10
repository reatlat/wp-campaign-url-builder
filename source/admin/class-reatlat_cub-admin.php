<?php 

class reatlat_cub_Admin {

	private $plugin_real_name;
	private $plugin_name;
	private $version;
	private $messages;

	/**
	 * constructor
	 */
	public function __construct( $plugin_real_name, $plugin_name, $version )
    {
		$this->plugin_real_name = $plugin_real_name;
		$this->plugin_name = $plugin_name;
		$this->version = $version;

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

        $this->advanced_api           = (empty($CLEAN_POST['advanced_api'])           ? '' : self::get_cleaned($CLEAN_POST['advanced_api'], 'text'));
        $this->google_api_key         = (empty($CLEAN_POST['google_api_key'])         ? '' : self::get_cleaned($CLEAN_POST['google_api_key'], 'text'));
        $this->remove_google_api_key  = (empty($CLEAN_POST['remove_google_api_key'])  ? '' : self::get_cleaned($CLEAN_POST['remove_google_api_key'], 'number'));
        $this->bitly_api_key          = (empty($CLEAN_POST['bitly_api_key'])          ? '' : self::get_cleaned($CLEAN_POST['bitly_api_key'], 'text'));
        $this->remove_bitly_api_key   = (empty($CLEAN_POST['remove_bitly_api_key'])   ? '' : self::get_cleaned($CLEAN_POST['remove_bitly_api_key'], 'number'));
        $this->advanced_admin_only    = (empty($CLEAN_POST['advanced_admin_only'])    ? '' : self::get_cleaned($CLEAN_POST['advanced_admin_only'], 'checkbox'));
        $this->advanced_keep_settings = (empty($CLEAN_POST['advanced_keep_settings']) ? '' : self::get_cleaned($CLEAN_POST['advanced_keep_settings'], 'checkbox'));
        $this->advanced_show_creator  = (empty($CLEAN_POST['advanced_show_creator'])  ? '' : self::get_cleaned($CLEAN_POST['advanced_show_creator'], 'checkbox'));
        $this->advanced_show_useronly = (empty($CLEAN_POST['advanced_show_useronly']) ? '' : self::get_cleaned($CLEAN_POST['advanced_show_useronly'], 'checkbox'));
        $this->advanced_metaboxes     = (empty($CLEAN_POST['advanced_metaboxes'])     ? '' : self::get_cleaned($CLEAN_POST['advanced_metaboxes'], 'checkbox'));
        $this->submit_advanced        = (empty($CLEAN_POST['submit_advanced'])        ? '' : 1);

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
		wp_enqueue_style( $this->plugin_name, str_replace( '/admin', '', plugin_dir_url( __FILE__ ) ) . 'admin/assets/css/reatlat_cub-admin.css', array(), null, 'all' );
	}

	/**
	 * prepare enqueue scripts for wordpress hook
	 */
	public function enqueue_scripts()
    {
        wp_enqueue_script( 'tippy-all',                 str_replace( '/admin', '', plugin_dir_url( __FILE__ ) ) . 'admin/assets/js/vendor/tippy.all.min.js', array(), null, false );
        wp_enqueue_script( 'clipboard',                 str_replace( '/admin', '', plugin_dir_url( __FILE__ ) ) . 'admin/assets/js/vendor/clipboard.min.js', array(), null, false );
        wp_enqueue_script( 'jquery-validate',           str_replace( '/admin', '', plugin_dir_url( __FILE__ ) ) . 'admin/assets/js/vendor/jquery.validate.min.js', array( 'jquery' ), null, false );
        wp_enqueue_script( 'jquery-additional-methods', str_replace( '/admin', '', plugin_dir_url( __FILE__ ) ) . 'admin/assets/js/vendor/additional-methods.min.js', array( 'jquery' ), null, false );
        wp_enqueue_script( $this->plugin_name.'-admin', str_replace( '/admin', '', plugin_dir_url( __FILE__ ) ) . 'admin/assets/js/reatlat_cub-admin.js', array( 'jquery' ), null, true );

        // Enqueue jQuery UI and autocomplete
        wp_enqueue_script( 'jquery-ui-core' );
        wp_enqueue_script( 'jquery-ui-autocomplete' );
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
            return esc_url_raw( strtok($string, '?') );
        }
        return false;
	}

	public function check_manage_links()
    {
		if ( $this->campaign_page && $this->campaign_source && $this->campaign_medium && $this->campaign_name )
		{
			self::add_link();
		} else {
		    if ( !empty( $this->submit_manage_links ) )
            {
                array_push( $this->messages, array( __('Page to link, Source, Medium or Campaign Name ar missing', 'campaign-url-builder'), 'error') );
            }
        }
	}

	public function get_full_link()
    {
        $campaign_term    = $this->campaign_term ? '&utm_term=' . urlencode($this->campaign_term) : '';
        $campaign_content = $this->campaign_content ? '&utm_content=' . urlencode($this->campaign_content) : '';
		$custom_pair_1    = ( $this->custom_key_1 && $this->custom_value_1 ) ? '&' . urlencode($this->custom_key_1) . '=' . urlencode($this->custom_value_1) : '';
		$custom_pair_2    = ( $this->custom_key_2 && $this->custom_value_2 ) ? '&' . urlencode($this->custom_key_2) . '=' . urlencode($this->custom_value_2) : '';
		$custom_pair_3    = ( $this->custom_key_3 && $this->custom_value_3 ) ? '&' . urlencode($this->custom_key_3) . '=' . urlencode($this->custom_value_3) : '';

		return $this->campaign_page . '?utm_source=' . urlencode($this->campaign_source) . '&utm_medium=' . urlencode($this->campaign_medium) . '&utm_campaign=' . urlencode($this->campaign_name) . $campaign_term . $campaign_content . $custom_pair_1 . $custom_pair_2 . $custom_pair_3;
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
        // TODO: remove Google endpoint in March 2019
        if ( ( date('Y') < 2020 && date('m') < 3 ) && get_option( $this->plugin_name . '_advanced_api' ) === 'google' ) {
            $key = get_option( $this->plugin_name . '_google_api_key' ) ? get_option( $this->plugin_name . '_google_api_key' ) : 'AIzaSyC9Kx8WJQ0yCtpi-sIV_-7_3iGzNRRfoWQ';

            $result = wp_remote_post( add_query_arg( 'key', $key, 'https://www.googleapis.com/urlshortener/v1/url' ), array(
                'body' => json_encode( array( 'longUrl' => esc_url_raw( $full_link ) ) ),
                'headers' => array( 'Content-Type' => 'application/json' ),
            ) );

            // Return the URL if the request got an error.
            if ( is_wp_error( $result ) )
                return 'n/a';

            $result = json_decode( $result['body'] );

            if ( isset($result->error->errors[0]->reason) && $result->error->errors[0]->reason === "keyInvalid" )
            {
                array_push( $this->messages, array( __('Google API key is not a valid.', 'campaign-url-builder'), 'warning' ) );
                return 'n/a';
            }

            if ( $result->id )
                return $result->id;

        } else { // if ( get_option( $this->plugin_name . '_advanced_api' ) === 'bitly' ) {

            require plugin_dir_path(dirname(__FILE__) ) . 'vendors/bitly.php';
            $params_bitly = array();
            $params_bitly['access_token'] = get_option( $this->plugin_name . '_bitly_api_key' ) ? get_option( $this->plugin_name . '_bitly_api_key' ) : '13064f875b10a4e38709f8b963ca9f32acbc0937';

            $params_bitly['longUrl'] = $full_link;
            $bitly = bitly_get('shorten', $params_bitly);

            if( isset($bitly['data']['url']) && $bitly['data']['url'] )
                return $bitly['data']['url'];
        }

        return 'n/a';
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
	}

    public function check_advanced()
    {
        if (!empty($this->submit_advanced))
        {
            if ( ! $this->advanced_keep_settings && $this->advanced_keep_settings !== get_option( $this->plugin_name . '_keep_settings' ) )
            {
                array_push( $this->messages, array( __('Option <strong>"Keep settings and data after delete plugin"</strong> was disabled', 'campaign-url-builder'), 'warning' ) );
            }
            update_option( $this->plugin_name . '_admin_only', $this->advanced_admin_only );
            update_option( $this->plugin_name . '_keep_settings', $this->advanced_keep_settings );
            update_option( $this->plugin_name . '_show_creator', $this->advanced_show_creator );
            update_option( $this->plugin_name . '_show_useronly', $this->advanced_show_useronly );
            update_option( $this->plugin_name . '_metaboxes', $this->advanced_metaboxes );

            // Choose API endpoint
            if ( !empty($this->advanced_api) && $this->advanced_api != get_option( $this->plugin_name . '_advanced_api' ) )
            {
                update_option( $this->plugin_name . '_advanced_api', $this->advanced_api );
            }

            // Google API key
            if ( !empty($this->google_api_key) && $this->google_api_key != get_option( $this->plugin_name . '_google_api_key' ) )
            {
                update_option( $this->plugin_name . '_google_api_key', $this->google_api_key );
                array_push( $this->messages, array( __('Google API key has been updated.', 'campaign-url-builder'), 'success' ) );

                $result = wp_remote_post( add_query_arg( 'key', $this->google_api_key, 'https://www.googleapis.com/urlshortener/v1/url' ), array(
                    'body' => json_encode( array( ) ),
                    'headers' => array( 'Content-Type' => 'application/json' ),
                ) );

                if ( is_wp_error( $result ) )
                    array_push( $this->messages, array( __('Can\'t check Google API key.', 'campaign-url-builder'), 'error' ) );

                $result = json_decode( $result['body'] );

                if ( isset($result->error->errors[0]->reason) && $result->error->errors[0]->reason === "keyInvalid" )
                {
                    array_push( $this->messages, array( __('Google API key is not a valid.', 'campaign-url-builder'), 'error' ) );
                }
            }

            if ( !empty($this->remove_google_api_key) && $this->remove_google_api_key == 1 )
            {
                update_option( $this->plugin_name . '_google_api_key', '' );
                array_push( $this->messages, array( __('Google API key is empty now.', 'campaign-url-builder'), 'success' ) );
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
    }

    public function check_reset()
    {
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
    }

    public function remove_link_id()
    {
        if (!empty($this->remove_link_id))
        {
            $this->db->delete( $this->db->prefix . $this->plugin_name . '_links',array('id' => $this->remove_link_id));
        }
    }

	public function get_promote_content( $from )
    {
        //
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
