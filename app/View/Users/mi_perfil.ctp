<?php
	echo $this->Html->script('activar.top.menu.jquery');
?>
<script language="Javascript"  type="text/javascript">$(function() {$("#BotonPerfil").activarTopMenu();});</script>
<div class="users formulario">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend>Edicion de mi perfil</legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('email_publico', array('label'=> 'Deseo que mi correo electronico aparezca en mi perfil publico'));
		echo $this->Form->input('twitter');
		echo $this->Form->input('facebook', array('label'=> 'Facebook(link)'));
		echo $this->Form->input('url');
		echo '<h2>Cambiar tu contraseña</h2>';
		echo $this->Form->input('password_anterior');
		echo $this->Form->input('nuevo_password');
		echo $this->Form->input('repetir_nuevo_password');
	?>
	</fieldset>
<div class="submit">
	<input type="submit" value="Enviar datos">
	<?php
		echo $this->Html->link('Ver mi perfil',
			array('controller'=>'users', 'action'=>'ver', $this->request->data['User']['username'])
			,array('class' => 'boton_naranja')
		);
	?>
</div>
</div>
