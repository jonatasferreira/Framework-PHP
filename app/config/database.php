<?php

/**
 * Application database configuration file
 *
 * Options: sqlite or mysql
 */


return [
	'driver' => 'sqlite', // set the bank
	'sqlite' => [
		'host' => 'database.db',
		'charset' => 'utf8',
		'collation' => 'utf8_unicode_ci'
	],
	'mysql' => [
		'host' => 'localhost',
		'database' => 'mydb',
		'user' => 'root',
		'pass' => 'root',
		'charset' => 'utf8',
		'collation' => 'utf8_unicode_ci'
	]
];