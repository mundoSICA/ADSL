<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function ver($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Registro invalido: user.');
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function registro() {
		if ($this->request->is('post')) {
			//Role de registrado por defecto
			$this->request->data['User']['role'] = 'registrado';
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Has sido registrado exitosamente');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El registro user. No pudo ser guardado');
			}
		}
		$talleres = $this->User->Taller->find('list');
		$this->set(compact('talleres'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function editar($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Registro invalido: user.');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('El registro user. Fue guardado');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El registro user. No pudo ser guardado');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$talleres = $this->User->Taller->find('list');
		$this->set(compact('talleres'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_editar($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Registro invalido: user.');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('El registro user. Fue guardado');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El registro user. No pudo ser guardado');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$talleres = $this->User->Taller->find('list');
		$this->set(compact('talleres'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Registro invalido: user.');
		}
		if ($this->User->delete()) {
			$this->Session->setFlash('User. Borrado');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('User. No se pudo borrar');
		$this->redirect(array('action' => 'index'));
	}
}
