<?php
/**
 * adsl.org.mx
 * Plantilla ver - para cakephp con twbootstrap
 */
echo "<?php\n";
$baseCssJs = strtolower($pluralHumanName) . '.ver';
$titulo = $pluralHumanName . ' Ver';
$pre2="\n\t\t";
$pre3="\n\t\t\t";
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
			echo "<?php".
						$pre2."echo \$this->Html->link(".
						$pre3."'<i class=\"icon-home\"></i> Inicio " . $pluralHumanName . "',".
						$pre3."array('action' => 'index'),".
						$pre3."array('escape' => false)".
						$pre2."); ?>\n";
			?>
		</li>
		<li><?php
			echo "<?php".
						$pre2."echo \$this->Html->link(".
						$pre3."'<i class=\"icon-pencil\"></i> Editar " . $singularHumanName . "',".
						$pre3."array('action' => 'editar', \${$singularVar}['{$modelClass}']['{$primaryKey}']),".
						$pre3."array('escape' => false)".
						$pre2."); ?>\n";
			?>
		</li>
		<li><?php
			echo "<?php".
						$pre2."echo \$this->Form->postLink(".
						$pre3."'<i class=\"icon-trash\"></i> Borrar " . $singularHumanName . "',".
						$pre3."array('action' => 'borrar', \${$singularVar}['{$modelClass}']['{$primaryKey}']),".
						$pre3."array('escape' => false),".
						$pre3."'Esta seguro de querer borrar el registro ' . \${$singularVar}['{$modelClass}']['{$primaryKey}']".
						$pre2."); ?>\n";
			?>
		</li>
		<li><?php
			echo "<?php".
						$pre2."echo \$this->Html->link(".
						$pre3."'<i class=\"icon-plus\"></i> Agregar " . $singularHumanName . "',".
						$pre3."array('action' => 'Agregar'),".
						$pre3."array('escape' => false)".
						$pre2."); ?>\n";
			?>
		</li>
<?php
	$done = array();
	foreach ($associations as $type => $data) :
		foreach ($data as $alias => $details) {
			if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
				echo $pre2."<li class='divider'></li>";
				echo $pre2."<li class='nav-header'>" . Inflector::humanize($details['controller']) . "</li>";
				#Enlace Listar asociacion
				echo $pre2."<li><?php".
						 $pre3."echo \$this->Html->link(".
						 $pre3."'<i class=\"icon-list\"></i> Listar " . Inflector::humanize($details['controller']) . "',".
						 $pre3."array('controller' => '{$details['controller']}', 'action' => 'index'),".
						 $pre3."array('escape' => false)".
						 $pre2.");".
						 $pre2."?> </li>\n";
				#Enlace Agregar asociacion
				echo $pre2."<li><?php".
						 $pre3."echo \$this->Html->link(".
						 $pre3."'<i class=\"icon-plus\"></i> Agregar " . Inflector::humanize(Inflector::underscore($alias)) . "',".
						 $pre3."array('controller' => '{$details['controller']}', 'action' => 'agregar'),".
						 $pre3."array('escape' => false)".
						 $pre2.");".
						 $pre2."?> </li>\n";
				$done[] = $details['controller'];
			}
		}
	endforeach;
?>
	</ul>
</div>

<div class="<?php echo $pluralVar; ?> view span9">
<div class="page-header"><h1><?php echo $singularHumanName; ?></h1></div>
<table class="table table-bordered table-striped">
	<tbody><?php
#Generando la tabla de contenidos
foreach ($fields as $field) {
	$isKey = false;
	if (!empty($associations['belongsTo'])) {
		foreach ($associations['belongsTo'] as $alias => $details) {
			if ($field === $details['foreignKey']) {
				$isKey = true;
				echo "\n\t<tr>";
				echo "\n\t\t<th><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></th>";
				echo "\n\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t&nbsp;\n\t\t</td>";
				echo "\n\t</tr>";
				break;
			}
		}
	}
	if ($isKey !== true) {
		echo "\n\t<tr>";
		echo "\n\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>";
		echo "\n\t\t<td>\n\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t&nbsp;\n\t\t</td>";
		echo "\n\t</tr>";
	}
}
?>
	</tbody>
</table>

