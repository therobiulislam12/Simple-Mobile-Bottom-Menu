<?php 

namespace Mobile\Menu;

class Frontend{

    public function __construct(){

        // add some dynamic style on wp_head hook 
        add_action('wp_head', array($this, 'smbm_add_style_on_head'));

        new Frontend\Design_1();
    }

    public function smbm_add_style_on_head(){
        $show_on_desktop = get_option('simple_bottom_mobile_menu_show_on_desktop', true);
        $style = "<style>
            @media only screen and (min-width: 1025px) {
                nav {
                    display: {$show_on_desktop} !important;
                }
            }
        </style>";

        echo $style;
    }
}