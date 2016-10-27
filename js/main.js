var showChar = 150;
var ellipsestext = "...";
var moretext = "<br><b>Read More</b>&nbsp;<img class='read-more' src='"+read_more_image+"'>";
var lesstext = "<br><b>Read Less</b>&nbsp;<img class='read-less' src='"+read_more_image+"'>";
function toggle_plugin(plugin){
	var data = {
		'plugin_name': plugin,
		'action': 'plugin_activate',
	};
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
	var $window = $(window);
	if($window.width() > 1440){
		showChar = 300;
	}
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
        var short_content = content.substr(0, showChar);
        var full_content = content.substr(showChar, content.length - showChar);
        var html = short_content + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + full_content + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
        $(this).html(html);
      }
  });
}	