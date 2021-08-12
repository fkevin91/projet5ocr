<?php
namespace App\Model;

use App\DevCoder\DotEnv;

(new DotEnv(__DIR__ . '/../../.env'))->load();

class Model {
    protected static $connexion=null;
    function __construct(){
        $dsn="mysql:dbname=".getenv('DB_NAME').";host=".getenv('DB_SERVER');
        if(self::$connexion == null)
        try{
                self::$connexion=new \PDO($dsn,getenv('DB_USER'),getenv('DB_PASS'));
            }
        catch(\PDOException $e){
            printf("Échec de la connexion : %s\n", $e->getMessage());
        }
    }
}