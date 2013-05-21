<?php
#sección metaDatos
$this->set('title_for_layout', 'ADSL  - video Streaming');
$this->Html->meta('description', 'ADSL Academia de Software Libre, evento en vivo, Video streaming '.date('Y'), array('inline' => false));
#sección CSS
$this->Html->css(array(
											'pages.streaming'
										),
									'stylesheet',
									array('inline' => false));
#sección Javascript
$this->Html->script(array(
											'activar.top.menu.jquery',
											'streaming',
											'http://platform.twitter.com/widgets.js'
											), array('inline' => false));
$streaming = Configure::read('streaming');
?>

<div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <iframe width="220px" scrolling="no" height="700px" frameborder="0" style="border: 0px none transparent;" src="http://www.ustream.tv/socialstream/10172229"></iframe>
          </div><!--/.well -->
        </div><!--/span-->

        <div class="span9">

		<section class="hero-unit">
					<h1><?php echo $streaming['nombre']; ?></h1>
					<p>
						<iframe src="http://www.ustream.tv/embed/10172229" width="608" height="368" scrolling="no" frameborder="0" style="border: 0px none transparent;"></iframe>
						</p>

					<p>
						<a href='http://www.ustream.tv/channel/adsl' class="btn btn-primary btn-large">
							Visitar Ustream.tv/channel/adsl
						</a>
					</p>
				</section>
				<section>
					<h2>URL para compartir</h2>
					<input value='http://ustre.am/GGgd' onfocus='this.select()' style='width:650px;'>
					<?php  echo $this->element('redes_sociales'); ?>
				</section>
				<!-- URL generada
				https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Fadsl.org.mx%2Fpages%2Fstreaming&source=tweetbutton&text=Estoy%20viendo%20la%20trasmisi%C3%B3n%20en%20vivo%20de%20la%20Academia%20de%20Software%20Libre%20%40academiADSL&url=http%3A%2F%2Ft.co%2FVAYlgQ9R
				-->
          <div class="row-fluid">
            <div class="span4">
              <h2>Primer Video</h2>
              <img src="http://static-cdn1.ustream.tv/i/video/picture/0/1/19/19911/19911154/1_10172229_19911154,192x108,b,1:2.jpg" />
							<p>Video uno de la Academia de software Libre</p>
              <p><a href="http://www.ustream.tv/recorded/19911154" class="btn">Ver detalles »</a></p>
            </div><!--/span-->

            <div class="span4">
              <h2>Segundo Video</h2>
              <img src="http://static-cdn1.ustream.tv/i/video/picture/0/1/19/19761/19761946/1_10172229_19761946,192x108,b,1:2.jpg"/>
							<p>Video dos de la Academia de software Libre</p>
              <p><a href="http://www.ustream.tv/recorded/19761946" class="btn">Ver detalles »</a></p>
            </div><!--/span-->

            <div class="span4">
              <h2>Tercer Video</h2>
              <img src="http://static-cdn2.ustream.tv/i/video/picture/0/1/19/19761/19761813/1_10172229_19761813,192x108,b,1:2.jpg" alt="" title="" />
							<p>Video dos de la Academia de software Libre</p>
              <p><a href="http://www.ustream.tv/recorded/19761813" class="btn">Ver detalles »</a></p>
            </div><!--/span-->

          </div><!--/row-->

        </div><!--/span-->
      </div>
