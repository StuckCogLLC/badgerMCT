<?php
global $wpdb;

// php functions
    function insert_culture($table, $data) {
        global $wpdb;
        $wpdb->insert($table, $data);
    }
    function query_cultures() {
        global $wpdb;
        $sql_query = $wpdb->prepare( "SELECT * FROM badgerMCT_cultures" );
        return $wpdb->get_results($sql_query, ARRAY_A);
    }
// insert data into db if present
    if(isset($_POST['culture_insert'])){
        
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
        
        insert_culture($table, $data);

        if ($wpdb->last_error) {
            echo "wpdb Error: " . $wpdb->last_error;
        }
    }
?>
<!-- Start page -->
<div class="wrap">
    <h1>
        <?php echo esc_html( get_admin_page_title() ); ?>
    </h1>
<!-- Start Add Culture form -->
<form action="https://www.stuckcogllc.com/wp-admin/admin.php?page=badgermct_cultures" method="post">
        <h2>Add a culture</h2>
        <table class="form-table" role="presentation">
            <tbody>
                <tr name="Mushroom Strain">
                    <th>
                        Mushroom Strain:
                    </th>
                    <th>
                        <input type="text" name="mush_type">
                    </th>
                </tr>
                <tr name="Date Reveived">
                    <th>
                        Date Received:
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
<div class="wrap">
    <table class="form-table">
        <tbody>
            <?php
                echo "<tr><th style=\"width:10%\">" . "Shop Lot" . 
                    "</th><th style=\"width:10%\">" . "Mushroom" . 
                    "</th><th style=\"width:10%\">" . "Date" . 
                    "</th><th style=\"width:10%\">" . "Vendor" . 
                    "</th><th style=\"width:10%\">" . "Vendor Lot" . 
                    "</th></tr>";
                $cultures = query_cultures();
                foreach ($cultures as $row) {
                    echo "<tr><th>" . $row['shop_lot_num'] . 
                        "</th><th>" . $row['mush_type'] . 
                        "</th><th>" . $row['received_date'] . 
                        "</th><th>" . $row['vendor'] . 
                        "</th><th>" . $row['ven_lot_num'] . 
                        "</th></tr>";
                }
            ?>
        </tbody>
    </table>
</div>