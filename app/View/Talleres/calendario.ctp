<?php
echo  $this->Html->script('fullcalendar.min');
echo  $this->Html->css('fullcalendar');
echo  $this->Html->css('fullcalendar.print');
echo $this->Html->script('activar.top.menu.jquery');
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
<script type='text/javascript'>
$(document).ready(function() {
	//activacion del top menu
	$("#BotonCalendario").activarTopMenu();
	//calendario
	$('#calendar').fullCalendar({
		header: {
		left: 'prev,next today',
		center: 'title',
		right: 'month,agendaWeek,agendaDay'
	},
	monthNames: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agusto","Septiembrw","Octubre","Noviembre","Diciembre"],
	dayNamesShort:["Dom","Lun","Mar","Mie","Jue","Vie","Sab"],
	editable: true,
	events: [
		<?php echo $out; ?>
	]
	});
});
</script>
<style type="text/css" media="all">
.calendario-wrapper{
	padding: 10px;
}
</style>
<h2>Calendario de actividades del ADSL.</h2>
<div class="calendario-wrapper">
	<div id='calendar'></div>
<pre><?php
echo $out;
?></pre>
</div>
