<?php
// menu page call
function badgermct_dashboard() {
    add_menu_page(
        'badgerMCT Dashboard',
        'BadgerMCT',
        'moderate_comments',
        'badgermct_dashboard',
        'badgermct_dashboard_page',
        '',
        //plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
        81
    );
}

function badgermct_cultures() {
    add_submenu_page(
        'badgermct_dashboard',
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
        <p>Place holder for Dashboard</p>
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