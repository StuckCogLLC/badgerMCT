<?php
    global $wpdb;
    $table = $wpdb->prefix . 'badgerMCT_cultures';

    // query culture table
    function query_cultures($table) {
        global $wpdb;
        $sql_query = $wpdb->prepare( "SELECT * FROM $table" );
        return $wpdb->get_results($sql_query, ARRAY_A);
    }

    // insert data into db if present
    if(isset($_POST['culture_insert'])){
        // table data
        $data = [
            "cult_num" => NULL,
            "mush_type" => $_POST['mush_type'],
            "cult_type" => $_POST['cult_type'],
            "date_added" => $_POST['received_date'],
            "vendor" => $_POST['vendor'],
            "ven_lot_num" => $_POST['ven_lot_num']
        ];
        // format
        $format = [NULL,'%s','%s','%s','%s','%s'];
        // wpdb insert
        $wpdb->insert($table, $data);
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
                <tr name="Culture Type">
                    <th style="width: 20%">
                        Culture Type:
                    </th>
                    <th>
                        <input type="text" name="cult_type">
                    </th>
                </tr>
                <tr name="Date" value="2024-01-01">
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
        <input type="submit" value="Add" name="culture_insert">
    </form>
</div>
<!-- list cultures -->

<div>
    <table>
        <tbody>
            <tr>
                <th style=width:10%>
                    ID
                </th>
                <th style=width:10%>
                    Type
                </th>
                <th style=width:10%>
                    Mushroom
                </th>
                <th style=width:10%>
                    Date
                </th>
                <th style=width:10%>
                    Vendor
                </th>
                <th style=width:10%>
                    Vendor Lot
                </th>
            </tr>
            <?php
                $cultures = query_cultures($table);
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