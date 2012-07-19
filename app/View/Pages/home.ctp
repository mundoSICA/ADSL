<?php
#sección metaDatos
$this->set('title_for_layout', 'ADSL  - Academia de Software Libre');
$this->Html->meta('description', 'ADSL Academia de Software Libre, Compartiendo Conocimiento '.date('Y'), array('inline' => false));
#sección CSS
$this->Html->css('slide', 'stylesheet', array('inline' => false));
#sección Javascript
$this->Html->script('slides.min.jquery', array('inline' => false));
$this->Html->script('talleres.slides', array('inline' => false));
$this->Html->script('activar.top.menu.jquery', array('inline' => false));
?>
<script type="text/javascript">
$(function() {
    $("#BotonInicio").activarTopMenu();
});
</script>
<div class="header2">
<div id="slide_principal_talleres">
			<img src="img/liston_talleres_slide.png" width="150" height="150" alt="Liston Talleres" id="liston_talleres_slide" />
			<div id="slide_talleres">
				<div class="slides_container">
				<?php foreach ($talleres as $taller): ?>
					<div class="slide" itemscope itemtype="http://data-vocabulary.org/Event">
						<?php
						echo $this->Html->link(
									$this->Html->image('talleres/'.$taller['Taller']['slug_dst'].'.jpg',
									array(
									'alt' => $taller['Taller']['nombre'],
									'itemprop' => 'photo'
									)
								),
								array(	'controller' => 'talleres',
										'action' => 'ver',
										'admin' => false,
										$taller['Taller']['slug_dst']
									),
								array(	'escape' => false,
										'title' => $taller['Taller']['nombre'],
										'itemprop' => 'url'
									)
							);
						?>
						<h2 class="slide_taller_titulo" itemprop="summary"><?php echo $taller['Taller']['nombre']; ?></h2>
						<div class="slide_info_taller">
							<span class="slide_horario"><strong>Horario: </strong>
								<?php echo $taller['Taller']['horario']; ?>&nbsp;
							</span>
							<span class="slide_horas"><strong>Número de horas: </strong><?php echo $taller['Taller']['numero_total_horas']; ?>&nbsp;</span>
							<span class="inicio"><strong>inicia: </strong>
							<span itemprop="startDate"><?php echo $taller['Taller']['fecha_inicio']; ?>&nbsp;</span></span>
							<span class="fin"><strong>concluye: </strong>
								<span itemprop="endDate"><?php echo $taller['Taller']['fecha_final']; ?>&nbsp;</span></span>
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
       <h2><a href="#">¿Como funciona?</a></h2>
       <p>...</p>
      </div>
      <div class="bloque2">
       <h2><a href="#">Taller Soporte técnico</a></h2>
			 <p>...</p>
      </div>
      <div class="bloque1">
      <?php echo $this->element('mapa'); ?>
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
