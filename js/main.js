var showChar = 150;
var ellipsestext = "...";
var moretext = "<b>Read More</b>&nbsp;<img class='read-more' src='"+read_more_image+"'>";
var lesstext = "<b>Read Less</b>&nbsp;<img class='read-less' src='"+read_more_image+"'>";
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
	readMore();
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
function readMore() {
    $('.excerpt').each(function() {
      var content = $(this).html();
      if(content.length > showChar) {
        var c = content.substr(0, showChar);
        var h = content.substr(showChar, content.length - showChar);
        var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
        $(this).html(html);
      }
  });
}	