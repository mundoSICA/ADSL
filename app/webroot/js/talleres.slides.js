$(function(){
//slide run
$('#slide_talleres').slides({
	preload: true,
	preloadImage: 'img/loading.gif',
	play: 5000,
	pause: 2500,
	//hoverPause: true,
	animationStart: function(current){
		$('.slide_info_taller').animate({
			bottom:-35
		},100);
		$('.slide_taller_titulo').animate({
				top:-45
		},100);
	},
	animationComplete: function(current){
		$('.slide_info_taller').animate({
			bottom:0
		},200);
	$('.slide_taller_titulo').animate({
		top:0
		},-200);
	},
	slidesLoaded: function() {
		$('.slide_info_taller').animate({
			bottom:0
		},200);
		$('.slide_taller_titulo').animate({
			top:0
		},200);
	}
});
console.log('hola');
});


