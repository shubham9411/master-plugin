<?php 
if(!function_exists('cc_wpmp_enqueue')){
	function cc_wpmp_enqueue() {
		wp_enqueue_script('jquery_js',plugins_url('js/jquery.min.js',__FILE__));
		wp_enqueue_script('cc_wpmp_main',plugins_url('js/main.js',__FILE__));
		wp_localize_script('cc_wpmp_main','ajaxurl_wpmp',admin_url('admin-ajax.php') );
	}
}
if(!function_exists('cc_wpmp_enqueue_no_priv')){
	function cc_wpmp_enqueue_no_priv(){
		wp_enqueue_style('bootstrap_css',plugins_url('css/bootstrap.min.css',__FILE__));
		wp_enqueue_style('wpmp_style',plugins_url('css/style.css',__FILE__));
		wp_enqueue_script('jquery_js',plugins_url('js/jquery.min.js',__FILE__));
		wp_enqueue_script('cc_wpmp_main',plugins_url('js/main.js',__FILE__));
        wp_localize_script('cc_wpmp_main','read_more_image',plugins_url('img/link-icon-green.png',__FILE__));
	}
}
if(!function_exists('cc_admin_menu_wpmp')){
	function cc_admin_menu_wpmp(){
		$parent_slug = 'wpmp';
		add_menu_page('WPMP','Master Plugin','activate_plugins','wpmp','cc_wpmp_init');	
		add_submenu_page( $parent_slug, 'Manage Plugin', 'Manage Plugin','manage_options', 'wpmp');
		$plugins = get_option('cc_wpmp_plugins');
		foreach($plugins as $plugin){
			if($plugin['status']=='active'){
				$page_title = $plugin['name'];
				$menu_title = $plugin['name'];
				$slug = $plugin['slug'];
				add_submenu_page( $parent_slug, $page_title, $menu_title,'manage_options',$slug );
			}
		}
	}
}
if(!function_exists('cc_wpmp_init')){
	function cc_wpmp_init(){
		include('cc_wpmp_admin.php');
	}
}
if(!function_exists('cc_plugin_setup')){
	function cc_plugin_setup(){
		$option = 'cc_wpmp_plugins';
		include('cc_plugins_desc.php');
		update_option($option,$all_plugins);
		$args = array('post_type' => 'page', 'name' => 'Testimonial');
		$check = new WP_Query($args);
		if($check->post_count==0){
			$my_post = array(
				'post_title'    => 'Testimonial',
				'post_content'  => '',
				'post_status'   => 'publish',
				'post_author'   => get_current_user_id(),
				'post_type'     => 'page',
			);
			wp_insert_post( $my_post, '' );
		}
		$args = array('post_type' => 'page', 'name' => 'About');
		$check = new WP_Query($args);
		if($check->post_count==0){
			$my_post = array(
				'post_title'    => 'About',
				'post_content'  => '',
				'post_status'   => 'publish',
				'post_author'   => get_current_user_id(),
				'post_type'     => 'page',
			);
			wp_insert_post( $my_post, '' );
		}
	}
}
if(!function_exists('cc_activate_features')){
	function cc_activate_features(){
	$plugins = get_option('cc_wpmp_plugins');
	foreach($plugins as $plugin){
		if($plugin['status']=='active'){
			$action = $plugin['callback'];
			do_action($action);
		}
	}
	}
}
if(!function_exists('cc_update_option')){
	function cc_update_option(){
		if(isset($_POST['plugin_name'])){
			$plugins = get_option('cc_wpmp_plugins');
			$total = count($plugins);
			for($i=0;$i<$total;$i++){
				if($plugins[$i]['name']==$_POST['plugin_name']){
					if($plugins[$i]['status']=='active'){
						$plugins[$i]['status'] = 'deactive';
					}
					else{
						$plugins[$i]['status'] = 'active';
					}
					break;
				}
			}
			update_option('cc_wpmp_plugins',$plugins);
		}
	}
}
if(!function_exists('cc_wpmp_title')){
	function cc_wpmp_title( $title ){
		$screen = get_current_screen();
		if  ( 'testimonial' == $screen->post_type ) {
			$title = 'Parents Name';
		}
		if  ( 'faqs' == $screen->post_type ) {
			$title = 'Question';
		}
		if  ( 'links' == $screen->post_type ) {
			$title = 'Link Title Here';
		}
		if  ( 'members' == $screen->post_type ) {
			$title = 'Name';
		}
		return $title;
	}
}
if(!function_exists('cc_wpmp_template')){	
	function cc_wpmp_template() {
		global $wp;
		$plugins = get_option('cc_wpmp_plugins');
		$plugindir = dirname( __FILE__ );
		if (isset($wp->query_vars["pagename"]) && $wp->query_vars["pagename"] == 'testimonial') {
			if($plugins[0]['status']=='active'){
				$templatefilename = 'page-testimonial.php';
				if (file_exists(TEMPLATEPATH . '/' . $templatefilename)) {
					$return_template = TEMPLATEPATH . '/' . $templatefilename;
				}
				else {
					$return_template = $plugindir . '/templates/' . $templatefilename;
				}
				cc_wpmp_redirect($return_template);
			}
		}
		if (isset($wp->query_vars["pagename"]) && $wp->query_vars["pagename"] == 'about') {
			if($plugins[3]['status']=='active'){
				$templatefilename = 'page-teams.php';
				if (file_exists(TEMPLATEPATH . '/' . $templatefilename)) {
					$return_template = TEMPLATEPATH . '/' . $templatefilename;
				}
				else {
					$return_template = $plugindir . '/templates/' . $templatefilename;
				}
				cc_wpmp_redirect($return_template);
			}
		}
	}
}
if(!function_exists('cc_wpmp_redirect')){
	function cc_wpmp_redirect($url) {
		global $post, $wp_query;
		if (have_posts()) {
			include($url);
			die();
		}
		else {
			$wp_query->is_404 = true;
		}
	}
}