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

global $wpdb;

if ( ! defined( 'ABSPATH') ) {
    exit;
}

function create_tables() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $table1 = "CREATE TABLE IF NOT EXISTS badgerMCT_cultures (
        shop_lot_num INT(6) AUTO_INCREMENT,
        mush_type CHAR(50),
        received_date DATE,
        vendor CHAR(50),
        ven_lot_num CHAR(20),
        PRIMARY KEY(shop_lot_num)
    ) $charset_collate;";
    
    $table2 = "CREATE TABLE badgerMCT_grain (
        grain_num INT(10) AUTO_INCREMENT,
        shop_lot_num INT(6),
        mush_type CHAR(50),
        inoc_date DATE,
        grain_type CHAR(20),
        PRIMARY KEY(grain_num)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $build_tables = array( $table1, $table2 );
    dbDelta( $build_tables );
}
register_activation_hook( __FILE__, 'create_tables' );

#include 'activate.php';
include 'menu_conf.php';
?>