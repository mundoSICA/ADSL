<!DOCTYPE html>
<html lang="es-MX">
<head>
	<title><?php echo $title_for_layout;?></title>
</head>
<body style='
	line-height: 1;
	font:15px/1.4 Helvetica,arial,freesans,clean,sans-serif;
	background:#e3e3e3;
	color:#444;
	padding:5px;
	'
	>
<div style='
	width: 95%;
	max-width: 750px;
	padding:0;
	margin:2px auto; background: #FFF;
	overflow:hidden;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	-o-border-radius:10px;
	border-radius:10px;'>
	<?php
		## Sección cabecera
	?>
		<div style="background: #c47d15;margin:-16px 0 0 0;padding:20px;border:0;">
				<h2><a href='http://adsl.org.mx/' style='text-decoration:none;color:#FFF;margin: 0 20px'>adsl.org.mx</a></h2>
		</div>
		<div style="padding: 10px 10px 5px 10px">
			<?php echo $content_for_layout ;?>
			<p style='color: #AAA; text-align: right'>
				Este correo ha sido enviado automaticamente usando el <strong>robot ADSL</strong></a><br>
				 Si desea no recibir más notificaciones puedes cambiar las opciones de tu perfil.
			</p>
		</div>
</div>
</body>
</html>
