<h1> sunset theme </h1>
<?php settings_errors(); ?>
<?php 
	$firstName=esc_attr(get_option('first_name'));
	$lastName=esc_attr(get_option('last_name'));
	$fullName= $first_name.''.$last_name;
	$user_description=esc_attr( 'user_description' );

 ?>
<div class="sunset-sidebar-preview">
	<div class="sunset-sidebar">
		<h1 class="sunset-username"> <?php $fullName ?></h1>
		<h1 class="susnet-description"> <?php $user_description ?></h1>
		<div class="icon-wrapper"></div>
	</div>
</div>
<form method="post" action="options.php" class="sunset-general-form">
<?php settings_fields('sunset-settings-group'); ?>
<?php do_settings_sections( 'ankit_sunset' ); ?>
<?php submit_button(); ?>
</form>