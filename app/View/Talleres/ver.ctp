<?php
/**
 * adsl.org.mx
 * Vista:  Talleres Ver
 */

#sección metaDatos
$this->set('title_for_layout', 'ADSL Taller -  '.h($taller['Taller']['nombre']));
$this->Html->meta('description', h($taller['Taller']['resumen']), array('inline' => false));


# Implementación de la API de twitter para microdatos
# https://dev.twitter.com/docs/cards
#
$this->Html->meta(array('name' => 'twitter:card', 'content' => 'summary'),null , array('inline' => false) );
$this->Html->meta(array('name' => 'twitter:site', 'content' => '@academiadsl'), null , array('inline' => false) );
#$this->Html->meta(array('name' => 'twitter:creator', 'content' => '@twitter-tallerista'), null , array('inline' => false) );
$this->Html->meta(array('name' => 'twitter:url', 'content' => Router::url('/talleres/ver/' . $taller['Taller']['slug_dst'], true)), null , array('inline' => false) );
$this->Html->meta(array('name' => 'twitter:title', 'content' => htmlentities($taller['Taller']['nombre'])), null , array('inline' => false) );
$this->Html->meta(array('name' => 'twitter:description', 'content' => htmlentities($taller['Taller']['contenido'])), null , array('inline' => false) );
$this->Html->meta(array('name' => 'twitter:image', 'content' => Router::url('/img/talleres/'.$taller['Taller']['slug_dst'].'.jpg')), null , array('inline' => false) );

### Seccion CSS
$this->Html->css(
						array('talleres.ver'),
						'stylesheet',
						array('inline' => false )
					);
#sección Javascript
#$this->Html->script(array(
#							'slides.min.jquery',
#							'talleres.slides',
#				), array('inline' => false));
?>
<div class="row-fluid">
	<div class="actions span3 well sidebar-nav">
	<h3>Acciones</h3>
	<ul class="nav nav-list">
	<li class='nav-header'><i class="icon-folder-open"></i> Talleres</li>
		<li><?php
		echo $this->Html->link(
			'<i class="icon-home"></i> Inicio Talleres',
			array('action' => 'index'),
			array('escape' => false)
		); ?>
		</li>
<?php
if( $this->Session->read('Auth.User.role') == 'miembro' ||  $this->Session->read('Auth.User.role') == 'admin' ):
?>
		<li><?php
		echo $this->Html->link(
			'<i class="icon-pencil"></i> Editar Taller',
			array('action' => 'editar', $taller['Taller']['id']),
			array('escape' => false)
		); ?>
		</li>
		<li><?php
		echo $this->Html->link(
			'<i class="icon-plus"></i> Agregar Taller',
			array('action' => 'Agregar'),
			array('escape' => false)
		); ?>
		</li>
<?php endif; ?>
		<li class='divider'></li>
		<li class='nav-header'><i class='icon-th-list'></i> Sesiones</li>
<?php 
foreach ($taller['Sesion'] as $sesion){
	echo '<li>'.
			$this->Html->link(
			'<i class="icon-ok"></i>'.
				str_replace($taller['Taller']['slug_dst'],'',$sesion['nombre']),
				array('controller' => 'sesiones', 'action' => 'ver', $sesion['slug_dst']),
				array('escape' => false)
			).'</li>';
			;
}
?>
<?php
if( $this->Session->read('Auth.User.role') == 'miembro' ||  $this->Session->read('Auth.User.role') == 'admin' ):
?>
		<li><?php
			echo $this->Html->link(
			'<i class="icon-plus"></i> Agregar Sesion',
			array('controller' => 'sesiones', 'action' => 'agregar','miembro'=>true,$taller['Taller']['slug_dst']),
			array('escape' => false)
		);
		?> </li>
<?php
endif;
?>
		<li class='divider'></li>
		<li class='nav-header'><i class='icon-tags'></i> Etiquetas</li>
		<li><?php
			echo $this->Html->link(
			'<i class="icon-list"></i> Listar Etiquetas',
			array('controller' => 'etiquetas', 'action' => 'index'),
			array('escape' => false)
		);
		?> </li>

<?php
if( $this->Session->read('Auth.User.role') == 'miembro' ||  $this->Session->read('Auth.User.role') == 'admin' ):
?>
		<li><?php
			echo $this->Html->link(
			'<i class="icon-plus"></i> Agregar Etiqueta',
			array('controller' => 'etiquetas', 'action' => 'agregar'),
			array('escape' => false)
		);
		?> </li>
<?php endif; ?>
	</ul>
</div>

<div class="talleres view span9" itemscope itemtype="http://data-vocabulary.org/Event">
<div class="page-header">
	<h1 itemprop="summary"><?php echo h($taller['Taller']['nombre']); ?></h1>
</div>
<?php
echo $this->Html->image('talleres/'.$taller['Taller']['slug_dst'].'.jpg',
								array(
									'itemprop'=>'photo',
									'alt' => $taller['Taller']['nombre'],
									'class' => 'img-polaroid img-rounded'
								));
