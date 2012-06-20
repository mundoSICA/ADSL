<div class="talleres formulario">
<?php echo $this->Form->create('Taller');?>
	<fieldset>
		<legend><?php echo 'Admin Agregar Taller'; ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('slug_dst');
		echo $this->Form->input('horario');
		echo $this->Form->input('fecha_inicio');
		echo $this->Form->input('fecha_final');
		echo $this->Form->input('costo');
		echo $this->Form->input('resumen');
		echo $this->Form->input('contenido');
		echo $this->Form->input('numero_total_horas');
		echo $this->Form->input('big_slide');
		echo $this->Form->input('slide');
		echo $this->Form->input('Etiqueta');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="acciones">
	<h3>Acciones</h3>
	<ul>

		<li><?php echo $this->Html->link('Listar Talleres', array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link('Listar Users', array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar User', array('controller' => 'users', 'action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Listar Posts', array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Post', array('controller' => 'posts', 'action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Listar Etiquetas', array('controller' => 'etiquetas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Etiqueta', array('controller' => 'etiquetas', 'action' => 'agregar')); ?> </li>
	</ul>
</div>
