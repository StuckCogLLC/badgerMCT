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

function badger_main() {
    ?>
    <div class="wrap">
        <h1>
            <?php echo esc_html( get_admin_page_title() ); ?>
        </h1>
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

function badgermct_cultures_page() {
    ?>
    <div class="wrap">
        <h1>
            <?php echo esc_html( get_admin_page_titiel() ); ?>
        </h1>
        <p>This is just place holder text</p>
    </div>
    <?php
}

function badgermct_dashboard() {
    add_menu_page(
        'badgerMCT Dashboard',
        'badgerMCT',
        'moderate_comments',
        'badgermct',
        'badger_main',
        '',
        //plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
        20
    );
}

function badgermct_cultures() {
    add_submenu_page(
        'badgermct',
        'Mange Cultures',
        'Mange Cultures',
        'moderate_comments',
        'badgermct_cultures',
        'badgermct_cultures_page',
        1
    );
}

add_action( 'admin_menu', 'badgermct_dashboard' );
add_action( 'admin_menu', 'badgermct_cultures' );
?>