<?php

class Connexion
{

    private $dbname = 'projet5';
    private $dbuser = 'root';
    private $dbpass = '';

    //methodes

    private function connectionBDD()
    {
        try{
            $connexion = new PDO('mysql:host=localhost;dbname=' . $this->db_name, $this->usernamedb, $this->passdb, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8mb4\''));
            return true;
        }catch(PDOException $e){
            die('Erreur : '.$e->getMessage());
        }
        return $connexion;
    }

    function requeteSecure($sql, $param = array())
    {
        $connect = $this->connectionBDD();
        $stmt = $connect->prepare($sql);
        $stmt->execute($param);
        return $stmt;
    }

    
    /**
     * Récupère une ligne d'une table sous la forme d'un tableau associatif (par défaut)
     *
     * @param string $sql SQL Query
     * @param array $param Tableau de paramètre
     * @param [type] $type Flag
     * @return array|bool Results ou false si pas de résultat
     */
    public function fetch_One($sql, $param = array(), $type = PDO::FETCH_ASSOC)
    {
        $stmt = $this->requeteSecure($sql, $param);
        $result = $stmt->fetch($type);

        return $result;
    }

    /**
     * Récupère les données de plusieurs lignes d'une table sous la forme d'un tableau associatif à 2 dimensions (par défaut)
     *
     * @param string $sql SQL Query
     * @param array $param Tableau de paramètres
     * @param [type] $type Flag
     * @return array
     */
    public function fetch_All($sql, $param = array(), $type = PDO::FETCH_ASSOC)
    {
        $stmt = $this->requeteSecure($sql, $param);
        $result = $stmt->fetchAll($type);
        if (!(count($result) > 0)) {
            $result = false;
        }
        return $result;
    }
}



?>