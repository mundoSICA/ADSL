<?php
/**
 * adsl.org.mx
 * Vista:  Users Index
 */
$this->set('title_for_layout', 'ADSL - Lista de miembros en el ADSL');
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
		<li><?php
		echo $this->QrCode->url(
			'/usuarios/', array('size' => '170x170', 'margin' => 0)
		);
		?></li>
	</ul>
</div>

<div class="users index span9">
	<div class="page-header"><h1>Lista de miembros</h1></div>
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
	'format' => 'Página %page% de %pages%, viendo %current% usuarios de un total %count%, iniciando en %start% acabando en %end%'
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
</div>
