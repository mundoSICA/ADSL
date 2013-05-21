<?php
#iniciando la autenticación
$this->Html->initAuth($userAuth);

$this->set('title_for_layout', 'ADSL  - Mi perfil');
#Sección Javascript
$this->Html->script(array(
											'activar.top.menu.jquery',
											'users.mi_perfil',
											), array('inline' => false));
?>
<div class="row-fluid">
	<div class="actions span3 sidebar-nav">
	<?php
	echo $this->Html->menu_navegacion_general();
	echo $this->Html->menu_talleres();
	echo $this->Html->menu_usuario();
	?>
</div>

<div class="users index span9 formulario">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend>Edición de mi perfil</legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('email_publico', array('label'=> 'Deseo que mi correo electronico aparezca en mi perfil publico'));
		echo $this->Form->input('twitter');
		echo $this->Form->input('facebook', array('label'=> 'Facebook(link)'));
		echo $this->Form->input('url');
		echo $this->Form->input('notificaciones', array('label'=> 'Recibir notificación cuando se abre un taller'));
		echo "\n<h2>Cambiar tu contraseña</h2>";
		echo $this->Form->input('password_anterior', array('type'=> 'password'));
		echo $this->Form->input('nuevo_password', array('type'=> 'password'));
		echo $this->Form->input('repetir_nuevo_password', array('type'=> 'password'));
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
</div>
