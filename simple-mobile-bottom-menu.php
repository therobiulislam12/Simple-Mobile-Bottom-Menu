<?php

/**
 * @author Robiul Islam <therobiulislam12@gmail.com>
 * @since 1.0.0
 * @link #
 *
 * @wordpress plugin
 *
 * Plugin Name:       Simple Mobile Bottom Menu
 * Description:       Simple Mobile Bottom Menu plugin for smooth navigation with customizable styles.
 * Plugin URI:        #
 * Version:           1.0.0
 *
 * Author:            Robiul Islam
 * Author URI:        https://robiul-islam.netlify.app
 *
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:       /languages
 * Text Domain:      simple-mobile-bottom-menu
 *
 *
 * Simple Mobile Bottom Menu is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 or latter of the License, or
 * any later version.
 *
 * Simple Mobile Bottom Menu is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

// require autoload
require_once __DIR__ . '/vendor/autoload.php';

// If this file is called directly, exit
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Declare final class for not creating second instance
 */
final class SMBM_Main_Class {

    // declare plugin version
    const version = "1.0.0";

    // create plugin instance
    private static $_instance = null;

    /**
     * Main Constructor method
     */
    private function __construct() {

        // define constant
        $this->smbm_define_constant();

        // init hook
        add_action( 'init', array( $this, 'smbm_init' ) );

        // activation hook
        register_activation_hook( __FILE__, array( $this, 'smbm_active' ) );

        // deactivation hook

        // plugins loaded hook
        add_action( 'plugin_loaded', array( $this, 'smbm_init_plugin' ) );

        // admin menu
        add_action( 'admin_menu', array( $this, 'smbm_add_admin_menu' ) );

        // enqueue script
        add_action( 'wp_enqueue_scripts', array( $this, 'smbm_enqueue_scripts' ) );

    }

    /**
     * After install plugin, call this hook
     * So, do here all type of this work
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function smbm_init_plugin() {

        if ( is_admin() ) {
            new Mobile\Menu\Admin();
        } else {
            new Mobile\Menu\Frontend();
        }

    }

    /**
     * Init hook for create some menu
     * If need any work do with init hook
     * do here
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function smbm_init() {

        // get the support of nav menu
        $register_menu = new Mobile\Menu\Admin\Menu();
        $register_menu->smbm_menu_register();
    }

    /**
     *
     * Activation hook
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function smbm_active() {

        $options = [
            'installed'       => time(),
            'show_on_desktop' => 'none',
        ];

        foreach ( $options as $key => $value ) {
            $option_name = "simple_bottom_mobile_menu_{$key}";
            $existing_option = get_option( $option_name );

            if ( !$existing_option ) {
                update_option( $option_name, $value );
            }
        }

        update_option( 'simple_bottom_mobile_menu_version', SMBM_MOBILE_MENU_VERSION );

    }

    /**
     * register css and js
     *
     * @return void
     */
    public function smbm_enqueue_scripts() {
        wp_register_style( 'smbm-design-1', plugins_url( '/assets/css/style.css', __FILE__ ), [], '1.0.0', 'all' );

        wp_register_script( 'smbm-design-1', plugins_url( '/assets/js/main.js', __FILE__ ), ['jquery'], '1.0.0', true );
    }

    public function smbm_define_constant() {

        define( 'SMBM_MOBILE_MENU_VERSION', self::version );
        define( 'SMBM_MOBILE_MENU_FILE', __FILE__ );
        define( 'SMBM_MOBILE_MENU_PATH', __DIR__ );
        define( 'SMBM_MOBILE_MENU_URL', plugins_url( '', SMBM_MOBILE_MENU_FILE ) );
        define( 'SMBM_MOBILE_MENU_ASSETS', SMBM_MOBILE_MENU_URL . '/assets' );

    }

    /**
     * Add Admin menu
     * @return void
     */
    public function smbm_add_admin_menu() {
        $menu = new Mobile\Menu\Admin\Menu;
        $menu->smbm_add_menu();
    }

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.0.0
     *
     * @access public
     * @static
     *
     * @return mixed Mobile\Menu An instance of the class.
     */
    public static function smbm_get_instance() {

        if ( !self::$_instance ) {
            self::$_instance = new self();
        }

        return self::$_instance;

    }

}

/**
 * create a function for create instance
 *
 * @return mixed
 */
function simple_mobile_bottom_menu() {
    return SMBM_Main_Class::smbm_get_instance();
}

// kick of the class
simple_mobile_bottom_menu();