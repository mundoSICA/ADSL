<?php
/* Titutlo:     menu_superior
 * Autor:       @Fitorec
 * Descripcion: Este elemento es donde van los iconos de las recomendaciones del ADSL
 * Link-info:   http://book.cakephp.org/2.0/en/views.html#using-view-blocks
 */
?>
<ul itemprop="breadcrumb">
	<li><?php
echo $this->Html->link('Inicio', '/', array('id'=>'BotonInicio'));
?></li>
	<li><?php
	if( $this->Session->read('Auth.User.role') ) {
		echo $this->Html->link('Mi Perfil',
				array('controller'=>'users', 'action' => 'mi_perfil', 'admin'=>false),
				array('id'=>'BotonPerfil', 'itemprop' => 'url')
		);
	}else{
		echo $this->Html->link('Registrate',
				array('controller'=>'users', 'action' => 'registro', 'admin'=>false),
				array('id'=>'BotonRegistrate', 'itemprop' => 'url')
		);
	}
	?></li>
	<li><?php
	echo $this->Html->link('Talleres',
		array('controller'=>'talleres', 'action'=>'index', 'admin'=>false),
		array('id'=>'BotonTalleres', 'itemprop' => 'url')
);
?></li>
	<li><?php
	echo $this->Html->link('Calendario',
		array('controller'=>'talleres','action'=>'calendario','admin'=>false),
		array('id'=>'BotonCalendario', 'itemprop' => 'url')
	);?></li>
	<li><?php
	echo $this->Html->link('Usuarios',
		array('controller'=>'users','action'=>'index','admin'=>false),
		array('id'=>'BotonUsuarios', 'itemprop' => 'url')
	);?></li>
	<li><?php
	echo $this->Html->link('Contribuciones',
		array('controller'=>'contribuciones','action'=>'index','admin'=>false),
		array('id'=>'BotonContribuciones', 'itemprop' => 'url')
	);?></li>
	<li><?php
	echo $this->Html->link('Video en vivo',
		array('controller' => 'pages', 'action' => 'display', 'streaming','admin'=>false),
		array('id'=>'BotonStreaming', 'itemprop' => 'url')
	);?></li>
	<li><?php
	echo $this->Html->link('Contactanos',
		array('controller'=>'pages','action'=>'contacto','admin'=>false),
		array('id'=>'BotonContactanos', 'itemprop' => 'url')
	);?></li>
</ul>
