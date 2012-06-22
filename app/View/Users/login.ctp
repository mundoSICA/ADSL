<div class="users formulario">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend>Registrate como usuario</legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('auto_login', array('type' => 'checkbox', 'label' => 'Recordarme en mi equipo'));
		echo $this->Form->end('Autenticarse');
	?>
	</fieldset>
</div>
