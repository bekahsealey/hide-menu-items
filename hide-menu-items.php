<?php
/*
Plugin Name: Hide Menu Items
Plugin URI: http://bekahsealey.com/
Description: This plugin hides private posts from custom menus
Version: 1.0
Author: Bekah Sealey
Author URI: http://bekahsealey.com/
License: GPLv2
*/

function nmo_hide_pages_from_menu ($items, $args) {
    foreach ($items as $item => $list) {
        if (get_post_status ($list->object_id) == ('private') || get_post_status ($list->object_id) == ('draft')) {
            unset ($items[$item]);
        }
    }
    return $items;
}
add_filter ('wp_nav_menu_objects', 'nmo_hide_pages_from_menu', 10, 2); 