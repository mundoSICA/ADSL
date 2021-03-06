-- Created by DiaSql-Dump Version 0.01(Beta)
-- Filename: 01-schema.sql

-- talleres --
DROP TABLE IF EXISTS `talleres`;
CREATE TABLE IF NOT EXISTS `talleres` (
	`user_id` INT( 5 ) NOT NULL,
	`id` INT( 4 ) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`nombre` VARCHAR(75) NOT NULL UNIQUE,
	`cupo` INT( 2 ) NOT NULL,
	`slug_dst` VARCHAR(80) NOT NULL UNIQUE,
	`horario` VARCHAR(200) DEFAULT NULL,
	`fecha_inicio` DATE DEFAULT NULL,
	`fecha_final` DATE DEFAULT NULL,
	`costo` FLOAT( 4 ) DEFAULT NULL,
	`resumen` VARCHAR( 200 ) DEFAULT NULL,
	`contenido` TEXT DEFAULT NULL,
	`numero_total_horas` INT( 20 ) DEFAULT NULL,
	`requisitos` TEXT DEFAULT NULL,
	`num_alumnos` INT( 2 ) DEFAULT 0 DEFAULT NULL,
	`status` ENUM('abierto', 'cerrado') DEFAULT 'abierto' NOT NULL,
	`created` DATETIME NOT NULL,
	`modified` DATETIME NOT NULL,
	`num_sesiones` INT( 2 ) DEFAULT 0 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- contribuciones --
DROP TABLE IF EXISTS `contribuciones`;
CREATE TABLE IF NOT EXISTS `contribuciones` (
	`hash` VARCHAR( 40 ) PRIMARY KEY NOT NULL UNIQUE,
	`author_name` VARCHAR(150) DEFAULT NULL,
	`author_email` VARCHAR(150) DEFAULT NULL,
	`message` TEXT DEFAULT NULL,
	`added` TEXT DEFAULT NULL,
	`modified` TEXT DEFAULT NULL,
	`removed` TEXT DEFAULT NULL,
	`timestamp` TIMESTAMP NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- etiquetas_talleres --
DROP TABLE IF EXISTS `etiquetas_talleres`;
CREATE TABLE IF NOT EXISTS `etiquetas_talleres` (
	`id` INT(5) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`taller_id` INT ( 4) NOT NULL UNIQUE,
	`etiqueta_id` INT( 5 ) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- users --
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
	`id` INT(5) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`role` ENUM('admin','miembro','registrado') DEFAULT 'registrado' NOT NULL,
	`username` VARCHAR(15) NOT NULL UNIQUE,
	`nombre` VARCHAR( 150 ) DEFAULT NULL,
	`password` VARCHAR(40) NOT NULL,
	`email` VARCHAR(100) NOT NULL UNIQUE,
	`email_publico` BOOLEAN DEFAULT FALSE NOT NULL,
	`email_token` VARCHAR( 40 ) DEFAULT NULL,
	`email_token_expires` DATETIME DEFAULT NULL,
	`twitter` VARCHAR( 20 ) DEFAULT NULL,
	`facebook` VARCHAR( 100 ) DEFAULT NULL,
	`url` VARCHAR( 150 ) DEFAULT NULL,
	`notificaciones` BOOLEAN DEFAULT FALSE NOT NULL,
	`created` DATETIME NOT NULL,
	`modified` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- videos --
DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
	`id` INT(2) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`contenido_id` INT(5) NOT NULL UNIQUE,
	`created` DATETIME NOT NULL,
	`modified` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- talleres_users --
DROP TABLE IF EXISTS `talleres_users`;
CREATE TABLE IF NOT EXISTS `talleres_users` (
	`id` INT(6) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`user_id` INT( 5 ) NOT NULL,
	`taller_id` INT( 4 ) NOT NULL,
	`descuento` INT( 2 ) DEFAULT 0 NOT NULL,
	`created` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- contenidos_etiquetas --
DROP TABLE IF EXISTS `contenidos_etiquetas`;
CREATE TABLE IF NOT EXISTS `contenidos_etiquetas` (
	`id` INT(2) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`contenido_id` INT( 5 ) NOT NULL UNIQUE,
	`etiqueta_id` INT ( 4) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- estrellas --
DROP TABLE IF EXISTS `estrellas`;
CREATE TABLE IF NOT EXISTS `estrellas` (
	`id` INT( 4 ) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`exteno_id` INT( 5 ) NOT NULL,
	`externo_tabla` VARCHAR( 50 ) DEFAULT NULL,
	`user_id` INT( 5 ) NOT NULL UNIQUE,
	`estrellas` INT( 1 ) DEFAULT NULL,
	`created` DATETIME NOT NULL,
	`content` TEXT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- sesiones --
DROP TABLE IF EXISTS `sesiones`;
CREATE TABLE IF NOT EXISTS `sesiones` (
	`id` INT(5) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`taller_id` INT( 5 ) NOT NULL,
	`keywords` VARCHAR(150) DEFAULT NULL,
	`nombre` VARCHAR(150) NOT NULL UNIQUE,
	`slug_dst` VARCHAR(150) NOT NULL UNIQUE,
	`orden` INT( 2 ) DEFAULT NULL,
	`descripcion` TEXT DEFAULT NULL,
	`content` TEXT DEFAULT NULL,
	`estrellas` TEXT DEFAULT NULL,
	`created` DATETIME NOT NULL,
	`modified` DATETIME NOT NULL,
	`fecha_publicacion` DATETIME NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- etiquetas --
DROP TABLE IF EXISTS `etiquetas`;
CREATE TABLE IF NOT EXISTS `etiquetas` (
	`id` INT(4) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`nombre` VARCHAR(75) NOT NULL UNIQUE,
	`slug_dst` VARCHAR(80) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- contenidos --
DROP TABLE IF EXISTS `contenidos`;
CREATE TABLE IF NOT EXISTS `contenidos` (
	`user_id` INT( 5 ) NOT NULL,
	`id` INT(2) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
	`nombre` VARCHAR(75) NOT NULL UNIQUE,
	`slug_dst` VARCHAR(80) NOT NULL UNIQUE,
	`keywords` VARCHAR(200) DEFAULT NULL,
	`content` TEXT DEFAULT NULL,
	`estrellas` TEXT DEFAULT NULL,
	`created` DATETIME NOT NULL,
	`modified` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
-- End SQL-Dump
