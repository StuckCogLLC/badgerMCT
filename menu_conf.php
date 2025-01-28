<?php
// menu page call

$badgermct_menu_slug = 'badgermct_menu';

function badgermct_menu() {
    add_menu_page('badgerMCT Dashboard', 'badgerMCT', 'moderate_comments', $badgermct_menu_slug, 'badgermct_dashboard_page', '', '', 81);
    add_submenu_page($badgermct_menu_slug, 'badgerMCT Dashboard', 'Dashboard', 'moderate_comments', $badgermct_menu_slug, 'badgermct_dashboard_page', 1);
    add_submenu_page($badgermct_menu_slug, 'Manage Culture', 'Culture', 'moderate_comments', 'badgermct_culture', 'badgermct_culture_page', 2);
    add_submenu_page($badgermct_menu_slug, 'Manage Grain', 'Grain', 'moderate_comments', 'badgermct_grain','badgermct_grain_page', 3);
    add_submenu_page($badgermct_menu_slug, 'Mange Substrate', 'Substrate', 'moderate_comments', 'badgermct_substrate', 'badgermct_substrate_page', 4);
    add_submenu_page($badgermct_menu_slug, 'Mange Harvest', 'Harvest', 'moderate_comments', 'badgermct_harvest', 'badgermct_harvest_page', 5);
    add_submenu_page($badgermct_menu_slug, 'Manage Vendors', 'Vendors', 'moderate_comments', 'badgermct_vendors', 'badgermct_vendors_page', 6);
}

/*function badgermct_dashboard() {
    add_menu_page(
        'badgerMCT Dashboard',
        'badgerMCT',
        'moderate_comments',
        'badgermct_dashboard',
        'badgermct_dashboard_page',
        '',
        //plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
        81
    );
}

function badgermct_culture() {
    add_submenu_page(
        'badgermct_dashboard',
        'Manage Culture',
        'Manage Culture',
        'moderate_comments',
        'badgermct_culture',
        'badgermct_culture_page',
        1
    );
}

function badgermct_grain() {
    add_submenu_page(
        'badgermct_dashboard',
        'Manage Grain',
        'Manage Grain',
        'moderate_comments',
        'badgermct_grain',
        'badgermct_grain_page',
        2
    );
}

function badgermct_harvest() {
    add_submenu_page(
        'badgermct_dashboard',
        'Mange Harvest',
        'Mange Harvest',
        'moderate_comments',
        'badgermct_harvest',
        'badgermct_harvest_page',
        2
    );
}
function badgermct_substrate() {
    add_submenu_page(
        'badgermct_dashboard',
        'Mange Substrate',
        'Mange Substrate',
        'moderate_comments',
        'badgermct_substrate',
        'badgermct_substrate_page',
        2
    );
}
function badgermct_vendors() {
    add_submenu_page(
        'badgermct_dashboard',
        'Vendors',
        'Vendors',
        'moderate_comments',
        'badgermct_vendors',
        'badgermct_vendors_page',
        2
    );
}
    */

// menu pages
function badgermct_dashboard_page() {
    include 'dashboard.php';
}

function badgermct_culture_page() {
    include 'manage_culture.php';
}

function badgermct_grain_page() {
    include 'manage_grain.php';
}

function badgermct_harvest_page() {
    include 'manage_harvest.php';
}

function badgermct_substrate_page() {
    include 'manage_substrate.php';
}

function badgermct_vendors_page() {
    include 'vendors.php';
}

// add menu
add_action( 'admin_menu', 'badgermct_menu' );
/*
add_action( 'admin_menu', 'badgermct_culture' );
add_action( 'admin_menu', 'badgermct_grain' );
add_action( 'admin_menu', 'badgermct_substrate' );
add_action( 'admin_menu', 'badgermct_harvest' );
add_action( 'admin_menu', 'badgermct_vendors' );
*/
?>