<?php 

    $menuLocations = get_nav_menu_locations(); 
    $menuID = $menuLocations['smbm-bottom-menu'];

    $smbm_menu = wp_get_nav_menu_items($menuID);
    $current_url = get_permalink();

?>

<nav>
    <div class="nav-box">
        <ul class="nav-container">
            <?php 
                foreach($smbm_menu  as $menu): 
                    $is_active = ($current_url == $menu->url) ? 'active' : '';
                    $image = get_post_meta($menu->ID, '_menu_item_image', true);
            ?>
                <li class="nav__item <?php echo esc_attr($is_active); ?>">
                    <a href="<?php echo esc_url($menu->url) ?>" class="nav__item-link">
                        <div class="nav__item-icon">
                            <img src="<?php echo $image ? esc_url($image) : SMBM_MOBILE_MENU_ASSETS . '/img/home.png'; ?>" alt="<?php echo esc_attr($menu->title) ?>">
                        </div>
                        <span class="nav__item-text"><?php echo esc_html($menu->title) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>
