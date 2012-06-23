<?php
	echo $this->Html->script('slides.min.jquery');
	echo $this->Html->script('talleres.slides');
	echo $this->Html->script('activar.top.menu.jquery');
	echo $this->Html->css('slide');
?>
<script language="Javascript"  type="text/javascript">
$(function() {
    $("#BotonInicio").activarTopMenu();
});
</script>
<style type="text/css" media="all">
	#content{background:rgba(0,0,0,0);}
</style>
<div class="header2">
<div id="slide_principal_talleres">
			<img src="img/liston_talleres_slide.png" width="150" height="150" alt="Talleres" id="liston_talleres_slide" />
			<div id="slide_talleres">
				<div class="slides_container">
				<?php foreach ($talleres as $taller): ?>
					<div class="slide">
						<?php
						echo $this->Html->link(
								$this->Html->image('talleres/'.$taller['Taller']['slug_dst'].'.jpg'),
								array('controller' => 'talleres', 'action' => 'ver', 'admin' => false, $taller['Taller']['slug_dst']),
								array('escape' => false)
							);
						?>
						<h2 class="slide_taller_titulo"><?php echo $taller['Taller']['nombre']; ?>&nbsp;</h2>
						<div class="slide_info_taller">
							<span class="slide_horario"><strong>Horario: </strong>
								<?php echo $taller['Taller']['horario']; ?>&nbsp;
							</span>
							<span class="slide_horas"><strong>Número de horas: </strong><?php echo $taller['Taller']['numero_total_horas']; ?>&nbsp;</span>
							<span class="inicio"><strong>inicia: </strong><?php echo $taller['Taller']['fecha_inicio']; ?>&nbsp;</span>
							<span class="fin"><strong>concluye: </strong><?php echo $taller['Taller']['fecha_final']; ?>&nbsp;</span>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
				<a href="#" class="prev" title='Previo'></a> <a href="#" class="next" title='Siguiente'></a>
			</div>
		</div>
	</div>
	<div class="bloqueinfo11">
	   <div class="bloque1">
       <h2><a href="#">Taller: Javascrip &amp; Mootools</a></h2>
       <p><img src="img/tdweb.jpg" alt="Taller Dise&ntilde;o Web" width="307" height="230" /></p>
      </div>
      <div class="bloque2">
       <h2><a href="#">Becas y formas de pago </a></h2>
    <p><img src="img/mblog.jpg" alt="Monetizando tu blog" /><br />
          <br />
       </p>
      </div>
      <div class="bloque1">
      <h2><a href="http://maps.google.com.mx/maps?q=Azucenas+610,+colonia+Reforma,+Oaxaca,+Oaxaca&amp;hl=es&amp;ppyss=confirm:Gracias.+Se+han+guardado+tus+cambios+y+se+publicar%C3%A1n+una+vez+que+hayan+sido+revisados.&amp;ie=UTF8&amp;view=map&amp;cid=5132139184235277504&amp;ll=17.077482,-96.708333&amp;spn=0.011117,0.01929&amp;z=16&amp;iwloc=A" rel="external">Mapa de ubicación</a></h2>
       <p><img src="img/tjoomla.jpg" alt="Joomla" />
</p>
       <p><br />
       </p>
      </div>
	<div style="clear:both; height:1px;font-size:0px; line-height: 0px;"></div>
  </div><!--bloqueinfo -->
<div class="bloqueinfo1">
	   <div class="bloque1">
       <h2>Noticias Recientes</h2>
       <div class="divisorcol"></div>
<ul>
<li><a href="#">Los invitamos a el taller de (Monetizando tu Blog) sabado de 15:00 a 17:00 hrs ENTRADA LIBRE</a></li>
<li><a href="#">ADSL invita al taller conociendo linux inscribete ya..! cupo limitado</a></li>
<li><a href="#">Los invitamos a el taller de (Monetizando tu Blog) sabado de 15:00 a 17:00 hrs ENTRADA LIBRE</a></li>
<li><a href="#">ADSL invita al taller conociendo linux inscribete ya...! cupo limitado</a></li>
</ul>
    </div>
      <div class="bloque2">
       <h2>&Uacute;ltimos Posts</h2>
       <div class="divisorcol"></div>
       <ul>
<li><a href="#">Los invitamos a el taller de (Monetizando tu Blog) sabado de 15:00 a 17:00 hrs ENTRADA LIBRE</a></li>
<li><a href="#">ADSL invita al taller conociendo linux inscribete ya..! cupo limitado</a></li>
<li><a href="#">Los invitamos a el taller de (Monetizando tu Blog) sabado de 15:00 a 17:00 hrs ENTRADA LIBRE</a></li>
<li><a href="#">ADSL invita al taller conociendo linux inscribete ya..! cupo limitado</a></li>
</ul>
</div>
<div class="bloque1">
       <h2>Anuncios</h2>
      <div class="divisorcol"></div>
       <img src="img/banner_capacitacion.jpg" alt="Asesor&iacute;a" /><br /><br />
				<a href="http://www.mozilla-europe.org/es/firefox/" rel="external"><img src="img/banner_firefox.jpg" alt="Firefox" />
				</a>
      </div>
<div style="clear:both; height:1px;font-size:0px; line-height: 0px;"></div>
  </div><!--bloqueinfo -->
