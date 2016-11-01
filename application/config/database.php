<?php defined('SYSPATH') or die('No direct access allowed.');

$dbhost = isset($_ENV["OPENSHIFT_MYSQL_DB_HOST"]) ? $_ENV["OPENSHIFT_MYSQL_DB_HOST"] : 'localhost';
$dbport = isset($_ENV["OPENSHIFT_MYSQL_DB_PORT"]) ? $_ENV["OPENSHIFT_MYSQL_DB_PORT"] : '330755';
$dbuser = isset($_ENV["OPENSHIFT_MYSQL_DB_USERNAME"]) ? $_ENV["OPENSHIFT_MYSQL_DB_USERNAME"] : 'root';
$dbpass = isset($_ENV["OPENSHIFT_MYSQL_DB_PASSWORD"]) ? $_ENV["OPENSHIFT_MYSQL_DB_PASSWORD"] : 'root';
$dbname = isset($_ENV["OPENSHIFT_MYSQL_DB_NAME"]) ? $_ENV["OPENSHIFT_MYSQL_DB_NAME"] : 'php';

return array
(
	'default' => array
	(
		'type'       => 'mysql',
		'connection' => array(
			/**
			 * The following options are available for MySQL:
			 *
			 * string   hostname     server hostname, or socket
			 * string   database     database name
			 * string   username     database username
			 * string   password     database password
			 * boolean  persistent   use persistent connections?
			 *
			 * Ports and sockets may be appended to the hostname.
			 */
			'hostname'   => $dbhost . ':' . $dbport,
			'database'   => $dbname,
			'username'   => $dbuser,
			'password'   => $dbpass,
			'persistent' => FALSE,
		),
		'table_prefix' => '',
		//'charset'      => 'utf8',
		'charset'      => 'latin1',
		'caching'      => FALSE,
		'profiling'    => TRUE,
	),
	'alternate' => array(
		'type'       => 'pdo',
		'connection' => array(
			/**
			 * The following options are available for PDO:
			 *
			 * string   dsn         Data Source Name
			 * string   username    database username
			 * string   password    database password
			 * boolean  persistent  use persistent connections?
			 */
			'dsn'        => 'mysql:host='.$dbhost . ':' . $dbport .';dbname=' . $dbname,
			'username'   => $dbuser,
			'password'   => $dbpass,
			'persistent' => FALSE,
		),
		/**
		 * The following extra options are available for PDO:
		 *
		 * string   identifier  set the escaping identifier
		 */
		'table_prefix' => '',
		//'charset'      => 'utf8',
		'charset'      => 'latin1',
		'caching'      => FALSE,
		'profiling'    => TRUE,
	),
);