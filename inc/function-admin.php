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

//Activate custom settings
add_action('admin_init','sunset_custom_settings');
}

add_action('admin_menu','sunset_add_admin_page');

function sunset_theme_create_page(){
	//generation of our admin page
	require_once(get_template_directory().'/inc/Templates/sunset-admin.php');
}

function sunset_theme_settings_page(){

}

function sunset_custom_settings(){
	register_setting('sunset-settings-group','first_name');
	register_setting( 'sunset-settings-group','last_name');
	register_setting( 'sunset-settings-group','twitter_handler','sunset_sanitize_twitter_handler');
	register_setting( 'sunset-settings-group','facebook_handler');
	register_setting( 'sunset-settings-group','snapchat_handler');
	register_setting( 'sunset-settings-group','instagram_handler');
	register_setting( 'sunset-settings-group','user-description');
	add_settings_section( 'sunset-sidebar-options','Sidebar options','sunset_sidebar_options','ankit_sunset');
	add_settings_field( 'sidebar-name', 'Full Name', 'sunset_sidebar_name', 'ankit_sunset', 'sunset-sidebar-options' );
	add_settings_field( 'sidebar-twitter','Twitter Handler','sunset_sidebar_twitter','ankit_sunset','sunset-sidebar-options' );
	add_settings_field( 'sidebar-facebook','Facebook Handler','sunset_sidebar_facebook','ankit_sunset','sunset-sidebar-options' );
	add_settings_field( 'sidebar-snapchat','Snapchat Handler','sunset_sidebar_snapchat','ankit_sunset','sunset-sidebar-options' );
	add_settings_field( 'sidebar-instagram','Instagram Handler','sunset_sidebar_instagram','ankit_sunset','sunset-sidebar-options' );
	add_settings_field( 'sidebar-description', 'User Description', 'sunset_sidebar_user_description', 'ankit_sunset', 'sunset-sidebar-options');
	//remeber here ankit_sunset is not binded to the name of the page but actually the group name which can be anything that is rendered using do settingin sunset-admin.php under the group name while the last input in the add_settings_filed bind it to the group

}

function sunset_sidebar_options(){
	echo 'Customized your sidebar Information';
}
function sunset_sidebar_name(){
	$firstName=esc_attr(get_option('first_name'));
	$lastName=esc_attr(get_option('last_name'));
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name"/>
	<input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name"/>';
}
function sunset_sidebar_user_description(){
	$description= esc_attr( get_option('user_description' ));
	echo'<input type="text" name="user_description_value" value="'.$description.'" placeholder="please write description about yourself"/><p> please enter the description</p>';
}
function sunset_sidebar_twitter(){
	$twitter=esc_attr( get_option( 'twitter_handler'));
	echo '<input type="text" name="twitter_handler_value" value="'.$twitter.'" placeholder="Twitter handler"/><p class="description"> please eter the user name without the @ character</p>';
}
function sunset_sidebar_facebook(){
	$facebook=esc_attr( get_option( 'facebook_handler'));
	echo '<input type="text" name="facebook_handler_value" value="'.$facebook.'" placeholder="facebook handler"/>';
}
function sunset_sidebar_instagram(){
	$instagram=esc_attr( get_option( 'instagram_handler'));
	echo '<input type="text" name="instagram_handler_value" value="'.$instagram.'" placeholder="instagram handler"/>';
}
function sunset_sidebar_snapchat(){
	$snapchat=esc_attr( get_option( 'snapchat_handler'));
	echo '<input type="text" name="snapchat_handler_value" value="'.$snapchat.'" placeholder="snapchat handler"/>';
}

//Sanitization Settings
function sunset_sanitize_twitter_handler($input){
	$output=_sanitize_text_fields( $input ,true);
	$output=str_replace('@', '', $output);
	return $output;
}

 ?>
