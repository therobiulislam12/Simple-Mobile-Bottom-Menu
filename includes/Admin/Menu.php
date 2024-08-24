<?php

namespace Mobile\Menu\Admin;

class Menu {

    /**
     * Main Constructor method
     */
    public function __construct() {
        add_action( 'after_setup_theme', array( $this, 'smbm_menu_register' ) );
    }

    /**
     * Register menu with icon options
     *
     * @since 1.0.0
     *
     * @return mixed
     */
    public function smbm_menu_register() {
        register_nav_menus(
            array(
                'smbm-bottom-menu'    => __( 'WP Bottom Menu' )
            )
        );
    }

    /**
     * Add Admin Menu Page
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function smbm_add_menu() {

        $capability = 'manage_options';
        $parent_slug = 'simple-mobile-bottom-menu';

        add_menu_page(
            _x( 'Simple Mobile Bottom Menu', 'simple-bottom-menu' ),
            _x( 'WP Bottom Menu', 'simple-bottom-menu' ),
            $capability,
            $parent_slug,
            array( $this, 'smbm_admin_page' ),
            'dashicons-screenoptions',
            25
        );

        add_submenu_page(
            $parent_slug,
            _x( 'General Settings', 'simple-bottom-menu' ),
            _x( 'General Settings', 'simple-bottom-menu' ),
            $capability,
            $parent_slug,
            array( $this, 'smbm_admin_page' ),
        );

        add_submenu_page(
            $parent_slug,
            _x( 'Simple Mobile Menu Styles', 'simple-bottom-menu' ),
            _x( 'Menu Styles', 'simple-bottom-menu' ),
            $capability,
            'smbm-menu-style',
            array( $this, 'smbm_menu_style' ),
        );

        add_submenu_page(
            $parent_slug,
            _x( 'Pre Made Styles', 'simple-bottom-menu' ),
            _x( 'Pre Made Styles', 'simple-bottom-menu' ),
            $capability,
            'smbm-pre-made-styles',
            array( $this, 'smbm_pre_made_styles' ),
        );
    }

    public function smbm_admin_page() {
        require_once SMBM_MOBILE_MENU_PATH . '/includes/Admin/views/general.view.php';
    }

    public function smbm_menu_style() {
        require_once SMBM_MOBILE_MENU_PATH . '/includes/Admin/views/menu-style.view.php';
    }

    public function smbm_pre_made_styles() {
        require_once SMBM_MOBILE_MENU_PATH . '/includes/Admin/views/pre-made.view.php';
    }

}