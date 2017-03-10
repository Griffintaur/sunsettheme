jQuery(document).ready(function($){

	var mediaUpLoader;
	// $('#dp_profile').toggle($("#profile-picture").val());
	$('#upload-button').on('click', function(event) {
		event.preventDefault();
		if(mediaUpLoader){
			mediaUpLoader.open();
			return;
		}
		mediaUpLoader=wp.media.frames.file_frame=wp.media({
			title: 'Choose a Profile Picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
		});
		mediaUpLoader.on('select', function(event) {
			attachment=mediaUpLoader.state().get('selection').first().toJSON();
			$('#profile-picture').val(attachment.url);
			$('#dp_profile').css('background-image', 'url(' + attachment.url +')'
				);
		});
		mediaUpLoader.open();
	});
		// $('#dp_profile').toggle($("#profile-picture").val());
		$('#remove-profile-button').on('click',function(e){
			e.preventDefault();
			var response=confirm("Are u sure you want to delete your profile pciture?");
			if(answer == true){
				$('#profile-picture').val('');
				$('.sunset-general-form').submit();
			}
			else{
				console.log('thank god u didn\'t delete');
			}
			return;
		});
});

