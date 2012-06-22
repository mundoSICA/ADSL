<div class="users formulario">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend>Identicate como usario</legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('auto_login', array('type' => 'checkbox', 'label' => 'Recordarme en mi equipo'));
		echo $this->Form->end('Autenticarse');
	?>
	</fieldset>
	<?php
	echo $this->Html->link('registrarme', array('action'=>'registro'));
	?>
</div>
