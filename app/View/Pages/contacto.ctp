<?php
$this->set('title_for_layout', 'ADSL  - Contactanos');
$this->Html->meta('description', 'Formulario de contacto, contactanos desde este medio', array('inline' => false));
#sección Javascript
$this->Html->script(array(
											'activar.top.menu.jquery',
											'contacto',
											), array('inline' => false));
?>
<div class="formulario contacto">
<?php echo $this->Form->create('Page');?>
	<fieldset>
	<h1>Formulario de contacto ADSL</h1>
<?php
	echo $this->Form->input('nombre');
	echo $this->Form->input('email');
	echo $this->Form->input('telefono');
	echo $this->Form->input('asunto');
	echo $this->Form->input('mensaje', array('type'=> 'textarea'));
	echo $this->Recaptcha->show('clean');
?>
	</fieldset>
<?php echo $this->Form->end('contactanos');?>
</div>
