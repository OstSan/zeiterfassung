<?php

/**
 * @author OstSan
 * @copyright 2018
 */


class MYSQL {
	var $version	=	"0.1";
	var $db;
	var $dbname;
	var $queries;
	var $connected = FALSE;
	var $duration;
	var $wait;
	var $debug = false;
	

	public function __construct($config) {
		$this->db = mysqli_connect($config['server'],$config['user'],$config['pwd']);
		#echo mysql_error();
		if (!$this->db) {
			$this->error("CONN.OPEN");
		}
		$this->dbname = $config['db'];
		$this->queries = 0;
		$this->wait = false;
		
		if (mysqli_select_db($this->db,$config['db']) === FALSE) {;
			$this->error("DB.SELECT");
		} else {
			$this->connected = TRUE;
		}
	}
	
	function Query ($query) {
		if (!$this->connected) {
			$this->error("NO CONN");
		} else {
			list($usec, $sec) = explode(" ", microtime());
			$starttime = ((float)$usec + (float)$sec);
			$get = mysqli_query($this->db,$query);
			if($this->debug) echo $query."<br />\n";
			list($usec, $sec) = explode(" ", microtime());
			$time2 = ((float)$usec + (float)$sec);
			$this->duration += $time2-$starttime;
			$this->queries++;
	
			return $get;
		}
	}

	function Update ($values, $table, $add = "") {
		if (!$this->connected) {
			$this->error("NO CONN");
		} else {
			$query = "";
			foreach ($values AS $key => $value) $query .= $key." = ".$value.", ";
			$query = "UPDATE ".$table." SET ".substr($query, 0, strlen($query)-2)." ".$add;
			$query = str_replace("%","%",$query);
			$this->Query($query);

			return mysqli_error($this->db);
		}
	}
	
	function FreeSelect ($query) {
		if (!$this->connected) {
			$this->error("NO CONN");
		} else {
			list($usec, $sec) = explode(" ", microtime());
			$starttime = ((float)$usec + (float)$sec);
			if($this->debug) echo $query."<br />\n";
			$get = mysqli_query($this->db,$query);
			list($usec, $sec) = explode(" ", microtime());
			$time2 = ((float)$usec + (float)$sec);
			$this->duration += $time2-$starttime;
	
			$this->queries++;
	
			return $get;
		}
	}
	
	function Select ($values, $table, $add = "", $array = 0) {
		if (!$this->connected) {
			$this->error("NO CONN");
		} else {		
			$query = "";
			foreach ($values AS $value) $query .= $value.", ";
			$query = "SELECT ".substr($query, 0, strlen($query)-2)." FROM `".$table."` ".$add;
			$get = $this->FreeSelect($query);
			if($array == 1) $get = $this->FetchArray($get);
		
			return $get;
		}
	}
	
	function Insert ($values, $table) {
		if (!$this->connected) {
			$this->error("NO CONN");
		} else {
			$query = ""; $inserts = ""; $keys = "";
			foreach ($values AS $key => $value) {
				$keys .= "`".$key."`, ";
				$inserts .= "'".mysqli_real_escape_string($this->db,$value)."', ";
			}
			$query = "INSERT INTO `".$table."` (".substr($keys, 0, strlen($keys)-2).") VALUES (".substr($inserts, 0, strlen($inserts)-2).")";
			$query = str_replace("%","%",$query);
		
			$this->Query($query);
		
			$return['err'] = mysqli_error($this->db);
			$return['id'] = mysqli_insert_id($this->db);
			return $return;
		}
	}
	
	function Delete ($table, $add = "") {
		if (!$this->connected) {
			$this->error("NO CONN");
		} else {
			$query = "";
			if($add == "") $query = "TRUNCATE TABLE `".$table."`";
			else $query = "DELETE FROM ".$table." ".$add."";
			$this->Query($query);
			
			return mysqli_error($this->db);
		}
	}
	
	function FetchArray ($query) {
		if (!$this->connected) {
			$this->error("NO CONN");
		} else {
			$get = @mysqli_fetch_array($query);
			return $get;
		}
	}
	
	function NumRows ($query) {
		if (!$this->connected) {
			$this->error("NO CONN");
		} else {
			$get = @mysqli_num_rows($query);
			return $get;
		}
	}
	
	
	function AffectedRows () {
		if (!$this->connected) {
			$this->error("NO CONN");
		} else {
			$get = @mysqli_affected_rows($this->db);
			return $get;
		}
	}
	
	function FetchAssoc ($query) {
		if (!$this->connected) {
			$this->error("NO CONN");
		} else {
			$get = @mysqli_fetch_assoc($query);
			return $get;
		}
	}
	/*
	function Optimize () {
		if (!$this->connected) {
			$this->error("NO CONN");
		} else {
			$result = mysql_list_tables($this->dbname);
			$string = "";
			while($get = mysql_fetch_row($result)) $string .= "`".$get[0]."`, ";
			$this->Query("OPTIMIZE TABLE ".substr($string,0,-2));
			$this->queries++;
		}
	}
	*/
	function Close () {
		if (!$this->connected) {
			$this->error("NO CONN");
		} else {
			mysqli_close($this->db);
		}
	}
	
	function error($error_type) {
		switch ($error_type) {
			case 'CONN.OPEN':
				$text .= "Beim &Ouml;ffnen der Verbindung ist ein Fehler aufgetreten<br />";
				break;
	
			case 'CONN.CLOSE':
				$text .= "Beim Schlie�en der Verbindung ist ein Fehler aufgetreten<br />";
				break;
	
			case 'NO CONN':
				$text .= "Die angeforderte Aktion konnte nicht durchgef&uuml;hrt werden, da keine Verbindung zur Datenbank besteht!<br />";
				break;
	
			case 'DB.SELECT':
				$text .= "Beim Ausw&auml;hlen der Datenbank ist ein Fehler aufgetreten. Ev. ist die Datenbank nicht vorhanden<br />";
				break;
	
			case 'QUERY FAILED':
				$text .= "W&auml;hrend folgender Abfrage ist ein Fehler aufgetreten:\n\n".$this->Query."<br />";
				break;
	
			default:
				$text .= "Es ist folgender, unbekannter Fehler aufgetreten: ".$error_type."<br />";
		}
		if ($this->connected) {
			$text .= "<br />mySQL meldet:<br />Fehler-Nummer: ".@mysqli_errno($this->db)."<br />Fehler-Beschreibung: ".@mysqli_error($this->db)."<br />";
		}
		echo $text."<br />";
	}
}
?>