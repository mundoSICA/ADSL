<?php
App::uses('AppController', 'Controller');
/**
 * Talleres Controller
 *
 * @property Taller $Taller
 */
class TalleresController extends AppController {

	var $components = array('Email');
/* lista de ayudantes */

	function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->allow(array('index','calendario','ver'));
	}
//var $uses = array('TalleresUser');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Taller->recursive = 0;
		$this->set('talleres', $this->paginate());
	}

	public function inscribirme($slug) {
		$id = $this->Taller->primaryKeyBySlug($slug, true);
		if (!$this->Taller->exists()) {
			throw new NotFoundException('Registro invalido: taller.');
		}else{
			$this->Taller->recursive = 1;
			$taller = $this->Taller->read();
			$taller['Alumnos']=array(
						'taller_id' => $id,
						'user_id' => $this->Session->read('Auth.User.id'),
						'created' => date('Y-m-d H:i:s')
			);
			$this->Taller->save($taller);
			$this->Session->setFlash('Has sido registrado en el taller<br />"'.$slug.'"<br /> con exito');
			$this->_notificarAutor($taller);
		}
		$this->redirect(
			array('controller'=>'talleres',
						'action' => 'ver',
						'admin' => false,
						$slug
		));
	}
/**
 * Notifica al autor que un usuario fue registrado.
 */
	protected function _notificarAutor($taller) {
		$destinos = array('chanerec@gmail.com', 'eymard@mundosica.com', $taller['User']['email']);
		$msg = "<p>El usuario %s Se acaba de registrar en el taller: <strong>%s</strong></p>";
		$msg .= "<ul><li><b>Fecha/hora de inscripción:</b> %s</li>".
						"<li><b>Taller:</b> %s</li><li><b>Usuario:</b> %s</li></ul>";
		$username = $this->Session->read('Auth.User.username');
		$msg = sprintf(
						$msg, $username, $taller['Taller']['nombre'], $this->_fechaGuapa(),
						Router::url('/talleres/ver/' . $taller['Taller']['slug_dst'], true),
						Router::url('/users/ver/' . $username, true)
					);
		foreach ($destinos as $destino) {
			$this->Email->reset();
			$this->Email->from = 'robot ADSL <robot@adsl.org.mx>';
			$this->Email->to = $destino;
			$this->Email->sendAs = 'both';
			$this->Email->replyTo = 'contacto ADSL <contacto@adsl.org.mx>';
			$this->Email->subject = 'Nueva inscripción en el taller: '
															. $taller['Taller']['nombre'];
			$this->Email->send($msg);
		}
	}//end function
	/* Regresa la fecha en formato bonito */
	protected function _fechaGuapa() {
		$dia=array(
			'Sun' => 'Domingo',
			'Mon' => 'Lunes',
			'Tue' => 'Martes',
			'Wed' => 'Miércoles',
			'Thu' => 'Jueves',
			'Fri' => 'Viernes',
			'Sat' => 'Sábado'
		);
		$mes = array(
			'Jan' => 'Enero',
			'Feb' => 'Febrero',
			'Mar' => 'Marzo',
			'Apr' => 'Abril',
			'May' => 'Mayo',
			'Jun' => 'Junio',
			'Jul' => 'Julio',
			'Aug' => 'Agosto',
			'Sep' => 'Septiembre',
			'Oct' => 'Octubre',
			'Nov' => 'Noviembre',
			'Dec' => 'Diciembre'
		);
		return sprintf('%s %s de %s del %d , %s',
			$dia[date('D')], date('d'),
			$mes[date('M')],
			date('Y'),
			date('h:i:s A')
		);
	}//end function
/**
 * index method
 *
 * @return void
 */
	public function calendario() {
		$this->Taller->recursive = -1;
		$this->set('talleres', $this->paginate());
	}
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function ver($slug = null) {
		$id = $this->Taller->primaryKeyBySlug($slug, true);
		if (!$this->Taller->exists()) {
			throw new NotFoundException('Registro invalido: taller.');
		}
		$this->set('taller', $this->Taller->read(null, $id));
	}
