<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Helper', 'View');
/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {
	/**
	 * Descripción de la función
	 *
	 * @param tipo $parametro1 descripción del párametro 1.
	 * @return tipo descripcion de lo que regresa
	 * @access publico/privado
	 * @link http://es.gravatar.com/site/implement/hash/
	 */
	function gravatar_img($email, $size=100, $options=array()){
		return '<div class="avatar" style="width: '.$size.'px">'.
			$this->image('http://www.gravatar.com/avatar/'. md5( $email ).'?s='.$size, $options)
			.'</div>';
	}
	/**
	 * Descripción de la función
	 *
	 * @param tipo $parametro1 descripción del párametro 1.
	 * @return tipo descripcion de lo que regresa
	 * @access publico/privado
	 * @link http://es.gravatar.com/site/implement/hash/
	 */
	function gravatar_link($email, $username=''){
		$link = Router::url('/users/ver/'.$username);
		return '<div class="avatar" style="width: 50px"><a href="'.$link.'">'.
			$this->image('http://www.gravatar.com/avatar/'. md5( $email ).'?s=50')
			.'</a><h5>' . $username . '</h5></div>';
	}
}
