<?php
/* Titutlo:     menu_superior
 * Autor:       @Fitorec
 * Descripcion: Este elemento es donde van los iconos de las recomendaciones del ADSL
 * Link-info:   http://book.cakephp.org/2.0/en/views.html#using-view-blocks
 */
?>
<ul>
	<li><?php
echo $this->Html->link('Inicio', '/', array('id'=>'inicio'));
?></li>
	<li><?php
	echo $this->Html->link('Registrate', 
			array('controller'=>'users', 'action' => 'registro', 'admin'=>false),
			array('id'=>'Botonregistrate')
	);
	?></li>
	<li><?php
	echo $this->Html->link('Talleres', 
		array('controller'=>'talleres','admin'=>false),
		array('id'=>'BotonTalleres')
);
?></li>
	<li><?php
	echo $this->Html->link('Calendario', 
		array('controller'=>'talleres','action'=>'calendario','admin'=>false),
		array('id'=>'BotonCalendario')
	);?></li>
	<li><a href="#" id="blog">Blog</a></li>  
	<li><a href="#" id="foro">Foro</a></li>
	<li><a href="#" id="proyectos">Proyectos</a></li>
	<li><a href="#" id="contacto">Contactanos</a></li>
</ul>