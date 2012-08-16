/*
 * página streaming
 */
$(function() {
	$("#BotonStreaming").activarTopMenu();
	twttr.events.bind('tweet', function(event) {
			alert("Post Successful");
			window.location = "http://www.url-to-redirect-to.com"
	});
});

