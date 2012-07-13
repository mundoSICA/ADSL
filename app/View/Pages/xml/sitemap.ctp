<?php echo '<?xml version="1.0" encoding="UTF-8"?>'."\n"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
	<url>
		<loc><?php echo Router::url('/', true); ?></loc>
		<lastmod><?php echo date('Y-m-d'); ?></lastmod>
		<changefreq>daily</changefreq>
		<priority>1.0</priority>
	</url>
	<!-- Página de Contacto -->
	<url>
		<loc><?php echo Router::url('/pages/contacto',true); ?></loc>
		<priority>0.9</priority>
		<changefreq>yearly</changefreq>
	</url>
	<!-- Página de Contribuciones -->
	<url>
		<loc><?php echo Router::url('/contribuciones',true); ?></loc>
		<priority>0.7</priority>
		<changefreq>weekly</changefreq>
	</url>
	<!-- seccion talleres -->
	<url>
		<loc><?php echo Router::url('/talleres',true); ?></loc>
		<priority>1.0</priority>
		<changefreq>weekly</changefreq>
	</url>
	<url>
		<loc><?php echo Router::url('/talleres/calendario',true); ?></loc>
		<priority>1.0</priority>
		<changefreq>monthly</changefreq>
	</url>
<?php
if( isset($talleres) && !empty($talleres) ):
$talleres_url = Router::url('/talleres/ver/', true);
$taller_url_img = Router::url('/img/talleres/', true);
foreach ($talleres as $taller):
$img_loc = $taller_url_img.$taller['Taller']['slug_dst'] . '.jpg';
$lastmod = explode(' ', $taller['Taller']['modified']);
$lastmod = $lastmod[0];
$priority = '0.7';
$changefreq = 'monthly';
if($taller['Taller']['status'] == 'abierto'){
	$priority = '1.0';
	$changefreq = 'daily';
}
?>
	<url>
		<loc><?php echo $talleres_url.$taller['Taller']['slug_dst']; ?></loc>
		<image:image>
			<image:loc><?php echo $img_loc; ?></image:loc>
		</image:image>
		<lastmod><?php echo $lastmod; ?></lastmod>
		<priority><?php echo $priority; ?></priority>
		<changefreq><?php echo $changefreq; ?></changefreq>
	</url>
<?php
endforeach;
endif; ?>
	<!-- seccion usuarios -->
	<url>
		<loc><?php echo Router::url('/users',true); ?></loc>
		<priority>1.0</priority>
		<changefreq>weekly</changefreq>
	</url>
	<url>
		<loc><?php echo Router::url('/users/registro',true); ?></loc>
		<priority>1.0</priority>
		<changefreq>never</changefreq>
	</url>
<?php
$ver_user = Router::url('/usuarios/ver/', true);
foreach ($usuarios as $u):
?>
	<url>
		<loc><?php echo $ver_user.$u['User']['username']; ?></loc>
		<lastmod><?php
        $date = explode(' ', $u['User']['modified']);
        echo $date[0]; ?></lastmod>
		<priority>0.5</priority>
		<changefreq>monthly</changefreq>
	</url>
<?php
endforeach;
?>
</urlset>
