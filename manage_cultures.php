<div class="wrap">
    <h1>
        <?php echo esc_html( get_admin_page_title() ); ?>
    </h1>
    <form action="<?php esc_url( plugin_dir_url(__FILE__) . 'add_culture.php' ); ?>" method="post">
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
        <input type="submit" value="Add" name="add">
    </form>
</div>