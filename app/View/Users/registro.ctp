<div class="users formulario">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend>Agregar User</legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
		//echo $this->Form->input('Taller');
	?>
	</fieldset>
<?php echo $this->Form->end('Enviar');?>
</div>
<div class="acciones">
	<h3>Acciones</h3>
	<ul>

		<li><?php echo $this->Html->link('Listar Users', array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link('Listar Noticias', array('controller' => 'noticias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Noticia', array('controller' => 'noticias', 'action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Listar Talleres', array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Taller', array('controller' => 'talleres', 'action' => 'agregar')); ?> </li>
	</ul>
</div>
