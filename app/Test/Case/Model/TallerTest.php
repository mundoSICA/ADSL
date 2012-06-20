<?php
App::uses('Taller', 'Model');

/**
 * Taller Test Case
 *
 */
class TallerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.taller', 'app.user', 'app.noticia', 'app.talleres_user', 'app.post', 'app.etiqueta', 'app.etiquetas_taller');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Taller = ClassRegistry::init('Taller');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Taller);

		parent::tearDown();
	}

}
