<?php
/**
 * This is email configuration file.
 *
 * Use it to configure email transports of Cake.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 2.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * In this file you set up your send email details.
 *
 * @package       cake.config
 */
/**
 * Email configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * transport => The name of a supported transport; valid options are as follows:
 *		Mail 		- Send using PHP mail function
 *		Smtp		- Send using SMTP
 *		Debug		- Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email.  Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * from =>
 * The origin email. See CakeEmail::from() about the valid values
 *
 */
class EmailConfig {
	/* support for gmail
	 * link: book.cakephp.org/2.0/en/core-utility-libraries/email.html
	 * */
	public $gmail = array(
        'host' => 'smtp.gmail.com',
        'port' => 465,
        'username' => 'my@gmail.com',
        'password' => 'secret',
        'transport' => 'Smtp',
        'tls' => true
	);

	public $smtp = array(
		'transport' => 'Smtp',
		'from' => array('site@localhost' => 'My Site'),
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $default = array(
		'transport' => 'Mail',
		'from' => array('robot@adsl.org.mx'    => 'Robot ADSL'),
		'replyTo' => array('robot@adsl.org.mx' => 'Robot ADSL'),
		'host' => 'localhost',
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'log' => true,
		'template' => 'default',
		'emailFormat' => 'both',
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	public $colaboradores = array(
		'transport' => 'Mail',
		'from' => array('robot@adsl.org.mx'    => 'Robot ADSL'),
		'replyTo' => array('robot@adsl.org.mx' => 'Robot ADSL'),
		'host' => 'localhost',
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'log' => true,
		'template' => 'default',
		'emailFormat' => 'both',
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
		'to' => array(
			'eymard@mundosica.com',
			'igarcia@mundosica.com',
			'soporte@mundosica.com',
			'manuel.wm@gmail.com',
			'r1chd01@gmail.com',
			'chromery@gmail.com',
			'manuel.wm@gmail.com',
			'idjosemiguel@hotmail.com',
			'gibb.elgris@gmail.com',
			'chaibran_tg7@hotmail.com',
			'rnstux@gmail.com',
			'ana.gines.hdz@gmail.com',
			'luism.garciam@gmail.com',
			'erick.cosmes@gmail.com',
			'chanerec@gmail.com'
		)
	);
/*
public $default = array(
		'transport' => 'Smtp',
		'from' => array('el_cacho@mundosica.com' => 'El chaco(bootSicá)'),
		'host' => 'mail.mundosica.com',
		'port' => 25,
		'timeout' => 1,
		'username' => 'el_chaco@mundosica.com',
		'password' => 'admin-Pru3bas.12',
		'client' => null,
		'log' => false,
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
		'template' => 'default',
		'replyTo' => 'admin@mundosica.com',
		'emailFormat' => 'both'
	);*/
}
