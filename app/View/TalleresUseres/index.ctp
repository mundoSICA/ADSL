<div class="talleresUseres index">
	<h2><?php echo __('Talleres Useres');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('taller_id');?></th>
			<th><?php echo $this->Paginator->sort('descuento');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="acciones">Acciones</th>
	</tr>
	<?php
	foreach ($talleresUseres as $talleresUser): ?>
	<tr>
		<td><?php echo h($talleresUser['TalleresUser']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($talleresUser['User']['username'], array('controller' => 'users', 'action' => 'ver', $talleresUser['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($talleresUser['Taller']['nombre'], array('controller' => 'talleres', 'action' => 'ver', $talleresUser['Taller']['id'])); ?>
		</td>
		<td><?php echo h($talleresUser['TalleresUser']['descuento']); ?>&nbsp;</td>
		<td><?php echo h($talleresUser['TalleresUser']['created']); ?>&nbsp;</td>
		<td class="acciones">
			<?php echo $this->Html->link('Ver', array('action' => 'ver', $talleresUser['TalleresUser']['id'])); ?>
			<?php echo $this->Html->link('Editar', array('action' => 'editar', $talleresUser['TalleresUser']['id'])); ?>
			<?php echo $this->Form->postLink('Borrar', array('action' => 'borrar', $talleresUser['TalleresUser']['id']), null, __('Esta seguro que desea borrar: # %s?', $talleresUser['TalleresUser']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Talleres User'), array('action' => 'agregar')); ?></li>
		<li><?php echo $this->Html->link('Listar Users', array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar User', array('controller' => 'users', 'action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Listar Talleres', array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Taller', array('controller' => 'talleres', 'action' => 'agregar')); ?> </li>
	</ul>
</div>
