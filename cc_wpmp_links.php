<?php
if( ! function_exists('cc_wpmp_register_links')){
	function cc_wpmp_register_links() {
		$labels = array(
			'name' => 'Links',
			'singular_name' => 'Links',
			'add_new' => 'Add New Links',
			'add_new_item' => 'Add New Links',
			'edit_item' => 'Edit Links',
			'new_item' => 'New Links',
			'view_item' => 'View Links',
			'search_items' => 'Search Links',
			'not_found' => 'No Links found',
			'not_found_in_trash' => 'No Links found in Trash',
			'parent_item_colon' => 'Parent Links:',
			'menu_name' => 'Links',
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'description' => 'Add/Remove links',
			'public' => true,
			'show_in_menu' => false,
			'capability_type' => 'post',
			'has_archive' => false,
			'supports' => array(
				'title',
				)
		);
		register_post_type( 'links', $args );
	}
}
if(!function_exists('cc_add_link_metabox')){
    function cc_add_link_metabox() {
        add_meta_box( 'cc_meta_box_link', 'Link URL', 'cc_link_metabox', 'links' ,'side','high');
    }
}
if(!function_exists('cc_link_metabox')){
    function cc_link_metabox( $post ) {
        $values = get_post_custom( $post->ID );
        $link = isset( $values['cc_links'] ) ? esc_attr( $values['cc_links'][0] ) : '';
        wp_nonce_field( 'cc_links', 'metabox_nonce' );
        ?>
        <p>
            <label for="cc_links">URL:</label>
            <input type="url" name="cc_links" id="cc_links" value="<?php echo $link; ?>" />
        </p>
        <?php
    }
}
if(!function_exists('cc_link_save')){
	function cc_link_save( $post_id ) {
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
			return $post_id;
		}
		if( !isset( $_POST['metabox_nonce'] ) || !wp_verify_nonce( $_POST['metabox_nonce'], 'cc_links' ) ){
			return $post_id;
		}
		if( !current_user_can( 'edit_post' ) ){
			return $post_id;
		}
		if ( isset( $_POST['cc_links'] ) ) {
			if( $_POST['cc_links'] != ''){
				$link = $_POST['cc_links'];
				update_post_meta( $post_id, 'cc_links', $link);
			}
		}
	}
}