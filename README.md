------------------------
Projekt: Zeiterfassung
------------------------


Projektbeschreibung:
------------------------
Das Programm soll die Einsatzplanung von Mitarbeitern ermoeglichen
und die tatsaechliche gleistete Arbeitszeit erfassen und entsprechende
Auswertungen ausgeben.

Umsetzung in PHP, HTML, CSS und MySql

Seitenzugriffsschutz / Adminbereich / Userbereich

Adminbereich:
- Bearbeiten von Usern (Anlegen, Loeschen, Aendern)
- Arbeitsplan Erstellung
- Arbeitsplan Auswertung

Userbereich:
- Areitszeiterfassung
- Arbeitsplan einsehen (soll / ist)


Funktionsweise
------------------------
index.php:

Zuerst wird immer die index.php Datei aufgerufen.
Durch die index.php werden die config.php geladen und global noetige Funktionen.
In Abhaengikeit der uebergebenen Argumente werde die entsprechenden Controller-Dateien,
und ueber die Controller die notwendigen Content-Dateien, Template-Dateien 
und die Style-Anweisungen fuer die Ausgabe geladen und fuer die Ausgabe zusammengebaut.

Controller-Dateien:

Zu jeder einzelnen Seite existiert ein Controller. Dieser Controller beinhaltet
die Programm-Logik fuer diese Seite.

Content-Dateien:

Zu jeder einzelnen Seite existiert eine Content-Datei.

Template-Dateien:

Die Template-Dateien beinhalten die Strucktur der Seite. Jede Seite gliedert sich in
head, body, footer mit der zugehoerigen Temlpate-Datei.


Lizenz
------------------------
Open Source


Programmierer
------------------------
<a href="https://github.com/OstSan">Manuel Osterholzer</a> 

<a href="https://github.com/chwegner">Christian Wegner</a> 
 
Daniel Serazin

<a href="https://github.com/andre-bogdan">Andre Bogdan</a>