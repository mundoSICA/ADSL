<?php
	echo $this->Html->script('activar.top.menu.jquery');
	$title = explode("\n", $commit['Contribucion']['message']);
	$title = $title[0];
	$this->set('title_for_layout', 'ADSL Contribución - ' . $title);
	$msg = htmlentities(str_replace($title,'',$commit['Contribucion']['message']),ENT_QUOTES,"UTF-8");
	$this->Html->meta('description', $title.str_replace("\n"," ",$msg), array('inline' => false));
	
?>
<script language="Javascript"  type="text/javascript">$(function() {$("#BotonContribuciones").activarTopMenu();});</script>
<style type="text/css" media="all">
div.ver{width:905px;border-left:1px solid #FFF}
div.datos_usuario {
	width:700px;
	float:left;
}
dl{width:700px;}
div.avatar{margin-top:10px}
</style>
<div class="users ver">
<?php
	echo $this->Html->gravatar_img($commit['Contribucion']['author_email']);
?>
<div class='datos_usuario'>
	<h2>Confirmación: <?php  echo $title;?></h2>
	<dl>
		<dt>Autor</dt>
		<dd>
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
		<dd class='timestamp'><?php echo $commit['Contribucion']['timestamp']; ?>
			&nbsp;
		</dd>
	</dl>
<h2>Mensaje</h2>
<pre><?php
	echo $msg;
?>
</pre>
<?php
$tipo_cambio = array(
		'added' => 'Archivos añadidos',
		'modified' => 'Archivos modificados',
		'removed' => 'Archivos eliminados',
);
foreach($tipo_cambio as $t=>$t_msg ){
	if( strlen($commit['Contribucion'][$t]) ){
		$files = explode("\n", $commit['Contribucion'][$t]);
		echo "\n<h2>{$t_msg}</h2>\n";
		echo '<ul id="list'.ucfirst($t).'">';
		foreach($files as $file) {
			echo "\n\t<li>{$file}</li>";
		}
		echo "\n</ul>";
	}
}
?>
<a href='<?php echo Router::url('/contribuciones/',true); ?>' class='boton_naranja'>Lista Contribuciones</a>

</div>
</div><!-- en datos usuarios -->
