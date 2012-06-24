<?php
	echo $this->Html->script('activar.top.menu.jquery');
	$this->set('title_for_layout', 'ADSL  - Registro de usuario');
	$this->Html->meta('description', 'Registro de usuario, registrate en nuestro sitio web', array('inline' => false));
?>
<script language="Javascript"  type="text/javascript">$(function() {$("#BotonRegistrate").activarTopMenu();});</script>
<div class="users formulario">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend>Registrate como usuario</legend>
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
