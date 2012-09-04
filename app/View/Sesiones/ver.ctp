<?php
/**
 * micorreofacil.com
 * Vista:  Sesiones Ver
 */

#sección metaDatos
$this->set('title_for_layout', 'Correo Facil - Sesiones Ver');
$this->Html->meta('description', 'Sesiones Ver', array('inline' => false));

#sección CSS
#$this->Html->css(array(
#						'sesiones.ver',
#						), 'stylesheet', array('inline' => false));

#sección Javascript
#$this->Html->script(array(
#											'sesiones.ver',
#											), array('inline' => false));
?>
<div class="row-fluid">
	<div class="actions span3 well sidebar-nav">
	<h3>Acciones</h3>
	<ul class="nav nav-list">
		<li><?php
		echo $this->Html->link(
			'<i class="icon-home"></i> Inicio Sesiones',
			array('action' => 'index'),
			array('escape' => false)
		); ?>
		</li>
		<li><?php
		echo $this->Html->link(
			'<i class="icon-pencil"></i> Editar Sesion',
			array('action' => 'editar', $sesion['Sesion']['id']),
			array('escape' => false)
		); ?>
		</li>
		<li><?php
		echo $this->Form->postLink(
			'<i class="icon-trash"></i> Borrar Sesion',
			array('action' => 'borrar', $sesion['Sesion']['id']),
			array('escape' => false),
			'Esta seguro de querer borrar el registro ' . $sesion['Sesion']['id']
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
		<li class='nav-header'>Talleres</li>
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
<div class="page-header"><h1>Sesion</h1></div>
<table class="table table-bordered table-striped">
	<tbody>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($sesion['Sesion']['id']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Taller'); ?></th>
		<td>
			<?php echo $this->Html->link($sesion['Taller']['nombre'], array('controller' => 'talleres', 'action' => 'view', $sesion['Taller']['id'])); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Keywords'); ?></th>
		<td>
			<?php echo h($sesion['Sesion']['keywords']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Nombre'); ?></th>
		<td>
			<?php echo h($sesion['Sesion']['nombre']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Slug Dst'); ?></th>
		<td>
			<?php echo h($sesion['Sesion']['slug_dst']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Orden'); ?></th>
		<td>
			<?php echo h($sesion['Sesion']['orden']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Descripcion'); ?></th>
		<td>
			<?php echo h($sesion['Sesion']['descripcion']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Content'); ?></th>
		<td>
			<?php echo h($sesion['Sesion']['content']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Estrellas'); ?></th>
		<td>
			<?php echo h($sesion['Sesion']['estrellas']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($sesion['Sesion']['created']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($sesion['Sesion']['modified']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Fecha Publicacion'); ?></th>
		<td>
			<?php echo h($sesion['Sesion']['fecha_publicacion']); ?>
			&nbsp;
		</td>
	</tr>	</tbody>
</table>

<div class="btn-group">
	<a href="#" class="btn btn-primary"><i class="icon-cog icon-white"></i> Acciones</a>
	<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><?php
		echo $this->Html->link(
			'<i class="icon-pencil"></i> Editar',
			array('action' => 'editar', $sesion['Sesion']['id']),
			array('escape' => false)
		); ?>
		</li>
		<li><?php
		echo $this->Form->postLink(
			'<i class="icon-trash"></i> Borrar',
			array('action' => 'borrar', $sesion['Sesion']['id']),
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
	</ul>
</div>

</div>
