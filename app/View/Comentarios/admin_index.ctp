<div class="comentarios index">
	<h2><?php echo __('Comentarios');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('message');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th><?php echo $this->Paginator->sort('lft');?></th>
			<th><?php echo $this->Paginator->sort('rght');?></th>
			<th class="acciones">Acciones</th>
	</tr>
	<?php
	foreach ($comentarios as $comentario): ?>
	<tr>
		<td><?php echo h($comentario['Comentario']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($comentario['User']['username'], array('controller' => 'users', 'action' => 'ver', $comentario['User']['id'])); ?>
		</td>
		<td><?php echo h($comentario['Comentario']['url']); ?>&nbsp;</td>
		<td><?php echo h($comentario['Comentario']['message']); ?>&nbsp;</td>
		<td><?php echo h($comentario['Comentario']['modified']); ?>&nbsp;</td>
		<td><?php echo h($comentario['Comentario']['created']); ?>&nbsp;</td>
		<td><?php echo h($comentario['Comentario']['parent_id']); ?>&nbsp;</td>
		<td><?php echo h($comentario['Comentario']['lft']); ?>&nbsp;</td>
		<td><?php echo h($comentario['Comentario']['rght']); ?>&nbsp;</td>
		<td class="acciones">
			<?php echo $this->Html->link('Ver', array('action' => 'ver', $comentario['Comentario']['id'])); ?>
			<?php echo $this->Html->link('Editar', array('action' => 'editar', $comentario['Comentario']['id'])); ?>
			<?php echo $this->Form->postLink('Borrar', array('action' => 'borrar', $comentario['Comentario']['id']), null, __('Esta seguro que desea borrar: # %s?', $comentario['Comentario']['id'])); ?>
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
		<li><?php echo $this->Html->link('Agregar Comentario', array('action' => 'agregar')); ?></li>
		<li><?php echo $this->Html->link('Listar Users', array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar User', array('controller' => 'users', 'action' => 'agregar')); ?> </li>
	</ul>
</div>
