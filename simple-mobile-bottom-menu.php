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