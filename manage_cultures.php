<div class="wrap">
    <h1>
        <?php echo esc_html( get_admin_page_title() ); ?>
    </h1>

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
        return $wpdb->get_results($sql_query, OBJECT);
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
        <input type="submit" value="Add" name="culture_insert">
    </form>
</div>

<?php
    //$wpdb->show_errors();
    //$sql_query = $wpdb->prepare( "SELECT * FROM badgerMCT_cultures" );
    //echo "----------<br>";
    //echo "Just the query: " . $wpdb->query("SELECT * FROM {$wpdb->posts}", ARRAY_A) . "<br>";
    //$somevar = $wpdb->get_results($sql_query, OBJECT);
    //echo "----------<br>";
    //echo var_dump($somevar);
    //echo "----------<br>";
    //echo "query to a var: " . $somevar . "<br>";
    //echo "function return: " . var_dump(query_cultures());
    //echo "----------<br>";
    //$wpdb->print_error();
    $cultures = query_cultures();
    foreach (query_cultures() as $row) {
        echo "Lot Number: " . $row["shop_lot_num"] . " - Type: " . $row["mush_type"] . " - Date: " . $row["received_date"] . " - Vendor: " . $row["vendor"] . " - Vendor Lot: " . $row["ven_lot_num"] . "<br>";
    }

    //$query_culture_results = query_cultures();
    //if ( $query_culture_results->num_rows > 0 ) {
    //    while( $row = $query_culture_results->fetch_assoc()) {
    //        echo "Lot Number: " . $row["shop_lot_num"] . " - Type: " . $row["mush_type"] . " - Date: " . $row["received_date"] . " - Vendor: " . $row["vendor"] . " - Vendor Lot: " . $row["ven_lot_num"] . "<br>";
    //    } 
    //} else {
    //        echo "0 results";
    //}
?>