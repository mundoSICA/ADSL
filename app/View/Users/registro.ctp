<div class="users formulario">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend>Registrate como usuario</legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
		echo $this->Form->input('notificacion', array('type'=>'checkbox', 'checked'=>true, 'label'=> 'Deseo recibir una notificación cada que se abra un nuevo taller'));
	?>
	</fieldset>
<?php echo $this->Form->end('Registrame');?>
</div>
