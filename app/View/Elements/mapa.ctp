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
<section itemscope class="vcard" itemtype="http://data-vocabulary.org/Organization">
<h2>
	<h2><?php echo $this->Html->link('Conoce nuestra ubicación'
									,array( 'controller'=>'pages', 'action' => 'contacto' )); ?>
					 <a href="#"></a></h2></h2>
		<address itemprop="address" class="adr" itemscope itemtype="http://data-vocabulary.org/Address">
			<span class="street-address" itemprop="street-address">Manuel Doblado Num. 119,Col. Centro</span>,
			CP: <span>68000</span>,
			<span class="region" itemprop="region">Oaxaca</span>,
			<span class="locality" itemprop="localy">Oax</span>,
			<span itemprop="country-name">México</span>
		</address>
			Tel: <span class="tel" itemprop="tel">(951) 205 43 51</span> / E-Mail: <a href='mailto:contacto@adsl.org.mx'>contacto@adsl.org.mx</a><br />
		<span class="geo" itemprop="geo" itemscope itemtype="http://data-vocabulary.org/Geo/">
			<span class="latitude">
           <span class="value-title" itemprop="latitude" content="<?php
						echo $adsl_data['geo']['latitude'];
						?>" title="<?php
						echo $adsl_data['geo']['latitude'];
						?>"></span>
			</span>
			<span class="longitude">
           <span class="value-title" itemprop="longitude" content="<?php
						echo $adsl_data['geo']['longitude'];
						?>" title="<?php
						echo $adsl_data['geo']['longitude'];
						?>"></span>
			</span>
		</span>
</section>
<div class="item rounded dark" id='mapa_sitio'>
	<div id="map_canvas" class="map rounded"></div>
</div>
