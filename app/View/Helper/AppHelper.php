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
	 */
	 public $helpers = array(
    'Html',
    'Form',
    'TwitterBootstrap',
    );
	function avatar($username, $size=100, $options=array()){
		if( !isset($options['alt']) ){
			$options['alt'] = $username. ' Avatar';
		}
		$options['width']=$size .'px';
		$options['height']=$size .'px';
		$options['alt']=$username . ' Avatar';
		$options['itemprop']= 'photo';
		$options['class']= 'photo';
		return '<div itemprop="photo" class="avatar" style="width: '.$size.'px">'.
		$this->image('/img/users/'. $username .'/avatar.jpg'
			, $options).'</div>';
	}
	/**
	 * Descripción de la función
	 *
	 * @param tipo $parametro1 descripción del párametro 1.
	 * @return tipo descripcion de lo que regresa
	 * @access publico/privado
	 */
	function avatar_link($username='') {
		$link = Router::url('/users/ver/'.$username);
		return "\n\t\t<div class='avatar'>".
				"<a href='{$link}'>".
			$this->image('/img/users/'. $username .'/avatar.jpg'
			, array('alt' => $username . ' Avatar', 'itemprop' => 'image', 'class' => 'img-circle'))
			.'</a><h5><a href="'.$link.'" itemprop="url name">' . $username . '</a></h5></div>';
	}
	/**
	 * Descripción de la función
	 *
	 * @param tipo $parametro1 descripción del párametro 1.
	 * @return tipo descripcion de lo que regresa
	 * @access publico/privado
	 * @link [URL de mayor infor]
	 */
	function avatar_icon($username='') {
		$link = Router::url('/users/ver/'.$username);
		return $this->image('/img/users/'. $username .'/avatar.jpg',
				array(
				'alt' => $username . ' Avatar',
				'itemprop' => 'image',
				'width'=>'32px',
				'height' => '32px',
				'class' => 'img-rounded img-polaroid',
			));
	}//end function
}
