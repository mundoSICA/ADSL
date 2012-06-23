<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Noticia $Noticia
 * @property Taller $Taller
 * @property Taller $Taller
 */
class User extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';
	public $actsAs = array('Slug'=>array('max_len'=>50));
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'role' => array(
			'inlist' => array(
				'rule' => array('inlist',array('admin','miembro','registrado')),
				'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'username' => array(
			'notempty' => array(
				'rule' => '/^[a-z0-9]{5,15}$/i',
				'message' => 'Solo carácteres alfanumericos, la longitud debe ser entre 5 a 15 carácteres',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'password' => array(
			'notempty' => array(
				'rule' => '/^[0-9a-zA-Z_-]{6,41}$/',
				'message' => 'Debe contener minusculas, mayusculas, números de longitud minima 6 carácteres',
				'allowEmpty' => false,
				'required' => true,
			)
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'twitter' => array(
			'twitter' => array(
				'rule' => '/^[0-9a-zA-Z_-]{0,20}$/',
				'message' => 'La cuenta del twitter debe contener solo caracteres alfanúmericos',
				'allowEmpty' => true,
				'required' => false
			),
		),
		'facebook' => array(
			'facebook' => array(
				'rule' => array('url'),
				'message' => 'Inserte una URL correcta',
				'allowEmpty' => true,
				'required' => false,
			)
		),
		'url' => array(
			'url' => array(
				'rule' => array('url'),
				'message' => 'Inserte una URL correcta',
				'allowEmpty' => true,
				'required' => false,
			)
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Noticia' => array(
			'className' => 'Noticia',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Taller' => array(
			'className' => 'Taller',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Curso' => array(
			'className' => 'Taller',
			'joinTable' => 'talleres_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'taller_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
}
