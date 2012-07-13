<?php
	echo $this->Html->script('activar.top.menu.jquery');
	$this->set('title_for_layout', 'ADSL  - Lista de proyectos');
	$this->Html->meta('description', 'Listado detallado de nuestros proyectos o de los proyectos que apoyamos', array('inline' => false));
?><style type="text/css" media="all">
div.index{
	width:900px;
	border-left:1px solid #FFF;
}</style>

<script language="Javascript"  type="text/javascript">$(function() {$("#BotonProyectos").activarTopMenu();});</script>
<div class="index">
	<h1>Lista de proyectos</h1>
	<p>Lo sentimos esta area esta todavia inconclusa</p>
</div>
