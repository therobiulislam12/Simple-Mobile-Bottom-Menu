<?php
if ( isset( $_POST['smbm_general_settings'] ) ) {
    $simple_slider = $_POST;

    foreach ( $simple_slider as $key => $value ) {
        // Sanitize the input
        $value = sanitize_text_field( $value );

        $option_name = "simple_bottom_mobile_menu_{$key}";

        // Update the option without checking if it already exists
        update_option( $option_name, $value );
    }
}
?>

<div class="wrap">
    <h1 class="wp-heading-inline">General Settings</h1>
    <form action="" method="post">
        <table class="form-table">
        <tbody>

            <tr>
                <th scope="row">
                    <label for="show_on_desktop"><?php _e( 'Show on Desktop Mode :', 'simple-mobile-bottom-menu' );?></label>
                </th>
                <td>
                    <select name="show_on_desktop" id="show_on_desktop">
                        <option value="none" <?php echo 'none' === get_option( 'simple_bottom_mobile_menu_show_on_desktop' ) ? 'selected' : "" ?> >No</option>
                        <option value="block" <?php echo 'block' === get_option( 'simple_bottom_mobile_menu_show_on_desktop' ) ? 'selected' : "" ?> >Yes</option>
                    </select>
                </td>
            </tr>

            <!-- <tr>
                <th scope="row">
                    <label for="height"><?php _e( 'Height :', 'ss_slider' );?></label>
                </th>
                <td>
                    <input type="text" name="height" id="height" class="regular-text" value="<?php echo get_option( 'simple_slider_height' ); ?>">
                    <p class="description">Height Width Ratio must be 1.73 : 1</p>
                </td>
            </tr> -->
        </tbody>
    </table>

    <?php wp_nonce_field( 'sbmb-general-settings' );?>
    <?php submit_button( __( 'Save Changes', 'simple-mobile-bottom-menu' ), 'primary', 'smbm_general_settings' );?>
    </form>
</div>