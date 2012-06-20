<div class="talleresUseres formulario">
<?php echo $this->Form->create('TalleresUser');?>
	<fieldset>
		<legend><?php echo __('Edit Talleres User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('taller_id');
		echo $this->Form->input('descuento');
	?>
	</fieldset>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="acciones">
	<h3>Acciones</h3>
	<ul>

		<li><?php echo $this->Form->postLink('Borrar', array('action' => 'borrar', $this->Form->value('TalleresUser.id')), null, __('Esta seguro que desea borrar: # %s?', $this->Form->value('TalleresUser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Talleres Useres'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link('Listar Users', array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar User', array('controller' => 'users', 'action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Listar Talleres', array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Taller', array('controller' => 'talleres', 'action' => 'agregar')); ?> </li>
	</ul>
</div>
