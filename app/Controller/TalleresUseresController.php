<?php
App::uses('AppController', 'Controller');
/**
 * TalleresUseres Controller
 *
 * @property TalleresUser $TalleresUser
 */
class TalleresUseresController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TalleresUser->recursive = 0;
		$this->set('talleresUseres', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function ver($id = null) {
		$this->TalleresUser->id = $id;
		if (!$this->TalleresUser->exists()) {
			throw new NotFoundException(__('Invalid talleres user'));
		}
		$this->set('talleresUser', $this->TalleresUser->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function agregar() {
		if ($this->request->is('post')) {
			$this->TalleresUser->create();
			if ($this->TalleresUser->save($this->request->data)) {
				$this->Session->setFlash(__('The talleres user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The talleres user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function editar($id = null) {
		$this->TalleresUser->id = $id;
		if (!$this->TalleresUser->exists()) {
			throw new NotFoundException(__('Invalid talleres user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TalleresUser->save($this->request->data)) {
				$this->Session->setFlash(__('The talleres user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The talleres user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TalleresUser->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function borrar($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->TalleresUser->id = $id;
		if (!$this->TalleresUser->exists()) {
			throw new NotFoundException(__('Invalid talleres user'));
		}
		if ($this->TalleresUser->delete()) {
			$this->Session->setFlash(__('Talleres user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Talleres user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TalleresUser->recursive = 0;
		$this->set('talleresUseres', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_ver($id = null) {
		$this->TalleresUser->id = $id;
		if (!$this->TalleresUser->exists()) {
			throw new NotFoundException(__('Invalid talleres user'));
		}
		$this->set('talleresUser', $this->TalleresUser->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_agregar() {
		if ($this->request->is('post')) {
			$this->TalleresUser->create();
			if ($this->TalleresUser->save($this->request->data)) {
				$this->Session->setFlash(__('The talleres user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The talleres user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_editar($id = null) {
		$this->TalleresUser->id = $id;
		if (!$this->TalleresUser->exists()) {
			throw new NotFoundException(__('Invalid talleres user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TalleresUser->save($this->request->data)) {
				$this->Session->setFlash(__('The talleres user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The talleres user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TalleresUser->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_borrar($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->TalleresUser->id = $id;
		if (!$this->TalleresUser->exists()) {
			throw new NotFoundException(__('Invalid talleres user'));
		}
		if ($this->TalleresUser->delete()) {
			$this->Session->setFlash(__('Talleres user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Talleres user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
