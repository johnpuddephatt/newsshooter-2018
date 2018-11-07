<?php
add_action( 'admin_menu', 'ns_add_admin_menu' );
add_action( 'admin_init', 'ns_socialmedia_init' );


function ns_add_admin_menu(  ) {
  add_options_page( 'Social accounts', 'Social accounts', 'manage_options', 'social', 'ns_options_page' );
}


function ns_socialmedia_init(  ) {

  register_setting( 'pluginPage', 'ns_socialmedia' );

  add_settings_section(
    'ns_pluginPage_section',
    __( 'Add social media accounts below', 'wordpress' ),
    '',
    'pluginPage'
  );

	add_settings_field(
    'twitter',
    __( 'Twitter', 'wordpress' ),
    'twitter_render',
    'pluginPage',
    'ns_pluginPage_section'
  );

	add_settings_field(
		'facebook',
		__( 'Facebook', 'wordpress' ),
		'facebook_render',
		'pluginPage',
		'ns_pluginPage_section'
	);

	add_settings_field(
		'instagram',
		__( 'Instagram', 'wordpress' ),
		'instagram_render',
		'pluginPage',
		'ns_pluginPage_section'
	);

	add_settings_field(
		'vimeo',
		__( 'Vimeo', 'wordpress' ),
		'vimeo_render',
		'pluginPage',
		'ns_pluginPage_section'
	);

	add_settings_field(
		'youtube',
		__( 'Youtube', 'wordpress' ),
		'youtube_render',
		'pluginPage',
		'ns_pluginPage_section'
	);


}


function twitter_render(  ) {

	$options = get_option( 'ns_socialmedia' );
	?>
	<input type='text' name='ns_socialmedia[twitter]' value='<?php echo $options['twitter']; ?>'>
	<?php

}


function facebook_render(  ) {

	$options = get_option( 'ns_socialmedia' );
	?>
	<input type='text' name='ns_socialmedia[facebook]' value='<?php echo $options['facebook']; ?>'>
	<?php

}


function instagram_render(  ) {

	$options = get_option( 'ns_socialmedia' );
	?>
	<input type='text' name='ns_socialmedia[instagram]' value='<?php echo $options['instagram']; ?>'>
	<?php

}


function vimeo_render(  ) {

	$options = get_option( 'ns_socialmedia' );
	?>
	<input type='text' name='ns_socialmedia[vimeo]' value='<?php echo $options['vimeo']; ?>'>
	<?php

}


function youtube_render(  ) {

	$options = get_option( 'ns_socialmedia' );
	?>
	<input type='text' name='ns_socialmedia[youtube]' value='<?php echo $options['youtube']; ?>'>
	<?php

}




function ns_options_page(  ) {

	?>
	<form action='options.php' method='post'>

		<h2>Social accounts</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}

?>