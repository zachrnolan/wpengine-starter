<?php

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_post_type_support('page', 'excerpt');

// Remove WP-Admin bar from site when logged in
add_filter('show_admin_bar', '__return_false');

// Tidy up the <head> a little. Full reference of things you can show/remove is here: http://rjpargeter.com/2009/09/removing-wordpress-wp_head-elements/
remove_action('wp_head', 'wp_generator');// Removes the WordPress version as a layer of simple security

// Remove extraneous classes from Wordpress menus
// siteart.co.uk/remove-extraneous-classes-from-wordpress-menus
add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
add_filter('page_css_class', 'custom_wp_nav_menu');
function custom_wp_nav_menu($var) {
  return is_array($var) ? array_intersect($var, array(
    // List of useful classes to keep
    'current_page_item',
    'current_page_parent',
    'current_page_ancestor',
    )
  ) : '';
}

// REPLACE "current_page_" WITH CLASS "active" in nav menus
add_filter ('wp_nav_menu','current_to_active');
function current_to_active($text){
  $replace = array(
    // List of classes to replace with "active"
    'current_page_item' => 'active',
    'current_page_parent' => 'active',
    'current_page_ancestor' => 'active',
  );
  $text = str_replace(array_keys($replace), $replace, $text);
  return $text;
}

// Add Advanced Custom Fields options page in WP-Admin sidebar
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

?>