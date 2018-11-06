<?php 

// Variable fuer den Dateipfad zur index.php (muss in der .htaccess angepasst werden)

//erlaubte Seiten
$controller_liste = array(
						"error_404",//0	
						"startseite",//1
						"impressum",//2
						"kontakt",//3
						"datenschutz",//4
						"malerei",//5
						"grafik",//6
						"plastik-skulptur-objekt",//7
						"vita"//8
						);

//Name der Links
$namen_liste = array(	
						"error 404",//0
						"Startseite",//1
						"Impressum",//2
						"Kontakt",//3
						"Datenschutzhinweise",//4
						"Malerei",//5
						"Grafik",//6
						"Plastik/Skulptur/Objekt",//7
						"Vita"//8
						);
						
//Konstanten definieren
//offline
define("SERVER_ROOT" , "/html_www.arnhild-koppel.de");
define("SITE_ROOT" , "/html_www.arnhild-koppel.de");
//online
//define("SERVER_ROOT" , "/");
//define("SITE_ROOT" , "http://wwww.dammers-webundwerbung.de");

?>
