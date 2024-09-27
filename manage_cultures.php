<div class="wrap">
        <h1>
            <?php echo esc_html( get_admin_page_title() ); ?>
        </h1>
        <form action="<?php menu_page_url( 'badgermct_cultures_page' ) ?>" method="POST">
            Your name: <input type="text" name="reviewer_name"><br><br>
            How many stars would you give us? 
                <select name="star_rating">
                    <option value="1">1 star</option>
                    <option value="2">2 stars</option>
                    <option value="3">3 stars</option>
                    <option value="4">4 stars</option>
                    <option value="5">5 stars</option>
                </select><br><br>
            Your review: <br>
                <textarea name="details" rows="10" cols="30"></textarea><br><br>
            <input type="submit" value="Submit" name="submit">
    </form>
    </div>