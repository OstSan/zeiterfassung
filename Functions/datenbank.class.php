<?php

/**
 * @author OstSan
 * @copyright 2018
 */
/*


INSERT
$db->query("INSERT INTO mytable (FName, LName, Age, Gender) VALUES (:fname, :lname, :age, :gender)");  
$db->bind(‘:fname’, ‘John’); usw...
$db->execute(); 
$db->lastInsertId(); OPTIONAL

SELECT
Einzel SELECT
$db->query("SELECT FName, LName, Age, Gender FROM mytable WHERE FName = :fname"); 
$db->bind(‘:fname’, ‘Jenny’);  usw...
$erg = $db->single(); <-- Array()

Mehrfach SELECT
$erg = $db->resultset(); <-- Multi Array()()


$row = $db->rowCount(); <^ anzahl der zurückgegebenen zeilen

UPDATE
$db->query("UPDATE mytable SET FName = :fname, LName = :lname WHERE Age = :age");
$db->bind(‘:fname’, ‘John’); usw...
$db->execute();


SELECT simple
$erg = $db->select("mytable",array("FName","LName"),["WHERE x=y"],[0 für singel() , 1 für resultset]);
$db->execute();

UPDATE simple
$db->update("mytable",array("FName"=>:fname),["WHERE x=Y"]);
$db->bind(‘:fname’, ‘John’); usw...
$db->execute();

INSERT simple
$db->insert("mytable",array("FNAME"=>":fname"),["WHERE x=y"]);
$db->bind(‘:fname’, ‘John’); usw...
$db->execute();
*/

class DB
{

    var $version = 1.0;
    private $prefix;
    private $dbh;
    private $error;
    private $stmt;

    function __construct($db_config)
    {
        try {
            $this->prefix = $db_config['prefix'];
            $this->dbh = new PDO($db_config['art'] . ":host=" . $db_config['host'] .
                ";dbname=" . $db_config['dbname'], $db_config['user'], $db_config['pwd'], $db_config['options']);
        }
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }
    
    public function select($table, $array, $where = '', $fetch = 0){
        $query = "SELECT ";
        foreach($array as $value){
            $query .= $value." ,";
        }
        $query = substr($query,0,strlen($query)-2);
        $query .= " FROM ".$this->prefix.$table;
        if(!empty($where))$query .= " ".$where;
        $this->query($query);
        if($fetch==0){
            return $this->single();
        }else{
            return $this->resultset();
        }
    }
    
    public function update($table, $array, $where = ''){
        $query = "UPDATE ".$this->prefix.$table." ";
        foreach($array as $key => $value){
            $query .= $key ." = ". $value." ,";
        }
        $query = substr($query,0,strlen($query)-2);
        if(!empty($where))$query .= " ".$where;
        
        $this->query($query);
    }
    
    public function insert($table, $array, $where = ''){
        $query = "INSERT INTO ".$this->prefix.$table." ";
        foreach($array as $key=>$value){
            $query .= $key ." = ".$value." ,";
        }
        $query = substr($query,0,strlen($query)-2);
        if(!empty($where))$query .= " ".$where;
        
        $this->query($query);
    }
    
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function resultset()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_BOTH);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_BOTH);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    public function debugDumpParams()
    {
        return $this->stmt->debugDumpParams();
    }

}
?>