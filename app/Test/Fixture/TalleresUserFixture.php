<?php
/**
 * TalleresUserFixture
 *
 */
class TalleresUserFixture extends CakeTestFixture {
/**
 * Table name
 *
 * @var string
 */
	public $table = 'talleres_users';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 2, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5, 'key' => 'unique'),
		'taller_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'descuento' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'id' => array('column' => 'id', 'unique' => 1), 'user_id' => array('column' => 'user_id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'taller_id' => 1,
			'descuento' => 1,
			'created' => '2012-06-20 12:39:08'
		),
	);
}
