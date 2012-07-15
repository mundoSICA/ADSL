<div itemscope itemtype="http://data-vocabulary.org/Person">
<?php
if( !empty( $result ) && isset($result['profile_image_url']) ):


?>
	<?php
		echo $this->Html->image($result['profile_image_url']);
	?>
	Mi nombre es <span itemprop="name"><?php
	echo $result['screen_name'];
	?></span>, <br />
	pero me llaman <span itemprop="nickname"><?php
	echo $result['name'];
	?></span>. <br />
	Esta es mi página principal: 
	<?php 
	echo $this->Html->link($result['url'], $result['url']);
	echo '<h2>Descripción</h2>';
	echo  $result['description'];
	/*echo '<h1>Postear en twitter</h1>'
	echo $this->Form->create('Page');
	echo $this->Form->input('mensaje', array('type'=> 'textarea'));
	echo $this->Form->end('postear');*/
?>
<?php endif; ?>
</div>
