<div class="talleres ver">
<h2><?php  echo $taller['Taller']['nombre'];?></h2>

	<dl>
		<dt>Tallerista</dt>
		<dd>
			<?php echo $this->Html->link($taller['User']['username'], array('controller' => 'users', 'action' => 'ver', $taller['User']['username'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Horario'); ?></dt>
		<dd>
			<?php echo h($taller['Taller']['horario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Inicio'); ?></dt>
		<dd>
			<?php echo h($taller['Taller']['fecha_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Final'); ?></dt>
		<dd>
			<?php echo h($taller['Taller']['fecha_final']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Costo'); ?></dt>
		<dd>
			<?php echo '$'.number_format($taller['Taller']['costo'],2); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Total Horas'); ?></dt>
		<dd>
			<?php echo number_format($taller['Taller']['numero_total_horas'],0); ?>hrs
			&nbsp;
		</dd>
	</dl>
	<p><?php echo h($taller['Taller']['resumen']); ?></p>
	<?php
	if($this->Session->read('Auth.User.username')){
		echo $this->Html->link('Inscribirme', 
				array('action' => 'inscribirme', $taller['Taller']['slug_dst']),
				array('class'=>'registrarme')
			);
	}
	?>
	<p><?php echo h($taller['Taller']['contenido']); ?></p>
</div>
<div class="acciones">
	<h3>Acciones</h3>
	<ul>
		<?php
		if( $this->Session->read('Auth.User.role') == 'maestro' ||  $this->Session->read('Auth.User.role') == 'admin' ):
		?>
		<li><?php echo $this->Html->link('Editar Taller', array('action' => 'editar',$taller['Taller']['slug_dst'], 'admin'=>true)); ?> </li>
		<li><?php echo $this->Html->link('Agregar Taller', array('action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Post', array('controller' => 'posts', 'action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Etiqueta', array('controller' => 'etiquetas', 'action' => 'agregar')); ?> </li>
		<? endif; ?>
		<?php
			if($this->Session->read('Auth.User.role') == 'admin' ):
		?>
		<li><?php echo $this->Form->postLink('Borrar Taller', array('action' => 'borrar', $taller['Taller']['id']), null, __('Esta seguro que desea borrar: # %s?', $taller['Taller']['id'])); ?> </li>
		<?php endif; ?>
		<li><?php echo $this->Html->link('Listar Talleres', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Listar Users', array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Listar Posts', array('controller' => 'posts', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3>Posts Relacionados</h3>
	<?php if (!empty($taller['Post'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Slug Dst'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Taller Id'); ?></th>
		<th class="acciones">Acciones</th>
	</tr>
	<?php
		$i = 0;
		foreach ($taller['Post'] as $post): ?>
		<tr>
			<td><?php echo $post['id'];?></td>
			<td><?php echo $post['nombre'];?></td>
			<td><?php echo $post['slug_dst'];?></td>
			<td><?php echo $post['created'];?></td>
			<td><?php echo $post['modified'];?></td>
			<td><?php echo $post['content'];?></td>
			<td><?php echo $post['taller_id'];?></td>
			<td class="acciones">
				<?php echo $this->Html->link('Ver', array('controller' => 'posts', 'action' => 'ver', $post['id'])); ?>
				<?php echo $this->Html->link('Editar', array('controller' => 'posts', 'action' => 'editar', $post['id'])); ?>
				<?php echo $this->Form->postLink('Borrar', array('controller' => 'posts', 'action' => 'borrar', $post['id']), null, __('Esta seguro que desea borrar: # %s?', $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="acciones">
		<ul>
			<li><?php echo $this->Html->link('Agregar Post', array('controller' => 'posts', 'action' => 'agregar'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3>Etiquetas Relacionados</h3>
	<?php if (!empty($taller['Etiqueta'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Slug Dst'); ?></th>
		<th class="acciones">Acciones</th>
	</tr>
	<?php
		$i = 0;
		foreach ($taller['Etiqueta'] as $etiqueta): ?>
		<tr>
			<td><?php echo $etiqueta['id'];?></td>
			<td><?php echo $etiqueta['nombre'];?></td>
			<td><?php echo $etiqueta['slug_dst'];?></td>
			<td class="acciones">
				<?php echo $this->Html->link('Ver', array('controller' => 'etiquetas', 'action' => 'ver', $etiqueta['id'])); ?>
				<?php echo $this->Html->link('Editar', array('controller' => 'etiquetas', 'action' => 'editar', $etiqueta['id'])); ?>
				<?php echo $this->Form->postLink('Borrar', array('controller' => 'etiquetas', 'action' => 'borrar', $etiqueta['id']), null, __('Esta seguro que desea borrar: # %s?', $etiqueta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="acciones">
		<ul>
			<li><?php echo $this->Html->link('Agregar Etiqueta', array('controller' => 'etiquetas', 'action' => 'agregar'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3>Users Relacionados</h3>
	<?php if (!empty($taller['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th class="acciones">Acciones</th>
	</tr>
	<?php
		$i = 0;
		foreach ($taller['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id'];?></td>
			<td><?php echo $user['role'];?></td>
			<td><?php echo $user['username'];?></td>
			<td><?php echo $user['password'];?></td>
			<td><?php echo $user['email'];?></td>
			<td class="acciones">
				<?php echo $this->Html->link('Ver', array('controller' => 'users', 'action' => 'ver', $user['id'])); ?>
				<?php echo $this->Html->link('Editar', array('controller' => 'users', 'action' => 'editar', $user['id'])); ?>
				<?php echo $this->Form->postLink('Borrar', array('controller' => 'users', 'action' => 'borrar', $user['id']), null, __('Esta seguro que desea borrar: # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="acciones">
		<ul>
			<li><?php echo $this->Html->link('Agregar User', array('controller' => 'users', 'action' => 'agregar'));?> </li>
		</ul>
	</div>
</div>
