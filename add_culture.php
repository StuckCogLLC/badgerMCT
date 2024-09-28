<?php
global $wpdb;


if(isset($_POST['add'])){
    echo $_POST['mush_type'];
    echo $_POST['received_date'];
    echo $_POST['vendor'];
    echo $_POST['ven_lot_num'];

    $wpdb->insert(
        'badgerMCT_cultures',
        array(
            'mush_type' => $_POST['mush_type'],
            'received_date' => $_POST['received_date'],
            'vendor' => $_POST['vendor'],
            'ven_lot_num' => $_POST['ven_lot_num'],
        ),
    );
    #header("Location:https://www.stuckcogllc.com/wp-admin/admin.php?page=badgermct_cultures");
}
?>