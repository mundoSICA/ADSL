<div class="talleresUseres ver">
<h2><?php  echo __('Talleres User');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($talleresUser['TalleresUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($talleresUser['User']['username'], array('controller' => 'users', 'action' => 'ver', $talleresUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taller'); ?></dt>
		<dd>
			<?php echo $this->Html->link($talleresUser['Taller']['nombre'], array('controller' => 'talleres', 'action' => 'ver', $talleresUser['Taller']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descuento'); ?></dt>
		<dd>
			<?php echo h($talleresUser['TalleresUser']['descuento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($talleresUser['TalleresUser']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="acciones">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Talleres User'), array('action' => 'editar', $talleresUser['TalleresUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Talleres User'), array('action' => 'borrar', $talleresUser['TalleresUser']['id']), null, __('Esta seguro que desea borrar: # %s?', $talleresUser['TalleresUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Talleres Useres'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Talleres User'), array('action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Listar Users', array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar User', array('controller' => 'users', 'action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Listar Talleres', array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Taller', array('controller' => 'talleres', 'action' => 'agregar')); ?> </li>
	</ul>
</div>
