<?php
$this->set('title_for_layout', 'ADSL  - Contactanos');
$this->Html->meta('description', 'Formulario de contacto, contactanos desde este medio', array('inline' => false));
#Sección CSS
$this->Html->css('pages.contacto','stylesheet', array('inline' => false ));
#sección javaScript
$this->Html->script(array(
											'activar.top.menu.jquery',
											'contacto',
											), array('inline' => false));
?>
<div class="formulario contacto">
	
<?php echo $this->Form->create('Page');?>
	<fieldset>
	
	<div id='splash'>
	<h1>Contacto ADSL</h1>
<pre><?php
echo h(
"              ,_     ,     .'<_            
     _      _> `'-,'(__.-' _/              
    |E]      `.- (.. )   =;`               
  .-|=====-.     `V-'`'\/`                 
  | | MAIL |                               
  |________|__'                            
      ||    _   _   _   _   _   _   _   _  
      ||   / \ / \ / \ / \ / \ / \ / \ / \ 
      ||  ( c | o | n | t | a | c | t | o )
      ||   \_/ \_/ \_/ \_/ \_/ \_/ \_/ \_/ 
      ||                                   
     \||  \ || /\\|/  |/         \|  |/    
|/___\|//__\||//_\V/_\|//_______\\|//V//\|/"
);
?></pre>
</div>
<div id='formData'>
<?php
	echo $this->Form->input('nombre');
	echo $this->Form->input('email');
	echo $this->Form->input('telefono');
	echo $this->Form->input('asunto');
	echo "</div>\n";
	echo $this->Wysiwyg->textarea('mensaje');
	/*echo $this->Recaptcha->show('clean');*/
?>
	</fieldset>
<?php echo $this->Form->end('contactanos');?>
</div>
