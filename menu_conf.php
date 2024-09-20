<?php
// menu page call
function badgermct_dashboard() {
?>
<p>This is a text place holder</p>
<?php
}

function badgermct_cultures() {
    add_submenu_page(
        'badgermct',
        'Mange Cultures',
        'Mange Cultures',
        'moderate_comments',
        'badgermct_cultures',
        'badgermct_cultures_page',
        1
    );
}

// menu pages
function badgermct_dashboard_page() {
    ?>
    <div class="wrap">
        <h1>
            <?php echo esc_html( get_admin_page_title() ); ?>
        </h1>
        <form action="options.php" method="post">
            <?php
                // output security fields for the registered setting "wporg_options"
                settings_fields( 'wporg_options' );
                // output setting sections and their fields
                // (sections are registered for "wporg", each field is registered to a specific section)
                do_settings_sections( 'wporg' );
                // output save settings button
                submit_button( __( 'Save Settings', 'textdomain' ) );
            ?>
        </form>
    </div>
    <?php
}

function badgermct_cultures_page() {
    ?>
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
    <?php
}

// add menu
add_action( 'admin_menu', 'badgermct_dashboard' );
add_action( 'admin_menu', 'badgermct_cultures' );
?>