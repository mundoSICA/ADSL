<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title><?php echo $title_for_layout; ?></title>
	<?php
		##seccion de meta etiquetas
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo "\n";
		##Sección de CSS
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('estilos');
		echo $this->Html->css('jquery-ui-theme/jquery-ui-1.8.21.custom');
		echo $this->fetch('css');
		echo "\n";
		#Seccion de javascript
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('jquery-ui-1.8.21.custom.min');
		echo $this->fetch('script');
		echo "\n";
	?>
	<script  type="text/javascript">
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
///////////////////////////////////////////////////////////////
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
///////////////////////////////////////////////////////////////
});
</script>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-32823607-1']);
_gaq.push(['_trackPageview']);
(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
</head>
<body>
<script type="text/javascript"></script>
<noscript><div id="javascript_requerido" >Este sitio requiere javascript para su optima visualización.</div></noscript>
<div id="dialog"></div>
<div class="CajaPrincipal">
     <div class="barra">Teléfonos: 51 51241 | E-Mail: contacto@adsl.org.mx | <?php
     if( $this->Session->read('Auth.User') ){
				echo $this->Html->link('Salir',array('controller'=>'users','action'=>'logout','admin'=>false), array('title'=>'Cerrar sesión'));
			}else{
				echo $this->Html->link('Login',array('controller'=>'users','action'=>'login'), array('title'=>'logearme'));
			}
     ?></div>
    <div class="header">
      <div class="logo"><a href="<?php echo Router::url('/', true); ?>">
				<?php
					echo $this->Html->image('header.jpg', array('alt'=>'ADSL: Academia de Software Libre'));
				?></a>
	</div>
	<div class="buscadoriconos">
          <div class="buscador">
			<form method="get" id="searchform" action="http://adsl.org.mx/buscador/" >
				<div>
					<input type="text" id="buscador_input" name="q" />
				</div>
			</form>
	</div><!--termina buscador -->
		<div class="iconos">
			<a href="http://www.facebook.com/#!/profile.php?id=100001349064369" rel="external">
				<?php
					echo $this->Html->image('facebook.jpg', array('alt'=>'facebook'));
				?>
			</a>
			<a href="http://twitter.com/academiadsl" rel="external">
				<?php
					echo $this->Html->image('twitter.jpg', array('alt'=>'twitter'));
				?>
			</a>
			<a href="http://www.flickr.com/photos/academiadsl/sets/72157625524455434/" rel="external">
				<?php
					echo $this->Html->image('flickr.jpg', array('alt'=>'flickr'));
				?>
			</a>
			<a href="<?php echo Router::url('/feed.xml');?>">
				<?php
					echo $this->Html->image('feed.jpg', array('alt'=>'Feed'));
				?>
			</a>
		</div><!--termina iconos -->
      </div><!--termina buscadoriconos -->
      </div>
<!--termina header -->
	   <div class="menu">
	       <?php
					echo $this->element('menu_superior');
	       ?>
	   </div>
<div id="content">
       <?php
				echo $this->Session->flash();
				echo $this->fetch('content');
			?>
</div>
<?php
	echo $this->element('pie_logos_promovemos');
	echo $this->element('pie_info_direccion');
?>
</div> <!--termina CajaPrincipal -->
<?php echo $this->element('sql_dump'); ?>
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://mundosica.com/piwik/" : "http://mundosica.com/piwik/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 6);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://mundosica.com/piwik/piwik.php?idsite=6" style="border:0" alt="mundosica-piwik" /></p></noscript>
</body>
</html>
