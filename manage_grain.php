<?php
    global $wpdb;
    $table = $wpdb->prefix . 'badgerMCT_cultures';

// php functions
    function query_grains($table) {
        global $wpdb;
        $sql_query = $wpdb->prepare( "SELECT * FROM $table" );
        return $wpdb->get_results($sql_query, ARRAY_A);
    }
    
// insert data into db if present
    if(isset($_POST['grain_insert'])){
        // table data
        $data = [
            "grain_num" => NULL,
            "grain_type" => $_POST['grain_type'],
            "cult_num" => $_POST['cult_num'],
            "inoc_date" => $_POST['inoc_date']
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
<form action="https://www.stuckcogllc.com/wp-admin/admin.php?page=badgermct_grain" method="post">
        <h2>Add a grain</h2>
        <table style="width:50%;text-align:left">
            <tbody>
                <tr name="type">
                    <th style="width:20%">
                        Grain Type:
                    </th>
                    <th>
                        <input type="text" name="grain_type">
                    </th>
                </tr>
                <tr name="culture number">
                    <th>
                        Culture No:
                    </th>
                    <th>
                        <input type="text" name="cult_num">
                    </th>
                </tr>
                <tr name="inoculation date" value="2024-01-01">
                    <th>
                        Inoculation date:
                    </th>
                    <th>
                        <input type="date" name="inoc_date">
                    </th>
                </tr>
            </tbody>
        </table>
        <input type="submit" value="Add" name="grain_insert">
    </form>
</div>
<!-- list grains -->
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
                    Culture ID
                </th>
                <th style=width:10%>
                    Date
                </th>
            </tr>
            <?php
                $grains = query_grains($table);
                foreach ($grains as $grain) {
                    echo "<tr><th>" . $grain['grain_num'] . 
                        "</th><th>" . $grain['grain_type'] . 
                        "</th><th>" . $grain['cult_num'] . 
                        "</th><th>" . $grain['inoc_date'] .
                        "</th></tr>";
                }
            ?>
        </tbody>
    </table>
</div>