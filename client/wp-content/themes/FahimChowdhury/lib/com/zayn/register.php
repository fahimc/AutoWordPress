<?php
$email=$_GET['email'];
if(isset($email)) {
	$email =urldecode ($_GET['email']);
	$myFile="emails.txt";
	$fh=fopen($myFile,'a') or die("can't open file");
	$stringData=$email."\n";
	fwrite($fh,$stringData);
	fclose($fh);
	echo "done";
}else{
	echo "failed";
}
?>