<?php
/**
  Plugin Name: User Directory
  Plugin URI: https://wedevs.com/products/plugins/wp-user-frontend-pro/user-listing-profile/
  Thumbnail Name: wpuf-ul.png
  Description: Handle user listing and user profile in frontend
  Version: 1.1.1
  Author: weDevs
  Author URI: https://wedevs.com
  License: GPL2
 */

/**
 * User Listing class for WP User Frontend PRO
 *
 * @author weDevs <info@wedevs.com>
 */
class WPUF_User_Listing {

    private $shortcode_name = 'wpuf_user_listing';
    private $unique_meta;
    private $page_url;
    private $count_word = 10;
    private $avatar_size = 128;
    private $settings;
    private $total;

    public function __construct() {
        

        
        // add_filter( 'wpuf_ud_nav_urls', array( $this, 'profile_nav_menus' ), 9 );
        

        // if ( is_admin() ) {
        //     require_once dirname( __FILE__ ) . '/userlisting-admin.php';
        //     new WPUF_Userlisting_Admin();
        // } else {
        //     add_shortcode( $this->shortcode_name, array( $this, 'wpuf_user_listing_init' ) );
        //     add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        // }

        

        

        $this->define_constants();
        $this->includes_files();
        $this->init_classes();
    }

    /**
     * Define constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'WPUF_UD_FILE', __FILE__ );
        define( 'WPUF_UD_ROOT', dirname( __FILE__ ) );
        define( 'WPUF_UD_INCLUDES', WPUF_UD_ROOT . '/includes' );
        define( 'WPUF_UD_ROOT_URI', plugins_url( '', __FILE__ ) );
        define( 'WPUF_UD_ASSET_URI', WPUF_UD_ROOT_URI . '/assets' );
    }

    /**
     * Include all require files
     *
     * @return void
     */
    public function includes_files() {
        if ( is_admin() ) {
            require_once WPUF_UD_INCLUDES . '/Admin.php';
            require_once WPUF_UD_INCLUDES . '/Admin/Builder.php';
            require_once WPUF_UD_INCLUDES . '/Admin/Form.php';
        }

        require_once WPUF_UD_INCLUDES . '/Frontend.php';
        require_once WPUF_UD_INCLUDES . '/ShortCode.php';
        require_once WPUF_UD_INCLUDES . '/Assets.php';
    }

    /**
     * Init classes
     *
     * @return void
     */
    public function init_classes() {
        if ( is_admin() ) {
            new WPUF\UserDirectory\Admin();
        }

        new WPUF\UserDirectory\Frontend();
        new WPUF\UserDirectory\ShortCode();
        new WPUF\UserDirectory\Assets();
    }
}

/**
 * Return the instance
 *
 * @return \WPUF_User_Listing
 */
function wpuf_user_listing() {
    if ( ! class_exists( 'WP_User_Frontend' ) ) {
        return;
    }

    new WPUF_User_Listing();
}

wpuf_user_listing();
