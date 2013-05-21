<?php
#iniciando la autenticación
$this->Html->initAuth($userAuth);

$this->set('title_for_layout', 'ADSL  - Recuperación de contraseña');
$this->Html->meta('description', '');
$this->Html->meta('robots', null, array('name' => 'robots', 'content' => 'noindex,nofollow') ,false);

?>
<div class="row-fluid">
	<div class="actions span3 sidebar-nav">
	<?php
	echo $this->Html->menu_navegacion_general();
	echo $this->Html->menu_talleres();
	echo $this->Html->menu_usuario();
	?>
	</div>
	<div class="users span9 formulario">
	<?php echo $this->Form->create('User');?>
		<fieldset>
			<h1>Recuperación de contraseña</h1>
		<?php
			echo $this->Form->input('email');
			echo $this->Form->input('password');
			echo $this->Form->input('repetir_password', array('type'=>'password'));
		?>
		</fieldset>
	<?php echo $this->Form->end('Registrame');?>
	</div>
</div>
