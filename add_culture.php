<?php



if(isset($_POST['add'])){
    echo $_POST['mush_type'];
    echo $_POST['received_date'];
    echo $_POST['vendor'];
    echo $_POST['ven_lot_num'];

    $data = array(
        'mush_type' => 'somemush',
        'received_date' => '10/10/1010',
        'vendor' => 'MycoLabs',
        'ven_lot_num' => 'ml-123123123',
    );
    global $wpdb;
    $wpdb->insert( 'badgerMCT_cultures', $data );
    #header("Location:https://www.stuckcogllc.com/wp-admin/admin.php?page=badgermct_cultures");
    if ($wpdb->last_error) {
        echo "wpdb Error: " . $wpdb->last_error;
    }
}


?>