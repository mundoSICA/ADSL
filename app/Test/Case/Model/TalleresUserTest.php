<?php
App::uses('TalleresUser', 'Model');

/**
 * TalleresUser Test Case
 *
 */
class TalleresUserTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.talleres_user', 'app.user', 'app.noticia', 'app.taller', 'app.post', 'app.etiqueta', 'app.etiquetas_taller');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TalleresUser = ClassRegistry::init('TalleresUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TalleresUser);

		parent::tearDown();
	}

}
