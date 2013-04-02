<?php
/**
 * adsl.org.mx
 * Vista:  Talleres Index
 */
#Metadatos
$this->set('title_for_layout', 'ADSL - Listado de nuestros talleres disponibles '.date('Y-m') );
$this->Html->meta('description', 'Listado de talleres disponibles '.date('Y-m'), array('inline' => false));
#sección CSS
#$this->Html->css(array(
#						'talleres.index',
#						), 'stylesheet', array('inline' => false));

#Sección Javascript
$this->Html->script(array(
											'activar.top.menu.jquery',
											'talleres',
											), array('inline' => false));

$img_ancla = $this->Html->image('ancla.svg', array('width'=>14, 'height'=>14, 'alt'=>'Enlace'));
?>
<div class="row-fluid">
	<div class="actions span3 sidebar-nav">
	<?php
	echo $this->Html->menu_navegacion_general();
	echo $this->Html->menu_talleres($userAuth['role']);
	echo $this->Html->menu_usuario($userAuth);
	?>
<!-- Compartir sección -->
	<ul class='nav nav-list well'>
			<li class='nav-header'>
				<i class="icon-share"></i> Compartir
			</li>
			<li class='divider'></li>
			<?php
		echo $this->QrCode->url(
			'/talleres/', array('size' => '170x170', 'margin' => 0)
		);
		?>
	</ul>
</div>

<div class="talleres index span9">
	<div class="page-header"><h1>Lista de talleres</h1></div>
	<?php
	foreach ($talleres as $taller): ?>
	<section itemscope itemtype="http://schema.org/EducationEvent" itemclass="EducationEvent">
	<h2 itemprop="name"><?php
	echo $img_ancla . ' ' .
	$this->Html->link($taller['Taller']['nombre'],
		array('action' => 'ver', $taller['Taller']['slug_dst']),
		array('itemprop' => 'url'));
	?></h2>
		<p><?php
						echo $this->Html->link(
									$this->Html->image(
										'talleres/'.$taller['Taller']['slug_dst'].'.jpg',
										array(
											'alt' => $taller['Taller']['nombre'],
											'itemprop' => 'image',
											'class' => 'img-polaroid img-rounded'
										)
								),
								array(	'controller' => 'talleres',
										'action' => 'ver',
										'admin' => false,
										$taller['Taller']['slug_dst']
									),
								array(	'escape' => false,
										'title' => $taller['Taller']['nombre']
									)
							);
	?>
	</p>
	<dl>
		<dt>Imparte:</dt>
		<dd itemprop="attendee" itemscope itemtype="http://schema.org/Person">
		<span itemprop="name"><?php
		echo $this->Html->link($taller['User']['username'],
		array('controller'=>'users','action' => 'ver', $taller['User']['username']),
		array('itemprop' => 'url')); ?>&nbsp;</span>
		</dd>
		<dt>Horario:</dt>
		<dd><?php echo h($taller['Taller']['horario']); ?>&nbsp;</dd>
		<dt>Fecha de inicio:</dt>
		<dd itemprop="startDate"><?php echo h($taller['Taller']['fecha_inicio']); ?>&nbsp;</dd>
		<dt>Fecha Final:</dt>
		<dd itemprop="endDate"><?php echo h($taller['Taller']['fecha_final']); ?>&nbsp;</dd>
		<dt>Número de Horas:</dt>
		<dd><?php echo h($taller['Taller']['numero_total_horas']); ?>&nbsp;
		</dd>
		<dt>Estado actual:</dt>
		<dd><?php echo h($taller['Taller']['status']); ?>&nbsp;</dd>
		<dt>No sesiones:</dt>
		<dd><?php echo h($taller['Taller']['num_sesiones']); ?>&nbsp;</dd>
	</dl><br />
	<meta itemprop="duration" content="PT<?php echo h($taller['Taller']['numero_total_horas']); ?>H">
	<p  itemprop="description"><?php echo h($taller['Taller']['resumen']); ?>&nbsp;</p>
	<?php echo $this->Html->link('Ver más',
	array('action' => 'ver', $taller['Taller']['slug_dst']),
	array('class' => 'boton_naranja')
	); ?>
	</section>
	<hr />
<?php endforeach; ?>
	<small class="pull-right">
	<?php
	echo $this->Paginator->counter(array(
	'format' => 'Página {:page} de {:pages}, viendo {:current} talleres de un total de {:count}, iniciando en el registro {:start}, cabando en {:end}'
	));
	?>
	</small>
<div class="paging">
	<?php
		echo $this->Paginator->prev('< Anterior', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next('Siguiente >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
</div>