<div class="btn-group">
	<a href="#" class="btn btn-primary"><i class="icon-cog icon-white"></i> Acciones</a>
	<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><?php
			echo  "<?php".
						$pre2."echo \$this->Html->link(".
						$pre3."'<i class=\"icon-pencil\"></i> Editar',".
						$pre3."array('action' => 'editar', \${$singularVar}['{$modelClass}']['{$primaryKey}']),".
						$pre3."array('escape' => false)".
						$pre2."); ?>\n";
			?>
		</li>
		<li><?php
			echo  "<?php".
						$pre2."echo \$this->Form->postLink(".
						$pre3."'<i class=\"icon-trash\"></i> Borrar',".
						$pre3."array('action' => 'borrar', \${$singularVar}['{$modelClass}']['{$primaryKey}']),".
						$pre3."array('escape' => false)".
						$pre2."); ?>\n";
			?>
		</li>
		<li><?php
			echo  "<?php".
						$pre2."echo \$this->Html->link(".
						$pre3."'<i class=\"icon-list\"></i> Lista {$pluralHumanName}',".
						$pre3."array('action' => 'index'),".
						$pre3."array('escape' => false)".
						$pre2."); ?>\n";
			?>
		</li>
	</ul>
</div>

<?php
if (!empty($associations['hasOne'])) :
	foreach ($associations['hasOne'] as $alias => $details): ?>
	<div class="related">
		<h3><?php echo Inflector::humanize($details['controller']); ?> Relacionado</h3>
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
		<dl>
	<?php
			foreach ($details['fields'] as $field) {
				echo "\t\t<dt><?php echo __('" . Inflector::humanize($field) . "'); ?></dt>\n";
				echo "\t\t<dd>\n\t<?php echo \${$singularVar}['{$alias}']['{$field}']; ?>\n&nbsp;</dd>\n";
			}
	?>
		</dl>
	<?php echo "<?php endif; ?>\n"; ?>
			<ul>
				<li><?php echo "<?php echo \$this->Html->link('Editar " . Inflector::humanize(Inflector::underscore($alias)) . "', array('controller' => '{$details['controller']}', 'action' => 'editar', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></li>\n"; ?>
			</ul>
		</div>
	<?php
	endforeach;
endif;

/* Revisar esta implentación para agregar al core de cakePHP */
$relations = array();
foreach (array('hasMany', 'hasAndBelongsToMany') as $association);
{
	if (!empty($associations[$association])) {
		$relations += $associations[$association];
	}

}
$i = 0;
foreach ($relations as $alias => $details):
	$otherSingularVar = Inflector::variable($alias);
	$otherPluralHumanName = Inflector::humanize($details['controller']);

	?>
<div class="related">
	<h3><?php echo $otherPluralHumanName; ?> Relacionados</h3>
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
	<table class="table table-bordered table-striped">
	<tr>
<?php
			foreach ($details['fields'] as $field) {
				echo "\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
			}
?>
		<th class="actions">Acciones</th>
	</tr>
<?php
echo "\t<?php
		\$i = 0;
		foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
		echo "\t\t<tr>\n";
			foreach ($details['fields'] as $field) {
				echo "\t\t\t<td><?php echo \${$otherSingularVar}['{$field}']; ?></td>\n";
			}

			echo "\t\t\t<td class=\"actions\">";
			?>
			<div class="btn-group">
	<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><?php
			echo $pre2."<?php \n\t\techo \$this->Html->link(".
					 $pre3."'<i class=\"icon-eye-open\"></i> Ver',".
					 $pre3."array('controller' => '{$details['controller']}', 'action' => 'ver', \${$otherSingularVar}['{$details['primaryKey']}']),".
						$pre3."array('escape' => false)".
						$pre2."); ?>\n";
			?>
		</li>
		<li><?php
			echo $pre2."<?php \n\t\techo \$this->Html->link(".
					 $pre3."'<i class=\"icon-pencil\"></i> Editar',".
					 $pre3."array('controller' => '{$details['controller']}', 'action' => 'editar', \${$otherSingularVar}['{$details['primaryKey']}']),".
						$pre3."array('escape' => false)".
						$pre2."); ?>\n";
			?>
		</li>
		<li><?php
			echo $pre2."<?php \n\t\techo \$this->Form->postLink(".
					 $pre3."'<i class=\"icon-trash\"></i> Borrar',".
					 $pre3."array('controller' => '{$details['controller']}', 'action' => 'borrar', \${$otherSingularVar}['{$details['primaryKey']}']),".
						$pre3."array('escape' => false),".
						$pre3."\"Estas seguro de borrar el registro # {\${$otherSingularVar}['{$details['primaryKey']}']}?\"".
						$pre2."); ?>\n";
			?>
		</li>
	</ul>
	</div>
	</td>
</tr>
<?php
echo "\t<?php endforeach; ?>\n";
?>
	</table>
<?php echo "<?php endif; ?>\n\n"; ?>
	<div class="actions"><?php
	echo "<?php\n".
				$pre2."echo \$this->Html->link(".
				$pre3."'Nuevo " . Inflector::humanize(Inflector::underscore($alias)) . "',".
				$pre3."array('controller' => '{$details['controller']}', 'action' => 'agregar'),".
				$pre3."array('class' => 'btn btn-info')".
				$pre2."); ?>"; ?>
	</div>
</div>
<?php endforeach; ?>
</div>
