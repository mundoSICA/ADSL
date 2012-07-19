<?php
	$this->Html->script('activar.top.menu.jquery', array('inline' => false));
	$this->Html->script('jquery.prettydate', array('inline' => false));
	$this->Html->script('jquery.prettydate-es', array('inline' => false));
	$this->Html->script('jquery.prettydate.ADSL', array('inline' => false));
	$this->set('title_for_layout', 'ADSL -  Lista de contribuciones');
	$this->Html->meta('description', 'Lista de contribuciones al repositorio publico ADSL');
?>
<script language="Javascript"  type="text/javascript">$(function() {$("#BotonContribuciones").activarTopMenu();});</script>
<style type="text/css" media="all">
div.index{width:905px;border-left:1px solid #FFF}
.commit{ color: #0065B4;font-weight: bold }
</style>
<div class="index">
	<h1>Lista de contribuciones al ADSL</h1>
	<p>
		El sitio del <strong>ADSL</strong> esta desarrollado con código abierto y libre, hospedado en:
		<a href='https://github.com/mundoSICA/ADSL' rel='external'>https://github.com/mundoSICA/ADSL</a>, esta sección
		describe la lista de las contribuciones:
	</p>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('author_name', 'Autor');?></th>
			<th><?php echo $this->Paginator->sort('message', 'Titulo');?></th>
			<th><?php echo $this->Paginator->sort('timestamp','Fecha');?></th>
	</tr>
	<?php
	foreach ($contribuciones as $contribucion):
	$title = $contribucion['Contribucion']['message'];
	$title = explode("\n", $title);
	$title = $title[0];
	?>
	<tr itemscope itemtype="http://data-vocabulary.org/Event">
		<td itemprop="author" itemtype="http://data-vocabulary.org/Person"><?php
			echo $this->Html->gravatar_link(
						$contribucion['Contribucion']['author_email'],
						$contribucion['Contribucion']['author_name']
			);
		 ?>&nbsp;</td>
		 <td>
			 <span itemprop="eventType" class='contribución'>commit: </span>
			 <?php
			 echo $this->Html->link(
						'<span itemprop="summary">' . $title . '</span>',
						array('controller'=>'contribuciones', 'action' => 'ver', $contribucion['Contribucion']['hash']),
						array('itemprop' => 'url', 'escape' => false)
				);
		 ?>&nbsp;</td>
		<td>
		<time itemprop="startDate" datetime="<?php echo h($contribucion['Contribucion']['timestamp'])?>"></time>
		<time class='prettyDate' itemprop="endDate" datetime="<?php echo h($contribucion['Contribucion']['timestamp']); ?>"><?php echo h($contribucion['Contribucion']['timestamp']); ?></time>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => 'Página %page% de %pages%, viendo %current% registros de un total %count%, iniciando en %start% acabando en %end%'
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< Anterior', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next('Siguiente >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
