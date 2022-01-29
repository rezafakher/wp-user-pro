<?php
/**
 * WPUF Update class
 *
 * Performas license validation and update checking
 *
 * @package WPUF
 */
class WPUF_Updates {

    /**
     * The product ID
     *
     * @var string
     */
    private $product_id = 'wpuf-pro';

    /**
     * The plugin slug
     *
     * @var string
     */
    private $plugin_slug = 'wp-user-frontend-pro';

    /**
     * The license plan id
     *
     * @var string
     */
    private $plan_id;

    const base_url     = 'https://wedevs.com/wp-user-frontend-pro/';
    const api_endpoint = 'http://api.wedevs.com/';
    const option       = 'wpuf_license';

    function __construct( $plan ) {

        $this->plan_id = $plan;

        // bail out if it's a local server
        if ( $this->is_local_server() ) {
            return;
        }

        add_action( 'wpuf_admin_menu', array($this, 'admin_menu'), 99 );

        if ( is_multisite() ) {

            return;

        } else {
            return;
        }

        
    }

    /**
     * Check if the current server is localhost
     *
     * @return boolean
     */
    private function is_local_server() {
        return in_array( $_SERVER['REMOTE_ADDR'], array( '127.0.0.1', '::1' ) );
    }

    /**
     * Add admin menu to User Frontend option
     *
     * @return void
     */
    function admin_menu() {
        add_submenu_page( 'wp-user-frontend', __( 'Updates', 'wpuf-pro' ), __( 'Updates', 'wpuf-pro' ), 'activate_plugins', 'wpuf_updates', array($this, 'plugin_update') );
    }

}
