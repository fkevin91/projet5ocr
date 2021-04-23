<?php
// modele.php

class connectionBDD {
    private static $connexion;
    private $dbserver = 'localhost';
    private $dbname = 'projet5';
    private $dbuser = 'root';
    private $dbpass = '';

    function __construct(){
        $dsn="mysql:dbname=".$this->dbname.";host=".$this->dbserver;
        try{
                self::$connexion=new PDO($dsn,$this->dbuser,$this->dbpass);
            }
        catch(PDOException $e){
            printf("Échec de la connexion : %s\n", $e->getMessage());
        }
    }

    /** Récupére les info de l'accueil à partir de son ID */
    function get_home_by_id($id)
    {
        $sql="SELECT * from infaccueil where idinfAccueil=:id";
        $stmt=self::$connexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**  */
    function get_Log_by_id($id){

    }

    /** Ajouter un utilisateur */
    function add_user($pseudo, $nom, $prenom, $mail, $password){
        $sql = "INSERT INTO user (iduser, pseudo, nom, prenom, mail, password) 
                VALUES (NULL, :pseudo, :nom, :prenom, :mail, :password)";
        $stmt=self::$connexion->prepare($sql);
        $stmt->execute(
            [
                ':pseudo' => $pseudo,
                ':nom' => $nom,
                ':prenom' =>  $prenom,
                ':mail' => $mail,
                ':password' =>  sha1($password.$mail),
            ]
        );
    }

    /** validation connexion */

    function connect_user($mail, $password){
        $password = sha1($password.$mail);
        $sql = "SELECT * FROM user WHERE mail = :mail AND password = :pass";
        $stmt=self::$connexion->prepare($sql);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':pass', $password);
        $stmt->execute();
        $resultat = $stmt->fetchObject();
        if($resultat){
            $_SESSION['Auth'] = array(
                'login' => $mail,
                'pass' => $password,
                'role' => ''
            );
            return true;
        }
        else {
            return false;
        }
    } 
    
    /** Récupére la liste des posts sous forme d'un tableau */
    function get_all_post(){
        $sql="SELECT * from blogpost";
        $data=self::$connexion->query($sql);
        return $data;
    }
    /** Récupére un post à partir de son ID */
    function get_post_by_id($id)
    {
        $sql="SELECT * from blogpost where idblogpost=:id";
        $stmt=self::$connexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    /** Ajoute un post à la table blogpost */
    function add_post($data){
        $sql = "INSERT INTO blogpost(titre,contenu,photo_url,date_creation,user_iduser) values (?,?,?,?,?)";
        $stmt = self::$connexion->prepare($sql);
        return $stmt->execute(array($data['nom'],
            $data['prenom'], $data['naissance'],$data['ville']));
    }


}