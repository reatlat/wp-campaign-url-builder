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

        $this->google_api_key         = (empty($CLEAN_POST['google_api_key'])         ? '' : self::get_cleaned($CLEAN_POST['google_api_key'], 'text'));
        $this->remove_google_api_key  = (empty($CLEAN_POST['remove_google_api_key'])  ? '' : self::get_cleaned($CLEAN_POST['remove_google_api_key'], 'number'));
        $this->advanced_keep_settings = (empty($CLEAN_POST['advanced_keep_settings']) ? '' : self::get_cleaned($CLEAN_POST['advanced_keep_settings'], 'checkbox'));
        $this->advanced_show_creator  = (empty($CLEAN_POST['advanced_show_creator'])  ? '' : self::get_cleaned($CLEAN_POST['advanced_show_creator'], 'checkbox'));
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
		add_menu_page( 'Campaign URL Builder', 'Campaign URL Builder', 'edit_posts', $this->plugin_name . '-settings-page', array($this, 'render_settings_page'), 'dashicons-share-alt' );
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
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/css/reatlat_cub-admin.css?v=' . rand(), array(), $this->version, 'all' );
	}

	/**
	 * prepare enqueue scripts for wordpress hook
	 */
	public function enqueue_scripts()
    {
        wp_enqueue_script( 'wow',                       plugin_dir_url( __FILE__ ) . 'assets/js/vendor/wow.min.js?v=' . rand(), array(), '1.3.0', false );
        wp_enqueue_script( 'clipboard',                 plugin_dir_url( __FILE__ ) . 'assets/js/vendor/clipboard.min.js?v=' . rand(), array(), '1.7.1', false );
        wp_enqueue_script( 'jquery-validate',           plugin_dir_url( __FILE__ ) . 'assets/js/vendor/jquery.validate.min.js?v=' . rand(), array( 'jquery' ), '1.17.0', false );
        wp_enqueue_script( 'jquery-additional-methods', plugin_dir_url( __FILE__ ) . 'assets/js/vendor/additional-methods.min.js?v=' . rand(), array( 'jquery' ), '1.17.0', false );
        wp_enqueue_script( $this->plugin_name,          plugin_dir_url( __FILE__ ) . 'assets/js/reatlat_cub-admin.js?v=' . rand(), array( 'jquery' ), $this->version, false );
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
	    $settings_link = '<a href="admin.php?page=' . $this->plugin_name . '-settings-page">' . __( 'Settings' ) . '</a>';
	    $settings_link = '<a href="admin.php?page=' . $this->plugin_name . '-settings-page">' . __( 'Settings' ) . '</a>';
	    array_unshift($links, $settings_link);
	  	return $links;
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
            array_push( $this->messages, array( 'Page to link is not a valid url. It has to start with http.', 'warning' ) );
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
                array_push( $this->messages, array('Page to link, Source, Medium or Campaign Name ar missing', 'error') );
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

        $this->db->insert(
            $this->db->prefix . $this->plugin_name . '_links',
            array(
                'campaign_name'       => $this->campaign_name,
                'campaign_full_link'  => $campaign_full_link,
                'campaign_short_link' => $campaign_short_link,
                'user_id'             => get_current_user_id(),
                'date'                => time()
            )
        );
        array_push( $this->messages, array('A new Campaign Link has been created successfully.', 'success') );

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
	}

	private function get_shortlink($full_link)
    {
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
            array_push( $this->messages, array( 'Google API key is not a valid.', 'warning' ) );
            return 'n/a';
        }

        $shortlink = $result->id;
        if ( $shortlink )
            return $shortlink;

        return 'n/a';

	}

	public function get_links()
    {
        return $this->db->get_results( "SELECT * FROM " . $this->db->prefix . $this->plugin_name . "_links ORDER by date DESC" );
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
				array_push( $this->messages, array( 'New Campaign Medium has been added', 'success' ) );
			}
			if ( !empty($this->new_campaign_source) )
			{
				$this->db->insert( $this->db->prefix . $this->plugin_name . '_sources',array('source_name' => $this->new_campaign_source ));
				array_push( $this->messages, array( 'New Campaign Source has been added', 'success' ) );
			}

			// remove source / medium
			if ( !empty($this->remove_campaign_medium) )
			{
				$this->db->delete( $this->db->prefix . $this->plugin_name . '_mediums',array('medium_name' => $this->remove_campaign_medium));
				array_push( $this->messages, array( 'A Campaign Medium has been removed', 'success' ) );

			}
			if ( !empty($this->remove_campaign_source) )
			{
				$this->db->delete( $this->db->prefix . $this->plugin_name . '_sources',array('source_name' => $this->remove_campaign_source));
				array_push( $this->messages, array( 'A Campaign Source has been removed', 'success' ) );
			}
		}
	}

    public function check_advanced()
    {
        if (!empty($this->submit_advanced))
        {

            if ( ! $this->advanced_keep_settings && $this->advanced_keep_settings !== get_option( $this->plugin_name . '_keep_settings' ) )
            {
                array_push( $this->messages, array( 'Option <strong>"Keep settings and data after delete plugin"</strong> was disabled', 'warning' ) );
            }
            update_option( $this->plugin_name . '_keep_settings', $this->advanced_keep_settings );
            update_option( $this->plugin_name . '_show_creator', $this->advanced_show_creator );

            // Google API key
            if ( !empty($this->google_api_key) && $this->google_api_key != get_option( $this->plugin_name . '_google_api_key' ) )
            {
                update_option( $this->plugin_name . '_google_api_key', $this->google_api_key );
                array_push( $this->messages, array( 'The Google API key has been updated.', 'success' ) );

                $result = wp_remote_post( add_query_arg( 'key', $this->google_api_key, 'https://www.googleapis.com/urlshortener/v1/url' ), array(
                    'body' => json_encode( array( ) ),
                    'headers' => array( 'Content-Type' => 'application/json' ),
                ) );

                if ( is_wp_error( $result ) )
                    array_push( $this->messages, array( 'Can\'t check Google API key.', 'error' ) );

                $result = json_decode( $result['body'] );

                if ( isset($result->error->errors[0]->reason) && $result->error->errors[0]->reason === "keyInvalid" )
                {
                    array_push( $this->messages, array( 'Google API key is not a valid.', 'error' ) );
                }

            }

            if ( !empty($this->remove_google_api_key) && $this->remove_google_api_key == 1 )
            {
                update_option( $this->plugin_name . '_google_api_key', '' );
                array_push( $this->messages, array( 'Google API key is empty now.', 'success' ) );
            }

            array_push( $this->messages, array( 'Advanced setting has been updated', 'success' ) );
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
                array_push( $this->messages, array( 'All plugin settings and data has been reset to default', 'error' ) );
            }

            if ( $this->reset_links && ! $this->reset_all )
            {
                $reset->reset_links();
                array_push( $this->messages, array( 'All <strong>"campaign-links"</strong> has been deleted', 'warning' ) );
            }

            if ( $this->reset_mediums && ! $this->reset_all )
            {
                $reset->reset_mediums();
                array_push( $this->messages, array( 'All <strong>"Mediums"</strong> has been deleted', 'warning' ) );
            }

            if ( $this->reset_sources && ! $this->reset_all )
            {
                $reset->reset_sources();
                array_push( $this->messages, array( 'All <strong>"Sources"</strong> has been deleted', 'warning' ) );
            }

            if ( $this->reset_options && ! $this->reset_all )
            {
                $reset->reset_options();
                array_push( $this->messages, array( 'All <strong>"Settings & Options"</strong> has been reset to default', 'warning' ) );
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

}
