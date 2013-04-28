<?php
$myFile = "db.sql";
$newsiteurl = "http://localhost:81/WordPressTest/client";
//get contents and update site url
$string = file_get_contents($myFile, "r");
$string =str_replace("[siteurl]",$newsiteurl,$string);
$string =str_replace("[home]",$newsiteurl,$string);
$fh = fopen($myFile, 'w') or die("Could not open: " . mysql_error());
fwrite($fh, $string);
fclose($fh);


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
mysql_select_db("wordpresstest");
$result = mysql_query($string) or exit(mysql_error()); 
if (!$result) {
    die("Could not load. " . mysql_error());
}
?>