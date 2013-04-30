<?php

if (!defined('SQLIMPORT'))
	exit('No direct script access allowed');

Class Config {
	const HOST_NAME = "localhost";
	const DATABASE_USER = "root";
	const DATABASE_PASS = "";
	public $SQL_SQL_FILENAME = "db.sql";
	public $WP_CONFIG_FILENAME = "wp-config.php";
	public $CLIENT_URL = "client/";
	public $THEME_URL = "";
	public $DATABASE_NAME = "wordpresstest";
}
// 
// $config = '';
// /*
 // */
// $config['sql_filename'] = 'db.sql';
// 
// /*
 // |--------------------------------------------------------------------------
 // | SQL file
 // |--------------------------------------------------------------------------
 // |
 // | Path and file name of the SQL backup/dump file. Typically this will be the
 // | file system path:
 // |
 // |	D://wamp/www/filedirectory/filename.sql
 // |
 // */
// 
// $config['sql_file'] = getDBUrl($config['sql_filename']);
// 
// /*
 // |--------------------------------------------------------------------------
 // | Database hostname
 // |--------------------------------------------------------------------------
 // |
 // | Typically this will be the hostname for the database server: ie localhost.
 // |
 // */
// $config['host_name'] = "localhost";
// 
// /*
 // |--------------------------------------------------------------------------
 // | Database Name
 // |--------------------------------------------------------------------------
 // |
 // | Name of the target database.
 // |
 // */
// $config['database_name'] = "wordpresstest";
// 
// /*
 // |--------------------------------------------------------------------------
 // | Database User
 // |--------------------------------------------------------------------------
 // |
 // | User name used to connect to the database server.
 // |
 // */
// $config['database_user'] = "root";
// 
// /*
 // |--------------------------------------------------------------------------
 // | Database Password
 // |--------------------------------------------------------------------------
 // |
 // | Password used to connect to the database server.
 // |
 // */
// $config['database_password'] = "";
// /*
 // *
 // */
// function getDBUrl($sql_filename) {
	// $url = $_SERVER['REQUEST_URI'];
	// //returns the current URL
	// $parts = explode('/', $url);
	// $dir = $_SERVER['SERVER_NAME'];
	// for ($i = 0; $i < count($parts) - 1; $i++) {
		// $dir .= $parts[$i] . "/";
	// }
	// $dir = "http://" . $dir;
// 
	// return $dir . $sql_filename;
// }
?>