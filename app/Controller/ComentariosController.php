<?php
App::uses('AppController', 'Controller');
/**
 * Comentarios Controller
 *
 * @property Comentario $Comentario
 */
class ComentariosController extends AppController {
function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow(array('agregar','index'));
}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Comentario->recursive = 0;
		$this->set('comentarios', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function ver($id = null) {
		$this->Comentario->id = $id;
		if (!$this->Comentario->exists()) {
			throw new NotFoundException('Registro invalido: comentario.');
		}
		$this->set('comentario', $this->Comentario->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function agregar() {
		if ($this->request->is('post')) {
			$this->Comentario->create();
			if ($this->Comentario->save($this->request->data)) {
				$this->Session->setFlash('El registro comentario. Fue guardado');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El registro comentario. No pudo ser guardado');
			}
		}
		$users = $this->Comentario->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function editar($id = null) {
		$this->Comentario->id = $id;
		if (!$this->Comentario->exists()) {
			throw new NotFoundException('Registro invalido: comentario.');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Comentario->save($this->request->data)) {
				$this->Session->setFlash('El registro comentario. Fue guardado');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El registro comentario. No pudo ser guardado');
			}
		} else {
			$this->request->data = $this->Comentario->read(null, $id);
		}
		$users = $this->Comentario->User->find('list');
		$this->set(compact('users'));
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
		$this->Comentario->id = $id;
		if (!$this->Comentario->exists()) {
			throw new NotFoundException('Registro invalido: comentario.');
		}
		if ($this->Comentario->delete()) {
			$this->Session->setFlash('Comentario. Borrado');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Comentario. No se pudo borrar');
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Comentario->recursive = 0;
		$this->set('comentarios', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_ver($id = null) {
		$this->Comentario->id = $id;
		if (!$this->Comentario->exists()) {
			throw new NotFoundException('Registro invalido: comentario.');
		}
		$this->set('comentario', $this->Comentario->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_agregar() {
		if ($this->request->is('post')) {
			$this->Comentario->create();
			if ($this->Comentario->save($this->request->data)) {
				$this->Session->setFlash('El registro comentario. Fue guardado');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El registro comentario. No pudo ser guardado');
			}
		}
		$users = $this->Comentario->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_editar($id = null) {
		$this->Comentario->id = $id;
		if (!$this->Comentario->exists()) {
			throw new NotFoundException('Registro invalido: comentario.');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Comentario->save($this->request->data)) {
				$this->Session->setFlash('El registro comentario. Fue guardado');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El registro comentario. No pudo ser guardado');
			}
		} else {
			$this->request->data = $this->Comentario->read(null, $id);
		}
		$users = $this->Comentario->User->find('list');
		$this->set(compact('users'));
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
		$this->Comentario->id = $id;
		if (!$this->Comentario->exists()) {
			throw new NotFoundException('Registro invalido: comentario.');
		}
		if ($this->Comentario->delete()) {
			$this->Session->setFlash('Comentario. Borrado');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Comentario. No se pudo borrar');
		$this->redirect(array('action' => 'index'));
	}
}
