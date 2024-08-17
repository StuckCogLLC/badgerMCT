<?php
function create_tables() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $table1 = "CREATE TABLE badgerMCT_cultures (
        shop_lot_num INT(6) AUTO_INCREMENT,
        mush_type CHAR(50),
        received_date DATE,
        vendor CHAR(50),
        ven_lot_num CHAR(20),
        PRIMARY KEY(shop_lot_num)
        ) $charset_collate;";
    
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta( $table1 );
}

register_activation_hook( __FILE__, 'create_tables' );