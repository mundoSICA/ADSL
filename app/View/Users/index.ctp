<?php
	echo $this->Html->script('activar.top.menu.jquery');
?>
<script language="Javascript"  type="text/javascript">$(function() {$("#BotonUsuarios").activarTopMenu();});</script>

<style type="text/css" media="all">
div.avatar{
	padding:4px 5px 0 4px;
	margin-right:0;
}
</style>
<div class="users index">
	<h2>Lista de usuarios</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th> </th>
			<th><?php echo $this->Paginator->sort('role');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo $this->Html->gravatar_img($user['User']['email'], 50); ?></td>
		<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(h($user['User']['username']),
											array('action' => 'ver', $user['User']['username'])
							); ?>&nbsp;</td>
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
	<?php echo $this->Form->create('User');?>
	<ul>
		<li>
			<?php
				echo $this->Form->input('Buscar_usuario', array('value'=>'nick usuario'));
				echo $this->Form->end('Buscar');
			?>
		</li>
	</ul>
</div>
