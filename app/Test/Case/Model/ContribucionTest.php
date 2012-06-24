<?php
App::uses('Contribucion', 'Model');

/**
 * Contribucion Test Case
 *
 */
class ContribucionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.contribucion');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Contribucion = ClassRegistry::init('Contribucion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Contribucion);

		parent::tearDown();
	}

}
