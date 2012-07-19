/* Página de inicio ADSL
 */
$(function() {
    $("#BotonInicio").activarTopMenu();
    //Mapa del sitio
	demo.add(function() {
	$('#map_canvas').gmap({'callback':function() {
		var self = this;
		self.microdata('http://data-vocabulary.org/Organization', function(result, item, index) {
			var latlng = new google.maps.LatLng(result.geo[0].latitude, result.geo[0].longitude);
			self.addMarker({ 'bounds':true, 'position': latlng, 'content': '<div class="iw">{0}</div>'.format('Academia de Software Libre') }, function(map, marker) {
				$(item).click(function() {
					$(marker).triggerEvent('click');
					return false;
				});
		}).click( function() {
				self.openInfoWindow({'content': $(this)[0].content}, this );
			});
		});
	}});
	}).load();
});
