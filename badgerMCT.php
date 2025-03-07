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

    $table_badgerMCT_cultures = $wpdb->prefix . 'badgerMCT_cultures';
    $table_badgerMCT_grain = $wpdb->prefix . 'badgerMCT_grain';
    $table_badgerMCT_substrate = $wpdb->prefix . 'badgerMCT_substrate';
    $table_badgerMCT_harvest = $wpdb->prefix . 'badgerMCT_harvest';
    $table_badgerMCT_vendors = $wpdb->prefix . 'badgerMCT_vendors';

    $tbl_badgerMCT_culture = "CREATE TABLE IF NOT EXISTS {$table_badgerMCT_cultures} (
        cult_num INT(6) AUTO_INCREMENT,
        cult_type CHAR(50),
        mush_type CHAR(50),
        date_added DATE,
        vendor CHAR(50),
        ven_lot_num CHAR(20),
        PRIMARY KEY(cult_num)
    ) $charset_collate;";
    
    $tbl_badgerMCT_grain = "CREATE TABLE IF NOT EXISTS {$table_badgerMCT_grain} (
        grain_num INT(10) AUTO_INCREMENT,
        grain_type CHAR(20),
        cult_num INT(6),
        inoc_date DATE,
        PRIMARY KEY(grain_num)
    ) $charset_collate;";

    $tbl_badgerMCT_substrate = "CREATE TABLE IF NOT EXISTS {$table_badgerMCT_substrate} (
        sub_num INT(6) AUTO_INCREMENT,
#culture number
        cult_num INT(6),
#mushroom type
        mush_type CHAR(50),
#mushroom type
        grain_num INT(10),
#inoculation data
        inoc_date DATE,
#fruiting date
        fruit_date DATE,
#first fruit date
        first_fruit_weight INT(10),
#second fruit date
        second_fruit_weight INT(10),
#third fruit weight
        third_fruit_weight INT(10),
#block weight
        block_weight int(4),
        PRIMARY KEY(sub_num)
    ) $charset_collate;";

    $tbl_badgerMCT_harvest = "CREATE TABLE IF NOT EXISTS {$table_badgerMCT_harvest} (
        harvest_num INT(10) AUTO_INCREMENT,
        sub_num INT(6),
        harvest_date DATE,
        harvest_weight FLOAT(4,2),
        waste_weight FLOAT(4,2),
        PRIMARY KEY(harvest_num)
    ) $charset_collate;";

    $tbl_badgerMCT_vendors = "CREATE TABLE IF NOT EXISTS {$table_badgerMCT_vendors} (
        ven_num INT(10) AUTO_INCREMENT,
        ven_name CHAR(50),
        ven_phone CHAR(11),
        ven_notes CHAR(250),
        PRIMARY KEY(ven_num)
    ) $charset_collate;";

    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta( $tbl_badgerMCT_culture );
    dbDelta( $tbl_badgerMCT_grain );
    dbDelta( $tbl_badgerMCT_substrate );
    dbDelta( $tbl_badgerMCT_harvest );
    dbDelta( $tbl_badgerMCT_vendors );
}
register_activation_hook( __FILE__, 'create_tables' );

#include 'activate.php';
include 'menu_conf.php';
?>