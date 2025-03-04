<?php
    global $wpdb;
    $table = $wpdb->prefix . 'badgerMCT_culture_bank';

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
            "date_added" => $_POST['date_added'],
            "origin" => $_POST['origin'],
            "origin_lot_number" => $_POST['origin_lot_number']
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
<form action="https://www.stuckcogllc.com/wp-admin/admin.php?page=badgermct_culture_bank" method="post">
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
                        <input type="date" name="date_added">
                    </th>
                </tr>
                <tr name="Origin">
                    <th>
                        Origin:
                    </th>
                    <th>
                        <input type="text" name="origin">
                    </th>
                </tr>
                <tr name="Origin Lot Number">
                    <th>
                        Origin Lot Number:
                    </th>
                    <th>
                        <input type="text" name="origin_lot_number">
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
                    Culture Type
                </th>
                <th style=width:10%>
                    Mushroom Type
                </th>
                <th style=width:10%>
                    Date
                </th>
                <th style=width:10%>
                    Origin
                </th>
                <th style=width:10%>
                    Origin Lot
                </th>
            </tr>
            <?php
                $cultures = query_cultures($table);
                foreach ($cultures as $culture) {
                    echo "<tr><th>" . $culture['cult_num'] . 
                        "</th><th>" . $culture['cult_type'] . 
                        "</th><th>" . $culture['mush_type'] . 
                        "</th><th>" . $culture['date_added'] . 
                        "</th><th>" . $culture['origin'] . 
                        "</th><th>" . $culture['origin_lot_number'] . 
                        "</th></tr>";
                }
            ?>
        </tbody>
    </table>
</div>