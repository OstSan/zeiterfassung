<?php 

//Projektname
$projekt_name = "zeiterfassung";

//Datenbankkonfiguration
/*
$config['server'] = '127.0.0.1';
$config['user'] = "root";
$config['pwd'] = "";
$config['db'] = "";
*/ 

//erlaubte Seiten
$controller_liste = array(
						"error_404",//0	
						"start",//1
						"kommt",//2
						"geht",//3
						"login",//4
						"admin",//5
						"user",//6
						);

//Name der Links
$namen_liste = array(	
						"error 404",//0
						"Startseite",//1
						"Kommt",//2
						"Geht",//3
						"LogIn",//4
						"Administrationsbereich",//5
						"Nutzerbereich",//6
						);
						
//Konstanten definieren
//offline
define("SERVER_ROOT" , "/zeiterfassung");
define("SITE_ROOT" , "/zeiterfassung");
//online
//define("SERVER_ROOT" , "/");
//define("SITE_ROOT" , "http://www.zeiterfassung.de");

?>
