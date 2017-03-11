<?php 
/*
@package sunset-theme
============================================
		THEME CUSTOM PORT FUNCTION
===============================================

*/

$contact=get_option( 'activate_contact' );
if(@$contact ==1 ){
	add_action('init','sunset_contact_custom_post_type');
}

/*CONTACT CUSTOM POST TYPE*/

function sunset_contact_custom_post_type(){
	$labels=array(
		'name' 			=> 'Messages',
		'Singular_Name'	=> 'Message',
		'menu_name'		=>'Messages',
		'menu_admin_bar'=> 'Message'
	);

	$args=array(
		'labels' 			=> 	$labels,
		'show_ui'			=> 	true,
		'show_in_menu'		=> 	true,
		'capability_type'	=>	'post',
		'hierarchical'		=>	false,
		'menu_position'		=>	26,
		'menu_icon'			=>	'dashicons-email-alt',
		'supports'			=>	array('title','editor','author')
	);

	register_post_type('sunset-contact',$args);

}






?>