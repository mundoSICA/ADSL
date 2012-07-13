/* ADSL - Script principal
 * 
 * Descripcion: Aqui se agrupara la logica en javascript que comparten
 *              todas las páginas del sitio
 */
$(function(){
	//Agregando enlaces externos
	$('a[rel=external]').click(function() {
		window.open(this.href);
		return false;
	});
	//animacion sobre el buscador
	$('#buscador_input').val('Buscar en ADSL');
	$('#buscador_input').focus(function() {
		if($(this).val() == 'Buscar en ADSL')
			$('#buscador_input').val('');
	});
	$('#buscador_input').blur(function() {
		if($(this).val() == '')
			$('#buscador_input').val('Buscar en ADSL');
	});
	/* Ventana flotante en caso de algun error ó mensaje de información */
	$('#dialog').dialog({
		'title': 'iniciar sesión',
		autoOpen: false,
		width: 600,
		buttons: {
			"Iniciar Sesión": function() {
				$(this).dialog("close");
			},
			"Cancelar": function() {
				$(this).dialog("close");
			}
		}
	});
	//flash Mensaje
	$('#flashMessage').dialog({
		buttons: {
			"Aceptar": function() {
				$(this).dialog("close");
			}
		}
	});
});
/* Google Analytics */
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-33125186-1']);
_gaq.push(['_trackPageview']);
(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
