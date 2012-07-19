<?php
$this->set('title_for_layout', 'ADSL - Lista de usuarios');
$this->Html->meta('description', 'Lista de los usuarios registrados', array('inline' => false));
#Sección Javascript
$this->Html->script('activar.top.menu.jquery', array('inline' => false));
?>
<script language="Javascript"  type="text/javascript">$(function() {$("#BotonUsuarios").activarTopMenu();});</script>

<style type="text/css" media="all">
div.avatar{
	padding:4px 5px 0 4px;
	margin-right:0;
}
</style>
<div class="users index">
	<h1>Lista de usuarios</h1>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th> </th>
			<th><?php echo $this->Paginator->sort('username');?></th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr itemscope itemtype="http://data-vocabulary.org/Person">
		<td><?php echo $this->Html->gravatar_link($user['User']['email'], $user['User']['username']); ?></td>
		<td><?php echo $this->Html->link(
						h($user['User']['username']),
						array('action' => 'ver', $user['User']['username']),
						array('title' => 'ver Perfil')
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
