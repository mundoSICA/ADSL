/* Página de inicio ADSL
 */
$(function() {
    $("#BotonInicio").activarTopMenu();
    //Mapa del sitio
  if(google != null){
		demo.add(function() {
		$('#map_canvas').gmap({'callback':function() {
			var self = this;
				$geo = $('#content').find('.geo');
				lat = $geo.find('.latitude .value-title').attr('content');
				lon = $geo.find('.longitude .value-title').attr('content');
				var latlng = new google.maps.LatLng(lat, lon);
				self.addMarker({ 'bounds':true, 'position': latlng, 'content': '<div class="iw">{0}</div>'.format('Academia de Software Libre') }).click( function() {
					title = '<strong>ADSL</strong> Academia de Software Libre:<br ><strong>Dir:</strong> ' + $('.footerCont .adr .street-address').text();
					self.openInfoWindow({'content': title}, this );
				});

		}});
		}).load();
	}
	/* cargamos el calendario */
	$( "#calendarioEventos" ).datepicker({ autoSize: true });

});
