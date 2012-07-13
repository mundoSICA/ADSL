<?php
echo  $this->Html->script('fullcalendar.min');
echo  $this->Html->css('fullcalendar');
echo  $this->Html->css('fullcalendar.print');
echo $this->Html->script('activar.top.menu.jquery');
$this->set('title_for_layout', 'ADSL - Calendario de talleres disponibles '.date('Y-m') );
$this->Html->meta('description', 'Calendario de talleres disponibles '.date('Y-m'), array('inline' => false));

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
<script type='text/javascript'>$(document).ready(function() {
	var script = $('<script/>').attr('src', '<?php echo Router::url('/js/talleres/') ?>calendario.js').appendTo('head');
});</script>

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
