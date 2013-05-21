<?php
#iniciando la autenticación
$this->Html->initAuth($userAuth);

	$this->set('title_for_layout', 'ADSL  - Inicio de sesión');
	$this->Html->meta('robots', 'noindex,nofollow', array('inline' => false));
?>
<div class="row-fluid">
	<div class="actions span3 sidebar-nav">
	<?php
	echo $this->Html->menu_navegacion_general();
	echo $this->Html->menu_talleres();
	echo $this->Html->menu_usuario();
	?>
<!-- Compartir sección -->
	<ul class='nav nav-list well'>
			<li class='nav-header'>
				<i class="icon-share"></i> Compartir
			</li>
			<li class='divider'></li>
		<li><?php
		echo $this->QrCode->url(
			'/usuarios/login', array('size' => '170x170', 'margin' => 0)
		);
		?></li>
	</ul>
</div>

<div class="users index span9 formulario">
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
</div>
