<div class="talleres index">
	<h2><?php echo __('Talleres');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('slug_dst');?></th>
			<th><?php echo $this->Paginator->sort('horario');?></th>
			<th><?php echo $this->Paginator->sort('fecha_inicio');?></th>
			<th><?php echo $this->Paginator->sort('fecha_final');?></th>
			<th><?php echo $this->Paginator->sort('costo');?></th>
			<th><?php echo $this->Paginator->sort('resumen');?></th>
			<th><?php echo $this->Paginator->sort('contenido');?></th>
			<th><?php echo $this->Paginator->sort('numero_total_horas');?></th>
			<th><?php echo $this->Paginator->sort('big_slide');?></th>
			<th><?php echo $this->Paginator->sort('slide');?></th>
			<th class="acciones">Acciones</th>
	</tr>
	<?php
	foreach ($talleres as $taller): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($taller['User']['username'], array('controller' => 'users', 'action' => 'ver', $taller['User']['id'])); ?>
		</td>
		<td><?php echo h($taller['Taller']['id']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['slug_dst']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['horario']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['fecha_inicio']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['fecha_final']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['costo']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['resumen']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['contenido']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['numero_total_horas']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['big_slide']); ?>&nbsp;</td>
		<td><?php echo h($taller['Taller']['slide']); ?>&nbsp;</td>
		<td class="acciones">
			<?php echo $this->Html->link('Ver', array('action' => 'ver', $taller['Taller']['id'])); ?>
			<?php echo $this->Html->link('Editar', array('action' => 'editar', $taller['Taller']['id'])); ?>
			<?php echo $this->Form->postLink('Borrar', array('action' => 'borrar', $taller['Taller']['id']), null, __('Esta seguro que desea borrar: # %s?', $taller['Taller']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
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
		<li><?php echo $this->Html->link('Agregar Taller', array('action' => 'agregar', 'admin'=> true)); ?></li>
		<li><?php echo $this->Html->link('Listar Etiquetas', array('controller' => 'etiquetas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Etiqueta', array('controller' => 'etiquetas', 'action' => 'agregar')); ?> </li>
	</ul>
</div>
