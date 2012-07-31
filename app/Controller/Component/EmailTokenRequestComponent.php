<?php
/**
 * EmailTokenRequestComponent
 *
 * A Email Token Request Component.
 *
 * @version		0.1
 * @author		Fitorec - http://fitorec.github.com
 * @copyright	Copyright 2012-2012, ADSL - Academia de Software Libre.
 * @license		http://opensource.org/licenses/mit-license.php - Licensed under The MIT License
 * @link		  http://fitorec.github.com/cakephp-EmailTokenRequestComponent
 *
 */
App::uses('Component', 'Controller');
class EmailTokenRequestComponent extends Component {
/**
 * Components.
 *
* @access public
 * @var array
 */
	public $components = array('Auth', 'Cookie');
/**
 * Name of the user model.
 *
 * @access public
 * @var string
 */
	public $modelName = null;
/**
 * Field name for login username.
 *
* @access public
 * @var string
 */
	public $email = 'email';
/**
 * Field emailToken for email_token.
 *
 * @access public
 * @var string
 */
	public $emailToken = 'email_token';
/**
 * Field password for login.
 *
 * @access public
 * @var string
 */
	public $password = 'password';
/**
 * Field name for login password.
 *
 * @access public
 * @var string
 */
	public $emailTokenExpires = 'email_token_expires';
/**
 * number of seconds to expires.
 *
 * @access public
 * @var number
 *      60 <- 1 minute
 *     300 <- 5 minutes
 *    3600 <- 1 hour
 *   86400 <- 1 day
 *  604800 <- 1 weak
 * 1209600 <- 2 weaks
 * 2592000 <- 1 month
 */
	public $expiresIntervals = array(
		'1 minute'  => 60,
		'5 minutes' => 300,
		'30 minutes'=> 1800,
		'1 hour'    => 3600,
		'1 day'			=> 86400,
		'1 weak'		=> 604800,
		'2 weaks'		=> 1209600,
		'1 month'		=> 2592000,
		'2 months'	=> 5184000,
	);
	public $secondsExpires = '1 weak';
/**
 * Should we debug?
 *
 * @access protected
 * @var boolean
 */
	protected $_debug = false;
/**
 * Controller reference
 *
 * @var Controller
 */
	protected $_controller = null;

