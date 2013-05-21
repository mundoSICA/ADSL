<?php
/**
 * adsl.org.mx
 * Plantilla ver - para cakephp con twbootstrap
 */

echo "<?php\n";
$baseCssJs = strtolower($pluralHumanName) . '.ver';
$titulo = $pluralHumanName . ' Ver';
$pre1="\n\t";
$pre2="\n\t\t";
$pre3="\n\t\t\t";
$pre4="\n\t\t\t";

?>
/**
 * adsl.org.mx
 * Vista:  <?php echo $titulo."\n"; ?>
 */

#iniciando la autenticación
$this->Html->initAuth($userAuth);

#sección metaDatos
$this->set('title_for_layout', 'ADSL - <?php echo $titulo; ?>');
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
			/* Botón de Inicio ADSL */
			echo "<?php";
			echo $pre3 . "/* Botón de Inicio ADSL */";
			echo $pre3 . "echo \$this->Html->link('<i class=\"icon-home\"></i> Inicio ADSL',";
			echo $pre4 . "array('/'),";
			echo $pre4 . "array('escape' => false)";
			echo $pre3 . "); ?>" . $pre3;
		?></li>
		<li><?php
			echo "<?php";
			echo $pre2 . "echo \$this->Html->link(";
			echo $pre3 . "'<i class=\"icon-home\"></i> Inicio " . $pluralHumanName . "',";
			echo $pre3 . "array('action' => 'index'),";
			echo $pre3 . "array('escape' => false)";
			echo $pre2 . "); ?>\n";
			?>
		</li>
<?php
	echo "<?php";
	echo $pre2 . "/* Editar {$singularHumanName} */";
	echo $pre1 . "if(in_array(\$userAuth['role'], array('admin', 'miembro'))) :" . $pre2;
?>
		<li><?php
			echo "<?php";
			echo $pre2 . "echo \$this->Html->link(";
			echo $pre3 . "'<i class=\"icon-plus\"></i> Agregar " . $singularHumanName . "',";
			echo $pre3 . "array('action' => 'Agregar'),";
			echo $pre3 . "array('escape' => false)";
			echo $pre2 . "); ?>";
			?></li>
		<li><?php
			echo "<?php";
			echo $pre2 . "echo \$this->Html->link(";
			echo $pre3 . "'<i class=\"icon-pencil\"></i> Editar " . $singularHumanName . "',";
			echo $pre3 . "array('action' => 'editar', \${$singularVar}['{$modelClass}']['{$primaryKey}']),";
			echo $pre3 . "array('escape' => false)";
			echo $pre2 . "); ?>" . $pre2;
		?></li>

<?php echo $pre1 . "<?php endif; ?>" ?>;

<?php
	echo "<?php";
	echo $pre1 . "/* Editar {$singularHumanName} */";
	echo $pre1 . "if(\$userAuth['role'] == 'admin') :" . $pre1;
?>
		<li><?php
			echo "<?php";
			echo $pre2 . "echo \$this->Form->postLink(";
			echo $pre3 . "'<i class=\"icon-trash\"></i> Borrar " . $singularHumanName . "',";
			echo $pre3 . "array('action' => 'borrar', \${$singularVar}['{$modelClass}']['{$primaryKey}']),";
			echo $pre3 . "array('escape' => false),";
			echo $pre3 . "'Esta seguro de querer borrar el registro ' . \${$singularVar}['{$modelClass}']['{$primaryKey}']";
			echo $pre2 . "); ?>\n";
			?>
		</li>
<?php echo $pre1 . "<?php endif; ?>" ?>;

<?php
	$done = array();
	foreach ($associations as $type => $data) :
		foreach ($data as $alias => $details) {
			if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
				echo $pre2."<li class='divider'></li>";
				echo $pre2."<li class='nav-header'>" . Inflector::humanize($details['controller']) . "</li>";

				# Enlace Lista asociacion
				echo $pre2 . "<li><?php";
				echo $pre3 . "echo \$this->Html->link(";
				echo $pre3 . "'<i class=\"icon-list\"></i> Lista de " . Inflector::humanize($details['controller']) . "',";
				echo $pre3 . "array('controller' => '{$details['controller']}', 'action' => 'index'),";
				echo $pre3 . "array('escape' => false)";
				echo $pre2 . ");";
				echo $pre2 . "?> </li>";

				# Enlace Agregar asociacion
				echo $pre1 . "<?php";
				echo $pre1 . "/* Agregar */";
				echo $pre1 . "if(in_array(\$userAuth['role'], array('admin', 'miembro'))) :";
				echo $pre2 . "<li><?php";
				echo $pre3 . "echo \$this->Html->link(";
				echo $pre3 . "'<i class=\"icon-plus\"></i> Agregar " . Inflector::humanize(Inflector::underscore($alias)) . "',";
				echo $pre3 . "array('controller' => '{$details['controller']}', 'action' => 'agregar'),";
				echo $pre3 . "array('escape' => false)";
				echo $pre2 . ");";
				echo $pre2 . "?> </li>";
				echo $pre1 . "<?php endif; ?>";
				$done[] = $details['controller'];
			}
		}
	endforeach;
