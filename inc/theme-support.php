<?php 
/*
@package sunset-theme
============================================
		ADMIN ENQUEUE FUNCTION
===============================================

*/
$options=get_option( 'post_formats');
	$formats = array('aside','gallery','image','status','quote','video','chat','audio' );
	$output =array();
	foreach ($formats as $post_format) {
		$output= @$options[$post_format]==1?$post_format:'';
	}
if(!empty($options)){
	add_theme_support( 'post-formats',$output );


}


?>