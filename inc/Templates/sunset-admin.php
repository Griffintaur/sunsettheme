<h1> sunset theme </h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
<?php settings_fields('sunset-settings-group'); ?>
<?php do_settings_sections( 'ankit_sunset' ); ?>
<?php submit_button(); ?>
</form>