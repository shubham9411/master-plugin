function toggle_plugin(plugin){
	var data = {
		'plugin_name': plugin,
		'action': 'plugin_activate',
	};
	$.ajax({
		url: ajaxurl,
		type: 'POST',
		data:data,
		processData: false,
		contentType:false,
		success: function () {
			// location.reload();
		}
	});
}