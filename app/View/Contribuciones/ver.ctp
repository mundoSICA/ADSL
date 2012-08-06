<?php
#Metadatos
$title = explode("\n", $commit['Contribucion']['message']);
$title = $title[0];
$this->set('title_for_layout', 'ADSL Contribución - ' . $title);
$msg = htmlentities(str_replace($title,'',$commit['Contribucion']['message']),ENT_QUOTES,"UTF-8");
$this->Html->meta('description', substr($title.str_replace("\n"," ",$msg) ,0 , 250), array('inline' => false));
#Sección CSS
$this->Html->css('contribuciones.ver','stylesheet', array('inline' => false ) );
#Sección Javascript
$this->Html->script(array(
											'jquery.prettydate.js',
											'jquery.prettydate-es.js',
											'activar.top.menu.jquery',
											'jquery.prettydate.ADSL',
											'epiceditor/js/epiceditor',
											'contribuciones.ver',
											), array('inline' => false));
?>
<div class="users ver">
<span itemscope itemtype="http://data-vocabulary.org/Person">
<?php
	echo $this->Html->avatar_link($commit['Contribucion']['author_name']);
?>
</span>
<div class='informacion_commit' itemscope itemtype="http://data-vocabulary.org/Event">
	<h1 itemprop="summary"><?php  
	echo $this->Html->link($title,
			array('controller'=>'contribuciones','action'=>'ver', $commit['Contribucion']['hash'])
		, array('itemprop'=>'url')
	); ?></h1>
	<dl>
		<dt>Autor</dt>
		<dd itemprop="author" itemtype="http://data-vocabulary.org/Person">
			<?php echo
			$this->Html->link(
				$commit['Contribucion']['author_name'],
				'http://github.com/'.$commit['Contribucion']['author_name']
				, array('rel'=>'external')
			); ?>
			&nbsp;
		</dd>
		<dt>Enlace Externo:</dt>
		<dd><?php
			$url = 'https://github.com/mundoSICA/ADSL/commit/' . $commit['Contribucion']['hash'];
			echo $this->Html->link($url, $url, array('rel'=>'external'));
			?>
			&nbsp;
		</dd>
		<dt>Fecha</dt>
		<dd >
		<time class='timestamp' itemprop="startDate" datetime="<?php echo $commit['Contribucion']['timestamp']; ?>"></time>
		<time class='timestamp prettyDate' itemprop="endDate" datetime="<?php echo $commit['Contribucion']['timestamp']; ?>">
		<?php
			echo $commit['Contribucion']['timestamp'];
		?></time>
		 </dd>
	</dl>
<br clear='all' />
<a href='<?php echo Router::url('/contribuciones/',true); ?>' class='boton_naranja'>Lista de Contribuciones</a>
<h2>Mensaje de confirmación:</h2>
<pre itemprop="description"><?php
	echo $msg;
?>
</pre>
<?php
$tipo_cambio = array(
		'added' => 'Archivos añadidos',
		'modified' => 'Archivos modificados',
		'removed' => 'Archivos eliminados',
);
$url = 'https://github.com/mundoSICA/ADSL/blob/' . $commit['Contribucion']['hash'];

foreach($tipo_cambio as $t=>$t_msg ){
	if( strlen($commit['Contribucion'][$t]) ){
		$files = explode("\n", $commit['Contribucion'][$t]);
		echo "\n<h2 class='${t}'>{$t_msg}</h2>\n";
		echo '<ul id="list'.ucfirst($t).'">';
		$li_template = '<li>%s</li>';
		foreach($files as $file) {
			if( $t != 'removed' )
				printf($li_template, 
							$this->Html->link($file,"{$url}/{$file}", array('rel'=>'external','class'=>$t))
						);
			else
				printf($li_template, 
						"<del class='{$t}'>{$file}</del>", array('rel'=>'external','class'=>$t)
					);
		}
		echo "\n</ul>";
	}
}
?>

<h2>Agregar tu comentario</h2>
<div class="users formulario">
<?php echo $this->Form->create('Comentario', array('action' => 'agregar'));?>
	<fieldset>
	<div id="epiceditor"></div>
	</fieldset>
<?php echo $this->Form->end('Agregar');?>
</div>

</div>
</div><!-- en datos usuarios -->
