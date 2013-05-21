<?php
App::uses('AppController', 'Controller');
/**
 * Contribuciones Controller
 *
 * @property Contribucion $Contribucion
 */
class ContribucionesController extends AppController {
function beforeFilter() {
		parent::beforeFilter();
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
 * link2: https://github.com/mundoSICA/ADSL/settings/hooks
 */
	public function agregar() {
		// $whiteList = array('207.97.227.253', '50.57.128.197', '108.171.174.178');
		// if ($this->request->is('post') && in_array($_SERVER['REMOTE_ADDR'], $whiteList)) {
		if ($this->request->is('post')) {
			$commits = json_decode($this->request->data['payload'], true);
			foreach ($commits['commits'] as $c) {
				if(!$this->Contribucion->exists($c['id'])) {
					$this->nuevaContribucion($c);
				}
			}
		}
	}

	function nuevaContribucion($c) {
		$tipo_cambio = array(
										'added' =>
										array(
											'titulo' => 'Archivos añadidos',
											 'color' => '055FBF',
											 'tag' => 'span'
										),
										'modified' =>
										array(
											'titulo' => 'Archivos modificados',
											 'color' => 'CD4D00',
											 'tag' => 'span'
										),
										'removed' =>
										array(
											'titulo' => 'Archivos eliminados',
											 'color' => '660000',
											 'tag' => 'del'
										)
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
		$urlInfo = Router::url('/',true).'contribuciones/ver/'.$c['id'];
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
			$commit_msg .= '<h2>Mensaje:</h2><pre style="background:#EEE;padding:0 5px 0 5px">'.$msg.'</pre>';
		}
		foreach($tipo_cambio as $t=>$t_data) {
			//$tipo_cambio
			if( count($c[$t]) ) {
				$commit_msg .= '<h2>'.$t_data['titulo'].'</h2>';
				$character = strtoupper($t[0]);
				$commit_msg .= '<ul>';
				foreach($c[$t] as $m) {
					$commit_msg .= '<li><'.$t_data['tag'].' style="color:#'.$t_data['color'].'">'
												.'['.$character.'] '.$m.'</'.$t_data['tag']."></li>\n";
				}
				$commit_msg .= '</ul>';
			}
		}///////////////////
		$commit_msg .= '<br /><strong>Mayores informes: </strong><a href="'.$urlInfo.'">'.$urlInfo.'</a>';

		App::uses('CakeEmail', 'Network/Email');
		$email = new CakeEmail('colaboradores');
		$email->subject(count($title)? $title[0] : 'Notificación de cambios - contribución repositorio ADSL' );
		$email->addHeaders(array('X-Mailer' => 'adsl.org.mx'));
		$email->replyTo($c['author']['email']);
		$email->send($commit_msg);
		$this->Contribucion->save($newCommit);
	}
}
