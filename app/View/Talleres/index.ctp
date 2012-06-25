<?php
	echo $this->Html->script('activar.top.menu.jquery');
	$this->set('title_for_layout', 'ADSL - Listado de talleres disponibles '.date('Y-m') );
	$this->Html->meta('description', 'Listado de talleres disponibles '.date('Y-m'), array('inline' => false));
	
?>
<script language="Javascript"  type="text/javascript">$(function() {$("#BotonTalleres").activarTopMenu();});</script>
<div class="talleres index">
	<h2><?php echo __('Talleres');?></h2>
	<?php
	foreach ($talleres as $taller): ?>
	<h2><?php echo h($taller['Taller']['nombre']); ?>&nbsp;</h2>
	<dl>
		<dt>Imparte:</dt>
		<dd><?php echo $taller['User']['username']; ?>&nbsp;</dd>
		<dt>Horario:</dt>
		<dd><?php echo h($taller['Taller']['horario']); ?>&nbsp;</dd>
		<dt>Fecha de inicio:</dt>
		<dd><?php echo h($taller['Taller']['fecha_inicio']); ?>&nbsp;</dd>
		<dt>Fecha Final:</dt>
		<dd><?php echo h($taller['Taller']['fecha_final']); ?>&nbsp;</dd>
		<dt>Número de Horas:</dt>
		<dd><?php echo h($taller['Taller']['numero_total_horas']); ?>&nbsp;</dd>
		<dt>Estado actual:</dt>
		<dd><?php echo h($taller['Taller']['status']); ?>&nbsp;</dd>
	</dl><br />
	<p><?php echo h($taller['Taller']['resumen']); ?>&nbsp;</p>
	<?php echo $this->Html->link('Ver más',
	array('action' => 'ver', $taller['Taller']['slug_dst']),
	array('class' => 'boton_naranja')
	); ?>
	<br /><br />
<?php endforeach; ?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => 'Página %page% de %pages%, viendo %current% registros de un total %count%, iniciando en %start% acabando en %end%'
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< Anterior', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next('Siguiente >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="acciones">
	<h3>Acciones</h3>
	<ul>
		<?php
			if( $this->Session->read('Auth.User.role') == 'miembro' ||  $this->Session->read('Auth.User.role') == 'admin' ):
		?>
		<li><?php echo $this->Html->link('Agregar Taller', array('action' => 'agregar', 'admin'=> true)); ?></li>
		<?php endif; ?>
		<!--
		<li><?php /*echo $this->Html->link('Listar Etiquetas', array('controller' => 'etiquetas', 'action' => 'index'));*/ ?> </li>
		<li><?php /*echo $this->Html->link('Agregar Etiqueta', array('controller' => 'etiquetas', 'action' => 'agregar'));*/ ?> </li>
		-->
	</ul>
</div>
