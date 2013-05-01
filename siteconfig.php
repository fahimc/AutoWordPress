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

?>