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

	wp_enqueue_script( 'jquery' );
	wp_enqueue_media();

	wp_register_script( 'sunset_admin_script', get_template_directory_uri().'/js/sunset_admin.js',array('jquery'),'1.0.0',true);
	wp_enqueue_script( 'sunset_admin_script');
}

add_action( 'admin_enqueue_scripts', 'susnet_load_admin_scripts' );
 
/*
@package sunset-theme
============================================
		FRONT END ENQUEUE FUNCTION
===============================================

*/
function sunset_load_scripts(){
	
}