<?php
/**
 * AppController ADSL
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

App::uses('Controller', 'Controller');
class AppController extends Controller {
	var $components = array(
		'AutoLogin',
		'Auth'=>array(
						'authError' => 'Esta es una area no autorizada.',
						'loginError' => 'Error al identificarse, intente de nuevo.'
					),
		'Session',
		'RequestHandler',
		'Twitteroauth.Twitter', //Soporte para twitter!
	);
	var $helpers = array(
		'TwitterBootstrap', //Twitter Bootstrap
		'Form',
		'Html',
		'Session',
		'Js',
		'Time',
		'QrCode',
		'Wysiwyg'
	);
	/******************** Funciones *******************************************************/

		function  beforeFilter() {
		$userAuth = null;
		if($this->Auth->loggedIn()) {
					$userAuth = $this->Auth->user();
		} else {
				$userAuth = array(
					'role' => 'internauta',
					'username' => 'username'
					);
		}
		$this->set('adsl_data', Configure::read('adsl'));
		$this->set('userAuth', $userAuth);
    parent::beforeFilter();
	}

/*
 * Restringe el acceso el acceso.
 *
 *  - > si ( existe un `prefix` Y
 * este existe en la lista de roles Y
 * el role del usuario autenticado es diferente al `prefix` )
 *
 * Link: http://book.cakephp.org/2.0/en/tutorials-and-examples/blog-auth-example/auth.html
 **/
	function isAuthorized($currentUser) {
		if( 	isset($this->request->params['prefix']) &&
					in_array($this->request->params['prefix'], Configure::read('Routing.prefixes'))
				&& $currentUser['role'] != $this->request->params['prefix'] ) {
					return false;
		}
		/* denegamos el acceso, si el estado del usuario es desabilitado ó esta pendiente */
		if( in_array($currentUser['status'], array('deshabilitado', 'pendiente')) ) {
				return false;
		}
		return true;
	}
}
