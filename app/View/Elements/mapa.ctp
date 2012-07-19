<?php
#Sección css
$this->Html->css('mapa.sitio','stylesheet', array('inline' => false ) );
#Seccion js
$this->Html->script(array(
											'http://maps.google.com/maps/api/js?sensor=false',
											'jquery.google.mapa',
											'jquery.ui.map',
											'jquery.ui.map.microdata',
											), array('inline' => false));
?>
<div class="item rounded dark" id='mapa_sitio'>
	<div id="map_canvas" class="map rounded"></div>
</div>
