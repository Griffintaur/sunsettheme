<?php 
	/*
	*This is the template for the header
	*@package sunsettheme
	*/

 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<!-- theme to be consistent and validated by html validator --> 
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- 	//necessary fo rhtml validation -->
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if(is_singular() && pings_open(get_queried_object())); ?>
		<link rel="pingback"  href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<!-- <title></title> -->
</head>
<body <?php body_class(); ?>>
