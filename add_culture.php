<?php


$table = 'badgerMCT_cultures';
$mush_type = $_POST['mush_type'];
$received_date = $_POST['received_date'];
$vendor = $_POST['vendor'];
$ven_lot_num = $_POST['ven_lot_num'];

$data = array(
    'shop_lot_num' => NULL,
    'mush_type' => $mush_type,
    'received_date' => $received_date,
    'vendor' => $vendor,
    'ven_lot_num' => $ven_lot_num
);


function insert_data($table, $data) {
    global $wpdb;
    $wpdb->insert($table, $data);
}

if(isset($_POST['add'])){
    echo $_POST['mush_type'];
    echo $_POST['received_date'];
    echo $_POST['vendor'];
    echo $_POST['ven_lot_num'];

    insert_data($table, $data);

    #header("Location:https://www.stuckcogllc.com/wp-admin/admin.php?page=badgermct_cultures");
    if ($wpdb->last_error) {
        echo "wpdb Error: " . $wpdb->last_error;
    }
}


?>