<?php
#sección metaDatos
$this->set('title_for_layout', 'ADSL  - Academia de Software Libre');
$this->Html->meta('description', 'ADSL Academia de Software Libre, Compartiendo Conocimiento '.date('Y'), array('inline' => false));
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
	
<section class="mainContent">
	   <section class="bloque1 talleresLista">
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
      
      <section class="bloque2 ultimosUsuarioLista">
		 <h2><?php echo 
		 $this->Paginator->link('Ultimos usuarios registrados',
		 array('controller'=>'users', 'action' => 'index', 'sort' => 'User.created', 'direction' => 'desc'));?>
					 <a href="#"></a></h2>
			 <ul id='listaUsuarios'>
       <?php
       $i=0;
        foreach ($users as $username=>$email): ?>
				 <?php
				 if ($i%2 == 0) {
					echo '<ul>';
				}
			echo '<li itemscope itemtype="http://data-vocabulary.org/Person">';
       echo $this->Html->link(
								$this->Html->gravatar_Icon($email, $username) .
								"<span itemprop='nickname'>{$username}</span>",
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
				if ($i%2 != 0) {
					echo '</ul>';
				}
				$i++;
				?>
			<?php endforeach; ?>
			 </ul>
      </section>
      <section class="bloque1 mapaUbicacion">
      <?php echo $this->element('mapa'); ?>
		</section>
</section><!-- end section bloqueinfo -->
