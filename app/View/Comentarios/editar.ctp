<div class="comentarios formulario">
<?php echo $this->Form->create('Comentario');?>
	<fieldset>
		<legend><?php echo 'Editar Comentario'; ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('url');
		echo $this->Form->input('message');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
	?>
	</fieldset>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="acciones">
	<h3>Acciones</h3>
	<ul>

		<li><?php echo $this->Form->postLink('Borrar', array('action' => 'borrar', $this->Form->value('Comentario.id')), null, __('Esta seguro que desea borrar: # %s?', $this->Form->value('Comentario.id'))); ?></li>
		<li><?php echo $this->Html->link('Listar Comentarios', array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link('Listar Users', array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar User', array('controller' => 'users', 'action' => 'agregar')); ?> </li>
	</ul>
</div>
