<?php
#Metadatos
$title = explode("\n", $commit['Contribucion']['message']);
$title = $title[0];
$msg = htmlentities(str_replace($title,'',$commit['Contribucion']['message']),ENT_QUOTES,"UTF-8");

$this->set('title_for_layout', 'ADSL Contribución - ' . $title);
$this->Html->meta('description', substr($title.str_replace("\n"," ",$msg) ,0 , 250), array('inline' => false));

$this->Html->meta(array('name' => 'msapplication-starturl', 'content' => Router::url('/contribuciones', true)),null , array('inline' => false) );

# Implementación de la API de twitter para microdatos
# https://dev.twitter.com/docs/cards
#
$this->Html->meta(array('name' => 'twitter:card', 'content' => 'summary'),null , array('inline' => false) );
$this->Html->meta(array('name' => 'twitter:site', 'content' => '@academiadsl'), null , array('inline' => false) );
# Faltaría implementar la meta etiqueta de forma dinamica(leer datos del usuario,p.e. si tiene twitter):
# <meta name='twitter:creator" content="@author">
$this->Html->meta(array('name' => 'twitter:creator', 'content' => '@fitorec'), null , array('inline' => false) );
$this->Html->meta(array('property' => 'og:url', 'content' => Router::url('/contribuciones/ver/' . $commit['Contribucion']['hash'], true)), null , array('inline' => false) );
$this->Html->meta(array('property' => 'og:title', 'content' => htmlentities($title)), null , array('inline' => false) );
$this->Html->meta(array('property' => 'og:description', 'content' => 
str_replace( array("\n", "\r"), ' ',htmlspecialchars($msg) )

), null , array('inline' => false) );

$this->Html->meta(array('name' => 'og:image', 'content' => Router::url('/img/users/'. $commit['Contribucion']['author_name'] .'/avatar.jpg', true)), null , array('inline' => false) );


#Sección CSS
$this->Html->css('contribuciones.ver','stylesheet', array('inline' => false ) );
#Sección Javascript
$this->Html->scriptStart(array('inline' => false));
$this->Html->script(array(
											'jquery.prettydate.js',
											'jquery.prettydate-es.js',
											'activar.top.menu.jquery',
											'jquery.prettydate.ADSL',
											'epiceditor/js/epiceditor',
											'contribuciones.ver',
											), array('inline' => false));
$this->Html->scriptEnd();
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

</div>
</div><!-- en datos usuarios -->
