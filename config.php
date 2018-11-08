<?php 

//Projektname
$projekt_name = "zeiterfassung";

//Datenbankkonfiguration
/*
$db_config['art']    = 'mysql';
$db_config['host']   = '127.0.0.1';
$db_config['user']   = 'user';
$db_config['pwd']    = 'pwd';
$db_config['dbname'] = 'datenbankname';
$db_config['prefix'] = '';
$db_config['options'] = array(  
PDO::ATTR_PERSISTENT => true,  
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION  
);*/ 

//erlaubte Seiten
$controller_liste = array(
						"error_404",//0	
						"login",//1
						"admin",//2
						"user",//3
						);

//Name der Links
$namen_liste = array(	
						"error 404",//0
						"LogIn",//1
						"Administrationsbereich",//2
						"Nutzerbereich",//3
						);
						
//Konstanten definieren
//offline
define("SERVER_ROOT" , "/zeiterfassung");
define("SITE_ROOT" , "/zeiterfassung");
//online
//define("SERVER_ROOT" , "/");
//define("SITE_ROOT" , "http://www.zeiterfassung.de");

?>
