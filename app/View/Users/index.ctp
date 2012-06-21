<div class="users index">
	<h2><?php echo __('Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('role');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('password');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th class="acciones">Acciones</th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td class="acciones">
			<?php echo $this->Html->link('Ver', array('action' => 'ver', $user['User']['id'])); ?>
			<?php echo $this->Html->link('Editar', array('action' => 'editar', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink('Borrar', array('action' => 'borrar', $user['User']['id']), null, __('Esta seguro que desea borrar: # %s?', $user['User']['id'])); ?>
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
		<li><?php echo $this->Html->link('Listar Noticias', array('controller' => 'noticias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Noticia', array('controller' => 'noticias', 'action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Listar Talleres', array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Taller', array('controller' => 'talleres', 'action' => 'agregar')); ?> </li>
	</ul>
</div>
