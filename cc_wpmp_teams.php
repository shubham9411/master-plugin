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
if(!function_exists('cc_create_member_metabox')){
	function cc_create_member_metabox(){
		add_meta_box( 'cc_member_details','Details','cc_member_metabox','members');
	}
}
if(!function_exists('cc_member_metabox')){
	function cc_member_metabox($post){
		$values = get_post_custom( $post->ID );
		$designation = isset($values['cc_member_designation']) ? esc_attr($values['cc_member_designation'][0]) : '';
		$email = isset($values['cc_member_mail']) ? esc_attr($values['cc_member_mail'][0]) : '';
		$therapy = isset($values['cc_member_therapy']) ? esc_attr($values['cc_member_therapy'][0]) : '';
		$therapies = array('Physical Therapists','Speech Therapists','Occupational Therapists');
		wp_nonce_field( 'cc_member_nonce', 'metabox_nonce' );
		?>
		<div class="row">
			<div class="form-group">
				<label for="cc_member_therapy" class="col-xs-4 control-label">Therapy</label>
				<div class="col-xs-8">
					<select name="cc_member_therapy">
					<?php
					foreach($therapies as $therapy_item){
					?>
						<option value="<?php echo $therapy_item;?>" <?php if($therapy==$therapy_item){echo 'selected';}?>><?php echo $therapy_item;?></option>
					<?php
					}
					?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="cc_member_designation" class="col-xs-4 control-label">Designation</label>
				<div class="col-xs-8">
					<input type="text" class="form-control col-xs-2" name="cc_member_designation" id="cc_member_designation" value="<?php echo $designation; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label for="cc_member_mail" class="col-xs-4 control-label">Email</label>
				<div class="col-xs-8">
					<input type="email" class="form-control col-xs-2" name="cc_member_mail" id="cc_member_mail" value="<?php echo $email; ?>" />
				</div>
			</div>
		</div>
		<?php
	}
}
if(!function_exists('cc_member_save')){
	function cc_member_save( $post_id ) {
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		if( !isset( $_POST['metabox_nonce'] ) || !wp_verify_nonce( $_POST['metabox_nonce'], 'cc_member_nonce' ) )
			return $post_id;

		if( !current_user_can( 'edit_post' ) )
			return $post_id;

		if ( isset( $_POST['cc_member_designation'] ) ) {
			if( $_POST['cc_member_designation'] != '') {
				$designation = $_POST['cc_member_designation'];
				update_post_meta( $post_id, 'cc_member_designation', $designation);
			}
		}
		if ( isset( $_POST['cc_member_mail'] ) ) {
			if( $_POST['cc_member_mail'] != '') {
				$email = $_POST['cc_member_mail'];
				update_post_meta( $post_id, 'cc_member_mail', $email);
			}
		}
		if ( isset( $_POST['cc_member_therapy'] ) ) {
			if( $_POST['cc_member_therapy'] != '') {
				$therapy = $_POST['cc_member_therapy'];
				update_post_meta( $post_id, 'cc_member_therapy', $therapy);
			}
		}
	}
}
