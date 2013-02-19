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
	public $helpers = array('QrCode');

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
				$this->Session->setFlash('El taller ya fue agregado y agendado con exito!');
				$this->redirect(array('action' => 'index', 'admin' => false));
			} else {
				$this->Session->setFlash('El registro taller. No pudo ser guardado');
			}
		}
		$users = $this->Taller->User->find('list');
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
				$this->Session->setFlash('El registro taller. Fue guardado');
				$this->redirect(array('action' => 'index','admin' => false));
			} else {
				$this->Session->setFlash('El registro taller. No pudo ser guardado');
			}
		} else {
			$this->request->data = $this->Taller->read(null, $id);
		}
		$users = $this->Taller->User->find('list');
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
}
