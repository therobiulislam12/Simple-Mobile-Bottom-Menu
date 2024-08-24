<?php

namespace Mobile\Menu\Admin;

class Menu_Custom_Field {

    public function __construct() {

        // add input field for custom image
        add_action( 'wp_nav_menu_item_custom_fields', array( $this, 'smbm_add_custom_nav_fields' ), 10, 4 );

        // save data
        add_action( 'wp_update_nav_menu_item', array( $this, 'smbm_update_custom_nav_fields' ), 10, 2 );
    }

    public function smbm_add_custom_nav_fields( $item_id, $item, $depth, $args ) {
        $image = get_post_meta( $item_id, '_menu_item_image', true );
        ?>
        <p class="description description-wide">
            <label for="edit-menu-item-image-<?php echo esc_attr( $item_id ); ?>">
                <?php _e( 'Menu Item Image', 'simple-mobile-bottom-menu' );?><br>
                <input type="text" id="edit-menu-item-image-<?php echo esc_attr( $item_id ); ?>" class="widefat code edit-menu-item-image" name="menu-item-image[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $image ); ?>" />
                <input type="button" class="button-secondary upload_image_button" value="<?php _e( 'Upload Image', 'simple-mobile-bottom-menu' );?>" />
            </label>
        </p>
        <?php
    }

    public function smbm_update_custom_nav_fields( $menu_id, $menu_item_db_id ) {
        if ( isset( $_POST['menu-item-image'][$menu_item_db_id] ) ) {
            $image = sanitize_text_field( $_POST['menu-item-image'][$menu_item_db_id] );
            update_post_meta( $menu_item_db_id, '_menu_item_image', $image );
        }
    }
}