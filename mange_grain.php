<?php
global $wpdb;

// php functions
    function insert_grain($table, $data) {
        global $wpdb;
        $wpdb->insert($table, $data);
    }
    function query_grains() {
        global $wpdb;
        $sql_query = $wpdb->prepare( "SELECT * FROM badgerMCT_grain" );
        return $wpdb->get_results($sql_query, ARRAY_A);
    }
// insert data into db if present
    if(isset($_POST['grain_insert'])){
        
        $table = 'badgerMCT_grain';
        $shop_lot_num = $_POST['shop_lot_num'];
        $mush_type = $_POST['mush_type'];
        $inoc_date = $_POST['inoc_date'];
        $grain_type = $_POST['grain_type'];

        $data = array(
            'grain_num' => NULL,
            'shop_lot_num' => $shop_lot_num,
            'mush_type' => $mush_type,
            'innoc_date' => $inoc_date,
            'grain_type' => $grain_type
        );
        echo $data;
        insert_grain($table, $data);

        if ($wpdb->last_error) {
            echo "wpdb Error: " . $wpdb->last_error;
        }
    }
?>
<!-- Start page -->
<div>
    <h1>
        <?php echo esc_html( get_admin_page_title() ); ?>
    </h1>
<!-- Start Add grain form -->
<form action="https://www.stuckcogllc.com/wp-admin/admin.php?page=badgermct_grain" method="post">
        <h2>Add a grain</h2>
        <table style="width:50%;text-align:left">
            <tbody>
                <tr name="Shop Lot">
                    <th style="width:20%">
                        Shop Lot:
                    </th>
                    <th>
                        <input type="text" name="shop_lot_num">
                    </th>
                </tr>
                <tr name="Mushroom Type">
                    <th>
                        Mushroom Type:
                    </th>
                    <th>
                        <input type="text" name="mush_type">
                    </th>
                </tr>
                <tr name="innoculation date">
                    <th>
                        Innoculation date:
                    </th>
                    <th>
                        <input type="date" name="inoc_date">
                    </th>
                </tr>
                <tr name="Grain Type">
                    <th>
                        Grain Type:
                    </th>
                    <th>
                        <input type="text" name="grain_type">
                    </th>
                </tr>
            </tbody>
        </table>
        <input type="submit" value="Add" name="grain_insert"><?php if(isset($_POST['grain_insert'])){ echo "<p>grain Added</p>"; } ?>
    </form>
</div>
<!-- list grains -->
<div>
    <table>
        <tbody>
            <?php
                echo "<tr><th style=\"width:10%\">" . "Grain Lot" . 
                    "</th><th style=\"width:10%\">" . "Shop Lot" . 
                    "</th><th style=\"width:10%\">" . "Mushroom" . 
                    "</th><th style=\"width:10%\">" . "Inoc Date" . 
                    "</th><th style=\"width:10%\">" . "grain_type" .
                    "</th></tr>";
                $grains = query_grains();
                foreach ($grains as $row) {
                    echo "<tr><th>" . $row['grain_num'] . 
                        "</th><th>" . $row['shop_lot_num'] . 
                        "</th><th>" . $row['mush_type'] . 
                        "</th><th>" . $row['inoc_date'] . 
                        "</th><th>" . $row['grain_type'] . 
                        "</th></tr>";
                }
            ?>
        </tbody>
    </table>
</div>
<?php