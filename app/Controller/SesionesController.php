<?php
/**
 * Controlador Sesiones
 *
 * @author     @fitorec - <chanerec@gmail.com>
 * @copyright  2012-2012 adsl.org.mx
 * @created    September 4, 2012, 7:49 am
 * @property Sesion $Sesion
 */

App::uses('AppController', 'Controller');

class SesionesController extends AppController {
var $helpers = array(
		'Markdown',
	);
/**
 * beforeFilter - Se ejecuta antes de cada acción
 */
	function beforeFilter() {
				$this->Auth->allow(array('*'));
				parent::beforeFilter();
	}// fin beforeFilter
/*********************************************************************************
 * Admin: Sección acciones                                                       *
 *********************************************************************************/

/**
 * Internauta: index - lista los registros con paginación
 *
 * @return void
 */
	public function index() {
		$this->Sesion->recursive = 0;
		$this->set('sesiones', $this->paginate());
	}// fin index

/**
 * ver de un Internauta
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function ver($slug = null) {
		$id = $this->Sesion->primaryKeyBySlug($slug, true);
		if (!$this->Sesion->exists()) {
			throw new NotFoundException('Sesion inválido');
		}
		$sesion = $this->Sesion->read(null, $id);
		$sesion['sesiones'] = $this->Sesion->sesiones($sesion['Taller']['id']);
		$this->set('sesion', $sesion);
	}// fin ver

/**
 * Admin: agregar un registro
 *
 * @return void
 */
	public function miembro_agregar($taller_slug) {
		$taller_id = $this->Sesion->Taller->primaryKeyBySlug($taller_slug, true);
		if (!$this->Sesion->Taller->exists()) {
			throw new NotFoundException('Registro invalido: taller.');
		}
		$this->Sesion->Taller->recursive = -1;
		$taller = $this->Sesion->Taller->read();
		#
		if ($this->request->is('post')) {
			$this->Sesion->create();
			$this->request->data['Sesion']['taller_id'] = $taller_id;
			$this->request->data['Sesion']['nombre'] = $taller_slug . ' _ ' . $this->request->data['Sesion']['nombre'];
			if ($this->Sesion->save($this->request->data)) {
				$this->Session->setFlash('La sesión fue guardada');
				$this->redirect(array('controller' => 'talleres', 'action' => 'ver', 'miembro' => false, $taller_slug));
			} else {
				$this->Session->setFlash(__('El sesion no pudo ser guardado. Por favor, intente de nuevo.'));
			}
		}
		$this->set(compact('taller'));
	}// fin miembro_agregar

/**
 * Miembro: editar un registro
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function miembro_editar($slug = null) {
		$this->Sesion->primaryKeyBySlug($slug, true);
		if (!$this->Sesion->exists()) {
			throw new NotFoundException('Sesion inválida');
		}
		$data = $this->Sesion->read(null);
		if ($this->request->is('post') || $this->request->is('put')) {

			$this->request->data['Sesion']['taller_id'] = $data['Taller']['id'];
			$this->request->data['Sesion']['nombre'] = $data['Taller']['slug_dst'] . ' _ ' . $data['Sesion']['nombre'];
			if ($this->Sesion->save($this->request->data)) {
				$this->Session->setFlash(__('La sesión fue modificada'));
				$this->redirect(array('miembro'=>false,'controller'=>'talleres', 'action' => 'ver',$data['Taller']['slug_dst'] ));
			} else {
				$this->request->data = $data;
				$this->Session->setFlash(__('La sesión se pudo guardar. Por favor, intente de nuevo.'));
			}
		} else {
			$this->request->data = $data;
		}
	}// fin miembro_editar

/**
 * Admin: borrar un registro
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_borrar($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Sesion->id = $id;
		if (!$this->Sesion->exists()) {
			throw new NotFoundException(__('Sesion inválido'));
		}
		if ($this->Sesion->delete()) {
			$this->Session->setFlash(__('El sesion fue borrado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El sesion no pudo ser borrado'));
		$this->redirect(array('action' => 'index'));
	}// fin admin_borrar

}// fin controlador
