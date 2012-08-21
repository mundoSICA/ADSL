<div class="comentarios ver">
<h2><?php  echo __('Comentario');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($comentario['User']['username'], array('controller' => 'users', 'action' => 'ver', $comentario['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Id'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['parent_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($comentario['Comentario']['rght']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="acciones">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link('Editar Comentario', array('action' => 'editar', $comentario['Comentario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink('Borrar Comentario', array('action' => 'borrar', $comentario['Comentario']['id']), null, __('Esta seguro que desea borrar: # %s?', $comentario['Comentario']['id'])); ?> </li>
		<li><?php echo $this->Html->link('Listar Comentarios', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Comentario', array('action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Listar Users', array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar User', array('controller' => 'users', 'action' => 'agregar')); ?> </li>
	</ul>
</div>
