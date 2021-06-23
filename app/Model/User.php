<?php

namespace App\Model;

class User extends Model{

        /** Ajouter un utilisateur */
        function create($entity){
            $sql = "INSERT INTO user (iduser, pseudo, nom, prenom, mail, password) 
                    VALUES (NULL, :pseudo, :nom, :prenom, :mail, :password)";
            $stmt=self::$connexion->prepare($sql);
            $resultat = $stmt->execute(
                [
                    ':pseudo' => $entity->get_pseudo(),
                    ':nom' => $entity->get_nom(),
                    ':prenom' =>  $entity->get_prenom(),
                    ':mail' => $entity->get_mail(),
                    ':password' => sha1($entity->get_password()),
                ]
            );
            return $resultat;
        }
    
        /** validation connexion */
        function check($entity){
            $pass = sha1($entity->get_password());
            $sql = "SELECT * FROM user WHERE pseudo = :pseudo AND password = :pass";
            $stmt=self::$connexion->prepare($sql);
            $stmt->bindParam(':pseudo', $entity->get_pseudo());
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            $resultat = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $resultat;
        }

        /*function get_user($pseudo){
            $sql = "SELECT * FROM user WHERE pseudo = :pseudo ";
            $stmt=self::$connexion->prepare($sql);
            $stmt->bindParam(':pseudo', $pseudo);
            $stmt->bindParam(':pass', $password);
            $stmt->execute();
            $resultat = $stmt->fetchAll(\PDO::FETCH_OBJ);

            if($resultat){
                $_SESSION['Auth'] = array(
                    'login' => $pseudo,
                    'pass' => $password,
                    'role' => ''
                );
                return true;
            }
            else {
                return false;
            }
        }*/

}