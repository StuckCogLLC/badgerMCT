<?php 
    echo "vendor page";

    global $wpdb;
    $table = $wpdb->prefix . 'badgerMCT_vendors';

    // php functions
    function query_vendors($table) {
        global $wpdb;
        $sql_query = $wpdb->prepare( "SELECT * FROM $table" );
        return $wpdb->get_results($sql_query, ARRAY_A);
    }

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

<!-- Start page -->
<div>
    <h1>
        <?php echo esc_html( get_admin_page_title() ); ?>
    </h1>
<!-- Start Add grain form -->
<form action="https://www.stuckcogllc.com/wp-admin/admin.php?page=badgermct_vendors" method="post">
        <h2>Add a grain</h2>
        <table style="width:50%;text-align:left">
            <tbody>
                <tr name="vendor name">
                    <th style="width:20%">
                        Vendor Name:
                    </th>
                    <th>
                        <input type="text" name="ven_name">
                    </th>
                </tr>
                <tr name="vendor phone">
                    <th>
                        Phone:
                    </th>
                    <th>
                        <input type="text" name="ven_phone">
                    </th>
                </tr>
                <tr name="notes">
                    <th>
                        Notes:
                    </th>
                    <th>
                        <input type="text" name="ven_notes" size="250">
                    </th>
                </tr>
            </tbody>
        </table>
        <input type="submit" value="Add" name="vendor_insert">
    </form>
</div>
<!-- list grains -->
<div>
    <table>
        <tbody>
            <tr>
                <th style=width:10%>
                    Name
                </th>
                <th style=width:10%>
                    Phone
                </th>
                <th style=width:10%>
                    Notes
                </th>
            </tr>
            <?php
                $vendors = query_vendors($table);
                foreach ($vendors as $vendor) {
                    echo "<tr><th>" . $vendor['ven_name'] . 
                        "</th><th>" . $vendor['ven_phone'] . 
                        "</th><th>" . $vendor['ven_notes'] . 
                        "</th></tr>";
                }
            ?>
        </tbody>
    </table>
</div>