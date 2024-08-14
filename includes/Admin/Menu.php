<?php

namespace Mobile\Menu\Admin;

class SMBM_Menu {

    public function __construct() {

        // register admin menu
        add_action( 'admin_menu', array( $this, 'smbm_add_menu' ) );

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
            _x( 'WP Mobile Menu', 'simple-bottom-menu' ),
            $capability,
            $parent_slug,
            array( $this, 'smbm_admin_page' ),
            'dashicons-menu-alt3',
            5
        );
    }

    public function smbm_admin_page() {
        echo "hello";
    }

}