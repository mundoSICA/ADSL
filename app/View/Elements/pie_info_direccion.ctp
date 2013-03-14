<?php
/* Titutlo:     Elemento pie_info_dirección
 * Autor:       @Fitorec
 * Descripcion: Este elemento es donde van los iconos de las recomendaciones del ADSL
 * Link-info:   http://book.cakephp.org/2.0/en/views.html#using-view-blocks
 */
?>
<div class="separadorfooter2"></div>
<footer itemprop="sourceOrganization provider publisher creator" class="vcard" itemscope itemtype="http://schema.org/Organization">

	<div class="footerCont">
		<img src="http://pr.prchecker.info/getpr.php?codex=aHR0cDovL2Fkc2wub3JnLm14&tag=3" alt="Page Rank" style="border:0;" />
		<abbr><strong itemprop="name" class="fn org">ADSL</strong></abbr><br />
		Algunos Derechos Reservados &copy;
		<date itemprop="foundingDate">2010</date> - <date><?php echo date('Y'); ?></date>,
		<strong itemprop="description">Academia de Software Libre</strong>
		<a href="<?php echo Router::url('/',true); ?>" itemprop="url" class="url">adsl.org.mx</a>


		<div itemprop='location' itemscope itemtype="http://schema.org/Place">
		<address itemprop="address" class="adr" itemscope itemtype="http://schema.org/PostalAddress">
			<span class="street-address" itemprop="streetAddress">Arteaga Num 613,Col. Centro</span>,
			CP: <span>68000</span>,
			<span class="region" itemprop="addressLocality">Oaxaca</span>,
			<span class="locality" itemprop="addressRegion">Oax</span>,
			<span itemprop="addressCountry">México</span>
			Tel: <span class="tel" itemprop="telephone">(951) 205 43 51</span> / E-Mail:
			<a href='mailto:contacto@adsl.org.mx' itemprop="email">contacto@adsl.org.mx</a><br />
		</address>
		<span class="geo" itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
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
	</div>
		Sitio esta hecho con código libre y abierto
		<a href="https://github.com/mundoSICA/ADSL" rel="external">disponible en github</a>
		Maquetado por: <a href="http://www.adsl.org.mx/users/ver/Manuel">Manuel Hndz.</a>,
		Implentado por los <?php echo $this->Html->link('Colaboradores',
			 array('controller' => 'contribuciones'),
			 array('title'=>'Lista de contribuciones/colaboradores')
		 ); ?>
	</div>
</footer>
