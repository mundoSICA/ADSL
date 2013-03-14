<?php
### Sección Metadatos
$title = 'ADSL  - perfil '.h($user['User']['username']);
$msg = 'ADSL Perfil del usuario '.h($user['User']['username']);

$this->set('title_for_layout', $title);
$this->Html->meta('description', $msg, array('inline' => false));
### Sección CSS
$this->Html->css('users.ver','stylesheet', array('inline' => false ) );
### Sección Scripts
$this->Html->script(array(
							'jquery.prettydate-es',
							'jquery.prettydate',
							'jquery.prettydate.ADSL',
				), array('inline' => false));
# Implementación de la API de twitter para microdatos
# https://dev.twitter.com/docs/cards
#
$this->Html->meta(array('name' => 'twitter:card', 'content' => 'summary'),null , array('inline' => false) );
$this->Html->meta(array('name' => 'twitter:site', 'content' => '@academiadsl'), null , array('inline' => false) );

$this->Html->meta(array('property' => 'og:url', 'content' => Router::url('/users/ver/' . $user['User']['username'], true)), null , array('inline' => false) );
$this->Html->meta(array('property' => 'og:title', 'content' => htmlentities($title)), null , array('inline' => false) );
$this->Html->meta(array('property' => 'og:description', 'content' =>
str_replace( array("\n", "\r"), ' ',htmlspecialchars($msg) )

), null , array('inline' => false) );

$this->Html->meta(array('name' => 'og:image', 'content' => Router::url('/img/users/' . $user['User']['username'] . '/avatar.jpg', true)), null , array('inline' => false) );

?>
<div class="users ver">
<?php
	echo $this->Html->avatar($user['User']['username']);
?>
<div class='datos_usuario' itemscope itemtype="http://schema.org/Person">
	<h1>
	<?php echo $this->Html->link(
						h('@'.$user['User']['username']),
						array('action' => 'ver', $user['User']['username']),
						array('title' => 'Perfil de '.$user['User']['username'], 'itemprop' => 'url name')
			); ?></h1>
	<dl>
		<dt>Role</dt>
		<dd><?php echo h($user['User']['role']); ?>&nbsp;</dd>
		<dt>Nickname</dt>
		<dd><?php echo h($user['User']['username']); ?>&nbsp;</dd>
		<dt>Inscrito desde</dt>
		<dd>
			<time class='timestamp prettyDate' datetime="<?php
			echo $user['User']['created']; ?>"><?php
			echo $user['User']['created'];
			?></time></dd>

		<?php if( !empty($user['User']['twitter']) ): ?>
		<dt>Twitter</dt>
		<dd><?php
		echo $this->Html->link('http://twitter.com/'.$user['User']['twitter'], 'http://twitter.com/'.$user['User']['twitter'], array('title' => 'Seguir por twitter','itemprop' => 'url'));
		?>&nbsp;</dd>
		<?php endif; ?>
		<?php if( !empty($user['User']['facebook']) ): ?>
		<dt>FaceBook</dt>
		<dd><?php echo
			$this->Html->link($user['User']['facebook'], $user['User']['facebook'], array('title' => 'Contactar por FaceBook','itemprop' => 'url'));
			?>&nbsp;</dd>
		<?php endif; ?>
		<?php if( !empty($user['User']['url']) ): ?>
		<dt>Sitio</dt>
		<dd><?php echo $this->Html->link($user['User']['url'], $user['User']['url'], array('title' => 'Visitar Página personal','itemprop' => 'url'));?>&nbsp;</dd>
		<?php endif; ?>
		<?php if( $user['User']['email_publico'] == 1 ): ?>
		<dt><?php echo __('Email'); ?></dt>
		<dd itemprop="contact"><?php
			echo $this->Html->link($user['User']['email'], 'mailto:'.$user['User']['email']);
		?>&nbsp;</dd>
		<?php endif; ?>
	</dl>
<?php
if( !empty($user['Taller'])):
?>
	<h2>Talleres impartidos</h2>
	<table>
		<thead>
			<tr>
				<th>Taller</th>
				<th>Fecha Inicio</th>
			</tr>
		</thead>
		<tbody>
<?php
foreach ($user['Taller'] as $t): ?>
			<tr>
				<td><?php echo $this->Html->link($t['nombre'],array('controller'=>'talleres','action'=>'ver',$t['slug_dst']) ); ?></td>
				<td><?php echo $t['fecha_inicio']; ?></td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>
<?php if (!empty($user['Curso'])):?>
<h2>Talleres en donde estoy inscrito</h2>
<table cellpadding = "0" cellspacing = "0">
<tr>
	<th><?php echo __('Taller'); ?></th>
	<th><?php echo __('Horario'); ?></th>
</tr>
<?php
	$i = 0;
	foreach ($user['Curso'] as $curso): ?>
	<tr itemprop="affiliation">
		<td><?php
			echo $this->Html->link($curso['nombre'],
			array('controller' => 'talleres', 'action' => 'ver', $curso['slug_dst'])
			);?>
		</td>
		<td><?php echo $curso['horario'];?></td>
	</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
</div><!-- en datos usuarios -->
</div>
<div class="acciones">
	<h3>Acciones</h3>
	<ul>
		<li><?php echo $this->Html->link('Listar usaurios', array('action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3>Noticias Relacionados</h3>
	<?php if (!empty($user['Noticia'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Slug Dst'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th class="acciones">Acciones</th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Noticia'] as $noticia): ?>
		<tr>
			<td><?php echo $noticia['id'];?></td>
			<td><?php echo $noticia['user_id'];?></td>
			<td><?php echo $noticia['nombre'];?></td>
			<td><?php echo $noticia['slug_dst'];?></td>
			<td><?php echo $noticia['created'];?></td>
			<td><?php echo $noticia['modified'];?></td>
			<td><?php echo $noticia['content'];?></td>
			<td class="acciones">
				<?php echo $this->Html->link('Ver', array('controller' => 'noticias', 'action' => 'ver', $noticia['id'])); ?>
				<?php echo $this->Html->link('Editar', array('controller' => 'noticias', 'action' => 'editar', $noticia['id'])); ?>
				<?php echo $this->Form->postLink('Borrar', array('controller' => 'noticias', 'action' => 'borrar', $noticia['id']), null, __('Esta seguro que desea borrar: # %s?', $noticia['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
