<?php
/**
 * adsl.org.mx
 * Plantilla index - para cakephp con twbootstrap
 */
echo "<?php\n";
$baseCssJs = strtolower($pluralVar) . '.index';
$titulo = $pluralHumanName . ' Index';
?>
/**
 * adsl.org.mx
 * Vista:  <?php echo $titulo."\n"; ?>
 */

#sección metaDatos
$this->set('title_for_layout', 'Correo Facil - <?php echo $titulo; ?>');
$this->Html->meta('description', '<?php echo $titulo; ?>', array('inline' => false));

#sección CSS
#$this->Html->css(array(
#						'<?php echo $baseCssJs; ?>',
#						), 'stylesheet', array('inline' => false));

#sección Javascript
#$this->Html->script(array(
#											'<?php echo $baseCssJs; ?>',
#											), array('inline' => false));
<?php echo "?>\n"; ?>
<div class="row-fluid">
	<div class="actions span3 well sidebar-nav">
	<h3>Acciones</h3>
	<ul class="nav nav-list">
		<li><?php
				echo "\n\t<?php".
							"\n\t\techo \$this->Html->link(".
							"\n\t\t'<i class=\"icon-plus\"></i> Agregar',".
							"\n\t\tarray('action' => 'agregar'),".
							"\n\t\tarray('escape' => false)".
							"\n\t); ?>\n";
				?>
		</li>
<?php
	$done = array();
	foreach ($associations as $type => $data) {
		foreach ($data as $alias => $details) {
			if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) { ?>
			<li class='divider'></li>
			<li class='nav-header'>
				<?php echo Inflector::humanize($details['controller'])."\n" ?>
			</li>
			<li><?php
				echo "\n\t<?php".
							"\n\t\techo \$this->Html->link(".
							"\n\t\t'<i class=\"icon-home\"></i> Listar',".
							"\n\t\tarray('controller' => '{$details['controller']}', 'action' => 'index'),".
							"\n\t\tarray('escape' => false)".
							"\n\t); ?>\n";
				?>
			</li>
			<li><?php
				echo "\n\t<?php".
							"\n\t\techo \$this->Html->link(".
							"\n\t\t'<i class=\"icon-plus\"></i> Agregar',".
							"\n\t\tarray('controller' => '{$details['controller']}', 'action' => 'agregar'),".
							"\n\t\tarray('escape' => false)".
							"\n\t); ?>\n";
				?>
			</li>
<?php
			}
		}
	}
?>
	</ul>
</div>

<div class="<?php echo $pluralVar; ?> index span9">
	<div class="page-header"><h1>Lista de <?php echo $pluralVar; ?></h1></div>
	<table class="table table-bordered table-striped">
	<tr>
	<?php  foreach ($fields as $field): ?>
		<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
	<?php endforeach; ?>
		<th class="actions">Acciones</th>
	</tr>
	<?php
	echo "<?php
	foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
	echo "\t<tr>\n";
		foreach ($fields as $field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'ver', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
						break;
					}
				}
			}
			if ($isKey !== true) {
				if($field == $details['primaryKey']) {
						echo "\t\t<td><?php echo \$this->Html->link(\${$singularVar}['{$modelClass}']['{$field}'], array('action' => 'ver', \${$singularVar}['{$modelClass}']['{$field}'])); ?></td>\n";
				} else {
					echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
				}
			}
		}
		echo "\t\t<td class=\"actions\">\n";
?>
<div class="btn-group">
	<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><?php
			echo "\n\t<?php \n\t\techo \$this->Html->link(".
						"\n\t\t'<i class=\"icon-eye-open\"></i> Ver',".
						"\n\t\tarray('action' => 'ver', \${$singularVar}['{$modelClass}']['{$primaryKey}']),".
						"\n\t\tarray('escape' => false)".
						"\n\t); ?>\n";
			?>
		</li>
		<li><?php
			echo "\n\t<?php \n\t\techo \$this->Html->link(".
						"\n\t\t'<i class=\"icon-pencil\"></i> Editar',".
						"\n\t\tarray('action' => 'editar', \${$singularVar}['{$modelClass}']['{$primaryKey}']),".
						"\n\t\tarray('escape' => false)".
						"\n\t); ?>\n";
			?>
		</li>
		<li><?php
			echo "\n\t<?php \n\t\techo \$this->Form->postLink(".
						"\n\t\t'<i class=\"icon-trash\"></i> Borrar',".
						"\n\t\tarray('action' => 'borrar', \${$singularVar}['{$modelClass}']['{$primaryKey}']),".
						"\n\t\tarray('escape' => false),".
						"\n\t\t'¿Deseas eliminar este registro?'".
						"\n\t); ?>\n";
			?>
		</li>
	</ul>
</div>
</td>
</tr>
<?php
	echo "<?php endforeach; ?>\n";
	?>
	</table>
	<small class="pull-right">
	<?php echo "<?php
	echo \$this->Paginator->counter(array(
	'format' => 'Página {:page} de {:pages}, viendo {:current} registros de un total de {:count}, iniciando en el registro {:start}, cabando en {:end}'
	));
	?>\n"; ?>
	</small>
<div class="paging">
	<?php
		echo "<?php\n";
		echo "\t\techo \$this->Paginator->prev('< Anterior', array(), null, array('class' => 'prev disabled'));\n";
		echo "\t\techo \$this->Paginator->numbers(array('separator' => ''));\n";
		echo "\t\techo \$this->Paginator->next('Siguiente >', array(), null, array('class' => 'next disabled'));\n";
		echo "\t?>\n";
	?>
	</div>
</div>
</div>
