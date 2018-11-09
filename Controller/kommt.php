<?php

//Array fuer die Parameter initialisieren
$parameter = array();

//Content laden
if (file_exists("Content/content_".$controller.".php"))
	{
		include_once("Content/content_".$controller.".php");
	}
else
	{
//Content-Datei nicht vorhanden! 
		die("Content ist nicht vorhanden!");
	}
/*
//Content Aktuell laden
if (file_exists("Content/aktuell.php"))
	{
		include_once("Content/aktuell.php");
	}
else
	{
		//Content-Datei nicht vorhanden! 
		die('Content Aktuell ist nicht vorhanden!');
	}
*/


//Parameter laden

//Projektname
$parameter["projekt_name"] = $projekt_name;

//Links
$parameter["links"] = $controller_liste;

//Links namen
$parameter["links_namen"] = $namen_liste;

//Seitentitel
$parameter["titel"] = $titel;

//aktuell
//$parameter["aktuell"] = $aktuell;

//aktuell Ueberschrift
//$parameter["aktuell_headline"] = $aktuell_headline;

//Seiteninhalt
$parameter["inhalt"] = $inhalt;

//Seiteninhalt Ueberschrift
$parameter["inhalt_headline"] = $inhalt_headline;

//Pfad zum Template
if (file_exists("Templates/template_head.tpl"))
	{
		$template_head = "Templates/template_head.tpl";
	}
else
	{
		//Template-Datei nicht vorhanden! 
		die("Template 'head' ist nicht vorhandern!");
	}
	
if (file_exists("Templates/template_body_login.tpl"))
	{
		$template_body = "Templates/template_body_login.tpl";
	}
else
	{
		//Template-Datei nicht vorhanden! 
		die("Template 'body_start' ist nicht vorhandern!");
	}
	
if (file_exists("Templates/template_footer.tpl"))
	{
		$template_footer = "Templates/template_footer.tpl";
	}
else
	{
		//Template-Datei nicht vorhanden! 
		die("Template 'footer' ist nicht vorhandern!");
	}


?>
