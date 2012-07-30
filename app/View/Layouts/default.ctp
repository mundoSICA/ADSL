<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="utf-8">
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
		//recuerda poner esto en un archivo aparte
	?>
</head>
<body>
<script type="text/javascript"></script><noscript><div id="javascript_requerido" >Este sitio requiere javascript para su optima visualización.</div></noscript>
<div id="dialog"></div>
<div class="CajaPrincipal">
     <div class="barra">Teléfonos: 51 51241 | E-Mail: contacto@adsl.org.mx | <?php
     if( $this->Session->read('Auth.User') ){
				echo $this->Html->link('Salir',array('controller'=>'users','action'=>'logout','admin'=>false), array('title'=>'Cerrar sesión'));
			}else{
				echo $this->Html->link('Login',array('controller'=>'users','action'=>'login'), array('title'=>'logearme'));
			}
     ?></div>
<header>
    <div class="header">
      <div id="logo">
		  <a href="<?php echo Router::url('/', true); ?>" id='LinkPrincipal'>
				<?php
					echo $this->Html->image('logo_ave.jpg', array('alt'=>'ADSL: Academia de Software Libre'));
				?>
			<abbr title="Academia de Software Libre" class='adsl_logo'>ADSL</abbr>
			<h3>Academia de Software Libre</h3>
		</a>
		<div id="slogan">
			<h2>Academia de Software Libre</h2>
			<h3>Compartir, Difundir y Generar Conocimiento</h3>
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
	   <nav class="menu">
	       <?php
					echo $this->element('menu_superior');
	       ?>
	   </nav>
</header>
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
<?php
### Sección javascript
echo $this->Html->script(array(
		'jquery.min',
		'modernizr.custom.js',
		'jquery-ui-1.8.21.custom.min',
		'main.js',
	))."\n";
echo $this->fetch('script')."\n";
?>
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
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
