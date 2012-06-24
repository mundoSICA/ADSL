<?php
	echo $this->Html->script('activar.top.menu.jquery');
	$this->set('title_for_layout', 'ADSL -  Lista de contribuciones');
?>
<script language="Javascript"  type="text/javascript">$(function() {$("#BotonContribuciones").activarTopMenu();});</script>
<style type="text/css" media="all">
div.index{width:905px;border-left:1px solid #FFF}
</style>
<div class="index">
	<h2>Lista de contribuciones al ADSL</h2>
	<p>
		El sitio del <strong>ADSL</strong> esta desarrollado con código abierto y libre, hospedado en:
		<a href='https://github.com/mundoSICA/ADSL'>https://github.com/mundoSICA/ADSL</a>, esta sección 
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
	<tr>
		<td><?php
			echo $this->Html->gravatar_link(
						$contribucion['Contribucion']['author_email'],
						$contribucion['Contribucion']['author_name']
			);
		 ?>&nbsp;</td>
		 <td><?php 
			 echo $this->Html->link(
						$title,
						array('controller'=>'contribuciones', 'action' => 'ver', $contribucion['Contribucion']['hash'])
				);
		 ?>&nbsp;</td>
		<td><?php echo h($contribucion['Contribucion']['timestamp']); ?>&nbsp;</td>
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
