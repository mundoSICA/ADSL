<?php
/**
 * adsl.org.mx
 * Vista:  Users Editar
 */
#iniciando la autenticación
$this->Html->initAuth($userAuth);

$this->set('title_for_layout', 'ADSL  - Registro de miembros');
$this->Html->meta('description', 'Registro de miembros, registrate en la Academia de Software Libre', array('inline' => false));
#Sección Javascript
$this->Html->script(array(
											'activar.top.menu.jquery',
											'users.registro',
											), array('inline' => false));

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
			'/usuarios/', array('size' => '170x170', 'margin' => 0)
		);
		?></li>
	</ul>
</div>

<div class="users span9 formulario">
	<?php echo $this->Form->create('User');?>
	<fieldset>
		<h1>Registrate como miembro</h1>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
		echo $this->Form->input('email_publico', array('label'=> 'Deseo que mi correo electronico aparezca en mi perfil publico'));
		echo $this->Form->input('twitter');
		echo $this->Form->input('facebook', array('label'=> 'Facebook(link)'));
		echo $this->Form->input('url');
		echo $this->Form->input('notificacion', array('type'=>'checkbox', 'checked'=>true, 'label'=> 'Deseo recibir una notificación cada que se abra un nuevo taller'));
	?>
	</fieldset>
<?php echo $this->Form->end('Registrame');?>
</div>
</div>

