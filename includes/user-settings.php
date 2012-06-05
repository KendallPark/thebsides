<?php
/**
 * Register custom user fields for social links that can be displayed on blog posts and author pages
 */

function integ_add_custom_user_profile_fields( $user ) {
?>
	<h3>Social Profile Information</h3>
	<table class="form-table">
		<tr>
			<th>
				<label for="google">Google
			</label></th>
			<td>
				<input type="text" name="gplus" id="gplus" value="<?php echo esc_attr( get_the_author_meta( 'gplus', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please provide a link to your Google+ profile</span>
			</td>
		</tr>
		<tr>
			<th>
				<label for="facebook">Facebook
			</label></th>
			<td>
				<input type="text" name="fb" id="fb" value="<?php echo esc_attr( get_the_author_meta( 'fb', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please provide a link to your Facebook profile</span>
			</td>
		</tr>
		<tr>
			<th>
				<label for="pinterest">Pinterest
			</label></th>
			<td>
				<input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please provide a link to your Pinterest profile</span>
			</td>
		</tr>
		<tr>
			<th>
				<label for="twitter">Twitter
			</label></th>
			<td>
				<input type="text" name="tweet" id="tweet" value="<?php echo esc_attr( get_the_author_meta( 'tweet', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please provide a link to your Twitter profile</span>
			</td>
		</tr>
	</table>
<?php }
function integ_save_custom_user_profile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) )
		return FALSE;
	update_usermeta( $user_id, 'gplus', $_POST['gplus'] );
	update_usermeta( $user_id, 'fb', $_POST['fb'] );
	update_usermeta( $user_id, 'tweet', $_POST['tweet'] );
	update_usermeta( $user_id, 'pinterest', $_POST['pinterest'] );
}
add_action( 'show_user_profile', 'integ_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'integ_add_custom_user_profile_fields' );
add_action( 'personal_options_update', 'integ_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'integ_save_custom_user_profile_fields' );