	public function __construct(ComponentCollection $collection, $settings = array()) {
		$EmailTokenRequest = (array) Configure::read('EmailTokenRequest');
		// Is debug enabled
		$this->_debug = !empty($EmailTokenRequest['email_debug']);
		parent::__construct($collection, array_merge((array) $settings, $EmailTokenRequest));
	}
/**
 * Detect cookie and hash and test for successful login persistence.
 *
 * @access public
 * @param Controller $controller
 * @return void
 */
	public function initialize(Controller $controller) {
		$this->_controller = $controller;
		if (!$this->modelName) {
			$this->modelName = $this->_controller->modelClass;
		}
		$this->model = ClassRegistry::init($this->modelName);
	}
/**
	 * .
	 *
	 * @access public
	 * @param Controller $controller
	 * @return void
	 */
	public function startup(Controller $controller) {
		// Backwards support
		if (isset($this->settings)) {
			$this->_set($this->settings);
		}
	}
/**
 * Debug the current auth and cookies.
 */
	public function debug() { }
/**
 * Prepare a token, receive the request data of the form with post method.
 *
 * @return Boolean success
 * @access public
 */
	public function prepareToken($deleteOldTokens=false) {
		$data = &$this->_controller->request->data;
		if( $deleteOldTokens ) {
			$this->deleteOldTokens();
		}
		if (!$this->_controller->request->is('post') || 
			!isset($data[$this->modelName][$this->email]) ) {
			return false;
		}
		$email = $data[$this->modelName][$this->email];
		if( !$this->userIdByEmail($email) )
			return false;
		//Generate new Token
		$count = 0;
		$token = null;
		do{
			$count++;
			$token = $this->generateToken($email);
		}while($this->tokenExists($token) && $count<5);
		if($count==5 && $this->tokenExists($token))
			return false;
		if( $this->secondsExpires )
		$token_expires = date('Y-m-d h:i:s', time() + $this->expiresIntervals[$this->secondsExpires]);
		//set-results
		$this->model->recursive = -1;
		$data=$this->model->read();
		$data[$this->modelName][$this->emailToken] = $token;
		$data[$this->modelName][$this->emailTokenExpires] = $token_expires;
		if(isset($data[$this->modelName]['modified']))
			unset($data[$this->modelName]['modified']);
		if(isset($data[$this->modelName]['created']))
			unset($data[$this->modelName]['created']);
		return true;
	}//end function
/**
 * Generate a Token Request
 *
 * @param string $email
 * @return string token
 * @access public
 */
	function generateToken($email){
		$salt	= md5(mt_rand());
		// Set the data to identify with
		return sha1($email . $salt);
	}//end function
	function deleteToken($id){
		$data = array(
			$this->modelName =>array(
				$this->id => $id,
				$this->emailToken => null,
				$this->emailTokenExpires => null,
			));
		$this->model->save($data, false);
	}
/*
 * Returns true if a record with particular token exists.
 * 
 * @param string Token
 * @return boolean True if such a record exists
 * @Link   http://api.cakephp.org/view_source/model#line-2547
 */
	function tokenExists($token = ''){
		if(!preg_match('/^[0-9a-f]{40}$/i', $token))
			return false;
		$conditions = array($this->modelName . '.' . $this->emailToken => $token);
		$query = array('conditions' => $conditions, 'recursive' => -1, 'callbacks' => false);
		return ($this->model->find('count', $query) > 0);
	}
	/**
	 * Return email if a record with particular token exists.
	 *
	 * @param string $token 
	 * @return Mixed String email if token exists, Boolean false.
	 * @access public
	 */
	function emailByToken($token) {
		if(!preg_match('/^[0-9a-f]{40}$/i', $token))
			return false;
		$conditions = array($this->modelName . '.' . $this->emailToken => $token);
		return $this->model->field($this->email, $conditions);
	}//end function
/**
 * readByToken
 */
	public function readByToken($token = null) {
		$this->validationErrors = array();
		$this->model->recursive = -1;
		if(!preg_match('/^[0-9a-f]{40}$/i', $token))
			return false;
		$fields = array(	$this->modelName . '.' . $this->model->primaryKey,
											$this->modelName . '.' . $this->email,
											$this->modelName . '.' . $this->emailToken,
											$this->modelName . '.' . $this->emailTokenExpires
											);
		return $this->model->find('first', array(
				'conditions' => array($this->modelName . '.' . $this->emailToken => $token),
				'fields' => $fields
			));
	}
/**
 * readByToken
 */
	public function updatePassword($tokenData=null, $password) {
		$id = $tokenData[$this->modelName][$this->model->primaryKey];
		$fields = array(
				$this->modelName . '.' . $this->emailToken => null,
				$this->modelName . '.' . $this->emailTokenExpires => null,
				$this->modelName . '.' . $this->password => "'".$this->Auth->password($password)."'"
			);
			$conditions = array(
				$this->modelName . '.' . $this->model->primaryKey . ' =' => $id
			);
		return $this->model->updateAll($fields, $conditions);
	}
/**
 * Returns true if a record with particular e-mail exists.
 *
 * @param string $email e-mail of record to check for existence
 * @return boolean True if such a record exists
 */
	public function userIdByEmail($email = null) {
		//validating email
		if ($email == null)
			return false;
		if(!$this->validEmail($email))
			return false;
		$conditions = array($this->modelName . '.' . $this->email => $email);
		$id = $this->model->field($this->model->primaryKey, $conditions);
		if($id === false)
			return false;
		return ($this->model->id = $id);
	}
	/**
	 * Descripción de la función
	 *
	 * @param tipo $parametro1 descripción del párametro 1.
	 * @return tipo descripcion de lo que regresa
	 * @access publico/privado
	 * @link [URL de mayor infor]
	 */
	public function validEmail($email) {
		$validate = array(
			$this->email => array('rule' => 'email','required' => true),
			'fieldList' => array($this->email)
		);
		$currentData = array($this->modelName=>array($this->email=>$email));
		$this->model->set($currentData);
		return $this->model->validates($validate);
	}//end function
	/**
	 * Deleted the expired tokens
	 *
	 * @return boolean True on success, false on failure
	 */
	public function deleteOldTokens() {
		$fields = array(
			$this->modelName . '.' . $this->emailToken => null,
			$this->modelName . '.' . $this->emailTokenExpires => null
		);
		$conditions = array(
			$this->modelName . '.' . $this->emailTokenExpires . ' <=' => date('Y-m-d h:i:s')
		);
		$this->model->updateAll($fields, $conditions);
	}//end function

}
