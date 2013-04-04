/* Descripción : Versión de jQuery prettyDate hecha especificamente para la ADSL
 * Author      : @Fitorec
 * Fecha       : 2012/07/15 21:45:15
 * Licencia    : Dual GPL3/MIT
 */

$(function() {
	$(".prettyDate").prettyDate({attribute: "datetime"}).hover(
	function(){
		aux = $(this).text();
		$(this).html( $(this).attr('datetime') );
		$(this).attr('datetime', aux);
	});
});
