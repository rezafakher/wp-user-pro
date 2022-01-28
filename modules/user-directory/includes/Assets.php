<?php 
namespace WPUF\UserDirectory;

/**
 * Class assets
 */
class Assets {
    /**
     * Constructor for the Assets class
     */
    public function __construct() {
        $this->init_hooks();
    }

    /**
     * Init hooks
     *
     * @return void
     */
    public function init_hooks() {
        if ( is_admin() ) {
            add_action( 'admin_enqueue_scripts', [ $this, 'register' ], 5 );
        } else {
            add_action( 'wp_enqueue_scripts', [ $this, 'register' ], 5 );
        }
    }

    /**
     * Register styles and scripsts
     *
     * @return void
     */
    public function register() {
        $this->register_scripts( $this->get_scripts() );
        $this->register_styles( $this->get_styles() );
    }

    /**
     * Register scripts
     *
     * @param array $scripts
     * 
     * @return void
     */
    public function register_scripts( $scripts ) {
        foreach ( $scripts as $handle => $script ) {
            $deps      = isset( $script['deps'] ) ? $script['deps'] : false;
            $in_footer = isset( $script['in_footer'] ) ? $script['in_footer'] : false;
            $version   = isset( $script['version'] ) ? $script['version'] : WPUF_PRO_VERSION;

            wp_register_script( $handle, $script['src'], $deps, $version, $in_footer );
        }
    }

    /**
     * Register styles
     *
     * @param array $styles
     * 
     * @return void
     */
    public function register_styles( $styles ) {
        foreach( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $deps, WPUF_PRO_VERSION );
        }
    }

    /**
     * Get all registered scripts
     *
     * @return array
     */
    public function get_scripts() {
        return [
            'wpuf-user-directory-admin-script' => [
                'src'       => WPUF_UD_ASSET_URI . '/js/userlisting.js',
                'deps'      => ['jquery'],
                'version'   => filemtime( WPUF_UD_ROOT . '/assets/js/userlisting.js' ),
                'in_footer' => true
            ]
        ];
    }

    /**
     * Get all registered styles
     *
     * @return array
     */
    public function get_styles() {
        return [
            'wpuf-user-directory-admin-style'   => [
                'src' => WPUF_UD_ASSET_URI . '/css/admin.css',
            ],

            'wpuf-user-directory-frontend-style' => [
                'src' => WPUF_UD_ASSET_URI . '/css/profile-listing.css',
            ]
        ];
    }
}

