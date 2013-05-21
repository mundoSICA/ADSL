<?php
/**
 * adsl.org.mx
 * Vista:  Sesiones Ver
 */
#iniciando la autenticación
$this->Html->initAuth($userAuth);

#sección metaDatos
$this->set('title_for_layout', 'ADSL - '. $sesion['Sesion']['nombre']);
$this->Html->meta('description', $sesion['Sesion']['descripcion'], array('inline' => false));
$this->Html->meta('keywords', $sesion['Sesion']['keywords'], array('inline' => false));

$sesion['Sesion']['nombre'] = str_replace($sesion['Taller']['slug_dst']. ' _ ','', $sesion['Sesion']['nombre']);

#sección CSS
#$this->Html->css(array(
#						'sesiones.ver',
#						), 'stylesheet', array('inline' => false));

#sección Javascript
#$this->Html->script(array(
#											'sesiones.ver',
#											), array('inline' => false));
?>
<style type="text/css" media="all">

div.page-header h1 date{
	font-size: 0.4em;
	padding-left: 2em;
}
div.pagination{
	margin: 0 0 18px 0
}
</style>
<div class="row-fluid">
	<div class="actions span3 sidebar-nav">
	<?php
	echo $this->Html->menu_sesiones($sesion['Taller']['slug_dst'], $sesion['sesiones'], $sesion['Sesion']['slug_dst']);
	echo $this->Html->menu_navegacion_general();
	echo $this->Html->menu_talleres($sesion['Taller']);
	echo $this->Html->menu_usuario();
	?>
<!-- Compartir sección -->
	<ul class='nav nav-list well'>
			<li class='nav-header'>
				<i class="icon-share"></i> Compartir
			</li>
			<li class='divider'></li>
			<?php
		echo $this->QrCode->url(
			'/sessiones/ver/'.$sesion['Sesion']['slug_dst'], array('size' => '170x170', 'margin' => 0)
		);
		?>
	</ul>
</div>

<div class="sesiones view span9">
<div class="page-header">
	<h1><?php
	echo $this->Html->link($sesion['Taller']['nombre'], array('controller' => 'talleres', 'action' => 'ver', $sesion['Taller']['slug_dst']));
	?>
	<small><?php echo $sesion['Sesion']['nombre']; ?></small>
	</h1>
	<strong><i class='icon-calendar'> </i> Publicado: </strong>
	<date><?php echo h($sesion['Sesion']['fecha_publicacion']); ?></date>
</div>
<?php echo $sesion['Sesion']['contenido']; ?>

<!--     -->
<ul class="thumbnails bootstrap-examples">
	<li class="span4">
		<h4>Ultima Edición</h4>
		<p><?php echo h($sesion['Sesion']['modified']); ?></p>
		<h4>Fecha de creación</h4>
		<p><?php echo h($sesion['Sesion']['created']); ?></p>
	</li>
	<li class="span4">
		<h4>Calificación actual</h4>
		<p>
			<a href="/1" title='1 estrella'><i class="icon-star"></i></a>
			<a href="/1" title='2 estrella'><i class="icon-star"></i></a>
			<a href="/1" title='3 estrella'><i class="icon-star"></i></a>
			<a href="/1" title='4 estrella'><i class="icon-star"></i></a>
			<a href="/1" title='5 estrella'><i class="icon-star-empty"></i></a>
		</p>
		<h4>Califica esta sesión</h4>
		<p>
			<a href="/1" title='1 estrella'><i class="icon-star-empty"></i></a>
			<a href="/1" title='2 estrella'><i class="icon-star-empty"></i></a>
			<a href="/1" title='3 estrella'><i class="icon-star-empty"></i></a>
			<a href="/1" title='4 estrella'><i class="icon-star-empty"></i></a>
			<a href="/1" title='5 estrella'><i class="icon-star-empty"></i></a>
		</p>
	</li>

</ul>

<div class="pagination pagination-centered">
	<ul>
	<?php
	$pre = null;
	$next = null;
	$current = null;
	foreach ($sesion['sesiones'] as $index => $s) {
		//next
		if($current !== null && $next === null)
			$next = $index;
		//current
		if($s['slug_dst'] == $sesion['Sesion']['slug_dst'])
			$current = $index;
		//pre
		if($current === null)
			$pre = $index;
	}

/////////////////////////////////////////////////////////////////////////////////////////
	//preBoton
	if($pre !== null) {
		echo '<li>'.$this->Html->link(
				'« Anterior',
				array('action' => 'ver', $sesion['sesiones'][$pre]['slug_dst']),
				array('title' => $sesion['sesiones'][$pre]['nombre'])
			).'</li>';
	} else {
		echo '<li class="disabled"><a href="#">« Anterior</a></li>';
	}

	//current
	foreach ($sesion['sesiones'] as $index => $s) {
		if($index == $current){
			echo '<li class="disabled"><a href="#">'.($index+1).'</a></li>';
		} else {
			echo '<li>'.$this->Html->link(
					($index+1),
					array('action' => 'ver', $sesion['sesiones'][$index]['slug_dst']),
					array('title' => $sesion['sesiones'][$index]['nombre'])
				).'</li>';
		}
	}

	//nextBoton
	if($next !== null) {
		echo '<li>'.$this->Html->link(
				'Siguiente »',
				array('action' => 'ver', $sesion['sesiones'][$next]['slug_dst']),
				array('title' => $sesion['sesiones'][$next]['nombre'])
			).'</li>';
	} else {
		echo '<li class="disabled"><a href="#">Siguiente »</a></li>';
	}
	?>
	</ul>
</div>

</div>
