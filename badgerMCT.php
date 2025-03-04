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
/* create plugin tables */
function create_tables() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    /* build table names */
    /* culture bank */
    $table_badgerMCT_culture_bank = $wpdb->prefix . 'badgerMCT_culture_bank';
    /* inoculated cultures */
    $table_badgerMCT_inoc_culture = $wpdb->prefix . 'badgerMCT_grain';
    /* inoculated substrate */
    $table_badgerMCT_substrate = $wpdb->prefix . 'badgerMCT_substrate';
    /* harvested mushrooms */
    $table_badgerMCT_harvest = $wpdb->prefix . 'badgerMCT_harvest';

    /* define tables */
    /* culture bank */
    $tbl_badgerMCT_culture_bank = "CREATE TABLE IF NOT EXISTS {$table_badgerMCT_culture_bank} (
        /* culture number */
        cult_num INT(6) AUTO_INCREMENT,
        /* culture type */
        cult_type CHAR(50),
        /* mushroom type */
        mush_type CHAR(50),
        /* date added */
        date_added DATE,
        /* origin of culture */
        origin CHAR(50),
        /* lot number of origin cluture */
        origin_lot_number CHAR(20),
        /* cult_num is primary key */
        PRIMARY KEY(cult_num)
    ) $charset_collate;";
    /* inoculated cultures */
    $tbl_badgerMCT_inoc_culture = "CREATE TABLE IF NOT EXISTS {$table_badgerMCT_inoc_culture} (
        /* inoculation culture number */
        inoc_cult_num INT(10) AUTO_INCREMENT,
        /* type of medium used for culture */
        medium_type CHAR(20),
        /* from which culture was sample taken */
        cult_num INT(6),
        /* date of inoculation */
        inoc_date DATE,
        /* inoc_cult_num is primary key */
        PRIMARY KEY(inoc_cult_num)
    ) $charset_collate;";
    /* inoculated substrate */
    $tbl_badgerMCT_substrate = "CREATE TABLE IF NOT EXISTS {$table_badgerMCT_substrate} (
        /* substrate number */
        sub_num INT(6) AUTO_INCREMENT,
        /* culture number */
        inoc_cult_num INT(6),
        /* inoculation date */
        inoc_date DATE,
        /* start fruiting date */
        fruit_date DATE,
        /* block weight */
        block_weight int(4),
        /* sub_num is primary key */
        PRIMARY KEY(sub_num)
    ) $charset_collate;";
    /* harvested mushrooms */
    $tbl_badgerMCT_harvest = "CREATE TABLE IF NOT EXISTS {$table_badgerMCT_harvest} (
        /* harvest number */
        harvest_num INT(10) AUTO_INCREMENT,
        /* substrate number */
        sub_num INT(6),
        /* harvest date */
        harvest_date DATE,
        /* total weight */
        harvest_weight FLOAT(4,2),
        /* waste weight */
        waste_weight FLOAT(4,2),
        /* harvest_num */
        PRIMARY KEY(harvest_num)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    /* culture bank */
    dbDelta( $tbl_badgerMCT_culture_bank );
    /* incoulated cultures */
    dbDelta( $tbl_badgerMCT_inoc_culture );
    /* inoculated substrate */
    dbDelta( $tbl_badgerMCT_substrate );
    /* harvested mushrooms */
    dbDelta( $tbl_badgerMCT_harvest );
}
register_activation_hook( __FILE__, 'create_tables' );

#include 'activate.php';
include 'menu_conf.php';
?>