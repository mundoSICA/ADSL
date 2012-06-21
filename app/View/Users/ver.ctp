<div class="users ver">
<?php
		echo $this->Html->gravatar_img($user['User']['email']);
?>

<h2><?php  echo h($user['User']['username']);?></h2>
	<dl>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="acciones">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link('Editar User', array('action' => 'editar', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink('Borrar User', array('action' => 'borrar', $user['User']['id']), null, __('Esta seguro que desea borrar: # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link('Listar Users', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar User', array('action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Listar Noticias', array('controller' => 'noticias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Noticia', array('controller' => 'noticias', 'action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Listar Talleres', array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Taller', array('controller' => 'talleres', 'action' => 'agregar')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3>Noticias Relacionados</h3>
	<?php if (!empty($user['Noticia'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Slug Dst'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th class="acciones">Acciones</th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Noticia'] as $noticia): ?>
		<tr>
			<td><?php echo $noticia['id'];?></td>
			<td><?php echo $noticia['user_id'];?></td>
			<td><?php echo $noticia['nombre'];?></td>
			<td><?php echo $noticia['slug_dst'];?></td>
			<td><?php echo $noticia['created'];?></td>
			<td><?php echo $noticia['modified'];?></td>
			<td><?php echo $noticia['content'];?></td>
			<td class="acciones">
				<?php echo $this->Html->link('Ver', array('controller' => 'noticias', 'action' => 'ver', $noticia['id'])); ?>
				<?php echo $this->Html->link('Editar', array('controller' => 'noticias', 'action' => 'editar', $noticia['id'])); ?>
				<?php echo $this->Form->postLink('Borrar', array('controller' => 'noticias', 'action' => 'borrar', $noticia['id']), null, __('Esta seguro que desea borrar: # %s?', $noticia['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="acciones">
		<ul>
			<li><?php echo $this->Html->link('Agregar Noticia', array('controller' => 'noticias', 'action' => 'agregar'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3>Talleres Relacionados</h3>
	<?php if (!empty($user['Taller'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Slug Dst'); ?></th>
		<th><?php echo __('Horario'); ?></th>
		<th><?php echo __('Fecha Inicio'); ?></th>
		<th><?php echo __('Fecha Final'); ?></th>
		<th><?php echo __('Costo'); ?></th>
		<th><?php echo __('Resumen'); ?></th>
		<th><?php echo __('Contenido'); ?></th>
		<th><?php echo __('Numero Total Horas'); ?></th>
		<th><?php echo __('Big Slide'); ?></th>
		<th><?php echo __('Slide'); ?></th>
		<th class="acciones">Acciones</th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Taller'] as $taller): ?>
		<tr>
			<td><?php echo $taller['user_id'];?></td>
			<td><?php echo $taller['id'];?></td>
			<td><?php echo $taller['nombre'];?></td>
			<td><?php echo $taller['slug_dst'];?></td>
			<td><?php echo $taller['horario'];?></td>
			<td><?php echo $taller['fecha_inicio'];?></td>
			<td><?php echo $taller['fecha_final'];?></td>
			<td><?php echo $taller['costo'];?></td>
			<td><?php echo $taller['resumen'];?></td>
			<td><?php echo $taller['contenido'];?></td>
			<td><?php echo $taller['numero_total_horas'];?></td>
			<td><?php echo $taller['slide'];?></td>
			<td class="acciones">
				<?php echo $this->Html->link('Ver', array('controller' => 'talleres', 'action' => 'ver', $taller['id'])); ?>
				<?php echo $this->Html->link('Editar', array('controller' => 'talleres', 'action' => 'editar', $taller['id'])); ?>
				<?php echo $this->Form->postLink('Borrar', array('controller' => 'talleres', 'action' => 'borrar', $taller['id']), null, __('Esta seguro que desea borrar: # %s?', $taller['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="acciones">
		<ul>
			<li><?php echo $this->Html->link('Agregar Taller', array('controller' => 'talleres', 'action' => 'agregar'));?> </li>
		</ul>
	</div>
</div>
