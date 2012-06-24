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
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
	);
}
