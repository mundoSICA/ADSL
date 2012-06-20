<?php

class FilezillaQueue {
	protected $_tags = array(
		'Host' => 'localhost',
		'Port' => '21',
		'Protocol' => 0,
		'Type' => 0,
		'User' => 'username',
		'Pass' => 'password',
		'Logontype' => 1,
		'TimezoneOffset' => 0,
		'PasvMode' => 'MODE_DEFAULT',
		'MaximumMultipleConnections' => 'MaximumMultipleConnections',
		'EncodingType' => 'Auto',
		'BypassProxy' => 0
	);
	
	public function __construct()
	{	

	}

	public function __destruct()
	{	

	}
	
	/**
	 * Descripción de la función
	 *
	 * @param tipo $parametro1 descripción del párametro 1.
	 * @return tipo descripcion de lo que regresa
	 * @access publico/privado
	 * @link [URL de mayor infor]
	 */
	public function print_queue() {
		
	}
	/**
	 * Descripción de la función
	 *
	 * @param tipo $parametro1 descripción del párametro 1.
	 * @return tipo descripcion de lo que regresa
	 * @access publico/privado
	 * @link http://php.net/manual/en/class.directoryiterator.php
	 */
	public function ls(){
		
	}
}
echo "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\" ?>\n";
$a = array(5);
if(empty($a)){
	echo "\n<FileZilla3 />";
	exit;
}
$f = new FilezillaQueue;
?>
