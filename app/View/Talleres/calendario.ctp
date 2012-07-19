<?php
#Metadatos
$this->set('title_for_layout', 'ADSL - Calendario de talleres disponibles '.date('Y-m') );
$this->Html->meta('description', 'Calendario de talleres disponibles '.date('Y-m'), array('inline' => false));
#Sección CSS
$this->Html->css('fullcalendar','stylesheet', array('inline' => false ) );
$this->Html->css('fullcalendar.print','stylesheet', array('inline' => false ) );
#Sección Javascript
$this->Html->script(array(
											'activar.top.menu.jquery',
											'fullcalendar.min',
											'activar.top.menu.jquery',
											'talleres.calendario',
											), array('inline' => false));

$out = '';
$url_base = Router::url('/talleres/ver/');

foreach ($talleres as $t) {
	$d = explode('-',$t['Taller']['fecha_inicio']);
	$out .= "{\n\t";
	$out .= "title: '".$t['Taller']['nombre']."',\n\t";
	$out .= "start: new Date(".$d[0].", ".($d[1]-1).", ".$d[2]."),\n\t";
	$out .= "url: '".$url_base. $t['Taller']['slug_dst']. "'\n";
	$out .= "},";
}//
?>
<style type="text/css" media="all">
.calendario-wrapper{
	padding: 10px;
}
</style>
<ul id='ListaTalleres'>
<?php
foreach ($talleres as $t):
?>
<li itemscope itemtype="http://data-vocabulary.org/Event">
	<?php
	echo $this->Html->link(
		'<span itemtype="summary">' . $t['Taller']['nombre'] . '</span>',
		array('controller' => 'talleres', 'action' => 'ver', 'admin' => false, $t['Taller']['slug_dst']),
		array('escape' => false,'itemprop' => 'url')
	)
	. ' - <span itemprop="startDate">' . $t['Taller']['fecha_inicio']. '</span>';
?>
</li>
<? endforeach; ?>
</ul>

<h1>Calendario de actividades del ADSL.</h1>
<div class="calendario-wrapper">
	<div id='calendar'></div>
</div>
