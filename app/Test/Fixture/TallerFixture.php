<?php
/**
 * TallerFixture
 *
 */
class TallerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4),
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 75, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'slug_dst' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 80, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'horario' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'fecha_inicio' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'fecha_final' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'costo' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'resumen' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'contenido' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'numero_total_horas' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'slide' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'id' => array('column' => 'id', 'unique' => 1), 'nombre' => array('column' => 'nombre', 'unique' => 1), 'slug_dst' => array('column' => 'slug_dst', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'user_id' => 1,
			'id' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'slug_dst' => 'Lorem ipsum dolor sit amet',
			'horario' => 'Lorem ipsum dolor sit amet',
			'fecha_inicio' => '2012-06-20',
			'fecha_final' => '2012-06-20',
			'costo' => 1,
			'resumen' => 'Lorem ipsum dolor sit amet',
			'contenido' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'numero_total_horas' => 1,
			'slide' => 1
		),
	);
}
