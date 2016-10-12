<?php
if( ! function_exists('cc_wpmp_register_members')){
	function cc_wpmp_register_members() {
		$labels = array(
			'name' => 'Members',
			'singular_name' => 'Member',
			'add_new' => 'Add New Member',
			'add_new_item' => 'Add New Member',
			'edit_item' => 'Edit Member',
			'new_item' => 'New Member',
			'view_item' => 'View Member',
			'search_items' => 'Search Members',
			'not_found' => 'No Members found',
			'not_found_in_trash' => 'No Members found in Trash',
			'menu_name' => 'Members',
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'description' => 'Add/Remove Members',
			'show_in_menu' => false,
			'public' => true,
			'capability_type' => 'post',
			'has_archive' => true,
			'supports' => array(
				'title', 'editor','thumbnail'
				)
		);
		register_post_type( 'members', $args );
	}
}
if(!function_exists('cc_create_team_metabox')){
	function cc_create_team_metabox(){
		add_meta_box( 'cc_team_details','Details','cc_team_metabox','members');
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
