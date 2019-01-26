<?php 

class reatlat_cub
{
	protected $version;
	protected $plugin_name;
	protected $plugin_real_name;
	protected $loader;

	/**
	 * constructor
	 */
	public function __construct()
    {
		$this->version          = CUB_VERSION;
		$this->plugin_name      = CUB_NAME;
		$this->plugin_real_name = CUB_REAL_NAME;

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * load seperate files needed to trigger actions or filters,
     * translation and admin class only since public class has to
     * be autonomous.
	 */
	private function load_dependencies()
    {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-reatlat_cub-reset.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-reatlat_cub-activator.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-reatlat_cub-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-reatlat_cub-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-reatlat_cub-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-reatlat_cub-public.php';

        $this->loader = new reatlat_cub_Loader();
	}

	/**
	 * set locale for translation ends.
	 */
	private function set_locale()
    {
		$plugin_i18n = new reatlat_cub_i18n();
		$plugin_i18n->set_domain( $this->get_plugin_real_name() );

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	/**
	 * action and filter for admin side
	 */
	private function define_admin_hooks()
    {
        $plugin_admin = new reatlat_cub_Admin( $this->plugin_real_name, $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'admin_menu', $plugin_admin, 'add_submenu_page' );
        if ( get_option( $this->plugin_name . '_metaboxes' ) )
        {
            $this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'add_meta_box__create_link' );
            $this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'add_meta_box__links_list' );
            $this->loader->add_action( 'wp_ajax_' . $this->get_plugin_name() . '_create_link', $plugin_admin, 'ajax_create_link' );
        }
        $this->loader->add_action( 'wp_ajax_' . $this->get_plugin_name() . '_export_csv', $plugin_admin, 'ajax_export_csv' );
        $this->loader->add_filter( 'plugin_action_links_' . $this->get_plugin_real_name() . '/' . $this->get_plugin_name() . '.php', $plugin_admin, 'add_settings_link' );
        $this->loader->add_action( 'plugins_loaded', $plugin_admin, 'add_plugin_row_meta' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
        $this->loader->add_action( 'admin_notices', $plugin_admin, 'enqueue_notices' );
        $this->loader->add_action( 'admin_footer', $plugin_admin, 'autocomplete_link_js' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 */
	private function define_public_hooks()
    {
        $plugin_admin = new reatlat_cub_Admin( $this->plugin_real_name, $this->get_plugin_name(), $this->get_version() );
        $plugin_public = new reatlat_cub_Public( $this->get_plugin_name(), $this->get_version() );

        //TODO: remove Google endpoint in March 2019
		if ( ( get_option( $this->plugin_name . '_shortcode_activator') && get_option( $this->plugin_name . '_google_api_key' ) ) || ( get_option( $this->plugin_name . '_shortcode_activator') && get_option( $this->plugin_name . '_bitly_api_key' ) ) ) :
            $this->loader->add_action( 'init', $plugin_public, 'register_shortcodes' );
            $this->loader->add_action( 'wp_ajax_' . $this->get_plugin_name() . '_sc_create_link', $plugin_admin, 'ajax_create_link' );
            if ( get_option( $this->plugin_name . '_shortcode_anonymous') ) :
                $this->loader->add_action( 'wp_ajax_nopriv_' . $this->get_plugin_name() . '_sc_create_link', $plugin_admin, 'ajax_create_link' );
            endif;

            // load all scripts only if shortcodes activated
            $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
            $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
        endif;
	}

	/**
	 * run the whole logic of the plugin
	 */
	public function run()
    {
		$this->loader->run();
	}

	/**
	 * get plugin name from constructor
	 */
	public function get_plugin_name()
    {
		return $this->plugin_name;
	}

	/**
	 * get plugin real name from constructor
	 */
	public function get_plugin_real_name()
    {
		return $this->plugin_real_name;
	}

	/**
	 * get loader
	 */
	public function get_loader()
    {
		return $this->loader;
	}

	/**
	 * get version of plugin from constructor
	 */
	public function get_version()
    {
		return $this->version;
	}
}