<div class="talleres formulario">
<?php echo $this->Form->create('Taller', array('type' => 'file'));?>
	<fieldset>
		<legend>Agregar Taller</legend>
	<?php
		echo $this->Form->input('user_id', array('label'=>'Tallerista'));
		echo $this->Form->input('nombre', array('value'=>'Introducción al Software Libre'));
		echo $this->Form->input('horario', array('value'=>'11pm-13pm de lunes a viernes'));
		echo $this->Form->input('fecha_inicio');
		echo $this->Form->input('fecha_final');
		echo $this->Form->input('costo', array('value'=>500));
		echo $this->Form->input('resumen', array('type'=>'textarea','value'=>'Escriba aquí un breve resumen'));
		echo $this->Form->input('contenido', array('type'=>'textarea','value'=>'Escriba aquí una descripción más amplia'));
		echo $this->Form->input('numero_total_horas', array('value'=>20));
		echo '<div class="input text required">';
		echo $this->Form->label('Taller.slide', 'Archivo para el slide(925x250 jpeg)');
		echo '<input id="TallerSlide" type="file" name="data[Taller][slide]">';
		echo '</div>';
	?>
	</fieldset>
<?php echo $this->Form->end('Crear taller');?>
</div>
