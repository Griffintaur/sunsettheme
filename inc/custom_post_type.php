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
	add_filter( 'manage_sunset-contact_posts_column','sunset_set_contact_columns_callback' );
	//manage_yourcustomposttype_posts_columns
	add_action( 'manage_sunset-contact_custom_column','sunset_contact_custom_column' );
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

//filter & change the name of the rows
function sunset_set_contact_columns_callback($columns){
	//unset($columns['author']);
	$newcolumns=array();
	$newcolumns['title']='Full Name';
	$newcolumns['message']='Message';
	$newcolumns['email']= 'Email';
	$newcolumns['date']='Date';
	return $newcolumns;

}

//goes through all the rows  one by one
function sunset_contact_custom_column( $column, $post_id){
	switch($column)
}


?>