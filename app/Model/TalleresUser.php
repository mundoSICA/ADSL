<?php
App::uses('AppModel', 'Model');
/**
 * TalleresUser Model
 *
 * @property User $User
 * @property Taller $Taller
 */
class TalleresUser extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'talleres_users';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'user_id';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'descuento' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Taller' => array(
			'className' => 'Taller',
			'foreignKey' => 'taller_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	/**
	 * Descripción de la función
	 *
	 * @param tipo $parametro1 descripción del párametro 1.
	 * @return tipo descripcion de lo que regresa
	 * @access publico/privado
	 * @link [URL de mayor infor]
	 */
	function nuevoAlumno($alumno_id, $taller_id, $descuento=0) {
		$id = $this->field('id', array('TalleresUser.user_id' => $alumno_id, 'TalleresUser.taller_id' => $taller_id));
		if( $id > 0)
			return true;
		else{
			$q = "INSERT INTO `talleres_users` ".
						"(`id` ,`user_id` ,`taller_id` ,`descuento` ,`created`)"
						." VALUES (NULL , '%d', '%d', '%d', '%s)'";
			return $this->query( sprintf($q,$alumno_id, $taller_id, $descuento, date('Y-m-d H:i:s')));
		}
	}//end function
}
