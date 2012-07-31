<?php
$this->set('title_for_layout', 'ADSL  - ¿Ulvidaste tu contraseña?');
$this->Html->meta('description', '');
$this->Html->meta('robots', null, array('name' => 'robots', 'content' => 'noindex,nofollow') ,false);
#Sección Javascript
//$this->Html->script();
?>
<div class="users formulario">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<h1>¿Olvidaste tu contraseña?</h1>
		<p>No te preocupes, la puedes recuperar apartir de tu correo electronico, por favor rellena los siguientes datos</p>
	<?php
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end('Resetar');?>
</div>
