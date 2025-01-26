<?php
    global $wpdb;
    $table = $wpdb->prefix . 'badgerMCT_substrate';

// php functions
    function query_substrates($table) {
        global $wpdb;
        $sql_query = $wpdb->prepare( "SELECT * FROM $table" );
        return $wpdb->get_results($sql_query, ARRAY_A);
    }
    
// insert data into db if present
    if(isset($_POST['substrate_insert'])){
        // table data
        $data = [
            "substrate_num" => NULL,
            "substrate_type" => $_POST['substrate_type'],
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
<!-- Start Add substrate form -->
<form action="https://www.stuckcogllc.com/wp-admin/admin.php?page=badgermct_substrate" method="post">
        <h2>Add a substrate</h2>
        <table style="width:50%;text-align:left">
            <tbody>
<!-- culture number -->
                <tr name="culture number">
                    <th style="width:20%">
                        Culture No:
                    </th>
                    <th>
                        <input type="text" name="cult_num">
                    </th>
                </tr>
<!-- mushroom type -->
                <tr name="inoculation date" value="2024-01-01">
                    <th>
                        Inoculation date:
                    </th>
                    <th>
                        <input type="date" name="inoc_date">
                    </th>
                </tr>
<!-- mushroom type -->
                <tr name="mushroom type">
                    <th>
                        Mushroom Type:
                    </th>
                    <th>
                        <input type="text" name="mush_type">
                    </th>
                </tr>
<!-- grain number -->
                <tr name="grain number">
                    <th>
                        Grain Number:
                    </th>
                    <th>
                        <input type="text" name="grain_num">
                    </th>
                </tr>
<!-- block weight -->
                <tr name="block weight">
                    <th>
                        Inoculation date:
                    </th>
                    <th>
                        <input type="text" name="block_weight">
                    </th>
                </tr>
<!-- fruiting date -->
                <tr name="fruiting date" value="2024-01-01">
                    <th>
                        Inoculation date:
                    </th>
                    <th>
                        <input type="date" name="fruit_date">
                    </th>
                </tr>
<!-- first fruit weight -->
                <tr name="first fruit weight">
                    <th>
                        First Fruit weight:
                    </th>
                    <th>
                        <input type="text" name="first_fruit_weight">
                    </th>
                </tr>
<!-- second fruit date -->
                <tr name="second fruit date">
                    <th>
                        Second frut weight:
                    </th>
                    <th>
                        <input type="text" name="second_fruit_weight">
                    </th>
                </tr>
<!-- third fruit weight -->
                <tr name="third fruit weight">
                    <th>
                        Inoculation date:
                    </th>
                    <th>
                        <input type="text" name="third_fruit_weight">
                    </th>
                </tr>
</tbody>
        </table>
        <input type="submit" value="Add" name="substrate_insert">
    </form>
</div>
<!-- list substrates -->
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
            #start here next
            # need to fix query here and also work on posting data.
            #
                $substrates = query_substrates($table);
                foreach ($substrates as $substrate) {
                    echo "<tr><th>" . $substrate['substrate_num'] . 
                        "</th><th>" . $substrate['substrate_type'] . 
                        "</th><th>" . $substrate['cult_num'] . 
                        "</th><th>" . $substrate['inoc_date'] .
                        "</th></tr>";
                }
            ?>
        </tbody>
    </table>
</div>