/* ADSL - Script principal
 *
 * Descripcion: Aqui se agrupara la logica en javascript que comparten
 *              todas las páginas del sitio
 */
$(function(){
	// Desactivamos la acción por defecto al presionar un link que inicie con ancla
   $('section [href^=#]').click(function (e) {
      e.preventDefault()
   })
   //Agregando enlaces externos
	$('a[rel=external]').click(function() {
		window.open(this.href);
		return false;
	});
	// Construyendo el marcado cd código fuente.
  window.prettyPrint && prettyPrint()
	// add-ons
	$('.add-on :checkbox').on('click', function () {
     var $this = $(this)
       ,method = $this.attr('checked') ? 'addClass' : 'removeClass'
			$(this).parents('.add-on')[method]('active')
	})
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
			"Cancel" : {
				'html': '<li class="icon-remove-sign icon-white"></li> Cerrar Notificación',
				'class': 'btn btn-danger',
				'click': function() { $(this).dialog("close"); }
				}
		}
	});
	//
	$('.iconos a').tooltip({placement: 'bottom'});
	//
	$('.pagination a').tooltip();

	$('.nav.nav-list a').tooltip();
});

// compartir facebook
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
// Compartir por twitter
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
// Compartir por G+
window.___gcfg = {lang: 'es-419'};
(function() {
	var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	po.src = 'https://apis.google.com/js/plusone.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
