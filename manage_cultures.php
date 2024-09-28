<div class="wrap">
    <h1>
        <?php echo esc_html( get_admin_page_title() ); ?>
    </h1>
    <form action="" method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th>
                        Shop Lot Number:
                    </th>
                    <th>
                        <input type="int" name="shop_lot_num">
                    </th>
                </tr>
                <tr>
                    <th>
                        Mushroom Strain:
                    </th>
                    <th>
                        <input type="text" name="mush_type">
                    </th>
                </tr>
                <tr>
                    <th>
                        Date Received:
                    </th>
                    <th>
                        <input type="date" name="received_date">
                    </th>
                </tr>
                <tr>
                    <th>
                        Vendor:
                    </th>
                    <th>
                        <input type="text" name="vendor">
                    </th>
                </tr>
                <tr>
                    <th>
                        Vendor Lot Number:
                    </th>
                    <th>
                        <input type="text" name="ven_lot_num">
                    </th>
                </tr>
                <tr>
                    <input type="submit" value="Add" name="add">
                </tr>
            </tbody>
        </table>
    </form>
</div>