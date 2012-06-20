<?php
/**
 * layout por defecto ADSL
 */

$cakeDescription = __d('cake_dev', 'Academia de software libre');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('estilos');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('jquery.min');
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
		});
	</script>
</head>

<body>
<div id="javascript_requerido" >Este sitio requiere javascript para su optima visualización.</div><script type="text/javascript">$("#javascript_requerido").hide("fast");</script>

<div class="CajaPrincipal">
     <div class="barra">Teléfonos: 51 51241 | E-Mail: contacto@adsl.org.mx | <a href="#">Login</a> </div>
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
			<a href="#">
				<?php
					echo $this->Html->image('feed.jpg', array('alt'=>'Feed'));
				?>
			</a>
		</div><!--termina iconos -->
      </div><!--termina buscadoriconos -->
      </div>
<!--termina header -->
	   <div class="menu">
	       <ul>
             <li>
							 <?php
									echo $this->Html->link('Inicio', '/', array('id'=>'inicio'));
							 ?>
							 </li>
             <li>
							 <?php
									echo $this->Html->link('Registrate', 
														array('controller'=>'users', 'action' => 'registro', 'admin'=>false),
														array('id'=>'Botonregistrate')
										);
							 ?>
             </li>
             <li><?php
             echo $this->Html->link('Talleres', 
														array('controller'=>'talleres'),
														array('id'=>'BotonTalleres')
										);
             ?>
						</li>
             <li><a href="#" id="calendario">Calendario</a></li>
             <li><a href="#" id="blog">Blog</a></li>  
             <li><a href="#" id="foro">Foro</a></li>
             <li><a href="#" id="proyectos">Proyectos</a></li>
             <li><a href="#" id="contacto">Contactanos</a></li>
		  </ul>
	   </div>
       <?php echo $this->Session->flash(); ?>
			 <?php echo $this->fetch('content'); ?>
			 
    <div class="separadorfooter">Promovemos el uso de:</div>
    <div class="logosfooter">
    <a href="http://www.ubuntu.com/" rel="external">
		<?php
					echo $this->Html->image('ubuntu.jpg', array('alt'=>'ubuntu'));
		?>
	</a>
	<a href="http://www.joomla.org/" rel="external">
		<?php
					echo $this->Html->image('joomla.jpg', array('alt'=>'Joomla'));
		?>
	</a>
	<a href="http://www.mysql.com/" rel="external">
		<?php
					echo $this->Html->image('mysql.jpg', array('alt'=>'Mysql'));
		?>
	</a>
	<a href="http://www.php.net/" rel="external">
		<?php
					echo $this->Html->image('php.jpg', array('alt'=>'PHP'));
		?>
	</a>
		<?php
					echo $this->Html->image('debian.jpg', array('alt'=>'debian'));
		?>
	</a>
	<a href="http://es.opensuse.org/" rel="external">
		<?php
					echo $this->Html->image('suse.jpg', array('alt'=>'suse'));
		?>
	</a>
	<a href="http://www.blender.org/" rel="external">
		<?php
					echo $this->Html->image('blender.jpg', array('alt'=>'Blender'));
		?>
	</a>
    <a href="http://wordpress.org/" rel="external">
		<?php
					echo $this->Html->image('wordpress.jpg', array('alt'=>'wordpress'));
		?>
	</a>
	<a href="http://es.openoffice.org/" rel="external">
		<?php
					echo $this->Html->image('openoffice.jpg', array('alt'=>'openOffice'));
		?>
	</a>
	<a href="http://www.linux.org/" rel="external">
			<?php
					echo $this->Html->image('linux.jpg', array('alt'=>'Linux'));
		?>
	</a>
	<a href="http://www.mozilla-europe.org/es/firefox/" rel="external">
		<?php
					echo $this->Html->image('firefox.jpg', array('alt'=>'Firefox'));
		?>
	</a>
	<a href="http://www.inkscape.org/?lang=es" rel="external">
		<?php
					echo $this->Html->image('inkscape.jpg', array('alt'=>'Inskape'));
		?>
	</a>
	</div>
<div class="separadorfooter2"></div>    
<div class="footer">
	     <div class="footerCont">
         
         &copy; 2010- <?php date('Y'); ?>, Academia de Software Libre<br />
Dirección: Manuel Doblado #119, Col. Centro, Oaxaca, Oax.<br />
Tel: (951) 205 43 51  / E-Mail: <a href='mailto:contacto@adsl.org.mx'>contacto@adsl.org.mx</a><br />

Sitio esta hecho con código libre y abierto <a href="https://github.com/mundoSICA/ADSL" rel="external">disponible en github</a><br />
Sitio diseñado por: <a href="http://www.manuelhernandez.com.mx" rel="external">Manuel Hernández</a><br />

         
    </div>
	</div>
</div> <!--termina CajaPrincipal -->
<?php echo $this->element('sql_dump'); ?>

</body>
</html>