/**
 * admin_add method
 *
 * @return void
 */
	public function admin_agregar() {
		if ($this->request->is('post') && isset($this->request->data['Taller']['slide']['type']) ) {
			if( !$this->Taller->setImg(&$this->request->data) ){
				$this->Session->setFlash(
					'Revise que la imagen<br />para el Slide sea válida<br />(jpeg 925x250)'
				);
			}elseif ( $this->Taller->save($this->request->data)) {
				$slug = $this->_notificarTaller();
				$this->Session->setFlash('El taller ya fue agregado y agendado con exito!');
				$this->redirect(array('action' => 'ver/' . $slug , 'admin' => false));
			} else {
				$this->Session->setFlash('El registro taller. No pudo ser guardado');
			}
		}
		$users = $this->Taller->User->find('list', array('conditions' => array('User.role' => array('admin', 'miembro'))));
		$etiquetas = $this->Taller->Etiqueta->find('list');
		$alumnos = array();//$this->Taller->Alumnos->find('list');
		$this->set(compact('users', 'etiquetas', 'alumnos'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_editar($slug = null) {
		$id = $this->Taller->primaryKeyBySlug($slug, true);
		if (!$this->Taller->exists()) {
			throw new NotFoundException('Registro invalido: taller.');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Taller->save($this->request->data)) {

				//Revisamos a los elementos a notificar
				if($this->request->data['Taller']['notificar']){
					$this->_notificarTaller();
				}
				$this->Session->setFlash('El registro taller. Fue guardado');
				$this->redirect(array('action' => 'ver/' . $slug , 'admin' => false));
			} else {
				$this->Session->setFlash('El registro taller. No pudo ser guardado');
			}
		} else {
			$this->request->data = $this->Taller->read(null, $id);
		}
		$users = $this->Taller->User->find('list', array('conditions' => array('User.role' => array('admin', 'miembro'))));
		$etiquetas = $this->Taller->Etiqueta->find('list');
		$alumnos = array(); #$this->Taller->Alumnos->find('list');
		$this->set(compact('users', 'etiquetas', 'alumnos'));
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
		$this->Taller->id = $id;
		if (!$this->Taller->exists()) {
			throw new NotFoundException('Registro invalido: taller.');
		}
		if ($this->Taller->delete()) {
			$this->Session->setFlash('Taller. Borrado');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Taller. No se pudo borrar');
		$this->redirect(array('action' => 'index'));
	}
	/**
	 * Descripción de la función
	 *
	 * @param tipo $parametro1 descripción del párametro 1.
	 * @return tipo descripcion de lo que regresa
	 * @access publico/privado
	 * @link [URL de mayor infor]
	 */
	function _notificarTaller() {
		$slug = NULL;
		$slug =  $this->Taller->slugStr($this->request->data['Taller']['nombre']);
		if ( $slug ) {
			$urlInfo = Router::url('/',true).'talleres/ver/'.$slug;
			$msg  = "<h1><a href='{$urlInfo}' style='color:#C2570B;text-decoration:none'>".
							"\n{$this->request->data['Taller']['nombre']}\n</a></h1>";
			$msg .= "<h4>{$this->request->data['Taller']['resumen']}</h4>".
							"<h2>Descripción:</h2>".$this->request->data['Taller']['contenido'];
			$msg .= "<br /><strong>Mayores informes: </strong>\n<a href={$urlInfo}>{$urlInfo}</a>";

			$usuarios_a_notificar = $this->Taller->User->notificados();
			App::uses('CakeEmail', 'Network/Email');
			$email = new CakeEmail('default');
			$email->subject('Notificación Taller ' . $this->request->data['Taller']['nombre']);
			$email->addHeaders(array('X-Mailer' => 'adsl.org.mx'));
			foreach ($usuarios_a_notificar as $username => $member_email) {
				$email->to($member_email);
				$email->send($msg);
			}
		}
		return $slug;
	}//end function
}