?>
	<dl>
		<dt itemprop="author"itemscope itemtype="http://data-vocabulary.org/Person">
			<span itemprop="role">Tallerista</span>
		</dt>
		<dd><?php
		echo $this->Html->link(
			'<span itemprop="nickname" >'. $taller['User']['username'] . '</span>',
			array('controller' => 'users', 'action' => 'ver', $taller['User']['username']),
			array('escape' => false, 'itemprop' => 'url')
		); ?></dd>
		
		<dt><?php echo __('Horario'); ?></dt>
		<dd>
			<?php echo h($taller['Taller']['horario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Inicio'); ?></dt>
		<dd itemprop="startDate" datetime="<?php echo h($taller['Taller']['fecha_inicio']); ?>T06:00-08:00"><?php echo h($taller['Taller']['fecha_inicio']); ?></dd>
		<dt><?php echo __('Fecha Final'); ?></dt>
		<dd itemprop="endDate" datetime="<?php echo h($taller['Taller']['fecha_final']); ?>T06:00-08:00"><?php echo h($taller['Taller']['fecha_final']); ?></dd>
		
		<dt><?php echo __('Costo'); ?></dt>
		<dd itemprop='tickets'><?php echo '$'.number_format($taller['Taller']['costo'],2); ?></dd>
		
		<dt><?php echo __('Numero Total Horas'); ?></dt>
		<dd>
			<?php echo number_format($taller['Taller']['numero_total_horas'],0); ?>hrs
		</dd>
		
		<dt>Estado actual</dt>
		<dd>
			<?php echo $taller['Taller']['status']; ?>&nbsp;
		</dd>
		
	</dl>
	<div>
		<h2>Requisitos</h2>
		<?php echo $taller['Taller']['requisitos']; ?>
	</div>

	<h2>Resumen</h2>
	<p>
		<?php echo $taller['Taller']['resumen']; ?>
	</p>

	<h2>Descripción detallada</h2>
	<p itemprop="description"><?php echo $taller['Taller']['contenido']; ?></p>
	<!-- -->
	<h2>Alumnos inscritos en el taller</h2>
<?php
$boton_taller = false;

if($this->Session->read('Auth.User.username') && $taller['Taller']['status'] == 'abierto' ){
	$boton_taller = true;
}

$user_auth = $this->Session->read('Auth.User.username');
?>

<div class="related">
	<h3>Etiquetas</h3>
	<?php if (!empty($taller['Etiqueta'])): ?>
	<table class="table table-bordered table-striped">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Slug Dst'); ?></th>
		<th class="actions">Acciones</th>
	</tr>
	<?php
		$i = 0;
		foreach ($taller['Etiqueta'] as $etiqueta): ?>
		<tr>
			<td><?php echo $etiqueta['id']; ?></td>
			<td><?php echo $etiqueta['nombre']; ?></td>
			<td><?php echo $etiqueta['slug_dst']; ?></td>
			<td class="actions">			<div class="btn-group">
	<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li>
		<?php 
		echo $this->Html->link(
			'<i class="icon-eye-open"></i> Ver',
			array('controller' => 'etiquetas', 'action' => 'ver', $etiqueta['id']),
			array('escape' => false)
		); ?>
		</li>
		<li>
		<?php 
		echo $this->Html->link(
			'<i class="icon-pencil"></i> Editar',
			array('controller' => 'etiquetas', 'action' => 'editar', $etiqueta['id']),
			array('escape' => false)
		); ?>
		</li>
		<li>
		<?php 
		echo $this->Form->postLink(
			'<i class="icon-trash"></i> Borrar',
			array('controller' => 'etiquetas', 'action' => 'borrar', $etiqueta['id']),
			array('escape' => false),
			"Estas seguro de borrar el registro # {$etiqueta['id']}?"
		); ?>
		</li>
	</ul>
	</div>
	</td>
</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

<div class="related">
	<?php if (!empty($taller['Alumnos'])): ?>
	<h3>Alumnos inscritos en el taller</h3>
<?php
$boton_taller = false;
if($this->Session->read('Auth.User.username') && $taller['Taller']['status'] == 'abierto' ){
	$boton_taller = true;
}
$user_auth = $this->Session->read('Auth.User.username');
$HTML_usuarios_registrados = '';
if (!empty($taller['User'])):
$HTML_usuarios_registrados = '<table cellpadding = "0">
<tr>
		<th>Alumno</th>
		<th>Nick</th>
		<th>role</th>
	</tr>
';

		$i = 0;
		foreach ($taller['Alumnos'] as $user) {
			if($boton_taller && $user_auth == $user['username']){
						$boton_taller = false;
					}
			$HTML_usuarios_registrados .= '<tr itemscope itemtype="http://data-vocabulary.org/Person">';
			$HTML_usuarios_registrados .= '<td>'.
					$this->Html->avatar_link(
								$user['username']
					).'</td>'.
					'<td>'.$user['username'] . '</td>'.
					'<td itemprop="role">Alumno</td>'.
				'</tr>';
		}
	$HTML_usuarios_registrados .= '</table>';
endif;

echo '<div class="alert alert-error">
		<a class="close" data-dismiss="alert">&times;</a>
		';
if($boton_taller){
		echo '<strong>Inscrebete:</strong> aparta tu lugar:<br clear="all"><br clear="all">'.
			$this->Html->link('Inscribirme',
				array('controller'=>'talleres','action' => 'inscribirme', $taller['Taller']['slug_dst']),
				array('class'=>'registrarme')
			);
} elseif( $taller['Taller']['status'] == 'abierto' && !$this->Session->read('Auth.User.username')){
		echo '<strong>Para registrarse:</strong> Es necesario estar registrado y '.
				'estar identificado<br clear="all"><br clear="all">'.
				$this->Html->link('Registrame ',
					array('controller' => 'users', 'action'=>'registro'),
					array('class'=>'registrarme')
				). '  | '.
				$this->Html->link('Identicarme ',
					array('controller'=>'users', 'action' => 'login'),
					array('class'=>'identificarme')
			);
} else {
		echo 'Ya estas inscrito en este taller ó el taller esta cerrado';
}
echo '<br clear="all"><br clear="all"></div>';
echo $HTML_usuarios_registrados;

?>
<?php endif; ?>
</div>
</div>
