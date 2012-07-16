<?php
/* Titutlo:     Elemento pie_info_dirección
 * Autor:       @Fitorec
 * Descripcion: Este elemento es donde van los iconos de las recomendaciones del ADSL
 * Link-info:   http://book.cakephp.org/2.0/en/views.html#using-view-blocks
 */
?>
<div class="separadorfooter2"></div>
<footer itemscope class="vcard" itemtype="http://data-vocabulary.org/Organization">
	<div class="footerCont">
		&copy; 2010- <?php echo date('Y'); ?>, 
		<a href="<?php echo Router::url('/',true); ?>" itemprop="url" class="url">
			<span itemprop="name" class="fn org">Academia de Software Libre</span>
		</a>
		<br />
		<address itemprop="address" class="adr" itemscope itemtype="http://data-vocabulary.org/Address">
			<strong>Dirección:</strong>
			<span class="street-address" itemprop="street-address">Manuel Doblado Num. 119,Col. Centro</span>,
			CP: <span>68000</span>,<br />
			<span class="region" itemprop="region">Oaxaca</span>,
			<span class="locality" itemprop="localy">Oax</span>,
			<span itemprop="country-name">México</span>
		</address>
			Tel: <span class="tel" itemprop="tel">(951) 205 43 51</span> / E-Mail: <a href='mailto:contacto@adsl.org.mx'>contacto@adsl.org.mx</a><br />
		<span class="geo" itemprop="geo" itemscope itemtype="http://data-vocabulary.org/Geo/">
			<meta class="latitude value-title" itemprop="latitude" content="17.060169" title="17.060169" />
			<meta class="longitude value-title" itemprop="longitude" content="-96.719406" title="-96.719406" />
		</span>
			Sitio esta hecho con código libre y abierto
			<a href="https://github.com/mundoSICA/ADSL" rel="external">disponible en github</a><br />
		Maquetado por: <a href="http://www.adsl.org.mx/users/ver/Manuel">Manuel Hndz.</a>,
		Implentado por los <?php echo $this->Html->link('Colaboradores',
			 array('controller' => 'contribuciones'),
			 array('title'=>'Lista de contribuciones/colaboradores')
		 ); ?>
	</div>
</footer>
