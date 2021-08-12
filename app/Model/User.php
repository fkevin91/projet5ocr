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
                    ':pseudo' => $entity->getPseudo(),
                    ':nom' => $entity->getNom(),
                    ':prenom' =>  $entity->getPrenom(),
                    ':mail' => $entity->getMail(),
                    ':password' => sha1($entity->getPassword()),
                ]
            );
            return $resultat;
        }
    
        /** validation connexion */
        function check($entity){
            $pass = sha1(strip_tags($entity->getPassword()));
            $sql = "SELECT * FROM user WHERE pseudo = :pseudo AND password = :pass";
            $stmt=self::$connexion->prepare($sql);
            $stmt->bindParam(':pseudo', strip_tags($entity->getPseudo()));
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            $resultat = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $resultat;
        }
}