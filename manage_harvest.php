<?php
    global $wpdb;
    $table = $wpdb->prefix . 'badgerMCT_harvest';

// php functions
function query_harvest($table) {
    global $wpdb;
    $sql_query = $wpdb->prepare( "SELECT * FROM $table" );
    return $wpdb->get_results($sql_query, ARRAY_A);
}

// insert data into db if present
if(isset($_POST['grain_insert'])){
    // table data
    $data = [
        "harvest_num" => NULL,
        "sub_num" => $_POST['sub_num'],
        "harvest_date" => $_POST['harvest_date'],
        "harvest_weight" => $_POST['harvest_weight'],
        "waste_weight" => $_POST['waste_weight']
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
                <tr name="harvest date" value="2024-01-01">
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
        <input type="submit" value="Add" name="harvest_insert">
    </form>
</div>
<!-- list harvests -->
<div>
    <table>
        <tbody>
            <tr>
                <th style=width:10%>
                    ID
                </th>
                <th style=width:10%>
                    Substrate ID
                </th>
                <th style=width:10%>
                    Date
                </th>
                <th style=width:10%>
                    Harvest Weight
                </th>
                <th style=width:10%>
                    Waste Weight
                </th>
            </tr>
            <?php
                $harvests = query_harvest($table);
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