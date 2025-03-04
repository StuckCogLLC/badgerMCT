<?php
// create menu
function badgermct_menu() {
    // main menu title
    add_menu_page('badgerMCT Dashboard', 'badgerMCT', 'moderate_comments', 'badgermct_dashboard', 'badgermct_dashboard_page', '', 58);
    // dashboard page - same slug as main menu for name overide
    add_submenu_page('badgermct_dashboard', 'Dashboard', 'Dashboard', 'moderate_comments', 'badgermct_dashboard', 'badgermct_dashboard_page', 1);
    // culture page
    add_submenu_page('badgermct_dashboard', 'Manage Culture Bank', 'Culture Bank', 'moderate_comments', 'badgermct_culture_bank', 'badgermct_culture_bank_page', 2);
    // grain page
    add_submenu_page('badgermct_dashboard', 'Manage Grain', 'Grain', 'moderate_comments', 'badgermct_grain','badgermct_grain_page', 3);
    // substrate page
    add_submenu_page('badgermct_dashboard', 'Mange Substrate', 'Substrate', 'moderate_comments', 'badgermct_substrate', 'badgermct_substrate_page', 4);
    // harvest page
    add_submenu_page('badgermct_dashboard', 'Mange Harvest', 'Harvest', 'moderate_comments', 'badgermct_harvest', 'badgermct_harvest_page', 5);
    // vendor page
    add_submenu_page('badgermct_dashboard', 'Manage Vendors', 'Vendors', 'moderate_comments', 'badgermct_vendors', 'badgermct_vendors_page', 6);
}

// menu pages
function badgermct_dashboard_page() {
    include 'dashboard.php';
}
function badgermct_culture_bank_page() {
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
?>