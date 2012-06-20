<?php
App::uses('AppController', 'Controller');
/**
 * Talleres Controller
 *
 * @property Taller $Taller
 */
class TalleresController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Taller->recursive = 0;
		$this->set('talleres', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function ver($id = null) {
		$this->Taller->id = $id;
		if (!$this->Taller->exists()) {
			throw new NotFoundException('Registro invalido: taller.');
		}
		$this->set('taller', $this->Taller->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function agregar() {
		if ($this->request->is('post')) {
			$this->Taller->create();
			if ($this->Taller->save($this->request->data)) {
				$this->Session->setFlash('El registro taller. Fue guardado');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El registro taller. No pudo ser guardado');
			}
		}
		$users = $this->Taller->User->find('list');
		$etiquetas = $this->Taller->Etiqueta->find('list');
		$users = $this->Taller->User->find('list');
		$this->set(compact('users', 'etiquetas', 'users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function editar($id = null) {
		$this->Taller->id = $id;
		if (!$this->Taller->exists()) {
			throw new NotFoundException('Registro invalido: taller.');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Taller->save($this->request->data)) {
				$this->Session->setFlash('El registro taller. Fue guardado');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El registro taller. No pudo ser guardado');
			}
		} else {
			$this->request->data = $this->Taller->read(null, $id);
		}
		$users = $this->Taller->User->find('list');
		$etiquetas = $this->Taller->Etiquetum->find('list');
		$users = $this->Taller->User->find('list');
		$this->set(compact('users', 'etiquetas', 'users'));
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
		$this->Taller->id = $id;
		if (!$this->Taller->exists()) {
			throw new NotFoundException('Registro invalido: taller.');
		}
		if ($this->Taller->delete()) {
			$this->Session->setFlash('Taller. Borrado');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Taller. No se pudo borrar');
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Taller->recursive = 0;
		$this->set('talleres', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_ver($id = null) {
		$this->Taller->id = $id;
		if (!$this->Taller->exists()) {
			throw new NotFoundException('Registro invalido: taller.');
		}
		$this->set('taller', $this->Taller->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_agregar() {
		if ($this->request->is('post')) {
			$this->Taller->create();
			if ($this->Taller->save($this->request->data)) {
				$this->Session->setFlash('El registro taller. Fue guardado');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El registro taller. No pudo ser guardado');
			}
		}
		$users = $this->Taller->User->find('list');
		$etiquetas = $this->Taller->Etiquetum->find('list');
		$users = $this->Taller->User->find('list');
		$this->set(compact('users', 'etiquetas', 'users'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_editar($id = null) {
		$this->Taller->id = $id;
		if (!$this->Taller->exists()) {
			throw new NotFoundException('Registro invalido: taller.');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Taller->save($this->request->data)) {
				$this->Session->setFlash('El registro taller. Fue guardado');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El registro taller. No pudo ser guardado');
			}
		} else {
			$this->request->data = $this->Taller->read(null, $id);
		}
		$users = $this->Taller->User->find('list');
		$etiquetas = $this->Taller->Etiquetum->find('list');
		$users = $this->Taller->User->find('list');
		$this->set(compact('users', 'etiquetas', 'users'));
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
		$this->Taller->id = $id;
		if (!$this->Taller->exists()) {
			throw new NotFoundException('Registro invalido: taller.');
		}
		if ($this->Taller->delete()) {
			$this->Session->setFlash('Taller. Borrado');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Taller. No se pudo borrar');
		$this->redirect(array('action' => 'index'));
	}
}
