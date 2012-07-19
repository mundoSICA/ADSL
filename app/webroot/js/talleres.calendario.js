$(function() {
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
		events: []
	});
});
