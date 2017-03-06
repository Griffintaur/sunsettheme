<?php 
/*
@package sunsettheme
	==============================
			ADMIN PAGE
	=============================

*/

function sunset_add_admin_page(){
	//generate sunset admin page
	add_menu_page('Sunset Theme Options','Sunset','manage_options','ankit_sunsettheme','sunset_theme_create_page',get_template_directory_uri().'/img/sunset-icon.png',110);
//for icons from wordpress just use the icon name in place of get_template_directory_uri from devlopers.wordpress/icons
//use _ to connect two different word as one and to be considered as different words use -(dash)
//slug must be a single word.
	//Generate sunset Admin SUB pages
add_submenu_page('ankit_sunsettheme','Sunset Theme Options','Settings','manage_options','ankit_sunsettheme','sunset_theme_create_page');
add_submenu_page('ankit_sunsettheme','Sunset CSS Options','Custom CSS','manage_options','ankit_sunset_css','sunset_theme_settings_page');
}

add_action('admin_menu','sunset_add_admin_page');

function sunset_theme_create_page(){
	//generation of our admin page
	require_once(get_template_directory().'/inc/Templates/sunset-admin.php');
}

function sunset_theme_settings_page(){

}
 ?>
