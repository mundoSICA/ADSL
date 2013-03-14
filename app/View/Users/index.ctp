<?php
$this->set('title_for_layout', 'ADSL - Lista de usuarios');
$this->Html->meta('description', 'Lista de los usuarios registrados', array('inline' => false));
#Agregando css
$this->Html->css('users.index','stylesheet', array('inline' => false ) );
#Sección Javascript
$this->Html->script(array(
											'jquery.prettydate.js',
											'jquery.prettydate-es.js',
											'jquery.prettydate.ADSL.js',
											'activar.top.menu.jquery.js',
											'users',
											), array('inline' => false));
?>
<style type="text/css" media="all">
div.avatar{
	padding:4px 5px 0 4px;
	margin-right:0;
}
</style>
<div class="users index">
	<h1>Lista de Miembros</h1>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th> </th>
			<th><?php echo $this->Paginator->sort('username', 'Nick de usuario');?></th>
			<th><?php echo $this->Paginator->sort('created', 'Registrado desde');?></th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr itemscope itemtype="http://schema.org/Person">
		<td><?php echo $this->Html->avatar_link($user['User']['username']); ?></td>
		<td><?php echo $this->Html->link(
						h('@'.$user['User']['username']),
						array('action' => 'ver', $user['User']['username']),
						array('title' => 'ver Perfil', 'class' => 'btn btn-inverse btn-large', 'itemprop' => 'url name')
			); ?>&nbsp;</td>
			<td>
			<time class='timestamp prettyDate' datetime="<?php
			echo $user['User']['created']; ?>"><?php
			echo $user['User']['created'];
			?></time>
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
