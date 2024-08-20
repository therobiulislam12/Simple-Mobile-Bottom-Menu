<?php 

namespace Mobile\Menu\Frontend;

class Design_1{

    public function __construct(){
        add_action('wp_footer', array($this, 'smbm_menu_display'));
    }

    public function smbm_menu_display(){
        wp_enqueue_style('custom');
        require_once __DIR__ . '/views/design_1.view.php';
    }

}