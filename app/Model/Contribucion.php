<?php
App::uses('AppModel', 'Model');
/**
 * Contribucion Model
 *
 */
class Contribucion extends AppModel {
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'hash';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'author_name';
	public $order = array('Contribucion.timestamp' => 'DESC', 'Contribucion.author_name' => 'ASC');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
	);
}
