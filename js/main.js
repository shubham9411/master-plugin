function toggle_plugin(plugin){
	var data = {
		'plugin_name': plugin,
		'action': 'plugin_activate',
	};
	console.log(data);
	$.ajax({
		url: ajaxurl_wpmp,
		type: 'POST',
		data:data,
		success: function (response) {
			location.reload();
		}
	});
}