<?php
    global $wpdb;
    $table = wpdb->prefix . 'badgerMCT_culture';

    // php functions
    //function insert_culture($table, $data) {
    //    $wpdb->flush();
    //   global $wpdb;
    //    $wpdb->insert($table, $data);
    //}
    function query_cultures($table) {
        global $wpdb;
        $sql_query = $wpdb->prepare( "SELECT * FROM $table" );
        return $wpdb->get_results($sql_query, ARRAY_A);
    }

    //data array
    $data = array(
        'cult_num' => NULL,
        'cult_type' => $_POST['cult_type'];,
        'mush_type' => $_POST['mush_type'],
        'date_added' => $_POST['date_added'],
        'vendor' => $_POST['vendor'],
        'ven_lot_num' => $_POST['ven_lot_num']
    );
    $format = array(NULL,'%s','%s','%s','%s','%s');

    // insert data into db if present
    if(isset($_POST['culture_insert'])){
        insert_culture($table, $data, $format);
    }
?>
<!-- Start page -->
<div>
    <h1>
        <?php echo esc_html( get_admin_page_title() ); ?>
    </h1>
<!-- Start Add Culture form -->
<form action="https://www.stuckcogllc.com/wp-admin/admin.php?page=badgermct_culture" method="post">
        <h2>Add a culture</h2>
        <table style="width:50%;text-align:left">
            <tbody>
                <tr name="Mushroom Strain">
                    <th style="width:20%">
                        Mushroom Strain:
                    </th>
                    <th>
                        <input type="text" name="mush_type">
                    </th>
                </tr>
                <tr name="Date">
                    <th>
                        Date:
                    </th>
                    <th>
                        <input type="date" name="received_date">
                    </th>
                </tr>
                <tr name="Vendor">
                    <th>
                        Vendor:
                    </th>
                    <th>
                        <input type="text" name="vendor">
                    </th>
                </tr>
                <tr name="Vendor Lot Number">
                    <th>
                        Vendor Lot Number:
                    </th>
                    <th>
                        <input type="text" name="ven_lot_num">
                    </th>
                </tr>
            </tbody>
        </table>
        <input type="submit" value="Add" name="culture_insert"><?php if(isset($_POST['culture_insert'])){ echo "<p>Culture Added</p>"; } ?>
    </form>
</div>
<!-- list cultures -->
<div>
    <table>
        <tbody>
            <?php
                echo "<tr><th style=\"width:10%\">" . "ID" .
                    "</th><th style=\"width:10%\">" . "Type" .
                    "</th><th style=\"width:10%\">" . "Mushroom" . 
                    "</th><th style=\"width:10%\">" . "Date" . 
                    "</th><th style=\"width:10%\">" . "Vendor" . 
                    "</th><th style=\"width:10%\">" . "Vendor Lot" . 
                    "</th></tr>";
                $cultures = query_cultures();
                foreach ($cultures as $culture) {
                    echo "<tr><th>" . $culture['cult_num'] . 
                        "</th><th>" . $culture['cult_type'] . 
                        "</th><th>" . $culture['mush_type'] . 
                        "</th><th>" . $culture['date_added'] . 
                        "</th><th>" . $culture['vendor'] . 
                        "</th><th>" . $culture['ven_lot_num'] . 
                        "</th></tr>";
                }
            ?>
        </tbody>
    </table>
</div>