<?php
#sección metaDatos
$this->set('title_for_layout', 'ADSL  - video Streaming');
$this->Html->meta('description', 'ADSL Academia de Software Libre, evento en vivo, Video streaming '.date('Y'), array('inline' => false));
#sección CSS
/*$this->Html->css(array(
											'slide',
											'pages.home'
										),
									'stylesheet',
									array('inline' => false));*/
#sección Javascript
/*$this->Html->script(array(
											'slides.min.jquery',
											), array('inline' => false)); */
?>

<div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Chat en vivo</li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->

        <div class="span9">
					
		<section class="hero-unit">
					<h1>Area en desarrollo</h1>
					<p>Lo sentimos estamos desarrollando esta area, por favor para visualizar el streaming visita el canal de ustreaming.</p>
					<p><a class="btn btn-primary btn-large">Visitar</a></p>
				</section>
				
          <div class="row-fluid">
            <div class="span4">
              <h2>Primer Video</h2>
							<p>Video uno de la Academia de software Libre</p>
              <p><a href="http://www.ustream.tv/recorded/19911154" class="btn">Ver detalles »</a></p>
            </div><!--/span-->
            
            <div class="span4">
              <h2>Segundo Video</h2>
							<p>Video dos de la Academia de software Libre</p>
              <p><a href="http://www.ustream.tv/recorded/19761946" class="btn">Ver detalles »</a></p>
            </div><!--/span-->

            <div class="span4">
              <h2>Tercer Video</h2>
							<p>Video dos de la Academia de software Libre</p>
              <p><a href="http://www.ustream.tv/recorded/19761813" class="btn">Ver detalles »</a></p>
            </div><!--/span-->

          </div><!--/row-->
          
        </div><!--/span-->
      </div>
