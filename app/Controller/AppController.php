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
		'Twitteroauth.Twitter' //Soporte para twitter!
	);
	/******************** Funciones *******************************************************/
}
