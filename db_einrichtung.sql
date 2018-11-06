CREATE TABLE `mitarbeiter` (
    `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`mitarbeiter_nr` VARCHAR( 10 ) NULL ,
    `nachname` VARCHAR( 150 ) NOT NULL ,
    `vorname` VARCHAR( 150 ) NOT NULL ,
    `strasse` VARCHAR( 150 ) NOT NULL ,
    `plz` INT( 5 ) NOT NULL ,
    `telefon` VARCHAR( 20 ) NULL,
	`email` VARCHAR( 50 ) NULL,
	`psw` VARCHAR( 50 ) NOT NULL
    )
	
CREATE TABLE `zeiten` (
    `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`mitarbeiter_nr` VARCHAR( 10 ) NULL ,
    `von_soll` VARCHAR( 150 ) NOT NULL ,
    `bis_soll` VARCHAR( 150 ) NOT NULL ,
    `von_ist` VARCHAR( 150 ) NOT NULL ,
	`bis_ist` VARCHAR( 150 ) NOT NULL 
    )