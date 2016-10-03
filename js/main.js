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
$(document).ready(function() {
	var showChar = 300;
	var ellipsestext = "...";
	var moretext = "Show more";
	var lesstext = "Show less";
	$('.excerpt').each(function() {
		var content = $(this).html();
		if(content.length > showChar) {
			var c = content.substr(0, showChar);
			var h = content.substr(showChar, content.length - showChar);
			var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="more"><span class="morecontent">' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
			$(this).html(html);
		}
	});
	$(".morelink").click(function(){
		if($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html(moretext);
		}
		else {
			$(this).addClass("less");
			$(this).html(lesstext);
		}
		$(this).parent().prev().toggle();
		$(this).prev().toggle();
		return false;
	});
});