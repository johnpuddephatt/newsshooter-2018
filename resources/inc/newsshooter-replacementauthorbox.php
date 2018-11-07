<?php

/*
Include Name: Additional user fields
Include Description: Adds publicly displayable user role plus social media contact methods
*/

add_action( 'show_user_profile', 'show_extra_profile_fields', 2 );
add_action( 'edit_user_profile', 'show_extra_profile_fields', 2 );

function show_extra_profile_fields( $user ) { ?>
	<h3>Publicly displayed role</h3>
		<table class="form-table">
			<tr>
				<th>
					<label for="siterole">Site role</label>
				</th>
				<td>
					<input type="text" name="user_site_role" id="user_site_role" value="<?php echo esc_attr( get_the_author_meta( 'user_site_role', $user->ID ) ); ?>" class="regular-text" /><br />
					<span class="description">This will be listed after the author's name in the site author box.</span>
				</td>
			</tr>
		</table>
<?php }

add_action( 'personal_options_update', 'save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_profile_fields' );

function save_extra_profile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;
	update_user_meta( $user_id, 'user_site_role', $_POST['user_site_role'] );
}

//* Register new contact methods
function newsshooter_socialcontactmethods( $contactmethods ) {
	$contactmethods['twitter'] = 'Twitter Username';
	$contactmethods['instagram'] = 'Instagram Username';
	$contactmethods['youtube'] = 'Youtube Channel Address';
	$contactmethods['vimeo'] = 'Vimeo Channel Address';
	return $contactmethods;
}

add_filter('user_contactmethods','newsshooter_socialcontactmethods',10,1);

?>