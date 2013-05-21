<?php
#iniciando la autenticación
$this->Html->initAuth($userAuth);


?>
<div class="row-fluid">
	<div class="actions span3 sidebar-nav">
	<?php
	echo $this->Html->menu_navegacion_general();
	echo $this->Html->menu_talleres();
	echo $this->Html->menu_usuario();
	?>
</div>

<div class="talleres span9 formulario">
<?php echo $this->Form->create('Taller');?>
	<fieldset>
		<legend><?php echo 'Admin Editar Taller'; ?></legend>
	<?php
		$status = array('abierto', 'cerrado');
		$status = array_combine($status, $status);
		echo $this->Form->input('user_id');
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('status', array('options' => $status));
		echo $this->Form->input('horario');
		echo $this->Form->input('fecha_inicio');
		echo $this->Form->input('fecha_final');
		echo $this->Form->input('costo');
		echo $this->Form->input('cupo');
		echo $this->Form->input('num_sesiones');
		echo $this->Form->input('resumen');
		echo $this->Wysiwyg->textarea('contenido');
		echo $this->Form->input('numero_total_horas');
		echo $this->Form->input('notificar', array('type' => 'checkbox', 'label' => 'Notificar por Correo electronico'));
	?>
	</fieldset>
<?php echo $this->Form->end('Enviar');?>
</div>
</div>
