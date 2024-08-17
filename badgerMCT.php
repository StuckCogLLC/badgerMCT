<?php
/*
* Plugin Name: badgerMCT
* Description: mushroom cultivation tracker
* Version: 0.1
* Author: Stuck Cog LLC
* Author URI: https://www.stuckcogllc.com
* License: GPLv3
* License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

function wporg_options_page_html() {
    ?>
    <div class="wrap">
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
      <form action="options.php" method="post">
        <?php
        // output security fields for the registered setting "wporg_options"
        settings_fields( 'wporg_options' );
        // output setting sections and their fields
        // (sections are registered for "wporg", each field is registered to a specific section)
        do_settings_sections( 'wporg' );
        // output save settings button
        submit_button( __( 'Save Settings', 'textdomain' ) );
        ?>
      </form>
    </div>
    <?php
}

add_action( 'admin_menu', 'wporg_options_page' );
function wporg_options_page() {
    add_menu_page(
        'badgerMCT',
        'badgerMCT',
        'moderate_comments',
        plugin_dir_path(__FILE__) . 'admin/view.php',
        null,
        plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
        20
    );
}
?>