<?php

namespace App\Model;

class User extends Model{

        /** Ajouter un utilisateur */
        function create($pseudo, $nom, $prenom, $mail, $password){
            $sql = "INSERT INTO user (iduser, pseudo, nom, prenom, mail, password) 
                    VALUES (NULL, :pseudo, :nom, :prenom, :mail, :password)";
            $stmt=self::$connexion->prepare($sql);
            $resultat = $stmt->execute(
                [
                    ':pseudo' => $pseudo,
                    ':nom' => $nom,
                    ':prenom' =>  $prenom,
                    ':mail' => $mail,
                    ':password' => sha1($password),
                ]
            );
            return $resultat;
        }
    
        /** validation connexion */
    
        function check($pseudo, $password){
            $password = sha1($password);
            $sql = "SELECT * FROM user WHERE pseudo = :pseudo AND password = :pass";
            $stmt=self::$connexion->prepare($sql);
            $stmt->bindParam(':pseudo', $pseudo);
            $stmt->bindParam(':pass', $password);
            $stmt->execute();
            $resultat = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $resultat;
        }

        function get_user($pseudo){
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
        }

}