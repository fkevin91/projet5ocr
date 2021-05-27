<?php
namespace App\Model;

class Model {
    protected static $connexion=null;
    private $dbserver = 'localhost';
    private $dbname = 'projet5';
    private $dbuser = 'root';
    private $dbpass = '';

    function __construct(){
        $dsn="mysql:dbname=".$this->dbname.";host=".$this->dbserver;
        if(self::$connexion == null)
        try{
                self::$connexion=new \PDO($dsn,$this->dbuser,$this->dbpass);
            }
        catch(\PDOException $e){
            printf("Échec de la connexion : %s\n", $e->getMessage());
        }
    }
}