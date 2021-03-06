<!DOCTYPE html>
<html lang="es-MX" itemscope itemtype="http://schema.org/WebPage" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="utf-8">
	<meta http-equiv='Content-Type' content='text/html;' charset='utf-8'>
	<title><?php echo $title_for_layout; ?></title>
	<meta name="cache-control" content="public">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="copyright" content="Academia de Software Libre">
	<meta name="design-by" content="http://www.adsl.org.mx/users/ver/Manuel">
	<meta name="generator" content="adsl.org.mx" />
	<meta name="author" content="http://www.adsl.org.mx/contribuciones">
	<meta name="distribution" content="global">
	<meta name="document-classification" content="general">
	<meta name="rating" content="general">
	<meta name="language" content="es-MX">
	<meta name="geo.position" content="<?php echo implode(';', $adsl_data['geo']); ?>">
	<meta name="geo.placename" content="Academia de software Libre">
	<meta name="geo.region" content="MX-OAX">
	<meta name="country" content="MX">
	<meta name="city" content="Oaxaca">
	<meta name="zipcode" content="68000">
	<meta name="application-name" content="ADSL" />
	<meta name="msapplication-tooltip" content="Academia de software libre compartir y difundir conocimiento" />
	<meta name="msvalidate.01" content="0BE1D85670E5445264ADC79E23C5EF45" />
<?php
		##seccion de meta etiquetas
		echo "\t".$this->Html->meta('icon');
		echo "\t".$this->fetch('meta');
		##Sección de CSS
		echo "\n\t".$this->Html->css('bootstrap');
		echo "\n\t".$this->Html->css('bootstrap-responsive');
		echo "\n\t".$this->Html->css('cake.generic');
		echo "\n\t".$this->Html->css('estilos');
		echo "\n\t".$this->Html->css('jquery-ui-theme/jquery-ui-1.8.21.custom');
		echo "\n\t".$this->Html->css('google-code-prettify');
		echo "\n\t".$this->fetch('css');
		//recuerda poner esto en un archivo aparte
		$modoServer = (bool)($_SERVER['SERVER_NAME']!='localhost');
	if ($modoServer) :
?>
<script type="text/javascript"><!--//
var _gaq=_gaq || []; _gaq.push(['_setAccount','UA-32823607-1']); _gaq.push(['_trackPageview']);(function(){var ga= document.createElement('script'); ga.type='text/javascript'; ga.async = true; ga.src = ('https:'==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js'; var s=document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga,s);})();
//--></script>
<?php endif; ?>
</head>
<body>
<script type="text/javascript"></script><noscript><div id="javascript_requerido" >Este sitio requiere javascript para su optima visualización.</div></noscript>
<div id="dialog"></div>
<div class="CajaPrincipal">
<header itemprop="author copyrightHolder creator provider publisher sourceOrganization reviewedBy" itemscope itemtype="http://schema.org/Organization">
  <div class="barra">
			 <span class='telLabel'></span><span itemprop="telephone">(951) 205-43-51</span> |
			 <span class='emailLabel'></span><a itemprop="email" href="mailto:contacto@adsl.org.mx">contacto@adsl.org.mx</a>
			 |<span class='loginLabel'></span><?php
     if( $this->Session->read('Auth.User') ){
				echo $this->Html->link('Salir',array('controller'=>'users','action'=>'logout','admin'=>false), array('title'=>'Cerrar sesión'));
			}else{
				echo $this->Html->link('Login',array('controller'=>'users','action'=>'login'), array('title'=>'logearme'));
			}?>

  </div><?php /** end .barra **/ ?>
    <div class="header">
      <div id="logo">
		  <a itemprop="url" href="<?php echo Router::url('/', true); ?>" id='LinkPrincipal'>
			<?php
			echo $this->Html->image(
				'logo_ave.png',
				array(
					'itemprop'=>'image',
					'alt'=>'ADSL: Academia de Software Libre',
				)
			);
			?>
			<abbr title="Academia de Software Libre" class='adsl_logo'>ADSL</abbr>
			<h3 itemprop="name">Academia de Software Libre</h3>
		</a>
		<div id="slogan">
			<h2>Academia de Software Libre</h2>
			<h3 itemprop="description">Compartir, Difundir y Generar Conocimiento</h3>
		</div>
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
			<a class='rss' href="<?php echo Router::url('/feed.xml');?>" title='Nuestro canal RSS'>
			</a>
			<a class='flickr' href="http://www.flickr.com/photos/academiadsl/sets/72157625524455434/" rel="external" title='Nuestras fotos en flickr'>
			</a>
			<a class='twitter' href="http://twitter.com/academiadsl" rel="external" title='Siguenos en twitter'>
			</a>
			<a class='facebook' href="http://www.facebook.com/#!/profile.php?id=100001349064369" rel="external"  title='Contactanos por FaceBook'>
			</a>
		</div><!--termina iconos -->
      </div><!--termina buscadoriconos -->
     </div>
      <!--termina header -->
</header>
	<nav class="menu">
	       <?php
		echo $this->element('menu_superior');
	       ?>
	</nav>
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
</div>
<!--termina CajaPrincipal -->
<script language="Javascript"  type="text/javascript" src="<?php
echo Router::url('/', true); ?>js/fokus.min.js"></script>

<?php
### Sección javascript
echo $this->Html->script(array(
		'jquery.min',
		'modernizr.custom.js',
		'jquery-ui-1.8.21.custom.min',
		'google-code-prettify',
		'bootstrap.min.js',
		'main.js',
	))."\n";
?>

<?php
echo $this->fetch('script')."\n";
if($modoServer) :
?>
<script type="text/javascript">
var pkBaseURL=(("https:"==document.location.protocol)?"https://mundosica.com/piwik/":"http://mundosica.com/piwik/"); document.write(unescape("%3Cscript src='"+pkBaseURL+"piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try { var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 6); piwikTracker.trackPageView(); piwikTracker.enableLinkTracking(); } catch( err ) {}
</script><noscript><p><img src="http://mundosica.com/piwik/piwik.php?idsite=6" style="border:0" alt="mundosica-piwik" /></p></noscript>
<?php
endif;
echo $this->element('sql_dump'); ?>
</body>
</html>
