<?php
/**
 * adsl.org.mx
 * Vista:  Sesiones Ver
 */

#sección metaDatos
$this->set('title_for_layout', 'Correo Facil - Sesiones Ver');
$this->Html->meta('description', $sesion['Sesion']['descripcion'], array('inline' => false));
$this->Html->meta('keywords', $sesion['Sesion']['keywords'], array('inline' => false));

#sección CSS
#$this->Html->css(array(
#						'sesiones.ver',
#						), 'stylesheet', array('inline' => false));

#sección Javascript
#$this->Html->script(array(
#											'sesiones.ver',
#											), array('inline' => false));
?>
<style type="text/css" media="all">

div.page-header h1 date{
	font-size: 0.4em;
	padding-left: 2em;
}
div.pagination{
	margin: 0 0 18px 0
}
</style>
<div class="row-fluid">
	<div class="actions span3 well sidebar-nav">
	<h3>Acciones</h3>
	<ul class="nav nav-list">
		<li class='nav-header'><i class='icon-th-list'></i> Sesiones</li>
		<li><?php
		echo $this->Html->link(
			'<i class="icon-home"></i> Inicio taller',
			array(
				'controller'=>'talleres',
				'action' => 'ver',
				$sesion['Taller']['slug_dst']
				),
			array('escape' => false)
		); ?>
		</li>
		<li><?php
		echo $this->Html->link(
			'<i class="icon-star"></i> Calificar',
			array('action' => 'calificar',$sesion['Sesion']['slug_dst']),
			array('escape' => false)
		); ?>
		</li>
		<li><?php
		echo $this->Html->link(
			'<i class="icon-pencil"></i> Editar Sesion',
			array(
			'action' => 'editar',
			'miembro' => true,
			$sesion['Sesion']['slug_dst']
			),
			array('escape' => false)
		); ?>
		</li>
		<li><?php
		echo $this->Form->postLink(
			'<i class="icon-trash"></i> Borrar Sesion',
			array(
			'action' => 'borrar',
			$sesion['Sesion']['slug_dst']
			),
			array('escape' => false),
			'Esta seguro de querer borrar el registro ' . $sesion['Sesion']['slug_dst']
		); ?>
		</li>
		<li><?php
		echo $this->Html->link(
			'<i class="icon-plus"></i> Agregar Sesion',
			array('action' => 'Agregar'),
			array('escape' => false)
		); ?>
		</li>

		<li class='divider'></li>
		<li class='nav-header'><i class='icon-folder-open'></i> Talleres</li>
		<li><?php
			echo $this->Html->link(
			'<i class="icon-list"></i> Listar Talleres',
			array('controller' => 'talleres', 'action' => 'index'),
			array('escape' => false)
		);
		?> </li>

		<li><?php
			echo $this->Html->link(
			'<i class="icon-plus"></i> Agregar Taller',
			array('controller' => 'talleres', 'action' => 'agregar'),
			array('escape' => false)
		);
		?> </li>
	</ul>
</div>

<div class="sesiones view span9">
<div class="page-header">
	<h1><?php
	echo $this->Html->link($sesion['Taller']['nombre'], array('controller' => 'talleres', 'action' => 'ver', $sesion['Taller']['slug_dst']));
	?>
	<small><?php echo str_replace(
				$sesion['Taller']['slug_dst'],
				'',
				$sesion['Sesion']['nombre']); ?></small>
	</h1>
	<date><?php echo h($sesion['Sesion']['fecha_publicacion']); ?></date>
</div>
<p><?php
	echo $this->Markdown->parse($sesion['Sesion']['content']);
?><p>
<?php echo h($sesion['Sesion']['estrellas']); ?>

<!--     -->
<ul class="thumbnails bootstrap-examples">
	<li class="span4">
		<h4>Ultima Edición</h4>
		<p><?php echo h($sesion['Sesion']['modified']); ?></p>
		<h4>Fecha de creación</h4>
		<p><?php echo h($sesion['Sesion']['created']); ?></p>
	</li>
	<li class="span4">
		<h4>Calificación actual</h4>
		<p>
			<a href="/1" title='1 estrella'><i class="icon-star"></i></a>
			<a href="/1" title='2 estrella'><i class="icon-star"></i></a>
			<a href="/1" title='3 estrella'><i class="icon-star"></i></a>
			<a href="/1" title='4 estrella'><i class="icon-star"></i></a>
			<a href="/1" title='5 estrella'><i class="icon-star-empty"></i></a>
		</p>
		<h4>Califica esta sesión</h4>
		<p>
			<a href="/1" title='1 estrella'><i class="icon-star-empty"></i></a>
			<a href="/1" title='2 estrella'><i class="icon-star-empty"></i></a>
			<a href="/1" title='3 estrella'><i class="icon-star-empty"></i></a>
			<a href="/1" title='4 estrella'><i class="icon-star-empty"></i></a>
			<a href="/1" title='5 estrella'><i class="icon-star-empty"></i></a>
		</p>
	</li>

	<li class="span3">
<div class="btn-group">
	<a href="#" class="btn btn-primary"><i class="icon-cog icon-white"></i> Acciones</a>
	<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><?php
		echo $this->Html->link(
			'<i class="icon-pencil"></i> Editar',
			array('action' => 'editar', $sesion['Sesion']['slug_dst']),
			array('escape' => false)
		); ?>
		</li>
		<li><?php
		echo $this->Form->postLink(
			'<i class="icon-trash"></i> Borrar',
			array('action' => 'borrar', $sesion['Sesion']['slug_dst']),
			array('escape' => false)
		); ?>
		</li>
		<li><?php
		echo $this->Html->link(
			'<i class="icon-list"></i> Lista Sesiones',
			array('action' => 'index'),
			array('escape' => false)
		); ?>
		</li>
		<li><?php
		echo $this->Html->link(
			'<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>',
			array('action' => 'index'),
			array('escape' => false)
		); ?>
		</li>
	</ul>
</div>
	</li>
</ul>
<!--     -->
<div class="pagination pagination-centered">
	<ul>
		<li class="disabled"><a href="#">«</a></li>
		<li class="disabled"><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">»</a></li>
	</ul>
</div>

</div>
