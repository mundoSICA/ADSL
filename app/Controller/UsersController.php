<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller ADSL
 *
 * @property User $User
 */
class UsersController extends AppController {
/*
 * Componentes
 */
var $components = array('Email', 'EmailTokenRequest');

function beforeFilter() {
			$this->Auth->allow(
							array(	'reset_password',
											'recuperacion_password',
											'registro',
											'index',
											'ver'
						));
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
				$this->Session->setFlash('Has sido registrado, Ahora debes iniciar sesión');
				$this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash('No te puedes registrar!, favor de revisar que tus datos sean correctos');
				$this->request->data['User']['password'] = '';
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

			if ( $this->_prepararNuevoPassword( &$this->request->data['User'] )
				&&  $this->User->save($this->request->data)) {
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
	function reset_password($token=null) {
			if( $this->EmailTokenRequest->prepareToken() ) {
				$this->Email->reset();
				$this->Email->from = 'robot ADSL <robot@adsl.org.mx>';
				$this->Email->to = $this->request->data['User']['email'];
				$this->Email->sendAs = 'both';
				$this->Email->replyTo = 'contacto ADSL <contacto@adsl.org.mx>';
				$this->Email->subject = '¿Olvidaste tu contraseña?';
				$msg = "<h1>¿Olvidaste tu contraseña?</h1>\n" .
							"<p>De no ser asi hacer caso omiso de este mensaje</p>\n" .
						 "<p>Puedes reuperar tu contraseña desde el siguiente enlace:</p>\n".
							Router::url('/users/recuperacion_password/'. 
							$this->request->data['User']['email_token'] . '/' .
							$this->request->data['User']['email'], true );
				if ($this->User->save($this->request->data,false)){
					$this->Email->send($msg);
					$this->Session->setFlash('Se te ha enviado un correo electronico, favor de revisar');
				} else {
					die('<pre>' . print_r($this->request->data['User'], true) . '</pre>');
				}
			}
	}//end function
	/**
	 * Descripción de la función
	 *
	 * @param tipo $parametro1 descripción del párametro 1.
	 * @return tipo descripcion de lo que regresa
	 * @access publico/privado
	 * @link
	 */
	function recuperacion_password($token=null, $email=null) {
		$dataToken = $this->EmailTokenRequest->readByToken($token);
		if($dataToken) {
			if ($this->request->is('post')) {
				$data = &$this->request->data['User'];
				//Check if email is valid
				if( $data['email'] != $dataToken['User']['email']) {
					$this->Session->setFlash('Error token/email Invalido, token eliminado!');
					$this->EmailTokenRequest->deleteToken($data['id']);
					return;
				}
				//Revisa que las contraseñas coincidan
				if( $data['password'] == '' || $data['password'] != $data['repetir_password']) {
					$this->Session->setFlash('Los passwords son invalidos, favor de revisarlos');
					return;
				}
				//Actualizando las contraseñas
				if( $this->EmailTokenRequest->updatePassword($dataToken, $data['password']) ) {
					$this->Session->setFlash('Tu contraseña se ha cambiado correctamente');
					$this->redirect(array('controller'=>'users', 'action' => 'login'));
					return;
				} else {
					$this->Session->setFlash('Error al intentar cambiar la contraseña');
					$this->redirect($this->Auth->redirect());
					return;
				}
			}
			//check if email is valid
			if( $email && $this->EmailTokenRequest->validEmail($email) )
				$this->request->data['User']['email'] = $email;
		} else {
			$this->Session->setFlash('¿Que estas intenando hacer?');
			$this->redirect($this->Auth->redirect());
		}
	}//end function
	/**
	 * Descripción de la función
	 *
	 * @param tipo $parametro1 descripción del párametro 1.
	 * @return tipo descripcion de lo que regresa
	 * @access publico/privado
	 * @link [URL de mayor infor]
	 */
	function _prepararNuevoPassword($data) {
		//Agregamos los valores almacenados en la sesión
		$data['role'] = $this->Session->read('Auth.User.role');
		$data['username'] = $this->Session->read('Auth.User.username');
		$data['id'] = $this->Session->read('Auth.User.id');
		//revisamos si cambio la contraseña
		$suceso = true;
		if (
			$data['nuevo_password'] != '' ||
			$data['password_anterior'] != '' ||
			$data['repetir_nuevo_password'] != ''
		){
			$suceso = false;
			if (
				$data['nuevo_password'] == $data['repetir_nuevo_password'] &&
				$this->Auth->password($data['password_anterior']) == $this->User->field('password')
			) {
				$data['password'] = $this->Auth->password($this->request->data['User']['nuevo_password']);
				$suceso = true;
			}
		}
		unset( $data['password_anterior']);
		unset( $data['nuevo_password']);
		unset( $data['repetir_nuevo_password']);
		if ( !$suceso ) {
			unset( $data['password']);
			unset($this->User->validate['password']);
		}
		return $suceso;
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

