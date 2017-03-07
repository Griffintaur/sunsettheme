<?php 
/*
@package sunset-theme
============================================
		ADMIN ENQUEUE FUNCTION
===============================================

*/

function susnet_load_admin_scripts($hook){
	if($hook != 'toplevel_page_ankit_sunsettheme')
		return ;
	wp_register_style( 'sunset_admin',get_template_directory_uri().'/css/sunset_admin.css', '1.0.0', 'all' );

	wp_enqueue_style( 'sunset_admin' );
}

add_action( 'admin_enqueue_scripts', 'susnet_load_admin_scripts' );
 ?>