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
    include 'dashboard.php';
}

function badgermct_cultures_page() {
    include 'manage_cultures.php';
}

// add menu
add_action( 'admin_menu', 'badgermct_dashboard' );
add_action( 'admin_menu', 'badgermct_cultures' );
?>