<h1>Sunset Theme Support </h1>
<?php settings_errors(); 
		//$picture=esc_attr(get_option());
?>

<form method="psot" action="options.php" class="sunset-general-form">
<?php 

	do_settings_sections( 'ankit_sunset_theme');
	settings_fields( 'sunset-theme-support' );
	submit_button();
 ?>
 </form>