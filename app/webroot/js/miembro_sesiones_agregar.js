/* editor */
$(function() {
	$('#markItUp').markItUp(mySettings);
	$('.add').click(function() {
		$('#markItUp').markItUp('insert',{ });
		return false;
	});
});