?>
	<!-- Compartir sección -->
			<li class='divider'></li>
			<li class='nav-header'>
				<i class="icon-share"></i> Compartir
			</li>
		<li><?php
		echo "<?php";
		echo $pre2 . "echo \$this->QrCode->url(";
		echo $pre3 . "'/{$pluralVar}/ver', array('size' => '170x170', 'margin' => 0)";
		echo $pre2 . ");";
		echo $pre2 . "?>";
		?></li>
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
				echo $pre2 . "<tr>";
				echo $pre3 . "<th><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></th>";
				echo $pre3 . "<td>";
				echo $pre4 . "<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>";
				echo $pre3 . "</td>";
				echo $pre2 . "</tr>";
				break;
			}
		}
	}
	if ($isKey !== true) {
		echo $pre2 . "<tr>";
		echo $pre3 . "<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>";
		echo $pre3 . "<td>";
		echo $pre4 . "<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>";
		echo $pre2 . "</td>";
		echo $pre2 . "</tr>";
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
						$pre2 . "echo \$this->Html->link(".
						$pre3 . "'<i class=\"icon-pencil\"></i> Editar',".
						$pre3 . "array('action' => 'editar', \${$singularVar}['{$modelClass}']['{$primaryKey}']),".
						$pre3 . "array('escape' => false)".
						$pre2 . "); ?>\n";
			?>
		</li>
		<li><?php
			echo  "<?php".
						$pre2 . "echo \$this->Form->postLink(".
						$pre3 . "'<i class=\"icon-trash\"></i> Borrar',".
						$pre3 . "array('action' => 'borrar', \${$singularVar}['{$modelClass}']['{$primaryKey}']),".
						$pre3 . "array('escape' => false)".
						$pre2 . "); ?>\n";
			?>
		</li>
		<li><?php
			echo  "<?php".
						$pre2 . "echo \$this->Html->link(".
						$pre3 . "'<i class=\"icon-list\"></i> Lista {$pluralHumanName}',".
						$pre3 . "array('action' => 'index'),".
						$pre3 . "array('escape' => false)".
						$pre2 . "); ?>\n";
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
				echo $pre2 . "<dt><?php echo __('" . Inflector::humanize($field) . "'); ?></dt>";
				echo $pre2 . "<dd><?php echo \${$singularVar}['{$alias}']['{$field}']; ?>&nbsp;</dd>\n";
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
	</tr><?php
	echo $pre1 . "<?php";
	echo $pre2 . "\$i = 0;";
	echo $pre2 . "foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>";
	echo $pre2 . "<tr>";
	foreach ($details['fields'] as $field) {
		echo $pre3 . "<td><?php echo \${$otherSingularVar}['{$field}']; ?></td>";
	}
	echo $pre3 . "<td class=\"actions\">";
	?>

	<div class="btn-group">
	<a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><?php
			echo $pre2 . "<?php";
			echo $pre2 . "echo \$this->Html->link(";
			echo $pre3 . "'<i class=\"icon-eye-open\"></i> Ver',";
			echo $pre3 . "array('controller' => '{$details['controller']}', 'action' => 'ver', \${$otherSingularVar}['{$details['primaryKey']}']),";
			echo $pre3 . "array('escape' => false)";
			echo $pre2 . "); ?>\n";
			?>
		</li>
		<li><?php
			echo $pre2 . "<?php";
			echo $pre2 . "echo \$this->Html->link(";
			echo $pre3 . "'<i class=\"icon-pencil\"></i> Editar',";
			echo $pre3 . "array('controller' => '{$details['controller']}', 'action' => 'editar', \${$otherSingularVar}['{$details['primaryKey']}']),";
			echo $pre3 . "array('escape' => false)";
			echo $pre2 . "); ?>" . $pre1;
			?>
		</li>
		<li><?php
			echo $pre2 . "<?php";
			echo $pre2 . "echo \$this->Form->postLink(";
			echo $pre3 . "'<i class=\"icon-trash\"></i> Borrar',";
			echo $pre3 . "array('controller' => '{$details['controller']}', 'action' => 'borrar', \${$otherSingularVar}['{$details['primaryKey']}']),";
			echo $pre3 . "array('escape' => false),";
			echo $pre3 . "\"Estas seguro de borrar el registro # {\${$otherSingularVar}['{$details['primaryKey']}']}?\"";
			echo $pre2 . "); ?>\n";
			?>
		</li>
	</ul>
	</div>
	</td>
</tr>
<?php
echo $pre1 . "<?php endforeach; ?>" . $pre1;
?>
	</table>
<?php echo "<?php endif; ?>" . $pre2; ?>
	<div class="actions"><?php
	echo "<?php";
	echo $pre2 . "echo \$this->Html->link(";
	echo $pre3 . "'Nuevo " . Inflector::humanize(Inflector::underscore($alias)) . "',";
	echo $pre3 . "array('controller' => '{$details['controller']}', 'action' => 'agregar'),";
	echo $pre3 . "array('class' => 'btn btn-info')";
	echo $pre2 . "); ?>" . $pre2;
	?></div>
</div>
<?php endforeach; ?>
</div>
