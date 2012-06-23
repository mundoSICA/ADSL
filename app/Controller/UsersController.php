<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller ADSL
 *
 * @property User $User
 */
class UsersController extends AppController {
function beforeFilter() {
			$this->Auth->allow(array('password_reset','registro','index','ver'));
}
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
	 * funcion login
	 *
	 * @param tipo $parametro1 descripción del párametro 1.
	 * @return tipo descripcion de lo que regresa
	 * @access publico/privado
	 * @link http://book.cakephp.org/2.0/en/core-libraries/components/authentication.html#identifying-users-and-logging-them-in
	 * @link http://book.cakephp.org/2.0/en/tutorials-and-examples/blog-auth-example/auth.html
	 */
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$user = $this->User->read(null, $this->User->primaryKeyBySlug(($this->request->data['User']['username'])));
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Usuario ó contraseña invalida', 'default', array(), 'auth');
				$this->Session->setFlash('¿Olvido su contraseña?', 'default', array(), 'passwordReset');
			}
		}
	}
	function logout() {
		$this->redirect($this->Auth->logout());
	}
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function ver($slug = null) {
		$id = $this->User->primaryKeyBySlug($slug, true);
		if (!$this->User->exists()) {
			$this->Session->setFlash(sprintf('Usuario invalido (%s)', $slug));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->set('user', $this->User->read(null, $id));
		}
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
			//generamos su contraseña cifrada.
			$this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Has sido registrado exitosamente');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('No te puedes registrar!, favor de revisar que tus datos sean correctos');
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
	public function mi_perfil() {
		$id = $this->Session->read('Auth.User.id');
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException('Registro invalido: user.');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->_prepararDatos( &$this->request->data['User'] );
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('Los datos en tu perfil fueron editados');
				$this->redirect(array('action' => 'ver', $this->Session->read('Auth.User.username')));
			} else {
				$this->Session->setFlash('Tus datos no pudieron ser actualizados');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$talleres = $this->User->Taller->find('list');
		$this->set(compact('talleres'));
	}
	/**
	 * Descripción de la función
	 *
	 * @param tipo $parametro1 descripción del párametro 1.
	 * @return tipo descripcion de lo que regresa
	 * @access publico/privado
	 * @link [URL de mayor infor]
	 */
	function _prepararDatos($data) {
		//Agregamos los valores almacenados en la sesión
		$data['role'] = $this->Session->read('Auth.User.role');
		$data['username'] = $this->Session->read('Auth.User.username');
		$data['id'] = $this->Session->read('Auth.User.id');
		//revisamos si cambio la contraseña
		if( $data['password_anterior'] == '' || $data['nuevo_password'] == '' ||
			$data['nuevo_password'] != $data['repetir_nuevo_password'] ){
					unset( $data['password_anterior']);
					unset( $data['nuevo_password']);
					unset( $data['repetir_nuevo_password']);
					unset($this->User->validate['password']);
			}else{
				$data['password'] = $this->Auth->password($this->request->data['User']['nuevo_password']);
			}
	}//end function
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

