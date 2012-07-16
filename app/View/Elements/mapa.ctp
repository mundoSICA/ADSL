<?php
	#Sección css
	$this->Html->css('mapa.sitio','stylesheet', array('inline' => false ) );
	#Seccion js
	$this->Html->script('http://maps.google.com/maps/api/js?sensor=false', array('inline' => false));
	$this->Html->script('jquery.google.mapa', array('inline' => false));
	$this->Html->script('jquery.ui.map', array('inline' => false));
	$this->Html->script('jquery.ui.map.microdata', array('inline' => false));
?>
<div class="item rounded dark" id='mapa_sitio'>
	<div id="map_canvas" class="map rounded"></div>
</div>

<script type="text/javascript">
$(function() { 
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
</script>
