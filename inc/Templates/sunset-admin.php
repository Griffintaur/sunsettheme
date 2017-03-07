<h1> sunset theme </h1>
<?php settings_errors(); ?>
<?php 
	$firstName=esc_attr(get_option('first_name'));
	$lastName=esc_attr(get_option('last_name'));
	$fullName= $firstName.''.$lastName;
	$description= esc_attr( get_option('user_description' ));
	$profile_pic=esc_attr(get_option('profile_pic'));

 ?>
<div class="sunset-sidebar-preview">
	<div class="sunset-sidebar">
		<div class="image-container">
			<div id="dp_profile" class="profile-picture" style="background-image: url(<?php print $profile_pic; ?>); ">
			</div>
		</div>
		<h1 class="sunset-username"> <?php echo $fullName; ?></h1>
		<h1 class="sunset-description"> <?php echo $description; ?></h1>
		<div class="icon-wrapper"></div>
	</div>
</div>
<form method="post" action="options.php" class="sunset-general-form">
<?php settings_fields('sunset-settings-group'); ?>
<?php do_settings_sections( 'ankit_sunset' ); ?>
<?php submit_button(); ?>
</form>