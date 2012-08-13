<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

function beforeFilter() {
			$this->Auth->allow('*');
}

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html', 'Session');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Taller','User', 'Contribucion');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}

/**
 * Descripción de la función
 *
 * @param tipo $parametro1 descripción del párametro 1.
 * @return tipo descripcion de lo que regresa
 * @access publico/privado
 * @link [URL de mayor infor]
 */
	function home() {
		$this->Taller->recursive = -1;
		$streaming = Configure::read('streaming');
		if( $streaming != '')
			$this->Session->setFlash(
			'En este momento estamos tramitiendo<br/><br/>'
			. '<a href="'. Router::url('/pages/streaming').'" class="btn btn-primary">'
			. '<li class="icon-facetime-video"></li>Acceder al streaming</a>'
			);
		$this->set('talleres', $this->paginate());
		$this->set('users', 
			$this->User->find('list', 
			array(
			'limit' => 30,
			'fields' => array('User.username', 'User.email'),
			'order' => 'User.created DESC',
		)));
	}//end function
	
/**
 * Descripción de la función
 *
 * @param tipo $parametro1 descripción del párametro 1.
 * @return tipo descripcion de lo que regresa
 * @access publico/privado
 * @link [URL de mayor infor]
 */
	function sitemap() {
		$this->layout = 'xml';
		$this->viewClass = 'Xml';
		$this->Taller->recursive = 1;
		$talleres = $this->Taller->query(
			'SELECT slug_dst, modified, status FROM talleres AS Taller  ORDER BY status ASC'
		);
		$usuarios = $this->User->query(
			'SELECT username, modified FROM users AS User ORDER BY modified DESC'
		);
		$this->set(compact('talleres', 'usuarios'));
	}//end function
	
	function feed() {
		$this->Taller->recursive = -1;
		$this->set('talleres', $this->paginate());
	}//end function
	
	function twitter() {
		/*$result = Set::reverse($this->Twitter->OAuth->get(
			 'legal/privacy', array()
		));*/
		$result = Set::reverse($this->Twitter->OAuth->get(
       'account/verify_credentials', array()
    ));
		$this->set('result', $result);
	}
}
