<?php
App::uses('AppController', 'Controller');
/**
 * Talleres Controller
 *
 * @property Taller $Taller
 */
class TalleresController extends AppController {
function beforeFilter() {
			$this->Auth->allow(array('index','calendario','ver'));
}
//var $uses = array('TalleresUser');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Taller->recursive = 0;
		$this->set('talleres', $this->paginate());
	}

	public function inscribirme($slug) {
		$id = $this->Taller->primaryKeyBySlug($slug, true);
		if (!$this->Taller->exists()) {
			throw new NotFoundException('Registro invalido: taller.');
		}else{
			$this->Taller->recursive = 1;
			$taller = $this->Taller->read();
			$taller['Alumnos']=array(
						'taller_id' => $id,
						'user_id' => $this->Session->read('Auth.User.id'),
						'created' => date('Y-m-d H:i:s')
			);
			$this->Taller->save($taller);
			$this->Session->setFlash('Has sido registrado en el taller<br />"'.$slug.'"<br /> con exito');
		}
		$this->redirect(
			array('controller'=>'talleres',
						'action' => 'ver',
						'admin' => false,
						$slug
		));
	}
/**
 * index method
 *
 * @return void
 */
	public function calendario() {
		$this->Taller->recursive = -1;
		$this->set('talleres', $this->paginate());
	}
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function ver($slug = null) {
		$id = $this->Taller->primaryKeyBySlug($slug, true);
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
		if ($this->request->is('post') && isset($this->request->data['Taller']['slide']['type']) ) {
			if( !$this->Taller->setImg(&$this->request->data) ){
				$this->Session->setFlash(
					'Revise que la imagen<br />para el Slide sea válida<br />(jpeg 925x250)'
				);
			}elseif ( $this->Taller->save($this->request->data)) {
				$this->Session->setFlash('El taller ya fue agregado y agendado con exito!');
				$this->redirect(array('action' => 'index', 'admin' => false));
			} else {
				$this->Session->setFlash('El registro taller. No pudo ser guardado');
			}
		}
		$users = $this->Taller->User->find('list',array('conditions'=>array('User.role'=>array('admin','miembro'))));
		$etiquetas = $this->Taller->Etiqueta->find('list');
		$alumnos = $this->Taller->Alumnos->find('list');
		$this->set(compact('users', 'etiquetas', 'alumnos'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_editar($slug = null) {
		$id = $this->Taller->primaryKeyBySlug($slug, true);
		if (!$this->Taller->exists()) {
			throw new NotFoundException('Registro invalido: taller.');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Taller->save($this->request->data)) {
				$this->Session->setFlash('El registro taller. Fue guardado');
				$this->redirect(array('action' => 'index','admin' => false));
			} else {
				$this->Session->setFlash('El registro taller. No pudo ser guardado');
			}
		} else {
			$this->request->data = $this->Taller->read(null, $id);
		}
		$users = $this->Taller->User->find('list');
		$etiquetas = $this->Taller->Etiqueta->find('list');
		$alumnos = $this->Taller->Alumnos->find('list');
		$this->set(compact('users', 'etiquetas', 'alumnos'));
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
