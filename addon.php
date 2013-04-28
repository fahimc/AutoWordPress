<?php
/*
//cpanel details


//new domain details

//frontend/$cpanel_skin/addon/doadddomain.html?domain=$dom&user=$user&dir=$dir&pass=$addonpass
$url = "http://$user:$pass@$domain:2082/frontend/$skin/addon/doadddomain.html?";
$url = $url . "domain=$adomain&user=$auser&dir=$adir&pass=$apass";

echo $url;
$result = @file_get_contents($url);
if ($result === FALSE) die("ERROR: Addon Domain not created. Please make sure you passed correct parameters.");
echo $result;
*/
$user = "fahimcho";
$pass = "wWl73Ik5";
$skin = "x3";
$domain = "fahimchowdhury.com"; // ex: mysite.com, 123.24.128.45
$adomain ="addondomain.com";
$adir ="public_html/addondomain.com";
$auser = "addondomain";
 $apass = "addondomain123";
$url = "http://$user:$pass@$domain:2082/frontend/$skin/addon/doadddomain.html?";
$url = $url . "domain=$adomain&user=$auser&pass=$apass&dir=$adir";
$result = @file_get_contents($url);
echo  $url;
if ($result === FALSE) die("ERROR: Addon Domain not created. Please make sure you passed correct parameters.");
echo $result;

?>