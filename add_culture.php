<?php
if(isset($_POST['submit'])){
    if($_POST['mush_type'] != ''&& $_POST['received_date'] != ''){
        $wpdb->insert(
            'badgerMCT_cultures',
            array(
                'mush_type' => $_POST['mush_type'],
                'received_date' => $_POST['received_date'],
                'vendor' => $_POST['vendor'],
                'ven_lot_num' => $_POST['ven_lot_num'],
            ),
            array(
                '%s',
                '%s',
                '%s',
                '%s',
            )
        );
        header("Location:https://www.stuckcogllc.com/wp-admin/admin.php?page=badgermct_cultures");
    }
} else {
    ?>
    <div class="wrap">
        <p>Fill out the fields</p>
    </div>
    <?php
}
?>