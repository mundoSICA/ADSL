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
<section class="vcard" itemprop="author contributor copyrightHolder creator provider publisher sourceOrganization" itemscope itemtype="http://schema.org/Organization">
	<h2><?php
		echo $this->Html->link(
			'Conoce la ubicación del'
			, array( 'controller'=>'pages', 'action' => 'contacto' )
		); ?>
		<span class="fn org" itemprop="name">ADSL</span>
	</h2>
	<div itemprop='location' itemscope itemtype="http://schema.org/Place">
		<address itemprop="address" class="adr" itemscope itemtype="http://schema.org/PostalAddress">
			<span class="street-address" itemprop="streetAddress">Arteaga Num. 613, Col. Centro</span>,
			CP: <span itemprop="postalCode">68000</span>,
			<span itemprop="addressLocality">Oaxaca, México</span>
		</address>

		<span class="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
			<span class="latitude">
      <span class="value-title" itemprop="latitude" content="<?php
						echo $adsl_data['geo']['latitude'];
						?>" title="<?php
						echo $adsl_data['geo']['latitude'];
						?>">
			</span></span>
			<span class="longitude">
      <span class="value-title" itemprop="longitude" content="<?php
						echo $adsl_data['geo']['longitude'];
						?>" title="<?php
						echo $adsl_data['geo']['longitude'];
						?>">
			</span></span>
		</span>
	</div>
	Tel: <span class="tel" itemprop="telephone">(951) 205 43 51</span> / E-Mail:
	<a itemprop="email" href='mailto:contacto@adsl.org.mx'>contacto@adsl.org.mx</a><br />
</section>
<div class="item rounded dark" id='mapa_sitio'>
	<div id="map_canvas" class="map rounded"></div>
</div>
