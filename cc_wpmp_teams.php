<?php
if( ! function_exists('cc_wpmp_register_teams')){
	function cc_wpmp_register_teams() {
		$labels = array(
			'name' => 'Teams',
			'singular_name' => 'Team',
			'add_new' => 'Add New Team',
			'add_new_item' => 'Add New Team',
			'edit_item' => 'Edit Team',
			'new_item' => 'New Team',
			'view_item' => 'View Team',
			'search_items' => 'Search Teams',
			'not_found' => 'No Teams found',
			'not_found_in_trash' => 'No Teams found in Trash',
			'parent_item_colon' => 'Parent Team:',
			'menu_name' => 'Teams',
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'description' => 'Add/Remove Teams',
			'public' => true,
			'show_in_menu' => false,
			'capability_type' => 'post',
			'has_archive' => true,
			'supports' => array(
				'title', 'editor','thumbnail'
				)
		);
		register_post_type( 'teams', $args );
	}
}
if(!function_exists('cc_create_team_metabox')){
	function cc_create_team_metabox(){
		add_meta_box( 'cc_team_details','Details','cc_team_metabox','cc_team');
	}
}
if(!function_exists('cc_team_metabox')){
	function cc_team_metabox($post){
		$values = get_post_custom( $post->ID );
		$designation = isset($values['cc_team_designation']) ? esc_attr($values['cc_team_designation'][0]) : '';
		$email = isset($values['cc_team_mail']) ? esc_attr($values['cc_team_mail'][0]) : '';
		wp_nonce_field( 'cc_team_nonce', 'metabox_nonce' );
		?>
		<div class="row">
			<div class="form-group">
				<label for="cc_team_designation" class="col-xs-4 control-label">Designation</label>
				<div class="col-xs-8">
					<input type="text" class="form-control col-xs-2" name="cc_team_designation" id="cc_team_designation" value="<?php echo $designation; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label for="cc_team_mail" class="col-xs-4 control-label">Email</label>
				<div class="col-xs-8">
					<input type="email" class="form-control col-xs-2" name="cc_team_mail" id="cc_team_mail" value="<?php echo $email; ?>" />
				</div>
			</div>
		</div>
		<?php
	}
}
if(!function_exists('cc_team_save')){
	function cc_team_save( $post_id ) {
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		if( !isset( $_POST['metabox_nonce'] ) || !wp_verify_nonce( $_POST['metabox_nonce'], 'cc_team_nonce' ) )
			return $post_id;

		if( !current_user_can( 'edit_post' ) )
			return $post_id;

		if ( isset( $_POST['cc_team_designation'] ) ) {
			if( $_POST['cc_team_designation'] != '') {
				$designation = $_POST['cc_team_designation'];
				update_post_meta( $post_id, 'cc_team_designation', $designation);
			}
		}
		if ( isset( $_POST['cc_team_mail'] ) ) {
			if( $_POST['cc_team_mail'] != '') {
				$email = $_POST['cc_team_mail'];
				update_post_meta( $post_id, 'cc_team_mail', $email);
			}
		}
	}
}
