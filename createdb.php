<?php
if (!defined('SQLIMPORT'))define('SQLIMPORT',1);
include_once 'sqlimport.php';
include_once 'siteconfig.php';
include_once 'createWPConfig.php';
/*
 * setup
 */
$config = new Config();
$sqlImport  = new SQLImport();
$clientName = "john"; 
$newsiteurl = "client";
$sqlFile = realpath ($config->THEME_URL.$config->SQL_SQL_FILENAME);
$sqlImport->init($config);

/*
 * copy the sql file to new location and update the site url
 */
if (!copy($sqlFile, $newsiteurl."/".$config->SQL_SQL_FILENAME)) {
    echo "failed to copy file...\n";
}

//get contents and update site url
$string = file_get_contents($sqlFile, "r");
$string =str_replace("[siteurl]","http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."/".$newsiteurl,$string);
$string =str_replace("[home]","http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."/".$newsiteurl,$string);
$fh = fopen($newsiteurl."/".$config->SQL_SQL_FILENAME, 'w') or die("Could not open: " . mysql_error());
fwrite($fh, $string);
fclose($fh);

/*
 * create new db
 */

$con = mysql_connect("localhost", "root", "");

if (!$con) {
    die("Could not connect: " . mysql_error());
}
$sql="CREATE DATABASE wordpresstest";

if (mysql_query($sql))
  {
  echo "Database my_db created successfully";
  }
else
  {
  echo "Error creating database: " . mysql_query();
  }



//import
$sqlImport->import();

/*
 * update config.php
 */
 $wpConfig  = new WPConfig();
 $wpConfig->init();
?>