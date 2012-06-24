<?php
	echo $this->Html->script('activar.top.menu.jquery');
	$this->set('title_for_layout', 'ADSL  - Contactanos');
	$this->Html->meta('description', 'Formulario de contacto, contactanos desde este medio', array('inline' => false));
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
	echo $this->Form->input('asunto');
	echo $this->Form->input('mensaje', array('type'=> 'textarea'));
?>
	</fieldset>
<?php echo $this->Form->end('contactanos');?>
</div>
