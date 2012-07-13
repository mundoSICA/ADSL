<?php
/* Titutlo:     Elemento pie_info_dirección
 * Autor:       @Fitorec
 * Descripcion: Este elemento es donde van los iconos de las recomendaciones del ADSL
 * Link-info:   http://book.cakephp.org/2.0/en/views.html#using-view-blocks
 */
?>
<div class="separadorfooter2"></div>
<footer itemscope itemtype="http://data-vocabulary.org/Organization">
	<div class="footerCont">
		&copy; 2010- <?php echo date('Y'); ?>, 
		<a href="<?php echo Router::url('/',true); ?>" itemprop="url">
			<span itemprop="name">Academia de Software Libre</span>
		</a>
		<br />
		<address itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
			<strong>Dirección:</strong>
			<span itemprop="street-address">Manuel Doblado Num. 119,Col. Centro</span>,
			CP: <span>68000</span>,<br />
			<span itemprop="region">Oaxaca</span>,
			<span itemprop="localy">Oax</span>,
			<span itemprop="country-name">México</span>
		</address>
			Tel: <span itemprop="tel">(951) 205 43 51</span> / E-Mail: <a href='mailto:contacto@adsl.org.mx'>contacto@adsl.org.mx</a><br />
		<span itemprop="geo" itemscope itemtype="http://data-vocabulary.org/Geo/">
			<meta itemprop="latitude" content="37.49" />
			<meta itemprop="longitude" content="144.58" />
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
