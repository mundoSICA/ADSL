<div class="talleres formulario">
<?php echo $this->Form->create('Taller');?>
	<fieldset>
		<legend><?php echo 'Admin Editar Taller'; ?></legend>
	<?php
		$status = array('abierto', 'cerrado');
		$status = array_combine($status, $status);
		echo $this->Form->input('user_id');
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('status', array('options' => $status));
		echo $this->Form->input('horario');
		echo $this->Form->input('fecha_inicio');
		echo $this->Form->input('fecha_final');
		echo $this->Form->input('costo');
		echo $this->Form->input('cupo');
		echo $this->Form->input('num_sesiones');
		echo $this->Form->input('resumen');
		echo $this->Form->input('contenido');
		echo $this->Form->input('numero_total_horas');
	?>
	</fieldset>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="acciones">
	<h3>Acciones</h3>
	<ul>

		<li><?php echo $this->Form->postLink('Borrar', array('action' => 'borrar', $this->Form->value('Taller.id')), null, __('Esta seguro que desea borrar: # %s?', $this->Form->value('Taller.id'))); ?></li>
		<li><?php echo $this->Html->link('Listar Talleres', array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link('Listar Users', array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar User', array('controller' => 'users', 'action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Listar Posts', array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Post', array('controller' => 'posts', 'action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Listar Etiquetas', array('controller' => 'etiquetas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Etiqueta', array('controller' => 'etiquetas', 'action' => 'agregar')); ?> </li>
	</ul>
</div>
