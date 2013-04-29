<?php
$myFile = "db.sql";
$newsiteurl = "http://localhost:81/wordpresstest/client";
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


// OPEN CONNECTION...

$url = $_SERVER['REQUEST_URI']; //returns the current URL
$parts = explode('/',$url);
$dir = $_SERVER['SERVER_NAME'];
for ($i = 0; $i < count($parts) - 1; $i++) {
 $dir .= $parts[$i] . "/";
}
$dir = "http://".$dir;
echo $dir;
$sql_filename = 'db.sql';
$sql_contents = file_get_contents($dir.$sql_filename);
$sql_contents = explode(";", $sql_contents);
    
$connection = $con;
// mysql_select_db('wordpresstest', $con) or die(mysql_error());
// 
// foreach($sql_contents as $query){
       // $result = mysql_query($query);
       // if (!$result)
            // echo "Error on import of ".$query;
// }
mysql_select_db('wordpresstest',$con);

$file = $dir.$sql_filename;

if($fp = file_get_contents($file)) {
  $var_array = explode(';',$fp);
  foreach($var_array as $value) {
    mysql_query($value.';',$con);
  }
}  
?>