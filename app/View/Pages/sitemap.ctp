<?php echo '<?xml version="1.0" encoding="UTF-8"?>'."\n"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc><?php echo Router::url('/', true); ?></loc>
		<lastmod><?php echo date('Y-m-d'); ?></lastmod>
		<changefreq>daily</changefreq>
		<priority>1.0</priority>
	</url>
	<!-- seccion talleres -->
<?php
if( isset($talleres) && !empty($talleres) ):
$talleres_url = Router::url('/talleres/ver/', true);
foreach ($talleres as $taller):
?>
    <url>
        <loc><?php echo $talleres_url.$taller['Taller']['slug_dst']; ?></loc>
        <lastmod><?php echo $taller['Taller']['modified']; ?></lastmod>
<?php
					if($taller['Taller']['status'] == 'abierto'){
						echo "\t\t<priority>1.0</priority>";
						echo "\n\t\t<changefreq>daily</changefreq>";
					}else{
						echo "\t\t<priority>0.7</priority>";
						echo "\n\t\t<changefreq>monthly</changefreq>";
					}
					?>
    </url>
<?php
endforeach;
endif; ?>
	<!-- seccion usuarios -->
<?php
foreach ($usuarios as $u):
$ver_user = Router::url('/usuarios/ver/', true);
?>
    <url>
        <loc><?php echo $ver_user.$u['User']['username']; ?></loc>
        <lastmod><?php echo $u['User']['modified']; ?></lastmod>
        <priority>0.5</priority>
        <changefreq>monthly</changefreq>
    </url>
<?php
endforeach;
?>
</urlset>
