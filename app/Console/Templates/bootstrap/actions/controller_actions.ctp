<?php
/**
 * Bake Template for Controller action generation.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.actions
 * @since         CakePHP(tm) v 1.3
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$prefix = str_replace('_', ': ', ucfirst($admin));
if( $prefix == '' )
	$prefix = 'Internauta: ';

?>

/*********************************************************************************
 * <?php echo $prefix."Sección acciones".str_repeat(' ', 62 - strlen($prefix))?>*
 *********************************************************************************/

/**
 * <?php echo $prefix ?>index - lista los registros con paginación
 *
 * @return void
 */
	public function <?php echo $admin ?>index() {
		$this-><?php echo $currentModelName ?>->recursive = 0;
		$this->set('<?php echo $pluralName ?>', $this->paginate());
	}// fin <?php echo $admin; ?>index

/**
 * <?php echo $prefix ?>ver un registro en especifico
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function <?php echo $admin ?>ver($id = null) {
		$this-><?php echo $currentModelName; ?>->id = $id;
		if (!$this-><?php echo $currentModelName; ?>->exists()) {
			throw new NotFoundException(__('<?php echo $singularHumanName; ?> inválido'));
		}
		$this->set('<?php echo $singularName; ?>', $this-><?php echo $currentModelName; ?>->read(null, $id));
	}// fin <?php echo $admin; ?>ver

<?php $compact = array(); ?>
/**
 * <?php echo $prefix ?>agregar un registro
 *
 * @return void
 */
	public function <?php echo $admin ?>agregar() {
		if ($this->request->is('post')) {
			$this-><?php echo $currentModelName; ?>->create();
			if ($this-><?php echo $currentModelName; ?>->save($this->request->data)) {
<?php if ($wannaUseSession): ?>
				$this->Session->setFlash(__('El <?php echo strtolower($singularHumanName); ?> fue guardado'));
				$this->redirect(array('action' => 'index'));
<?php else: ?>
				$this->flash(__('El <?php echo strtolower($currentModelName); ?> fue guardado.'), array('action' => 'index'));
<?php endif; ?>
			} else {
<?php if ($wannaUseSession): ?>
				$this->Session->setFlash(__('El <?php echo strtolower($singularHumanName); ?> no pudo ser guardado. Por favor, intente de nuevo.'));
<?php endif; ?>
			}
		}
<?php
	foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
		foreach ($modelObj->{$assoc} as $associationName => $relation):
			if (!empty($associationName)):
				$otherModelName = $this->_modelName($associationName);
				$otherPluralName = $this->_pluralName($associationName);
				echo "\t\t\${$otherPluralName} = \$this->{$currentModelName}->{$otherModelName}->find('list');\n";
				$compact[] = "'{$otherPluralName}'";
			endif;
		endforeach;
	endforeach;
	if (!empty($compact)):
		echo "\t\t\$this->set(compact(".join(', ', $compact)."));\n";
	endif;
?>
	}// fin <?php echo $admin; ?>agregar

<?php $compact = array(); ?>
/**
 * <?php echo $prefix ?>editar un registro
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function <?php echo $admin; ?>editar($id = null) {
		$this-><?php echo $currentModelName; ?>->id = $id;
		if (!$this-><?php echo $currentModelName; ?>->exists()) {
			throw new NotFoundException(__('<?php echo $singularHumanName; ?> inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this-><?php echo $currentModelName; ?>->save($this->request->data)) {
<?php if ($wannaUseSession): ?>
				$this->Session->setFlash(__('El <?php echo strtolower($singularHumanName); ?> fue guardado'));
				$this->redirect(array('action' => 'index'));
<?php else: ?>
				$this->flash(__('El <?php echo strtolower($singularHumanName); ?> fue guardado'), array('action' => 'index'));
<?php endif; ?>
			} else {
<?php if ($wannaUseSession): ?>
				$this->Session->setFlash(__('El <?php echo strtolower($singularHumanName); ?> no pudo ser guardado. Por favor, intente de nuevo.'));
<?php endif; ?>
			}
		} else {
			$this->request->data = $this-><?php echo $currentModelName; ?>->read(null, $id);
		}
<?php
		foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
			foreach ($modelObj->{$assoc} as $associationName => $relation):
				if (!empty($associationName)):
					$otherModelName = $this->_modelName($associationName);
					$otherPluralName = $this->_pluralName($associationName);
					echo "\t\t\${$otherPluralName} = \$this->{$currentModelName}->{$otherModelName}->find('list');\n";
					$compact[] = "'{$otherPluralName}'";
				endif;
			endforeach;
		endforeach;
		if (!empty($compact)):
			echo "\t\t\$this->set(compact(".join(', ', $compact)."));\n";
		endif;
	?>
	}// fin <?php echo $admin; ?>editar

/**
 * <?php echo $prefix ?>borrar un registro
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function <?php echo $admin; ?>borrar($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this-><?php echo $currentModelName; ?>->id = $id;
		if (!$this-><?php echo $currentModelName; ?>->exists()) {
			throw new NotFoundException(__('<?php echo $singularHumanName; ?> inválido'));
		}
		if ($this-><?php echo $currentModelName; ?>->delete()) {
<?php if ($wannaUseSession): ?>
			$this->Session->setFlash(__('El <?php echo strtolower($singularHumanName); ?> fue borrado'));
			$this->redirect(array('action' => 'index'));
<?php else: ?>
			$this->flash(__('El (<?php echo strtolower($singularHumanName); ?> fue borrado'), array('action' => 'index'));
<?php endif; ?>
		}
<?php if ($wannaUseSession): ?>
		$this->Session->setFlash(__('El <?php echo strtolower($singularHumanName); ?> no pudo ser borrado'));
<?php else: ?>
		$this->flash(__('El <?php echo strtolower($singularHumanName); ?> no pudo ser borrado'), array('action' => 'index'));
<?php endif; ?>
		$this->redirect(array('action' => 'index'));
	}// fin <?php echo $admin; ?>borrar
