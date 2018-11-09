<?php

//-------------------------------------------------------
//
// zeiterfassung
// Version 0.1
// 06.11.2018
//
//-------------------------------------------------------

//-------------------------------------------------------
// Error Reporting einschalten
ini_set('display_errors', TRUE);

// Error Reporting komplett abschalten
//error_reporting(0);

// Melde alle PHP Fehler (siehe Changelog)
error_reporting(E_ALL);

// Ende Error Reporting
//-------------------------------------------------------

// config.php einbinden
if (file_exists("config.php"))
	{
		include ("config.php");
	}
	else
	{
		die("Konfigurationsdatei konnte nicht gefunden werden!");
	}

//Funktionen laden
if (file_exists("Functions/out.func"))
	{
		include ("Functions/out.func");
	}
	else
	{
		die("Funktion (out) konnten nicht geladen werden!");
	}
	

//Liste der erlaubten Seiten laden
$seiten_erlaubt = $controller_liste;

//Liste der Seitennamen laden
$seiten_namen = $namen_liste;

//Seitenanfrage auswerten
//Anfrage einlesen
$url = $_SERVER["REQUEST_URI"];

//Verzeichnis aus url entfernen
$url = str_replace( SERVER_ROOT, "", $url);

//ueberfluessige / am Anfang und Ende entfernen
$url = trim($url,"/");

//url in Parameter splitten
@list($arg1 , $arg2 , $arg3) = explode("/", $url);

//Parameter ueberpruefen und Variablen zuordnen
//erster Seitenaufruf
if (empty($arg1))
{
	//1.Fall: erster Seitenaufruf 
	$key = 1;
	$controller = $controller_liste[$key];
}
else
{
	//2.Fall: Seitenaufruf mit Argument
	if (in_array($arg1,$seiten_erlaubt))
	{
		$key = array_search($arg1,$seiten_erlaubt);
		$controller = $seiten_erlaubt[$key];
	}
	else
	{
	//3. Fall: Keine erlaubte Seite - Fehlerseite ausgeben
		$key = 0;
		$controller = "error_404";
	}
}

//Ausgabe testen
//echo $controller;


//Controller laden
$controller_pfad = "Controller/".$controller.".php";

if (file_exists($controller_pfad))
{
	include_once($controller_pfad);
}
else
{
	//Controller-Datei nicht vorhanden! 
	die("Controller ist nicht vorhandern!");
}


//Seite ausgeben
out($template_head, $template_body, $template_footer, $parameter);

?>
