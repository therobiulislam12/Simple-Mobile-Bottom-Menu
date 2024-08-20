<?php 

namespace Mobile\Menu\Frontend;

class Design_1{

    public function __construct(){
        add_action('wp_footer', array($this, 'smbm_menu_display'));
    }

    public function smbm_menu_display(){
        wp_enqueue_script('smbm-design-1');
        wp_enqueue_style('smbm-design-1');
        require_once __DIR__ . '/views/design_1.view.php';
    }

}