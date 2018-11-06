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
//Parameter ueberpruefen und Variablen zuordnen
//erster Seitenaufruf
if (!isset($_GET["seite"]))
{
	$key = 1;
	$controller = $controller_liste[$key];
}
else
{
	//Seitenaufruf mit Argument
	
	if ((isset($_GET["seite"])) && (in_array($_GET["seite"],$seiten_erlaubt)))
	{
		$key = array_search($_GET["seite"],$seiten_erlaubt);
		$controller = $seiten_erlaubt[$key];
	}
	else
	{
		//3. Fall: Keine erlaubte Seite - Fehlerseite ausgeben
		$key = 0;
		$controller = $seiten_erlaubt[$key];
	}
}

//Ausgabe testen
/*
echo $controller;
*/

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
