<div class="wrap">
    <h1 class="wp-heading-inline">General Settings</h1>
    <form action="" method="post">
        <table class="form-table">
        <tbody>

            <tr>
                <th scope="row">
                    <label for="slider-design"><?php _e( 'Show on Desktop Mode :', 'simple-mobile-bottom-menu' );?></label>
                </th>
                <td>
                    <select name="design" id="default_slider_design">
                        <option value="no" <?php echo 'no' === get_option( 'smbm_entire_site_show' ) ? 'selected' : "" ?> >No</option>
                        <option value="yes" <?php echo 'yes' === get_option( 'smbm_entire_site_show' ) ? 'selected' : "" ?> >Yes</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="height"><?php _e( 'Height :', 'ss_slider' );?></label>
                </th>
                <td>
                    <input type="text" name="height" id="height" class="regular-text" value="<?php echo get_option( 'simple_slider_height' ); ?>">
                    <p class="description">Height Width Ratio must be 1.73 : 1</p>
                </td>
            </tr>
        </tbody>
    </table>

    <?php wp_nonce_field( 'sbmb-general-settings' );?>
    <?php submit_button( __( 'Save Changes', 'simple-mobile-bottom-menu' ), 'primary', 'smbm_general_settings' );?>
    </form>
</div>