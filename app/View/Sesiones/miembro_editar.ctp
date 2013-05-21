<?php
/**
 * adsl.org.mx
 * Vista:  Sesiones Editar
 */
#iniciando la autenticación
$this->Html->initAuth($userAuth);

#sección metaDatos
$this->set('title_for_layout', 'Correo Facil - Sesiones Editar');
$this->Html->meta('description', 'Sesiones Editar', array('inline' => false));
$sesion_nombre = str_replace($this->data['Taller']['slug_dst']. ' _ ','', $this->data['Sesion']['nombre']);
#sección CSS
#$this->Html->css(array(
#						'sesiones.formulario',
#						'sesiones.editar',
#						), 'stylesheet', array('inline' => false));

#sección Javascript
#$this->Html->script(array(
#											'sesiones.formulario',
#											'sesiones.editar',
#											), array('inline' => false));
?>
<div class="row-fluid">

	<div class="actions span3 sidebar-nav">
	<?php
	echo $this->Html->menu_navegacion_general();
	echo $this->Html->menu_talleres($this->data);
	echo $this->Html->menu_usuario();
	?>
</div>

<div class="sesiones form span9">
<?php echo $this->Form->create('Sesion', array('class' => 'well')); ?>
	<fieldset>
		<legend>Editar Sesión</legend>
	<?php
		echo $this->Form->input('nombre', array('value'=>$sesion_nombre));
		echo $this->Form->input('estado', array('options' => array('edicion', 'publicado', 'sin_comentarios')));
		echo $this->Form->input('keywords', array('label' => 'Parabras clave (separadas por coma)'));
		echo $this->Form->input('descripcion');
		echo $this->Form->input('fecha_publicacion');
		echo $this->Wysiwyg->textarea('contenido');
	?>
	</fieldset>
<?php echo $this->Html->link('Cancelar', array('action' => 'ver', $this->data['Sesion']['id']), array('class'=>'btn btn-danger btn-large')); ?> | <?php echo $this->Form->end('Enviar'); ?>
</div>
</div>

