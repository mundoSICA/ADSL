<?php
App::uses('AppModel', 'Model');
/**
 * Sesion Model
 *
 * @property Taller $Taller
 */
class Sesion extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';
	public $actsAs = array('Slug');
	public $order = 'Sesion.orden ASC';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'taller_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'slug_dst' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		/*'orden' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
		'fecha_publicacion' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Taller' => array(
			'className' => 'Taller',
			'foreignKey' => 'taller_id',
			'conditions' => '',
			'fields' => '',
			'counterCache' => 'num_sesiones'
		)
	);
	function sesiones( $taller_id ) {
		$sesiones = $this->find('list',
			array(
				'conditions' => array('Sesion.taller_id' => $taller_id),
				'fields' => array('Sesion.nombre', 'Sesion.slug_dst'),
				'recursive' => 0
			)
		);
		$result = array();
		foreach ($sesiones as $nombre=>$slug)
		{
			$result[] = array(
				'nombre' => $nombre,
				'slug_dst' => $slug
			);
		}
		return $result;
	}//end function
}
