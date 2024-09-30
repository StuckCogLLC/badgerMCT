<?php
global $wpdb;
$table = "badgerMCT_harvest";
// php functions
    function insert_harvest($table, $data) {
        global $wpdb;
        $wpdb->insert($table, $data);
    }
    function query_harvests($table) {
        global $wpdb;
        $sql_query = $wpdb->prepare( "SELECT * FROM $table" );
        return $wpdb->get_results($sql_query, ARRAY_A);
    }
// insert data into db if present
    if(isset($_POST['harvest_insert'])){
        $sub_num = $_POST['sub_num'];
        $harvest_date = $_POST['harvest_date'];
        $harvest_weight = $_POST['harvest_weight'];
        $waste_weight = $_POST['waste_weight'];
        $data = array(
            'harvest_num' => NULL,
            'sub_num' => $sub_num,
            'harvest_date' => $harvest_date,
            'harvest_weight' => $harvest_weight,
            'waste_weight' => $waste_weight
        );
        
        insert_harvest($table, $data);
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
<!-- Start Add harvest form -->
<form action="https://www.stuckcogllc.com/wp-admin/admin.php?page=badgermct_harvest" method="post">
        <h2>Add a harvest</h2>
        <table style="width:50%;text-align:left">
            <tbody>
                <tr name="substrage id">
                    <th style="width:20%">
                        Substrate ID:
                    </th>
                    <th>
                        <input type="text" name="sub_num">
                    </th>
                </tr>
                <tr name="harvest date">
                    <th>
                        Harvest Date:
                    </th>
                    <th>
                        <input type="date" name="harvest_date">
                    </th>
                </tr>
                <tr name="harvest weight">
                    <th>
                        Harvest Weight:
                    </th>
                    <th>
                        <input type="text" name="harvest_weight">
                    </th>
                </tr>
                <tr name="waste weight">
                    <th>
                        Waste Weight:
                    </th>
                    <th>
                        <input type="text" name="waste_weight">
                    </th>
                </tr>
            </tbody>
        </table>
        <input type="submit" value="Add" name="harvest_insert"><?php if(isset($_POST['harvest_insert'])){ echo "<p>harvest Added</p>"; } ?>
    </form>
</div>
<!-- list harvests -->
<div>
    <table>
        <tbody>
            <?php
                echo "<tr><th style=\"width:10%\">" . "ID" . 
                    "</th><th style=\"width:10%\">" . "Substrate ID" . 
                    "</th><th style=\"width:10%\">" . "Date" . 
                    "</th><th style=\"width:10%\">" . "Harvest Weight" . 
                    "</th><th style=\"width:10%\">" . "Waste Weight" . 
                    "</th></tr>";
                $harvests = query_harvests();
                foreach ($harvests as $harvest) {
                    echo "<tr><th>" . $harvest['harvest_num'] . 
                        "</th><th>" . $harvest['sub_num'] . 
                        "</th><th>" . $harvest['harvest_date'] . 
                        "</th><th>" . $harvest['harvest_weight'] . 
                        "</th><th>" . $harvest['waste_weight'] . 
                        "</th></tr>";
                }
            ?>
        </tbody>
    </table>
</div>