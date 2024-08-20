<?php 

namespace Mobile\Menu\Frontend;

class Design_1_Shortcode{

    public function __construct(){
        add_shortcode('smbm-design-1', array($this, 'smbm_design_1'));
    }

    public function smbm_design_1(){
        wp_enqueue_style('custom');
        require_once __DIR__ . '/views/design_1.view.php';
    }

}