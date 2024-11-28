<?php 
    echo "vendor page";

    global $wpdb;
    $table = $wpdb->prefix . 'badgerMCT_vendors';

    // insert data into db if present
    if(isset($_POST['vendor_insert'])){
        // table data
        $data = [
            "ven_num" => NULL,
            "ven_name" => $_POST['ven_name'],
            "ven_phone" => $_POST['ven_phone'],
            "ven_notes" => $_POST['ven_notes']
        ];
        // format
        $format = [NULL,'%s','%s','%s'];
        // wpdb insert
        $wpdb->insert($table, $data);
    }
?>