<?php 

    // $menus = wp_nav_menu(array(
    //     'theme_location' => 'smbm-bottom-menu'
    // ));
    $menuLocations = get_nav_menu_locations(); 
    $menuID = $menuLocations['smbm-bottom-menu'];

    $smbm_menu = wp_get_nav_menu_items($menuID);

    inspect($smbm_menu)

?>
<div class="wrap">
    <h1 class="wp-heading-inline">Menu Style</h1>
</div>