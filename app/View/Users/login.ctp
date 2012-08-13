<?php
	$this->set('title_for_layout', 'ADSL  - Inicio de sesión');
	$this->Html->meta('robots', 'noindex,nofollow', array('inline' => false));
?>
<div class="users formulario">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend>ADSL - Identificacte como usario</legend>
		<div class="input text required"><label for="UserUsername">Username</label><input type="text" id="UserUsername" maxlength="15" name="data[User][username]"></div>
		<div class="input password required"><label for="UserPassword">Password</label><input type="password" id="UserPassword" name="data[User][password]"></div>
		<div class="input checkbox"><input type="hidden" value="0" id="UserAutoLogin_" name="data[User][auto_login]"><input type="checkbox" id="UserAutoLogin" value="1" name="data[User][auto_login]"><label for="UserAutoLogin">Recordarme en mi equipo</label></div>
	<?php
		echo $this->Form->end('Autenticarse');
	?>
	</fieldset>
	<?php
	echo $this->Html->link('registrarme', array('action'=>'registro'));
	?> | 
	<?php
	echo $this->Html->link('Olvide mi contraseña', array('action'=>'reset_password'));
	?>
</div>
