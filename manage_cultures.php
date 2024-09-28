<div class="wrap">
        <h1>
            <?php echo esc_html( get_admin_page_title() ); ?>
        </h1>
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


            </tbody>
        </table>
            <div class="postbox">
                <form action="<?php menu_page_url( 'badgermct_cultures_page' ) ?>" method="POST">
                     <br><br>
                    Mushroom Strain: <input type="text" name="mush_type"><br><br>
                    Date Received: <input type="date" name="received_date"><br><br>
                    Vendor: <input type="text" name="vendor"><br><br>
                    Vendor Lot Number: <input type="text" name="ven_lot_num"><br><br>
                    <input type="submit" value="Add" name="add">
                </form>
            <div>
        </div>
    </div>