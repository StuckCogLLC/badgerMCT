<?php
function create_tables() {
    global $wpdb;

    $table1 = "CREATE TABLE badgerMCT_cultures (
        shop_lot_num INT(6) AUTO_INCREMENT,
        mush_type CHAR(50),
        received_date DATE,
        vendor CHAR(50),
        ven_lot_num CHAR(20),
        PRIMARY KEY(shop_lot_num))";
    
    if ($wpdb->query($table1) === TRUE) {
        echo "table created"
    } else {
        echo "error: " . $wpdb->error;
    }
}

register_activation_hook( __FILE__, 'create_tables' );