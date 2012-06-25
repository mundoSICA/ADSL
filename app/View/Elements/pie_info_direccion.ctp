<?php
/* Titutlo:     Elemento pie_info_dirección
 * Autor:       @Fitorec
 * Descripcion: Este elemento es donde van los iconos de las recomendaciones del ADSL
 * Link-info:   http://book.cakephp.org/2.0/en/views.html#using-view-blocks
 */
?>
<div class="separadorfooter2"></div>
<div class="footer">
	<div class="footerCont">
	&copy; 2010- <?php echo date('Y'); ?>, Academia de Software Libre<br />
	Dirección: Manuel Doblado #119, Col. Centro, Oaxaca, Oax.<br />
	Tel: (951) 205 43 51  / E-Mail: <a href='mailto:contacto@adsl.org.mx'>contacto@adsl.org.mx</a><br />
	Sitio esta hecho con código libre y abierto <a href="https://github.com/mundoSICA/ADSL" rel="external">disponible en github</a><br />
	Maquetado por: <a href="http://www.adsl.org.mx/users/ver/Manuel">Manuel Hndz.</a>, 
	 Implentado por los <?php echo $this->Html->link('Colaboradores', 
		 array('controller' => 'contribuciones'),
		 array('title'=>'Lista de contribuciones/colaboradores')
	 ); ?>
	 <br />
	</div>
</div>
