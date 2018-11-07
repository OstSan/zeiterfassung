<?php 
//Projektname
$projekt_name = "zeiterfassung";

//Datenbank


// Variable fuer den Dateipfad zur index.php (muss in der .htaccess angepasst werden)

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
