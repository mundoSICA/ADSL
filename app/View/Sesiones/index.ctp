<?php
/**
 * adsl.org.mx
 * Vista:  Sesiones Index
 */

#sección metaDatos
$this->set('title_for_layout', 'Correo Facil - Sesiones Index');
$this->Html->meta('description', 'Sesiones Index', array('inline' => false));

#sección CSS
#$this->Html->css(array(
#						'sesiones.index',
#						), 'stylesheet', array('inline' => false));

#sección Javascript
#$this->Html->script(array(
#											'sesiones.index',
#											), array('inline' => false));
?>
<div class="row-fluid">
	<div class="actions span3 well sidebar-nav">
	<h3>Acciones</h3>
	<ul class="nav nav-list">
		<li>
	<?php
		echo $this->Html->link(
		'<i class="icon-plus"></i> Agregar',
		array('action' => 'agregar'),
		array('escape' => false)
	); ?>
		</li>
			<li class='divider'></li>
			<li class='nav-header'>
				Talleres
			</li>
			<li>
	<?php
		echo $this->Html->link(
		'<i class="icon-home"></i> Listar',
		array('controller' => 'talleres', 'action' => 'index'),
		array('escape' => false)
	); ?>
			</li>
			<li>
	<?php
		echo $this->Html->link(
		'<i class="icon-plus"></i> Agregar',
		array('controller' => 'talleres', 'action' => 'agregar'),
		array('escape' => false)
	); ?>
			</li>
	</ul>
</div>

<div class="sesiones index span9">
	<div class="page-header"><h1>Lista de sesiones</h1></div>
	<table class="table table-bordered table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('taller_id'); ?></th>
			<th><?php echo $this->Paginator->sort('keywords'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('slug_dst'); ?></th>
			<th><?php echo $this->Paginator->sort('orden'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('estrellas'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_publicacion'); ?></th>
			<th class="actions">Acciones</th>
	</tr>
	<?php
	foreach ($sesiones as $sesion): ?>
	<tr>
		<td><?php echo $this->Html->link($sesion['Sesion']['id'], array('action' => 'ver', $sesion['Sesion']['id'])); ?></td>
		<td>
			<?php echo $this->Html->link($sesion['Taller']['nombre'], array('controller' => 'talleres', 'action' => 'ver', $sesion['Taller']['id'])); ?>
		</td>
		<td><?php echo h($sesion['Sesion']['keywords']); ?>&nbsp;</td>
		<td><?php echo h($sesion['Sesion']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($sesion['Sesion']['slug_dst']); ?>&nbsp;</td>
		<td><?php echo h($sesion['Sesion']['orden']); ?>&nbsp;</td>
		<td><?php echo h($sesion['Sesion']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($sesion['Sesion']['content']); ?>&nbsp;</td>
		<td><?php echo h($sesion['Sesion']['estrellas']); ?>&nbsp;</td>
		<td><?php echo h($sesion['Sesion']['created']); ?>&nbsp;</td>
		<td><?php echo h($sesion['Sesion']['modified']); ?>&nbsp;</td>
		<td><?php echo h($sesion['Sesion']['fecha_publicacion']); ?>&nbsp;</td>
		<td class="actions">
<div class="btn-group">
	<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li>
	<?php
		echo $this->Html->link(
		'<i class="icon-eye-open"></i> Ver',
		array('action' => 'ver', $sesion['Sesion']['id']),
		array('escape' => false)
	); ?>
		</li>
		<li>
	<?php
		echo $this->Html->link(
		'<i class="icon-pencil"></i> Editar',
		array('action' => 'editar', $sesion['Sesion']['id']),
		array('escape' => false)
	); ?>
		</li>
		<li>
	<?php
		echo $this->Form->postLink(
		'<i class="icon-trash"></i> Borrar',
		array('action' => 'borrar', $sesion['Sesion']['id']),
		array('escape' => false),
		'¿Deseas eliminar este registro?'
	); ?>
		</li>
	</ul>
</div>
</td>
</tr>
<?php endforeach; ?>
	</table>
	<small class="pull-right">
	<?php
	echo $this->Paginator->counter(array(
	'format' => 'Página {:page} de {:pages}, viendo {:current} registros de un total de {:count}, iniciando en el registro {:start}, cabando en {:end}'
	));
	?>
	</small>
<div class="paging">
	<?php
		echo $this->Paginator->prev('< Anterior', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next('Siguiente >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
</div>
