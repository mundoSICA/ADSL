<?php
App::uses('Comentario', 'Model');

/**
 * Comentario Test Case
 *
 */
class ComentarioTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.comentario', 'app.user', 'app.noticia', 'app.taller', 'app.post', 'app.etiqueta', 'app.etiquetas_taller', 'app.talleres_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Comentario = ClassRegistry::init('Comentario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Comentario);

		parent::tearDown();
	}

}
