<?php
#sección metaDatos
$this->set('title_for_layout', 'ADSL  - Academia de Software Libre');
$this->Html->meta(
	'description',
	'ADSL Academia de Software Libre: Compartir, difundir y Generar Conocimiento',
	array('inline' => false,'itemprop'=>'description')
);
#sección CSS
$this->Html->css(array(
											'slide',
											'pages.home'
										),
									'stylesheet',
									array('inline' => false));
#sección Javascript
$this->Html->script(array(
											'slides.min.jquery',
											'talleres.slides',
											'activar.top.menu.jquery',
											'jquery.ui.datepicker-es.js',
											'home',
											), array('inline' => false));
?>
<div class="header2">
<div id="slide_principal_talleres">
			<img src="img/liston_talleres_slide.png" width="150" height="150" alt="Liston Talleres" id="liston_talleres_slide" />
			<div id="slide_talleres">
				<div class="slides_container">
				<?php foreach ($talleres as $taller): ?>
					<div class="slide" itemscope itemtype="http://schema.org/EducationEvent">
						<?php
						echo $this->Html->link(
									$this->Html->image('talleres/'.$taller['Taller']['slug_dst'].'.jpg',
									array(
									'alt' => $taller['Taller']['nombre'],
									'itemprop' => 'image'
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
						<h2 class="slide_taller_titulo" itemprop="name"><?php echo $taller['Taller']['nombre']; ?></h2>
						<div class="slide_info_taller">
							<span class="slide_horario"><strong>Horario: </strong>
								<?php echo $taller['Taller']['horario']; ?>&nbsp;
							</span>
							<span class="slide_horas"><strong>Número de horas: </strong>
							<meta itemprop="duration" content="PT<?php echo $taller['Taller']['numero_total_horas']; ?>H">
							<?php echo $taller['Taller']['numero_total_horas']; ?>&nbsp;
							</span>
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
<h1>Academia de Software Libre - ADSL</h1>
<section class="row-fluid">
	   <section class="talleresLista span4" id='home_bloque1'>
       <h2><?php echo $this->Html->link('Lista de talleres'
									, array( 'controller'=>'talleres', 'action' => 'index' )); ?>
					 <a href="#"></a></h2>
			 <ul class="">
       <?php foreach ($talleres as $taller): ?>
       <li><?php
       echo $this->Html->link(
								$taller['Taller']['nombre'],
								array(
											'controller' => 'talleres',
											'action' => 'ver',
											'admin' => false,
											$taller['Taller']['slug_dst']
								),
								array(
										'title' => $taller['Taller']['nombre'],
										'itemprop' => 'url'
								)
							);
			?>
			</li>
			<?php endforeach; ?>
			 </ul>
			 <section class="calendario">
				 <h2>
					 <?php echo $this->Html->link('Calendario de eventos'
									, array( 'controller'=>'talleres', 'action' => 'calendario' )); ?>
					 <a href="#"></a></h2>
				 <p>Consulta nuestro calendario de eventos, donde podras encontrar las fechas de nuestros talleres:</p>
				 <div id="calendarioEventos"></div>
			 </section>
      </section>

      <section class="ultimosUsuarioLista span4" id='home_bloque2'>
		 <h2><?php echo
		 $this->Paginator->link('Ultimos usuarios registrados',
		 array('controller'=>'users', 'action' => 'index', 'sort' => 'User.created', 'direction' => 'desc'));?>
					 <a href="#"></a></h2>
			 <ul id='listaUsuarios'>
       <?php
        foreach ($users as $username=>$email): ?>

        <li itemscope itemtype="http://schema.org/Person">
				 <?php
       echo $this->Html->link(
								$this->Html->avatar_icon($username) .
								"<label class='btn btn-inverse' itemprop='name'>{$username}</label>",
								array(
											'controller' => 'users',
											'action' => 'ver',
											'admin' => false,
											$username
								),
								array(
										'title' => $username,
										'itemprop' => 'url',
										'escape' => false
								)
							);
				echo '</li>';
				?>
			<?php endforeach; ?>
			 </ul>
      </section>
      <section class="mapaUbicacion span4" id='home_bloque3'>
      <?php echo $this->element('mapa'); ?>
		</section>
</section><!-- end section bloqueinfo -->
