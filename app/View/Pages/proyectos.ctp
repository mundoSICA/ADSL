<?php
$this->set('title_for_layout', 'ADSL  - Lista de proyectos');
$this->Html->meta('description', 'Listado detallado de nuestros proyectos o de los proyectos que apoyamos', array('inline' => false));
#sección CSS
$this->Html->css('proyectos', 'stylesheet', array('inline' => false));
#Sección Javascript
$this->Html->script(array(
											'activar.top.menu.jquery',
											'proyectos'
											), array('inline' => false));
?>
<div class="index">
	<h1>Lista de proyectos</h1>
	<p>Lo sentimos esta area esta todavia inconclusa</p>
</div>
