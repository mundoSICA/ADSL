<?php
	echo $this->Html->script('activar.top.menu.jquery');
?>
<script language="Javascript"  type="text/javascript">$(function() {$("#BotonContactanos").activarTopMenu();});</script>

<div class="formulario contacto">
<?php echo $this->Form->create('Page');?>
	<fieldset>
		<legend>Contacto ADSL</legend>
<?php
	echo $this->Form->input('nombre');
	echo $this->Form->input('email');
	echo $this->Form->input('telefono');
	echo $this->Form->input('mensaje', array('type'=> 'text-area'));
?>
	</fieldset>
<?php echo $this->Form->end('Registrame');?>
</div>
