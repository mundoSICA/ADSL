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
	protected static $_userAuth = null;

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
		'TwitterBootstrap'
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
		$link = Router::url("/users/ver/{$username}");
		return "\n\t\t<div class='avatar'>" .
			"<a href='{$link}'>" .
			$this->image(
				"/img/users/{$username}/avatar.jpg",
				array('alt' => "{$username} Avatar", 'itemprop' => 'image', 'class' => 'img-circle')
			) .
			"</a><h5><a href='{$link}' itemprop='url name'>{$username}</a></h5></div>";
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
		$link = Router::url("/users/ver/{$username}");
		return $this->image(
			"/img/users/{$username}/avatar.jpg",
			array(
				'alt' => "{$username} Avatar",
				'itemprop' => 'image',
				'width'=>'32px',
				'height' => '32px',
				'class' => 'img-rounded img-polaroid',
			)
		);
	}//end function
	function initAuth( $userAuth ){
		if (!self::$_userAuth) {
			self::$_userAuth = $userAuth;
		}
	}

	/**
	 * Genera las opciones para el menu se usuario
	 *
	 * @param Array $userAuth El usuario que esta navegando (incluso Internauta)
	 * @return String $html el Código HTML del menu de usaurio (lista)
	 */
	function menu_usuario() {
		$menu = array(
			'icon'  => 'icon-user',
			'title' => 'Menu de Usuario',
			'links'  =>  null,
			'controller'  =>  'users'
		);
		// Agregamos accion login ó cerrar sesión
		if(self::$_userAuth['role'] == 'internauta'){
			$menu['links'][] = array(
				'icon'   => 'icon-off',
				'msg'    => 'Iniciar Sesión',
				'title'    => 'Iniciar Sesión',
				'action' => 'logout'
			);
			$menu['links'][] = array(
				'icon'   => 'icon-ok',
				'msg'    => 'Registro',
				'title'    => 'Registrate al ADSL',
				'action' => 'registro'
			);
		} else {
			$menu['links'][] = array(
				'icon'   => 'icon-remove-sign',
				'msg'    => 'Cerrar Sesión',
				'title'    => 'Cierra tu sesión de forma segura',
				'action' => 'login'
			);
			$menu['links'][] = array(
				'icon'   => 'icon-pencil',
				'msg'    => 'Editar mi perfil',
				'title'    => 'Edita tu propio perfil',
				'action' => 'mi_perfil'
			);
			$menu['links'][] = array(
				'icon'   => 'icon-eye-open',
				'msg'    => 'Ver mi perfil',
				'title'    => 'Ver mi perfil',
				'action' => 'ver/'. self::$_userAuth['username']
			);
		}
		return $this->_menu_base($menu);
	}//end function
	/**
	 * Genera las opciones para el menu se usuario
	 *
	 * @param Array $userAuth El usuario que esta navegando (incluso Internauta)
	 * @return String $html el Código HTML del menu de usaurio (lista)
	 */
	function menu_talleres($taller = null) {
		$menu = array(
			'icon'  => 'icon-folder-open',
			'title' => 'Talleres',
			'links'  =>  null,
			'controller'  =>  'talleres'
		);
		$menu['links'] = array(
			array(
				'icon'   => 'icon-list',
				'msg'    => 'Lista de Talleres',
				'title'    => 'Ver la lista de Talleres',
				'action' => 'index'
			),
			array(
				'icon'   => 'icon-calendar',
				'msg'    => 'Calendario',
				'title'    => 'Calendario de talleres',
				'action' => 'calendario'
			),
		);

		// Agregamos accion login ó cerrar sesión
		//role:(admin, miembro, registrado, internauta)
		if(self::$_userAuth['role'] == 'admin' || self::$_userAuth['role'] == 'miembro') {
			$menu['links'][] = array(
				'icon'   => 'icon-plus',
				'msg'    => 'Agregar Taller',
				'title'    => 'Agregar un nuevo taller',
				'action' => 'agregar',
				'prefix' => 'admin',
			);
			if( isset($taller['slug_dst']) ) {
			$menu['links'][] = array(
				'icon'   => 'icon-pencil',
				'msg'    => 'Editar este Taller',
				'title'    => 'Edita este taller',
				'action' => 'editar/' . $taller['slug_dst'],
				'prefix' => 'admin',
			);
			if(self::$_userAuth['role'] == 'admin' || self::$_userAuth['id'] == $taller['user_id'])
				$menu['links'][] = array(
					'icon'   => 'icon-file',
					'msg'    => 'Agregar Sesión ',
					'title'    => 'Edita este taller',
					'action' => 'agregar/' . $taller['slug_dst'],
					'controller' => 'sesiones',
					'prefix' => self::$_userAuth['role'],
				);
			}
		}
		return $this->_menu_base($menu);
	}//end function

	function menu_sesiones($taller_slug, &$sesiones, $sesion_slug = null) {
		if(!count($sesiones))
			return '';
		$menu = array(
			'icon'  => 'icon-book',
			'title' => 'Sesiones Disponibles',
			'links'  =>  array(),
			'controller'  =>  'sesiones'
		);
		$i= 0;
		foreach ($sesiones as $k=>$sesion) {
			$sesiones[$k]['nombre'] = str_replace($taller_slug. ' _ ', '', $sesion['nombre']);
			$menu['links'][] = array(
				'icon'   => 'icon-ok-circle',
				'msg'    => sprintf('Sesión %02d', ++$i),
				'title'    => $sesiones[$k]['nombre'],
				'action' => '/ver/' . $sesiones[$k]['slug_dst'],
				'desactivado' => ($sesion_slug == $sesiones[$k]['slug_dst'])
			);
		}
		if( $sesion_slug &&
		(self::$_userAuth['role'] == 'admin' || self::$_userAuth['role'] == 'miembro')
		)
			$menu['links'][] = array(
				'icon'   => 'icon-pencil',
				'msg'    => 'Editar esta sesión',
				'title'    => 'Editar esta sesión',
				'action' => 'editar/' . $sesion_slug,
				'prefix' => self::$_userAuth['role'],
			);
		return $this->_menu_base($menu);
	}//end function

	/**
	 * Genera las opciones para el menu de navegación en general
	 *
	 * @param Array $userAuth El usuario que esta navegando (incluso Internauta)
	 * @return String $html el Código HTML del menu de usaurio (lista)
	 */
	function menu_navegacion_general() {
		$menu = array(
			'icon'  => 'icon-share',
			'title' => 'Navegación',
			'links'  =>  null,
			'controller'  =>  'pages'
		);
		$menu['links'] = array(
			array(
				'icon'   => 'icon-home',
				'msg'    => 'Inicio ADSL',
				'title'    => 'Ir a la página principal del ADSL',
				'action' => '/'
			),
			array(
				'icon'   => 'icon-film',
				'msg'    => 'Video streaming',
				'title'    => 'Ir a los videos en vivo',
				'action' => 'streaming'
			),
			array(
				'icon'   => 'icon-envelope',
				'msg'    => 'Contacto',
				'title'    => 'Contactanos',
				'action' => 'contacto'
			),
		);
		return $this->_menu_base($menu);
	}
	/**
	 * Descripción de la función
	 *
	 * @param tipo $parametro1 descripción del párametro 1.
	 * @return tipo descripcion de lo que regresa
	 * @access privado
	 * @link [URL de mayor infor]
	 */
	private function _menu_base($menu) {
		$html = '';
		foreach ($menu['links'] as $link)
		{
			if(isset($link['desactivado']) && $link['desactivado']){
					$html .=  '<li>' . "<i class='{$link['icon']}'></i> {$link['msg']}" . '</li>';
					continue;
			}
			$urlInfo = array('controller' => $menu['controller'], 'action' => $link['action']);
			if(isset($link['controller']))
				$urlInfo['controller'] = $link['controller'];
			if(isset($link['prefix'])){
				$urlInfo[$link['prefix']] = true;
			} else {
				$urlInfo['admin'] = false;
			}
			$html .=  '<li>' .
			$this->Html->link(
					"<i class='{$link['icon']}'></i> {$link['msg']}",
					$urlInfo,
					array('escape' => false, 'title' => $link['title'])
			) . '</li>';
		}
		return "\n<ul class='nav nav-list well'>
		<li class='nav-header'>
				<i class='{$menu['icon']}'></i> {$menu['title']}
			</li>
			<li class='divider'></li>{$html}\n</ul>\n";
	}//end function
}
