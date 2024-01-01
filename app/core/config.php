<?php 

/*set your website title*/

define('WEBSITE_TITLE', "CompCar");

/*set database variables*/

define('DB_TYPE','mysql');
define('DB_NAME','tdw');
define('DB_USER','root');
define('DB_PASS','');
define('DB_HOST','localhost:3307');

/*protocal type http or https*/
define('PROTOCOL','http');

/*root and asset paths*/

$path = str_replace("\\", "/",PROTOCOL ."://" . $_SERVER['SERVER_NAME'] . __DIR__  . "/");
$path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);

define('ROOT', str_replace("app/core", "public", $path));
define('ASSETS', str_replace("app/core", "public/assets", $path));

/*set to true to allow error reporting
set to false when you upload online to stop error reporting*/

define('DEBUG',true);

if(DEBUG)
{
	ini_set("display_errors",1);
}else{
	ini_set("display_errors",0);
}
?>