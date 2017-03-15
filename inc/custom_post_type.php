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
	add_action( 'manage_sunset-contact_posts_custom_column','sunset_contact_custom_column',10,2 );
	add_action( 'add_meta_boxes', 'sunset_contact_add_meta_box', 10, 1 );
	//here 10 describes the priority lower the value hgher the priority and 1 is the no if the input to the callback function;
	add_action( 'save_post','sunset_save_contact_email_data', 10, 1 );
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

//goes through all the rows  one by one as post id is given thus goes through each post id
function sunset_contact_custom_column( $column, $post_id){
	switch($column){
		case 'message':
			echo get_the_excerpt();
			break;
		case 'email':
			$emailvalue=get_post_meta( $post->ID, '_contact_email_value_key', true );
			echo '<a href="mailto:'.$emailvalue.'">'.$emailvalue.'</a>';
			break;
	}
}
/*
	*CONTACT META BOXES
*/
function sunset_contact_add_meta_box(){
	add_meta_box( 'contact_email_id','User Email', 'sunset_contact_email_callback','sunset-contact','side','default');
}

function sunset_contact_email_callback($post){
	wp_nonce_field('sunset_save_contact_email_data','sunset_email_meta_box_naunce');
	//wp_naunce genrate unique id to ceck the action like updating saving is from legtimiate user.
	$value=get_post_meta( $post->ID, '_contact_email_value_key', true );
	echo '<label for="sunset_contact_email_field">User Email Address : </label>';
	echo '<input type="email" id="sunset_contact_email_field" name="sunset_contact_email_field" value="'.esc_attr( $value ).'" size="25" />';
	//name should be identical to id
}

function sunset_save_contact_email_data($post_id){
	if(!isset($_POST['sunset_email_meta_box_naunce'])){
		return;
	}
	if(! wp_verify_nonce( 'sunset_email_meta_box_naunce', 'sunset_save_contact_email_data' )){
		return;
	}
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}
	if( !current_user_can( 'edit_post',$post_id )){
		return;
	}
	if( ! isset($_POST['sunset_contact_email_field'])){
		return;
	}
	$my_data=sanitize_text_field($_POST['sunset_contact_email_field']);
	update_post_meta( $post_id,'_contact_email_value_key',$my_data  );

}

?>