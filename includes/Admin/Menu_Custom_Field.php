<?php 

namespace Mobile\Menu\Admin;

class Menu_Custom_Field{

    public function __construct(){
        add_action('wp_nav_menu_item_custom_fields', array($this, 'smbm_add_custom_nav_fields'), 10, 4);
    }

    public function smbm_add_custom_nav_fields( $item_id, $item, $depth, $args ) {
        echo 'A menu item test field';
    }
}