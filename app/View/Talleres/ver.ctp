<?php
### Metadatos
$this->set('title_for_layout', 'ADSL Taller -  '.h($taller['Taller']['nombre']));
$this->Html->meta('description', h($taller['Taller']['resumen']), array('inline' => false));
### Seccion CSS
$this->Html->css('slide','stylesheet', array('inline' => false ) );
### Sección Scripts
$this->Html->script(array(
							'slides.min.jquery',
							'talleres.slides',
				), array('inline' => false));
?>
<div itemscope itemtype="http://data-vocabulary.org/Event">
<div class="header2">
<div id="slide_principal_talleres">
			<img src="../../img/liston_talleres_slide.png" width="150" height="150" alt="Liston Talleres" id="liston_talleres_slide" />
			<div id="slide_talleres">
				<div class="slides_container">
					<div class="slide">
						<?php
						echo $this->Html->link(
								$this->Html->image('talleres/'.$taller['Taller']['slug_dst'].'.jpg',
								array(
									'itemprop'=>'photo',
									'alt' => $taller['Taller']['nombre']
								)),
								array('controller' => 'talleres', 'action' => 'ver', 'admin' => false, $taller['Taller']['slug_dst']),
								array('escape' => false)
							);
						?>
						<h2 class="slide_taller_titulo"><?php echo $taller['Taller']['nombre']; ?>&nbsp;</h2>
						<div class="slide_info_taller">
							<span class="slide_horario"><strong>Horario: </strong>
								<?php echo $taller['Taller']['horario']; ?>&nbsp;
							</span>
							<span class="slide_horas"><strong>Número de horas: </strong><?php echo $taller['Taller']['numero_total_horas']; ?>&nbsp;</span>
							<span class="inicio"><strong>inicia: </strong><?php echo $taller['Taller']['fecha_inicio']; ?>&nbsp;</span>
							<span class="fin"><strong>concluye: </strong><?php echo $taller['Taller']['fecha_final']; ?>&nbsp;</span>
						</div>
					</div>
				</div>
				<a href="#" class="prev" title='Previo'></a> <a href="#" class="next" title='Siguiente'></a>
			</div>
		</div>
</div>
<div class="talleres ver">
<h1 itemprop="summary"><?php
echo $this->Html->link( $taller['Taller']['nombre'],
		array('controller'=>'talleres','action'=>'ver',$taller['Taller']['slug_dst']),
		array('itemprop' => 'url'));
?></h1>
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

if($boton_taller){
		echo $this->Html->link('Inscribirme',
				array('controller'=>'users','action' => 'inscribirme', $taller['Taller']['slug_dst']),
				array('class'=>'registrarme')
			);
	} else {
		echo '<div class="alert alert-error">
		<strong>Para registrarse:</strong> Es necesario estar registrado y estar identificado
		<a class="close" data-dismiss="alert">&times;</a>
		<br clear="all"><br clear="all">';
		echo $this->Html->link('Registrame ',
				array('controller' => 'users', 'action'=>'registro'),
				array('class'=>'registrarme')
			). '  | '.
			$this->Html->link('Identicarme ',
				array('controller'=>'users', 'action' => 'users', 'login'),
				array('class'=>'identificarme')
			).'<br clear="all"><br clear="all"></div>';
}

echo $HTML_usuarios_registrados;

?>
<!-- -->
</div>
</div><!-- fin del evento -->
<div class="acciones">
	<h3>Acciones</h3>
	<ul>
		<?php
		if( $this->Session->read('Auth.User.role') == 'miembro' ||  $this->Session->read('Auth.User.role') == 'admin' ):
		?>
		<li><?php echo $this->Html->link('Editar Taller', array('action' => 'editar', $taller['Taller']['slug_dst'], 'admin'=>true)); ?> </li>
		<li><?php echo $this->Html->link('Agregar Taller', array('action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Post', array('controller' => 'posts', 'action' => 'agregar')); ?> </li>
		<li><?php echo $this->Html->link('Agregar Etiqueta', array('controller' => 'etiquetas', 'action' => 'agregar')); ?> </li>
		<? endif; ?>
		<?php
			if($this->Session->read('Auth.User.role') == 'admin' ):
		?>
		<li><?php echo $this->Form->postLink('Borrar Taller', array('action' => 'borrar', $taller['Taller']['id']), null, __('Esta seguro que desea borrar: # %s?', $taller['Taller']['id'])); ?> </li>
		<?php endif; ?>
		<li><?php echo $this->Html->link('Listar Talleres', array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('Listar Users', array('controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
	<h3>Compartir</h3>
	<?php
		echo $this->QrCode->url(
			'/talleres/ver' . $taller['Taller']['slug_dst'], array('size' => '170x170', 'margin' => 0)
		);
	?>
</div>
<div class="related">
	<h3>Posts Relacionados</h3>
	<?php if (!empty($taller['Post'])):?>
	<table cellpadding = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Slug Dst'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Taller Id'); ?></th>
		<th class="acciones">Acciones</th>
	</tr>
	<?php
		$i = 0;
		foreach ($taller['Post'] as $post): ?>
		<tr>
			<td><?php echo $post['id'];?></td>
			<td><?php echo $post['nombre'];?></td>
			<td><?php echo $post['slug_dst'];?></td>
			<td><?php echo $post['created'];?></td>
			<td><?php echo $post['modified'];?></td>
			<td><?php echo $post['content'];?></td>
			<td><?php echo $post['taller_id'];?></td>
			<td class="acciones">
				<?php echo $this->Html->link('Ver', array('controller' => 'posts', 'action' => 'ver', $post['id'])); ?>
				<?php echo $this->Html->link('Editar', array('controller' => 'posts', 'action' => 'editar', $post['id'])); ?>
				<?php echo $this->Form->postLink('Borrar', array('controller' => 'posts', 'action' => 'borrar', $post['id']), null, __('Esta seguro que desea borrar: # %s?', $post['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
	<div class="acciones">
		<ul>
			<li><?php echo $this->Html->link('Agregar Post', array('controller' => 'posts', 'action' => 'agregar'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3>Etiquetas Relacionados</h3>
	<?php if (!empty($taller['Etiqueta'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Slug Dst'); ?></th>
		<th class="acciones">Acciones</th>
	</tr>
	<?php
		$i = 0;
		foreach ($taller['Etiqueta'] as $etiqueta): ?>
		<tr>
			<td><?php echo $etiqueta['id'];?></td>
			<td><?php echo $etiqueta['nombre'];?></td>
			<td><?php echo $etiqueta['slug_dst'];?></td>
			<td class="acciones">
				<?php echo $this->Html->link('Ver', array('controller' => 'etiquetas', 'action' => 'ver', $etiqueta['id'])); ?>
				<?php echo $this->Html->link('Editar', array('controller' => 'etiquetas', 'action' => 'editar', $etiqueta['id'])); ?>
				<?php echo $this->Form->postLink('Borrar', array('controller' => 'etiquetas', 'action' => 'borrar', $etiqueta['id']), null, __('Esta seguro que desea borrar: # %s?', $etiqueta['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
	<div class="acciones">
		<ul>
			<li><?php echo $this->Html->link('Agregar Etiqueta', array('controller' => 'etiquetas', 'action' => 'agregar'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<div class="acciones">
		<ul>
			<li><?php echo $this->Html->link('Agregar User', array('controller' => 'users', 'action' => 'agregar'));?> </li>
		</ul>
	</div>
</div>
