<?php
/**
 * micorreofacil.com
 * Plantilla form - para cakephp con twbootstrap
 */
echo "<?php\n";
$baseCssJs   = $baseCssJs2 = strtolower($pluralHumanName);
$baseCssJs2 .= (strpos($action, 'add')===false?'.editar':'.agregar');
$baseCssJs  .=  '.formulario';
$titulo = $pluralHumanName . ' ' .(strpos($action, 'add')===false?'Editar':'Agregar');
?>
/**
 * micorreofacil.com
 * Vista:  <?php echo $titulo."\n"; ?>
 */

#sección metaDatos
$this->set('title_for_layout', 'Correo Facil - <?php echo $titulo; ?>');
$this->Html->meta('description', '<?php echo $titulo; ?>', array('inline' => false));

#sección CSS
#$this->Html->css(array(
#						'<?php echo $baseCssJs; ?>',
#						'<?php echo $baseCssJs2; ?>',
#						), 'stylesheet', array('inline' => false));

#sección Javascript
#$this->Html->script(array(
#											'<?php echo $baseCssJs; ?>',
#											'<?php echo $baseCssJs2; ?>',
#											), array('inline' => false));
<?php echo "?>\n"; ?>
<div class="row-fluid">

<div class="actions span3 well sidebar-nav">
	<h3>Acciones</h3>
	<ul class="nav nav-list">
		<li>
			<?php echo "<?php echo \$this->Html->link('<i class=\"icon-home\"></i> Listar " . strtolower($pluralHumanName) . "', array('action' => 'index'), array('escape' => false)); ?>\n"; ?>
		</li>
<?php if (strpos($action, 'add') === false): ?>
		<li>
			<?php echo "<?php echo \$this->Html->link('<i class=\"icon-plus\"></i> Agregar un " . strtolower($singularHumanName) . "', array('action' => 'agregar'), array('escape' => false)); ?>\n"; ?>
		</li>
		<li>
			<?php echo "<?php echo \$this->Form->postLink('<i class=\"icon-remove\"></i> Borrar este "
		. strtolower($singularHumanName) . "', array('action' => 'borrar', \$this->Form->value('{$modelClass}.{$primaryKey}')), array('escape' => false), 'Estas seguro de querer borrar el registro # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}')); ?>\n"; ?>
		</li>
<?php endif; ?>
<?php
		$done = array();
		foreach ($associations as $type => $data) {
			foreach ($data as $alias => $details) {
				if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
					echo "\t\t<li class='divider'></li>\n";
					echo "\t\t<li class='nav-header'>".Inflector::humanize($details['controller'])."</li>\n";
					echo "\t\t<li><?php echo \$this->Html->link('<i class=\"icon-home\"></i> Listar " . Inflector::humanize($details['controller']) . "', array('controller' => '{$details['controller']}', 'action' => 'index'), array('escape' => false)); ?> </li>\n";
					echo "\t\t<li><?php echo \$this->Html->link('<i class=\"icon-plus\"></i> Agregar " . Inflector::humanize(Inflector::underscore($alias)) . "', array('controller' => '{$details['controller']}', 'action' => 'agregar'), array('escape' => false)); ?> </li>\n";
					$done[] = $details['controller'];
				}
			}
		}
?>
	</ul>
</div>

<div class="<?php echo $pluralVar; ?> form span9">
<?php echo "<?php echo \$this->Form->create('{$modelClass}', array('class' => 'well')); ?>\n"; ?>
	<fieldset>
		<legend><?php echo (strpos($action, 'add')===false?'Editar':'Agregar').' ' . $singularHumanName; ?></legend>
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				echo "\t\techo \$this->Form->input('{$field}');\n";
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}');\n";
			}
		}
		echo "\t?>\n";
?>
	</fieldset>
<?php
	$redirect = "array('action' => 'index')";
		if ($action == 'edit') {
		$redirect = "array('action' => 'ver', \$this->data['{$modelClass}']['{$primaryKey}'])";
	}
	echo "<?php echo \$this->Html->link('Cancelar', {$redirect}, array('class'=>'btn btn-danger btn-large')); ?> | ";
	echo "<?php echo \$this->Form->end('Enviar'); ?>\n";
?>
</div>
</div>

