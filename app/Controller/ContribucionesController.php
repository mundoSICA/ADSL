<?php
App::uses('AppController', 'Controller');
/**
 * Contribuciones Controller
 *
 * @property Contribucion $Contribucion
 */
class ContribucionesController extends AppController {
var $components = array('Email');
function beforeFilter() {
			$this->Auth->allow('*');
}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Contribucion->recursive = 0;
		$this->set('contribuciones', $this->paginate());
	}
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function ver($hash = null) {
		$this->Contribucion->id = $hash;
		if (!$this->Contribucion->exists()) {
			throw new NotFoundException('Registro invalido: contribucion.');
		}
		$this->set('commit', $this->Contribucion->read(null, $hash));
	}
/**
 * Agrega los commits que nos envia el github
 *
 * Por medio de el hook Post-Receive el sitio github envia los cambios a la
 * página del ADSL desde aquí cachamos los cambios y los publicamos.
 *
 * link: https://help.github.com/articles/post-receive-hooks
 */
	public function agregar() {
		$whiteList = array('207.97.227.253', '50.57.128.197', '108.171.174.178');
		if ($this->request->is('post') && in_array($_SERVER['REMOTE_ADDR'], $whiteList)) {
			$commits = json_decode($this->request->data['payload'], true);
			foreach ($commits['commits'] as $c) {
				$this->nuevaContribucion($c);
			}
		}
	}
	function nuevaContribucion($c){
		$tipo_cambio = array(
										'added' => 'Archivos añadidos',
										'modified' => 'Archivos modificados',
										'removed' => 'Archivos eliminados',
		);
		$newCommit = array(
		'Contribucion' => array(
			'hash' => $c['id'],
			'author_name' => $c['author']['username'],
			'author_email' => $c['author']['email'],
			'message' => $c['message'],
			'added' => implode("\n",$c['added']),
			'modified' => implode("\n",$c['modified']),
			'removed' => implode("\n",$c['removed']),
			'timestamp' => str_replace('T',' ',substr($c['timestamp'],0,19))
		));
		$title = explode("\n",$c['message']);
		$commit_msg = '';
		$msg = $c['message'];
		if( count($title) ){
			$commit_msg .= '<h2>'.$title[0].'</h2>';
			$msg = str_replace($title[0],'',$msg);
		}
		$commit_msg .= '<strong>Autor:</strong> ' . $c['author']['username'] . '<br />';
		$commit_msg .= '<strong>Autor-Email:</strong> ' . $c['author']['email'] . '<br />';
		$commit_msg .= '<strong>Hash:</strong> ' . $c['id'] . '<br />';
		$commit_msg .= '<strong>Fecha:</strong> ' . $c['timestamp'] . '<br />';
		if( strlen($msg) > 5) {
			$commit_msg .= '<h2>Mensaje:</h2><p>'.$msg.'</p>';
		}
		foreach($tipo_cambio as $t=>$t_descripcion) {
			if( count($c[$t]) ) {
				$commit_msg .= '<h2>'.$t_descripcion.'</h2>';
				$character = strtoupper($t[0]);
				$commit_msg .= '<ul>';
				foreach($c[$t] as $m) {
					$commit_msg .= '<li>['.$character.'] '.$m."</li>\n";
				}
				$commit_msg .= '</ul>';
			}
		}///////////////////
		$commit_msg .= '<br /><strong>Mayores informes: </strong><a href="'.$c['url'].'">'.$c['url'].'</a>';
		$commit_msg .= '<p>Este mensaje es <i>auto-generado</i>, por medio de <strong>ADSL-robot</strong>'
										.'Si desea no recibir más notificaciones favor de enviar un email a <i>robot@adsl.org.mx</i></p>';
		$members = array(
										'eymard <eymard@mundosica.com>',
										'ibangr <igarcia@mundosica.com>',
										'Benny <soporte@mundosica.com>',
										'Emanuel <manuel.wm@gmail.com>',
										'R1ch <r1chd01@gmail.com>',
										'Erick <chromery@gmail.com>',
										'Manuel Hernandez <manuel.wm@gmail.com>',
										'Jose Miguel <idjosemiguel@hotmail.com>',
										'Gibrán el Gris <gibb.elgris@gmail.com>',
										'Gibrán el Puñetero <chaibran_tg7@hotmail.com>',
										'Edgar Duran <rnstux@gmail.com>',
										'Ana Gines <ana.gines.hdz@gmail.com>',
										'Luis Garcia <luism.garciam@gmail.com>',
										'Confi <erick.cosmes@gmail.com>',
										'fitorec <chanerec@gmail.com>'
									);
		foreach ($members as $member_email) {
			$this->Email->reset();
			$this->Email->from = 'robot ADSL <robot@adsl.org.mx>';
			$this->Email->to = $member_email;
			$this->Email->sendAs = 'both';
			$this->Email->replyTo = $c['author']['email'];
			$this->Email->subject = count($title)? $title[0] : 'Notificación de cambios';
			$this->Email->subject .= ' - contribución repositorio ADSL';
			$this->Email->send($commit_msg);
		}
		$this->Contribucion->save($newCommit);
	}
}
