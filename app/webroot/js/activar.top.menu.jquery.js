/* Descrición: ADSL Control top Menu, un plugin para jQuery
 * Autor:      fitorec, http://fitorec.wordpress.com
 * Versión:    1.0
 * Creado:     2012/06/22 21:38:41
 * Copyright:  ADSL(c) 2012; Licensed MIT, GPL
*/
(function($){
	$.activarTopMenu = function(el){
		$(el).addClass('activa');
		$(el).attr('href', '#');
	};
	$.fn.activarTopMenu = function(){
		return this.each(function(){
			(new $.activarTopMenu(this));
		});
	};
})(jQuery);
