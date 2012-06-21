<?php
/* Titutlo:     Elemento pie_logo_promovemos
 * Autor:       @Fitorec
 * Descripcion: Este elemento es donde van los iconos de las recomendaciones del ADSL
 * Link-info:   http://book.cakephp.org/2.0/en/views.html#using-view-blocks
 */
?>
<div class="separadorfooter">Nosotros promovemos el uso de:</div>
<div class="logosfooter">
    <a href="http://www.ubuntu.com/" rel="external">
		<?php
					echo $this->Html->image('ubuntu.jpg', array('alt'=>'ubuntu'));
		?>
	</a>
	<a href="http://www.joomla.org/" rel="external">
		<?php
					echo $this->Html->image('joomla.jpg', array('alt'=>'Joomla'));
		?>
	</a>
	<a href="http://www.mysql.com/" rel="external">
		<?php
					echo $this->Html->image('mysql.jpg', array('alt'=>'Mysql'));
		?>
	</a>
	<a href="http://www.php.net/" rel="external">
		<?php
					echo $this->Html->image('php.jpg', array('alt'=>'PHP'));
		?>
	</a>
		<?php
					echo $this->Html->image('debian.jpg', array('alt'=>'debian'));
		?>
	</a>
	<a href="http://es.opensuse.org/" rel="external">
		<?php
					echo $this->Html->image('suse.jpg', array('alt'=>'suse'));
		?>
	</a>
	<a href="http://www.blender.org/" rel="external">
		<?php
					echo $this->Html->image('blender.jpg', array('alt'=>'Blender'));
		?>
	</a>
    <a href="http://wordpress.org/" rel="external">
		<?php
					echo $this->Html->image('wordpress.jpg', array('alt'=>'wordpress'));
		?>
	</a>
	<a href="http://es.openoffice.org/" rel="external">
		<?php
					echo $this->Html->image('openoffice.jpg', array('alt'=>'openOffice'));
		?>
	</a>
	<a href="http://www.linux.org/" rel="external">
			<?php
					echo $this->Html->image('linux.jpg', array('alt'=>'Linux'));
		?>
	</a>
	<a href="http://www.mozilla-europe.org/es/firefox/" rel="external">
		<?php
					echo $this->Html->image('firefox.jpg', array('alt'=>'Firefox'));
		?>
	</a>
	<a href="http://www.inkscape.org/?lang=es" rel="external">
		<?php
					echo $this->Html->image('inkscape.jpg', array('alt'=>'Inskape'));
		?>
	</a>
</div>
